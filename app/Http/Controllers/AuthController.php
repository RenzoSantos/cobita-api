<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request ){  
        $validator = Validator::make($request->all(), [

            'name' => 'required|string',
            'mname' => 'nullable|string',
            'fname' => 'required|string',
            'grade' => 'nullable|string',
            'section' => 'nullable|string',
            'image' => 'nullable|string',
            'about' => 'nullable|string',
            'user_type' => 'nullable|string',
            'is-active' => 'nullable|string',
            'email' => 'nullable|string',
            'password' => 'nullable|string',

          ]);

        $user = User::create([
            'name' => $request->name,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'grade' => $request->grade,
            'section' => $request->section,
            'image' => $request->image,
            'about' => $request->about,
            'user_type' => $request->user_type,
            'active' => $request->active,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return ([
            'user' => $user,
            'token' => $user->createToken($user->name)->plainTextToken
        ]); 
        return response()->json(['message'=>"Successfully Registered"]);
    }

    // login
    public function login(Request $request ){ 

        $validator = Validator($request->all(),);
        
        if(!Auth::attempt($request->only('email', 'password')))
        {
            return $this->error('', 'email or password!', 401);
        }
     
        $user = User::where('email',  $request['email'])->first();
        // dd($user);
        return ([
            'user' => $user,
            'token' => $user->createToken($user->name)->plainTextToken
        ]);
        return response()->json(['message'=>"Successfully Login"]);
    }

    public function logout(Request $request ) 
    {
        auth()->user()->tokens()->delete();
        // dd(  Auth);
        return [ 'message' => 'logged out'];

    }

    public function ShowTeacher(){
        return User::where('user_type','teacher')->get();
    } 

    public function ShowStudent(){
        return User::where('user_type','student')->get();
    } 

    public function UserCount(){
        
        $Tcount = User::where('user_type','teacher')->count();
        $Scount = User::where('user_type','student')->count();

        return response([
            'Tcount' => $Tcount,
            'Scount' => $Scount,
        ]);
    } 

    public function EditTeacher(Request $request, $id){

        $user = User::find($id);
        $user->update($request->all());
        return  $user;
    } 
    
    public function DestroyTeacher($id){

        return User::destroy($id);

    } 

}
