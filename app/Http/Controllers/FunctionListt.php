<?php

namespace App\Http\Controllers;

class FunctionListt extends Controller {
    public function sessionCheck($username, $userid){
        if ($username == null && $userid == null) {
            return false;
        }
        else {
            return true;
        }
    }
}