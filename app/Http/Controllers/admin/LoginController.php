<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Users;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Redirect;
use Auth;
use Session;

class LoginController extends Controller {

    use AuthenticatesUsers;

    public function __construct() {
        
    }

    public function login(Request $request) {


        if ($request->isMethod('post')) {
            if (Auth::guard('agencies')->attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'user_type' => 'AGENCIES'])) {
                
                $loginData = array(
                    'fname' => Auth::guard('agencies')->user()->fname,
                    'lname' => Auth::guard('agencies')->user()->lname,
                    'mobile' => Auth::guard('agencies')->user()->mobile,
                    'email' => Auth::guard('agencies')->user()->email,
                    'id' => Auth::guard('agencies')->user()->id,
                    'user_type' => Auth::guard('agencies')->user()->user_type,
                );
                Session::push('logindata', $loginData);
                return redirect('dashboard');
            } else {
                $request->session()->flash('session_error', 'Your username or password are wrong. Please login with correct credential...!!');
                return redirect()->route('admin-login');
            }
        }
        $data['title'] = 'login | holding';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array('jquery.validate.min.js');
        $data['js'] = array('login.js');
        $data['funinit'] = array('Login.init()');
        return view('admin.pages.loginpage', $data);
    }

    public function register(Request $request) {

        if ($request->isMethod('post')) {

            $bojUser = new Users();
            $bojUser = $bojUser->addUsers($request);
            if ($bojUser) {
                $return['status'] = 'success';
                $return['message'] = "Agency added Successfully!";
                $return['redirect'] = route('admin-login');
            } else {
                $return['status'] = 'error';
                $return['message'] = "Something went wrong!";
                $return['redirect'] = route('register');
            }

            echo json_encode($return);
            exit();
        }
        $data['title'] = 'register | holding';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array('jquery.validate.min.js');
        $data['js'] = array('login.js');
        $data['funinit'] = array('Login.init()');
        return view('admin.pages.register', $data);
    }

    public function forgotpassword() {

        $data['title'] = 'forgotpassword | holding';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('login.js');
        $data['funinit'] = array('Login.fpassword()');
        return view('admin.pages.forgotpassword', $data);
    }

    public function logout(Request $request) {
        
        $this->resetGuard();
        return redirect()->route('admin-login');
    }
    public function resetGuard() {
        Auth::logout();
        Auth::guard('agencies')->logout();
        Session::forget('logindata');
    }

}
