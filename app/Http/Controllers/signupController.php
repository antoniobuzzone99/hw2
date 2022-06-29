<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\User;
use Session;

class signupController extends Controller
{
    protected function create(){
        $request = request();

        if($this->countErrors($request) === 0) {
            $newUser =  User::create([
            'username' => $request['username'],
            'password' => $request['password'],
            'nome' => $request['nome'],
            'data_nascita' => $request['data'],
            'cognome' => $request['cognome'],
            'email' => $request['email'],
            ]); 

            $newUser->save();

            if ($newUser) {
                Session::put('user_id', $newUser->id);
                return redirect('home');
            } 
            else {
                return view('signup');
            }
        }
        else 
            return view('signup');
        
    }

    private function countErrors($data){
        $error = array();
        
        
        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $data['username'])) {
            $error[] = "Username non valido";
        } else {
            $username = User::where('username', $data['username'])->first();
            if ($username !== null) {
                $error[] = "Username già utilizzato";
            }
        }
        
        if (strlen($data["password"]) < 8) {
            $error[] = "Caratteri password insufficienti";
        } 
        
        if (strcmp($data["password"], $data["conferma_password"]) != 0) {
            $error[] = "Le password non coincidono";
        }
        
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
        } else {
            $email = User::where('email', $data['email'])->first();
            if ($email !== null) {
                $error[] = "Email già utilizzata";
            }
        }

        return count($error);
    }

    public function checkUsername($query) {
        $exist = User::where('username', $query)->exists();
        return ['exists' => $exist];
    }

    public function checkEmail($query) {
        $exist = User::where('email', $query)->exists();
        return ['exists' => $exist];
    }

    public function index(){
        if(session('user_id')!=null){
            return redirect('home');
        }else{
            return view('signup');
        }
    }

}
?>
