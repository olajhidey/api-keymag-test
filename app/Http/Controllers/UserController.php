<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

use Validator;

use App\Util;

use Mail;

use App\Mail\WelcomeMail;

class UserController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $name = $request->input('name');
        $email = $request->input('email');
        $uid = $request->input('uid');
        $data = array();

        $validateName = User::where('name', $name)->first();
        $validateEmail = User::where('email', $email)->first();

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'email']
        ]);

        if($validator->fails()){
            array_push($data, ['success'=>false, 'message'=>$validator->messages()]);
            return Util::generateJson(400, $data);
        }
    
        if($validateName){
            array_push($data, ['success'=> false, 'message'=>'Username already taken']);
            return Util::generateJson(409, $data);
        }else if($validateEmail){
            array_push($data, ['success'=>false, 'message'=> 'Email already taken']);
            return Util::generateJson(409, $data);

        }else{

            // name, email, uid, last_login
            $user = User::create([
                'name' => $name,
                'email' => $email, 
                'uid' => $uid,
                'last_login' => \now()
            ]);

            Mail::to($user->email)->send(new WelcomeMail($user));

           array_push($data, ['success'=>true, 'message'=> 'User created successfully', 'data'=> $user]);
           return Util::generateJson(200, $data);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::find($id);

        if($user != null){
            return Util::generateJson(200, ['success'=>true, 'data' => $user]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $header = $request->bearerToken();
        $user = User::where('uid', $header);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'updated_at' => now()
        ]);

        return Util::generateJson(200, ['success'=> true, 'message'=> 'User updated successfully']);
    }

    public function verify($token, $id){

        $user = User::find($id);
        if(!$user->email_verified){
            $user->email_verified = 1;
            $user->email_verified_at = now();
        }

        $user->save();

        return view('verify');
    }


}
