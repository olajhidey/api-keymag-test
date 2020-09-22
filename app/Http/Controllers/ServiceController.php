<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Key;
use App\Models\Service;
use App\Util;

class ServiceController extends Controller
{
    //

    public function keys(){

        $keys = Key::all();

        if($keys != null){
            return Util::generateJson(200, ['success'=>true, 'data'=> $keys]);
        }
    }

    public function services(){

        $services = Service::all();

        if($services != null){
            return Util::generateJson(200, ['success'=>true, 'data'=> $services]);
        }
    }
}
