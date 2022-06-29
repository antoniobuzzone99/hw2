<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Post;
use Session;

class clienteController extends Controller {

    public function index(){
        if(session('user_id') != null) {
            $user = User::where('id',session('user_id'))->first();
            return view("cliente")->with("user_id", $user);
        }
        else {
            return redirect('login');
        }
    }

    public function stampa_post_preferiti(){
        $array= array();
        $posts = Post::all(); //select * from posts
        $user = User::find(session('user_id'));
        $var1 = $user-> favorites()->get();
        
        foreach($posts as $post){

            foreach($var1 as $v){ 
                $preferiti = false;
                if($v['id'] == $post['id']){
                    $preferiti = true;
                    break;
                }
            }

            $array[]=array(
                'user'=> User::find($post['id_user']), 
                'post' => $post,
                'preferiti' => $preferiti
            );
        }

        return $array;
    }

}
?>
