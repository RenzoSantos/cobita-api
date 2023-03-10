<?php

namespace App\Http\Controllers;

use App\Models\activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ActivityController extends Controller
{
    public function CreateActivity(Request $request ){  
        $validator = Validator::make($request->all(), [

            'activity' => 'nullable|string',
            'detail' => 'nullable|string',
            'output' => 'nullable|string',
            'score' => 'nullable|string',
            'teacher_id' => 'nullable|string',
            'grade' => 'nullable|string',
            'section' => 'nullable|string',

          ]);

        $user = activity::create([
            'activity' => $request->activity ,
            'detail' => $request->detail,
            'output' => $request->output,
            'score' => $request->score,
            'teacher_id' => $request->teacher_id,
            'grade' =>$request->grade,
            'section' => $request->section,
        
        ]);
       
        return response([
            'message'=>"Successfully Registered"
        ]);
    }

    public function EditActivity(Request $request, $id){

    $post = activity::find($id);
    $post->update($request->all());
    return $post;

    }

    public function ShowActivity(){
        
        return  activity::all();
    }

    public function DestroyActivity($id){
        return  activity::destroy($id);
    }
}
