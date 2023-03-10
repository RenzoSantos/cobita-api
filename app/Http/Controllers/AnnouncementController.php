<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnnouncementController extends Controller
{
    public function CreateAnnouncement(Request $request ){  
        $validator = Validator::make($request->all(), [

            'title' => 'required|string',
            'text' => 'required|string',

          ]);

        $user = Announcement::create([
            'title' => $request->title,
            'text' => $request->text,
        ]);
       
        return response([
            'message'=>"Successfully Registered"
        ]);
    }

    public function EditAnnouncement(Request $request, $id){

    $post = Announcement::find($id);
    $post->update($request->all());
    return $post;

    }

    public function ShowAnnouncement(){
        
        return  Announcement::all();
    }

    public function DestroyAnnouncement($id){
        return  Announcement::destroy($id);
    }
}
