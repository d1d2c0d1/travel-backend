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
            'subject' => "#000{$feedback->id} запрос от клиента сайта",
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
}
