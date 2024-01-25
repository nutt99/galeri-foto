<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FunctionListt extends Controller {

    public function sessionCheck(Request $req){
        if ($req->session()->get('username') == null && $req->session()->get('uid') == null) {
            return false;
        }
        else {
            return true;
        }
    }
}