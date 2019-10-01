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

    protected $redirectTo = '/';

    public function __construct() {
        
    }
    public function login(Request $request) {
        if ($request->isMethod('post')) {
            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'user_type' => 'ADMIN'])) {

                $loginData = array(
                    'fname' => Auth::guard()->user()->fname,
                    'lname' => Auth::guard()->user()->lname,
                    'mobile' => Auth::guard()->user()->mobile,
                    'email' => Auth::guard()->user()->email,
                    'id' => Auth::guard()->user()->id,
                    'user_type' => Auth::guard()->user()->user_type,
                );
                Session::push('logindata', $loginData);
                
                
                    $return['status'] = 'success';
                    $return['message'] = "Well Done login Successfully!";
                    $return['redirect'] = route('dashboard');


//                return redirect('dashboard');
            } else {

                if (Auth::guard('agencies')->attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'user_type' => 'VENDER'])) {

                    $loginData = array(
                        'fname' => Auth::guard('vender')->user()->fname,
                        'lname' => Auth::guard('vender')->user()->lname,
                        'mobile' => Auth::guard('vender')->user()->mobile,
                        'email' => Auth::guard('vender')->user()->email,
                        'id' => Auth::guard('vender')->user()->id,
                        'user_type' => Auth::guard('vender')->user()->user_type,
                    );
                    Session::push('logindata', $loginData);
                    $return['status'] = 'success';
                    $return['message'] = "Well Done login Successfully!";
                    $return['redirect'] = route('agencies-dashboard');
//                    return redirect('agencies-dashboard');
                } else {

                    if (Auth::guard('user')->attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'user_type' => 'USER'])) {
                        $loginData = array(
                            'fname' => Auth::guard('user')->user()->fname,
                            'lname' => Auth::guard('user')->user()->lname,
                            'mobile' => Auth::guard('user')->user()->mobile,
                            'email' => Auth::guard('user')->user()->email,
                            'id' => Auth::guard('user')->user()->id,
                            'user_type' => Auth::guard('user')->user()->user_type,
                        );
                        Session::push('logindata', $loginData);
                        $return['status'] = 'success';
                        $return['message'] = "Well Done login Successfully!";
                        $return['redirect'] = route('user-dashboard');
//                        return redirect('user-dashboard');
                    }else{
                        $return['status'] = 'error';
                        $return['message'] = "Invaild Id Or Password";
                    }
                }
            }
            echo json_encode($return);
            exit();
        }
        $data['title'] = 'login | holding';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array('jquery.validate.min.js');
        $data['js'] = array('ajaxfileupload.js', 'jquery.form.min.js','login.js');
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
        Auth::guard('admin')->logout();
        Session::forget('logindata');
    }

}
