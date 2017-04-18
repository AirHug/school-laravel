<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;

class UploadController extends Controller
{
    /**
     * Upload
     *
     * @param Request $request
     * @return response
     */
    public function upload(Request $request)
    {
        try {
            $fileName = "";
            if ($request->hasFile("filedata")) {
                $fileName = time(Carbon::now()) . "." . $request->file("filedata")->getClientOriginalExtension();
                $request->file("filedata")->move('files/upload', $fileName);
            }
            return response()->json([
                'err' => '',
                'msg' => [
                    'url' => url("files/upload/" . $fileName),
                    'localname' => '',
                    'id' => ''
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'err' => '上传失败!',
                'msg' => [
                    'url' => '',
                    'localname' => '',
                    'id' => ''
                ],
            ]);
        }
    }
}
