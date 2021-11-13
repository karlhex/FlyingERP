<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\FileResource;

class FileController extends Controller
{
      public function index(){
        return [];
      }

      public function upload(Request $request){

            if($request->file()) {
                $file = [];
                $file['name'] = $request->file->getClientOriginalName();
                $file_name = time().'_'.$request->file->getClientOriginalName();
                $file_path = $request->file('file')->storeAs('uploads', $file_name, 'public');
                $file['file'] = Storage::url($file_path);

                $url = Storage::url($file_path);

                Log::debug('file_name '. $file_name . ' file_path:' . $file_path. ' url:'. $url);

                return new FileResource($file);
            }else {
                return ['error' => 'file validate error'];
            }
       }

}
