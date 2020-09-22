<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CustomerActivity;

use App\Utils;

use Validator;

class CustomerActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $token= $request->bearerToken();
        $activity = CustomerActivity::where('uid', $token);

        if($activity){
            return Util::generateJson(401, ['success'=>false, 'data' => "No activity available"]);  
        }

        return Util::generateJson(200, ['success'=>true, 'data' => $activity]);
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
        $type_of_key = $request->input('type_of_key');
        $type_of_service = $request->input('type_of_service');
        $name_of_key = $request->input('name_of_key');
        $key_owner = $request->input('key_owner');
        $key_owner_phone = $request->input('key_owner_phone');
        $key_owner_email = $request->input('key_owner_email');
        $key_owner_address = $request->input('key_owner_address');
        $type_of_car = $request->input('type_of_car');
        $engine_no = $request->input('engine_no');
        $vehicle_no = $request->input('vehicle_no');
        $driver_license = $request->input('driver_license');
        $reason = $request->input('reason');
        $quantity = $request->input('quantity');
        $price = $request->input('price');
        $uid = $request->bearerToken();
        $customer_id = $request->input('customer_id');

        $validator = Validator::make($request->all(), [

        ]);

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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
