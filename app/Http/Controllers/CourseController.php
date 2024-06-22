<?php

namespace App\Http\Controllers;

use App\Models\MCourse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CourseController extends Controller
{
    public function getItemByID(Request $request){
        $course_id = $request->id;
        $data = MCourse::where('course_id', $course_id)->get();
        return view('practive', [
            'course_id' => $course_id,
            'data' => $data
        ]);
    }
}
