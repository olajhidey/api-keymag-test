<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;

use App\Util;

use Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $token = $request->bearerToken();

        $customer = Customer::where('uid', $token)->get();

        return Util::generateJson(200, ['success'=>true, 'data'=>$customer]);
    }

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
        $phone = $request->input('phone');
        $email = $request->input('email');
        $address = $request->input('address');
        $token = $request->bearerToken();

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'address' => ['required', 'string']
        ]);

        if($validator->fails()){
            return Util::generateJson(400, ['success'=>false, 'message'=>$validator->messages()]);
        }

        $customer = Customer::create([
            'name' => $name,
            'phone'=> $phone,
            'email' => $email,
            'address' => $address,
            'uid' => $token
        ]);

        return Util::generateJson(200, ['success'=>200, 'message'=>'Customer created successfully', 'data'=> $customer]);

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
        $customer = Customer::find($id);
        return Util::generateJson(200, ['success'=>true, 'data'=> $customer]);
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
        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $address = $request->input('address');
        $token = $request->bearerToken();

        $customer = Customer::find($id);
        $customer->update([
            'name' => $name,
            'phone'=> $phone,
            'email' => $email,
            'address' => $address,
            'uid' => $token
        ]);

        return Util::generateJson(200, ['success'=> true, 'message'=>'Record updated successfully']);
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
