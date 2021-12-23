<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return array
     */
    public function index(Request $request): array
    {
        $email = (string) $request->json('email');

        /**
         * Email validation
         */
        if (mb_strlen($email) <= 10) {
            return [
                'status' => false,
                'error' => 'Email too short.',
            ];
        }

        $emailChunks = explode('@', $email);

        if (count($emailChunks) !== 2) {
            return [
                'status' => false,
                'error' => 'In email has not found @',
            ];
        }

        if (mb_strlen($emailChunks[0]) <= 4) {
            return [
                'status' => false,
                'error' => 'Email name is very too short.',
            ];
        }

        if (mb_strpos($emailChunks[1], '.') === false) {
            return [
                'status' => false,
                'error' => 'In email has not found dot',
            ];
        }

        $domainChunks = explode('.', $emailChunks[1]);

        if (mb_strlen($domainChunks[0]) < 2) {
            return [
                'status' => false,
                'error' => 'Domain name in email is very too short.',
            ];
        }

        if (mb_strlen($domainChunks[1]) < 2) {
            return [
                'status' => false,
                'error' => 'Domain zone in email is very too short.',
            ];
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
            return [
                'status' => false,
                'error' => "Duplicate entry '{$email}'.",
            ];
        }

        if ($subscribe->wasRecentlyCreated) {
            return [
                'status' => true,
                'subscribeId' => $subscribe->id,
            ];

        } else {
            return [
                'status' => false,
                'error' => 'Failed to create table row.'
            ];

        }
    }
}
