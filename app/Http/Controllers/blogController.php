<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;
use App\Models\Favorite;
use Session;


class blogController extends BaseController {

    public function index() {
        if(session('user_id') != null) {
            $user = User::where('id',session('user_id'))->first();
            return view("blog")->with("user_id", $user);
        }
        else {
            return redirect('login');
        }
    }

    public function stampa_post(){
        $array= array();
        $posts = Post::all()->sortByDesc('id');
        $user = User::find(session('user_id'));
        $var= $user-> likes()->get(); 
        $var1 = $user-> favorites()->get();
        $verifica = false;
        $preferiti = false;
        
        foreach($posts as $post){
            foreach($var as $v){ 
                $verifica = false;
                if($v['id'] == $post['id']){
                    $verifica = true;
                    break;
                }
            }

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
                'verifica' => $verifica,
                'preferiti' => $preferiti
            );
        }

        return $array;
    }

    public function addLike($idpost){
        $newLike = new Like;
        $newLike-> id_user = session('user_id');
        $newLike-> id_post = $idpost;
        $newLike->save();

        $like_nuovo= Post::where('id',$idpost)->first();
        $array = array('var' => true, 'id_post' => $idpost, 'likes' => $like_nuovo['nlikes']);
        return $array;
    }

    public function removeLike($idpost){
        $like = Like::where('id_user',session('user_id'))->where('id_post',$idpost)->delete();
        $like_nuovo= Post::where('id',$idpost)->first();
        $array = array('var' => false, 'id_post' => $idpost, 'likes' => $like_nuovo['nlikes']);
        return $array;
    }

    public function addFavorite($idpost){
        $newFavorite = new Favorite;
        $newFavorite-> id_user = session('user_id');
        $newFavorite-> id_post = $idpost;
        $newFavorite->save();
    }

    public function removeFavorite($idpost){
        $like = Favorite::where('id_user',session('user_id'))->where('id_post',$idpost)->delete();
    }

}
?>