<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function __construct() {
        
    }
    
    public function login(){
        
        $data['title'] = 'login | holding';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('login.js');
        $data['funinit'] = array('Login.init()'); 
        return view('admin.pages.loginpage',$data);
    }
    public function register(){
        
        $data['title'] = 'register | holding';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('login.js');
        $data['funinit'] = array('Login.init()'); 
        return view('admin.pages.register',$data);
    }
    public function forgotpassword(){
        
        $data['title'] = 'forgotpassword | holding';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('login.js');
        $data['funinit'] = array('Login.init()'); 
        return view('admin.pages.forgotpassword',$data);
    }
}
