<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    function __construct() {
        
    }
    
    public function index(){
        $data['title'] = 'Dashboard | holding';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array();
        $data['funinit'] = array(); 
        $data['header'] = array(
            'title' => 'Home',
            'breadcrumb' => array(
                'Home' => 'home'));
        return view('frontend.pages.home',$data);
    }
}
