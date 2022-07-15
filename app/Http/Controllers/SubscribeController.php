<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $email = (string) $request->json('email');

        /**
         * Email validation
         */
        if (mb_strlen($email) <= 10) {
            return response([
                'status' => false,
                'error' => 'Email too short.',
            ], 405);
        }

        $emailChunks = explode('@', $email);

        if (count($emailChunks) !== 2) {
            return response([
                'status' => false,
                'error' => 'In email has not found @',
            ], 405);
        }

        if (mb_strlen($emailChunks[0]) <= 4) {
            return response([
                'status' => false,
                'error' => 'Email name is very too short.',
            ], 405);
        }

        if (mb_strpos($emailChunks[1], '.') === false) {
            return response([
                'status' => false,
                'error' => 'In email has not found dot',
            ], 405);
        }

        $domainChunks = explode('.', $emailChunks[1]);

        if (mb_strlen($domainChunks[0]) < 2) {
            return response([
                'status' => false,
                'error' => 'Domain name in email is very too short.',
            ], 405);
        }

        if (mb_strlen($domainChunks[1]) < 2) {
            return response([
                'status' => false,
                'error' => 'Domain zone in email is very too short.',
            ], 405);
        }

        /**
         * Create row in table
         */
        $subscribe = new Subscribe([
            'ip' => $request->ip(),
            'email' => $email,
        ]);

        try {
            $subscribe->save();
        } catch (QueryException $e) {
            return response([
                'status' => false,
                'error' => "Duplicate entry '{$email}'.",
            ], 500);
        }

        if ($subscribe->wasRecentlyCreated) {
            return response([
                'status' => true,
                'subscribeId' => $subscribe->id,
            ]);

        } else {
            return response([
                'status' => false,
                'error' => 'Failed to create table row.'
            ], 500);

        }
    }
}
