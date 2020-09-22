<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Util;
use Validator;
use App\Models\Profile;

class ProfileController extends Controller
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
        $business = $request->input('business_name');
        $address = $request->input('address');
        $state = $request->input('state');
        $photoUrl = $request->input('photoUrl');
        $phone = $request->input('phone');
        $office = $request->input('office_phone');
        $user_id = $request->input('user_id');

        $validator = Validator::make($request->all(), [
            'business_name' => ['required', 'string'],
            'address' => ['required', 'string'],
            'state' => ['required', 'string'],
            'phone' => ['required', 'string'],
        ]);

        $data = array();

        if($validator->fails()){
            return Util::generateJson(400, ['success'=>false, 'message'=>$validator->messages()]);
        }

        $profile = Profile::create([
            'business_name' => $business,
            'phone' => $phone,
            'office_phone' => $office,
            'address' => $address,
            'state' => $state,
            'photoUrl' => $photoUrl,
            'user_id' => $user_id
        ]);

        return Util::generateJson(200, ['success'=> true, 'message'=>'Profile created successfully', 'data'=>$profile]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = Profile::find($id);

        if($user != null){
            return Util::generateJson(200, ['success'=>true, 'data'=>$user]);
        }   

        return Util::generateJson(404, ['success'=>true, 'message' => 'No profile available']);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $business = $request->input('business_name');
        $address = $request->input('address');
        $state = $request->input('state');
        $photoUrl = $request->input('photoUrl');
        $phone = $request->input('phone');
        $office = $request->input('office_phone');
        $user_id = $request->input('user_id');

        $profile = Profile::where('user_id', $id)->first();

        $profile->update([
            'business_name' => $business,
            'phone' => $phone,
            'office_phone' => $office,
            'address' => $address,
            'state' => $state,
            'photoUrl' => $photoUrl,
            'user_id' => $user_id
        ]);

        return Util::generateJson(200, ['success'=>200, 'message'=> 'Profile updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
