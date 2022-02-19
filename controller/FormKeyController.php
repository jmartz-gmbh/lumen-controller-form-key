<?php

namespace App\Http\Controllers;

use \http\Env\Response;
use \Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Hash;

class FormKeyController extends Controller
{
    /**
     * @param  Request  $request
     * @return Response
     */
    public function generate(Request $request){

        $connection = DB::table('form_keys');
        $key = bin2hex(openssl_random_pseudo_bytes(10));

        $this->addData('key',$key);
        $this->addMessage('success','All your Articels.');

        return $this->getResponse();
    }

    /**
     * @param  Request  $request
     * @return Response
     */
    public function validate(Request $request){
        $validation = $this->validate($request, [
            'key' => 'bail|required|string'
        ]);

        $key = $request->input('key');

        $keys = DB::table('form_keys')->where('key','=',$request->input('key'));

        $count = $keys->count();

        if($count === 1){
             $this->addMessage('success','Key is valid.');
        }
        else{
            $this->addMessage('error','Key is invalid');
        }

        return $this->getResponse();
    }
}
