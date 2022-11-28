<?php

namespace App\Http\Controllers;

use App\Http\Helpers\MainHelper;
use App\Models\SiteOption;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;
use Illuminate\Support\Facades\Cache;

class SiteOptionController extends Controller
{
    /**
     * Get all SiteOption
     *
     * @param Request $request
     * @return Response
     */

    public function index(Request $request): Response
    {
        $siteOption = Cache::remember("site_option_all", SiteOption::TIME_CACHE, function () {
            return SiteOption::all();
        });

        return response([
            'status' => true,
            'data' => $siteOption,
        ]);
    }

    /**
     * Get SiteOption on ID
     *
     * @param $id
     * @param Request $request
     * @return Response
     */
    public function singleId($id, Request $request): Response
    {
        if (!$id || $id < 1) {
            return response([
                'status' => false,
                'error' => 'ID can\'t be empty!'
            ]);
        }
        $siteOption = Cache::remember("site_option_id/{$id}", SiteOption::TIME_CACHE, function () use ($id) {
            return SiteOption::find($id);
        });
        if ($siteOption?->id != $id) {
            return response([
                'status' => false,
                'error' => "SiteOption with ID:{$id} not found!"
            ], 404);
        }

        return response([
            'status' => true,
            'data' => $siteOption
        ]);
    }

    /**
     * Get SiteOption on Code
     *
     * @param $code
     * @param Request $request
     * @return Response
     */
    public function singleCode($code, Request $request): Response
    {

        $siteOption = Cache::remember("site_option_code/{$code}", SiteOption::TIME_CACHE, function () use ($code) {
            return SiteOption::where('code', 'LIKE', $code)->first();
        });

        if ($siteOption?->code !== $code) {
            return response([
                'status' => false,
                'error' => "SiteOption with code:{$code} not found!"
            ], 404);
        }

        return response([
            'status' => true,
            'data ' => $siteOption
        ]);
    }

    /**
     * Create SiteOption
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request): Response
    {
        $validate = MainHelper::validate($request, SiteOption::CREATING_RULES);
        if ($validate->getStatus() === false) {
            return response($validate->toArray(), 412);
        }

        $arFields = $validate->getData();
        $arFields['user_id_created_at'] = MainHelper::getUserId();
        if (isset($arFields['value'])) {
            $validateValue = MainHelper::validateRules(
                (array)json_decode($arFields['validate']), $arFields['value'], $arFields['type']);
            if ($validateValue['status'] === false) {
                return response($validateValue, 412);
            }
        }

        $siteOption = new SiteOption($arFields);

        try {
            $siteOption->save();
        } catch (Exception $e) {

            if ((int)$e->getCode() === 23000) {

                return response([
                    'status' => false,
                    'error' => 'Repeat SiteOption, please find him'
                ], 410);

            } else {
                return response([
                    'status' => false,
                    'error' => 'Error in database',
                    'dbError' => $e->getMessage(),
                    'dbErrorCode' => (int)$e->getCode()
                ], 500);
            }
        }

        return response([
            'status' => true,
            'data' => $siteOption
        ], 201);
    }

    /**
     * Update SiteOption
     *
     * @param $id
     * @param Request $request
     * @return Response
     */
    public function update($id, Request $request): Response
    {
        if (!$id || $id < 1) {
            return response([
                'status' => false,
                'error' => 'ID can\'t be empty!'
            ]);
        }

        $siteOption = SiteOption::find($id);
        if (!$siteOption || !$siteOption?->id) {
            return response(MainHelper::getErrorResponse([
                MainHelper::getErrorItem(412, 'SiteOption ID is empty!')
            ]), 412);
        }

        $validate = MainHelper::validate($request, SiteOption::UPDATING_RULES);
        if ($validate->getStatus() === false) {
            return response($validate->toArray(), 412);
        }

        $arFields = $validate->getData();
        $arFields['user_id_updated_at'] = MainHelper::getUserId();
        foreach ($arFields as $key => $value) {
            $siteOption->$key = $value;
        }
        if (isset($siteOption->value)) {
            $validateValue = MainHelper::validateRules(
                (array)json_decode($siteOption->validate), $siteOption->value, $siteOption->type);
            if ($validateValue['status'] === false) {
                return response($validateValue, 412);
            }
        }

        try {
            $siteOption->save();
        } catch (Exception $e) {
            return response(MainHelper::getErrorResponse([
                MainHelper::getErrorItem(422, 'Database error. Row can\'t be saved to db!'),
                MainHelper::getErrorItem(500, $e->getMessage())
            ]), 422);
        }

        return response([
            'status' => true,
            'data' => $siteOption
        ], 202);
    }

    /**
     *  Delete SiteOption
     * @param $id
     * @param Request $request
     * @return Response
     */
    public function delete($id, Request $request): Response
    {
        if (!$id || $id < 1) {
            return response([
                'status' => false,
                'error' => 'ID can\'t be empty!'
            ]);
        }

        $siteOption = SiteOption::find($id);
        if (!$siteOption || !$siteOption?->id) {
            return response(MainHelper::getErrorResponse([
                MainHelper::getErrorItem(412, 'SiteOption ID is empty!')
            ]), 412);
        }

        try {
            $siteOption->delete();
        } catch (Exception $e) {
            return response([
                'status' => false,
                'error' => $e->getMessage()
            ]);
        }

        return response([
            'status' => true,
        ]);
    }
}
