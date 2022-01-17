<?php

namespace App\Http\Controllers;

use App\Http\Helpers\MainHelper;
use App\Models\Attachment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;


class MediaController extends Controller
{

    /**
     * File uploader
     *
     * @param Request $request
     * @return Response
     */
    public function upload(Request $request): Response
    {

        $file = $request->file('file');

        if( !$file ) {
            return response(
                MainHelper::getErrorResponse([
                    MainHelper::getErrorItem(419, 'File can\'t be empty!')
                ]), 419
            );
        }

        $filename = $file->getClientOriginalName();
        $path = '/attachments/' . date('Y/m/d/');

        $storage = Storage::disk('local')->putFileAs(
            $path,
            $file,
            $filename
        );

        $attachment = new Attachment();
        $attachment->filename = $filename;
        $attachment->type = $file->getClientMimeType();
        $attachment->title = $filename;
        $attachment->path = $path;

        try {
            $attachment->save();
        } catch (Exception $e) {

            return response(
                MainHelper::getErrorResponse([
                    MainHelper::getErrorItem(500, 'File can\'t be uploaded')
                ])
            );

        }

        return response(
            MainHelper::getResponse(true, [
                'src' => $path . $filename,
                'fileId' => $attachment->id
            ])
        );
    }

}
