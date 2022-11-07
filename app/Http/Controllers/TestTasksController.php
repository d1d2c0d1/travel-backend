<?php

namespace App\Http\Controllers;

use App\Models\TestTask;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TestTasksController extends Controller
{
    /**
     * Create test result
     *
     * @param Request $request
     * @return Response
     */
    public function createTask(Request $request): Response
    {
        $data = [
            'name' => (string) $request->input('name'),
            'phone' => (string) $request->input('phone'),
            'level' => (string) $request->input('level'),
            'payment' => (string) $request->input('payment'),
            'ip' => (string) \Request::ip(),
        ];

        if( empty($data['name']) ) {
            return response([
                'status' => false,
                'error' => 'Name is invalid'
            ]);
        }

        if( empty($data['phone']) ) {
            return response([
                'status' => false,
                'error' => 'Name is invalid'
            ]);
        }

        $task = new TestTask($data);

        try {
            $task->save();
        } catch (Exception $e) {
            return response([
                'status' => false,
                'error' => $e->getMessage()
            ]);
        }

        return response([
            'status' => true,
            'data' => $task
        ]);
    }

}
