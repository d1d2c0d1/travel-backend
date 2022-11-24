<?php

namespace App\Http\Controllers;

use App\Facades\Unisender;
use App\Http\Helpers\MainHelper;
use App\Models\Feedback;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;

class FeedbacksController extends Controller
{
    /**
     * Create question in feedbacks table
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {

        $validator = Validator::make($request->all(), [
            'phone' => ['required', 'string', 'min:9', 'max:13'],
            'email' => ['required', 'string', 'min:8', 'max:255'],
            'question' => ['required', 'string', 'min:16', 'max:2048']
        ]);

        if( $validator->fails() ) {
            return response([
                'status' => false,
                'error' => 'Request data is not valid',
                'validator' => $validated->messages()->toArray()
            ], 400);
        }

        // Retrieve the validated input...
        $validated = $validator->safe()->only(['email', 'phone', 'question']);

        $arFields = [
            'is_resolved' => 0,
            'user_id' => MainHelper::getUserId() >= 1 ? MainHelper::getUserId() : null,
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'question' => $validated['question'],
            'user_agent' => $request->userAgent(),
            'ip' => $request->ip()
        ];

        $feedback = new Feedback($arFields);

        try {
            $feedback->save();
        } catch (Exception $e) {
            return response([
                'status' => false,
                'error' => 'Can\'t create question in database'
            ], 500);
        }

        $response = Unisender::sendEmail([
            'email' => 'ctaciv@yandex.ru',
            'subject' => "Тикет #000{$feedback->id} от пользователя U-Gid",
            'body' => view('email.feedback', [
                'user' => MainHelper::getUser(),
                'feedback' => $feedback
            ])->render()
        ]);

        return response([
            'status' => true,
            'data' => $validated
        ]);
    }

    /**
     * Getting all feedbacks
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $feedbacksDb = Feedback::with('user');

        if( $request->has('search') ) {
            $feedbacksDb->where('question', 'like', "%{$request->input('search')}%");
        }

        if( $request->has('is_resolved') ) {
            $feedbacksDb->where('is_resolved', '=', (boolean) $request->input('is_resolved'));
        }

        if( $request->has('phone') ) {
            $feedbacksDb->where('phone', '=', (int) $request->input('phone'));
        }

        if( $request->has('email') ) {
            $feedbacksDb->where('email', '=', (string) $request->input('email'));
        }

        if( $request->has('date_from') ) {
            $feedbacksDb->where('created_at', '>=', $request->input('date_from'));
        }

        if( $request->has('date_to') ) {
            $feedbacksDb->where('created_at', '<=', $request->input('date_to'));
        }

        if( $request->has('user_id') ) {
            $feedbacksDb->where('user_id', '=', (int) $request->input('user_id'));
        }

        return response([
            'status' => true,
            'data' => $feedbacksDb->paginate()
        ]);
    }
}
