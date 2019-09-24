<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Users;
use DB;
use Illuminate\Support\Facades\Hash;

class Users extends Model
{
    protected $table = 'users';
    
    public function addUsers($request)
    {
    	$bojUser=  new Users();
        $bojUser->fname = $request->input('fname');
        $bojUser->lname = $request->input('lname');
        $bojUser->email = $request->input('email');
        $bojUser->mobile = $request->input('mobile');
        $bojUser->user_type = "AGENCIES";
        $bojUser->status  = "0";
        $bojUser->password = Hash::make($request->input('password'));
        $bojUser->created_at = date("Y-m-d h:i:s");
        $bojUser->updated_at = date("Y-m-d h:i:s");
       
       return $bojUser->save();
    }
    public function getUsers($request)
    {
        
        $result = Users::select('*')
                 ->get();   
        return $result;
    }
}
