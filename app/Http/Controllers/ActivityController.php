<?php

namespace App\Http\Controllers;

use App\Models\activity;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ActivityController extends Controller
{
    public function CreateActivity(Request $request ){  
        $validator = Validator::make($request->all(), [

            'activity' => 'nullable|string',
            'detail' => 'nullable|string',
            'output' => 'nullable|string',
            'points' => 'nullable|string',
            'score' => 'nullable|string',
            'teacher_id' => 'nullable|string',
            'grade' => 'nullable|string',
            'section' => 'nullable|string',

          ]);

        $user = activity::create([
            'activity' => $request->activity ,
            'detail' => $request->detail,
            'output' => $request->output,
            'points' => $request->points,
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

    public function ShowActivity($id){       
        return  activity::where('teacher_id', $id)->get();
    }

    public function ShowAllActivity(){       
        return  activity::all();
    }

    public function DestroyActivity($id){
        return  activity::destroy($id);
    }


    public function SubmitActivity(Request $request ){  
        $validator = Validator::make($request->all(), [
            'student_id' => 'nullable|string',
            'activity_id' => 'nullable|string',
            'name' => 'required|string',
            'activity' => 'nullable|string',
            'detail' => 'nullable|string',
            'output' => 'nullable|string',
            'points' => 'nullable|string',
            'score' => 'nullable|string',
            'answer' => 'nullable|string',
            'teacher_id' => 'nullable|string',
            'grade' => 'nullable|string',
            'section' => 'nullable|string',

          ]);

        $user = Score::create([
            'student_id' => $request->student_id,
            'activity_id' => $request->activity_id,
            'name' => $request->name,
            'activity' => $request->activity ,
            'detail' => $request->detail,
            'output' => $request->output,
            'points' => $request->points,
            'score' => $request->score,
            'answer' => $request->answer,
            'teacher_id' => $request->teacher_id,
            'grade' =>$request->grade,
            'section' => $request->section,
        
        ]);
       
        return response([
            'message'=>"Successfully Registered"
        ]);
    }

    public function StudentAnswer($id){
    
        return  Score::where('activity_id', $id)->get();
        
    }

    public function ViewAnswer($id){
    
        return  Score::where('student_id',$id)->get();
        
    }

    public function ScoreActivity(Request $request, $id){

        $post = Score::find($id);
        $post->update($request->all());
        return $post;
    
        }

}
