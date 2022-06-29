<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Session;

class homeController extends BaseController {

    public function index(){
        $session_id = session('user_id');
        $user = User::where('id',$session_id)->first();
        return view("home")->with("user_id", $user);
    }

}
?>