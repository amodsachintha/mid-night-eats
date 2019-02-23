<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function process(Request $request)
    {
        $validator = Validator::make($request->all(),[
           'filepond' => 'required|image'
        ]);
        if($validator->fails()){
            return response('',500);
        }
        if (!file_exists(storage_path('app/tmp'))) {
            mkdir(storage_path('app/tmp'), 0777, true);
        }
        if (!$request->hasFile('filepond')) {
            return response('err', 500);
        }
        $image = Image::make(Input::file('filepond'));
        $image->resize(400, 400);
        $filename = md5(random_bytes(8).'-'.Carbon::now()->toDateTimeString()) . '.png';
        $image->save(storage_path('app/tmp/' . $filename));
        return $filename;
    }

    public function delete(Request $request)
    {
        $filename = trim($request->getContent());
        if (file_exists(storage_path('app/tmp/' . $filename))) {
            unlink(storage_path('app/tmp/' . $filename));
            return response('ok', 201);
        } else {
            return response('Error', 404);
        }
    }


}
