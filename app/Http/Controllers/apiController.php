<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Post;
use Session;

class apiController extends Controller
{
    public function fetch_logo(){
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_URL,"https://api-football-standings.azharimm.site/leagues/");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        return $result;
    }

    public function caricaPost($link,$descrizione){
        $array = array('url'=>$link, 'descrizione' => $descrizione);

        $post = new Post;
        $post-> id_user = session('user_id');
        $post-> nlikes = 0;
        $post-> content = json_encode($array);

        $post->save();
    }

}
