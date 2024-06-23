<?php

namespace App\Http\Controllers;

use App\Models\MVocabulary;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use App\Helpers\CommonFunction;

class VocabularyController extends Controller
{
    public function getAllItems($course){
        $data = MVocabulary::whereNull('deleted_at')->where('course', $course)->get();
        return response()->json([
            'status'    => 200,
            'data'      => $data
        ]);
    }

    public function store(Request $request){
        $vocabulary = new MVocabulary();
        $validator = Validator::make($request->all(), $vocabulary->rules);
        if($validator->fails()){
            return response()->json([
                'status' => 401,
                'message' => $validator->errors()
            ]);
        }

        $vocabulary->course = $request->course;
        $vocabulary->japanese = $request->japanese;
        $vocabulary->vietnamese = $request->vietnamese;
        $vocabulary->wr_answer1 = $request->wr_answer1;
        $vocabulary->wr_answer2 = $request->wr_answer2;
        $vocabulary->wr_answer3 = $request->wr_answer3;

        //Handle upload fileimageUpload
        if($request->imageUpload != '')
            $vocabulary->image = CommonFunction::uploadImageBase64($request->imageUpload, '/image/vocabulary/');
        else{
            return response()->json([
                "status"=> 401,
                "message"=> 'Incorrect data',
                "detail"=> $validator->getMessageBag()->add('image', 'Hình ảnh chưa được tải lên.')
            ]);
        }

        $vocabulary->save();

        return response()->json([
            'status' => 200,
            'message' => 'success'
        ]);
    }
}
