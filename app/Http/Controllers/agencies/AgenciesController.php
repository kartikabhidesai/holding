<?php

namespace App\Http\Controllers\agencies;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgenciesController extends Controller
{
    public function __construct() {
        
    }
    public function dashboard(Request $request){
        
        $data['title'] = 'Agencies Dashboard | holding';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('dashboard.js');
        $data['funinit'] = array('Dashboard.init()');
        $data['header'] = array(
            'title' => 'Dashboard',
            'breadcrumb' => array(
                'Dashboard' => 'Dashboard'));
        return view('agencies.agencies-dashboard',$data);
    }
}
