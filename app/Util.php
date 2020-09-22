<?php

    namespace App;

    class Util 
    {
        public static function generateJson($code, $data)
        {
            if($code == 200){
                return response()->json($data, 200);
            }elseif($code == 400){
                return response()->json($data, 400);
            }elseif($code == 500){
                return response()->json($data, 500);
            }elseif($code == 409){
                return response()->json($data, 409);
            }elseif($code == 401){
                return response()->json($data, 401);
            }
        }    

        public static function sendWelcomeEmail($data){
            
        }
    }
    
?>