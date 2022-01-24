<?php

namespace App\Http\Controllers;

use App\Http\Helpers\MainHelper;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BlogController extends Controller
{

    /**
     * Create row in database
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request): Response
    {
        $errors = [];

        $title = $request->input('title');
        $content = $request->input('content');
        $countryId = (int) $request->input('country_id') ?? 1;
        $regionId = (int) $request->input('region_id');
        $cityId = (int) $request->input('city_id');
        $areaId = (int) $request->input('area_id');
        $languageId = (int) $request->input('language_id');
        $companyId = (int) $request->input('company_id');
        $categoryId = (int) $request->input('category_id');
        $image = (string) $request->input('image');
        $tags = $request->input('tags');
        $seoDescription = (string) $request->input('seo_description');
        $publishedAt = (int) $request->input('published_at');

        $countryId = ($countryId === 0)? 1 : $countryId;
        $languageId = ($languageId === 0)? 1 : $languageId;
        $categoryId = ($categoryId === 0)? 1 : $categoryId;
        $regionId = ($regionId === 0)? null : $regionId;
        $cityId = ($cityId === 0)? null : $cityId;
        $areaId = ($areaId === 0)? null : $areaId;
        $companyId = ($companyId === 0)? null : $companyId;
        $publishedAt = ($publishedAt <= 100)? time() : $publishedAt;

        if( empty($title) || mb_strlen($title) <= 5 ) {
            $errors[] = MainHelper::getErrorItem(419, 'title is empty');
        }

        if( empty($content) || mb_strlen($content) <= 64 ) {
            $errors[] = MainHelper::getErrorItem(419, 'content is empty');
        }

        if( $categoryId <= 0 ) {
            $errors[] = MainHelper::getErrorItem(419, 'category_id is empty');
        }

        if( $languageId <= 0 ) {
            $errors[] = MainHelper::getErrorItem(419, 'language_id is empty');
        }

        if( !empty($errors) ) {
            return response(MainHelper::getErrorResponse($errors), 419);
        }

        $code = MainHelper::cyr2lat($title);

        if( !MainHelper::isModer() ) {
            return response(MainHelper::getErrorResponse([
                MainHelper::getErrorItem(503, 'Forbidden! Permission denied.')
            ]));
        }

        $postData = [
            'title' => $title,
            'code' => $code,
            'content' => $content,
            'user_id' => MainHelper::getUserId(),
            'status' => 1,
            'views' => 0,
            'likes' => 0,
            'favorites' => 0,
            'comments' => 0,
            'country_id' => $countryId,
            'region_id' => $regionId,
            'city_id' => $cityId,
            'area_id' => $areaId,
            'language_id' => $languageId,
            'company_id' => $companyId,
            'category_id' => $categoryId,
            'image' => $image,
            'seo_description' => $seoDescription,
            'tags' => json_encode($tags),
            'published_at' => date('Y-m-d H:i:s', $publishedAt)
        ];

        $post = new Post($postData);

        try {
            $post->save();
        } catch (Exception $e) {
            return response(MainHelper::getErrorResponse([
                MainHelper::getErrorItem(500, 'Error in db. Can\'t create row.'),
                MainHelper::getErrorItem(500, $e->getMessage())
            ]));
        }

        return response(
            MainHelper::getResponse(true, [
                'post' => $post
            ]), 201
        );
    }

    /**
     * Getting posts by filter
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $posts = Post::where([
            ['id', '>=', 1]
        ])->orderByDesc('id')->paginate();

        return response(MainHelper::getResponse(true, $posts->toArray()));
    }

    /**
     * Getting single post
     *
     * @param int $id
     * @return Response
     */
    public function single(int $id): Response
    {
        if( $id <= 0 ) {
            return response(MainHelper::getErrorResponse([
                MainHelper::getErrorItem(404, 'ID is empty')
            ]));
        }

        $post = Post::find($id);

        return response(MainHelper::getResponse((bool) $post, $post?->toArray()));
    }

    /**
     * Set position for post
     *
     * @param string $position
     * @param int $id
     * @return Response
     */
    public function setPostPosition(string $position, int $id): Response
    {
        $post = Post::find($id);

        if( $post?->id >= 1 ) {

            if( !MainHelper::isAdminOrModer() ) {
                return response(MainHelper::getErrorResponse([
                    MainHelper::getErrorItem(401, 'Permission denied!')
                ]));
            }

            switch ($position) {
                case 'is_main': $post->is_main = 1; break;
                case 'is_week': $post->is_week = 1; break;
                default: return response(MainHelper::getErrorResponse([
                    MainHelper::getErrorItem(404, 'Position for post not found')
                ]));
            }

            $recentPostsOnPosition = Post::where([
                [$position, '=', 1],
                ['id', '<>', $post->id]
            ])->get();

            if( !$recentPostsOnPosition->isEmpty() ) {
                foreach ($recentPostsOnPosition as $recentPost) {
                    $recentPost->{$position} = 0;
                    try {
                        $recentPost->save();
                    } catch (Exception $e) {
                        return response(MainHelper::getErrorResponse([
                            MainHelper::getErrorItem(422, 'Error in db. Can\'t update recent post.'),
                            MainHelper::getErrorItem(500, $e->getMessage())
                        ]));
                    }
                }
            }

            try {
                $post->save();
            } catch (Exception $e) {
                return response(MainHelper::getErrorResponse([
                    MainHelper::getErrorItem(422, 'Error in db. Can\'t update post.'),
                    MainHelper::getErrorItem(500, $e->getMessage())
                ]));
            }

            return response(MainHelper::getResponse((bool) $post, $post?->toArray()));
        }

        return response(MainHelper::getErrorResponse([
            MainHelper::getErrorItem(412, 'Post ID is empty!')
        ]));
    }

    /**
     * Getting all categories
     *
     * @return Response
     */
    public function categories(): Response
    {
        $categories = Category::all();

        return response(MainHelper::getResponse(!empty($categories), $categories->toArray()));
    }

    /**
     * Create category for posts
     *
     * @param Request $request
     * @return Response
     */
    public function createCategory(Request $request): Response
    {
        $name = (string) $request->input('name', '');
        $description = (string) $request->input('description', '');
        $code = (string) $request->input('code', '');

        if( empty($name) || mb_strlen($name) <= 2 ) {
            return response(MainHelper::getErrorResponse([
                MainHelper::getErrorItem(412, 'Category name is empty!')
            ]), 412);
        }

        if( !MainHelper::isAdminOrModer() ) {
            return response(MainHelper::getErrorResponse([
                MainHelper::getErrorItem(401, 'Permissions denied!')
            ]), 401);
        }

        $category = new Category();
        $category->name = $name;
        $category->description = $description;
        $category->code = $code;
        $category->created_user_id = MainHelper::getUserId();
        $category->edit_user_id = MainHelper::getUserId();

        try {
            $category->save();
        } catch (Exception $e) {
            return response(MainHelper::getErrorResponse([
                MainHelper::getErrorItem(422, 'Database return error. Category not created!'),
                MainHelper::getErrorItem(500, $e->getMessage()),
            ]), 500);
        }

        return response(MainHelper::getResponse($category?->id >= 2, $category->toArray()));
    }
}
