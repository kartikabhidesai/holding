<?php

namespace App\Http\Controllers\admin\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct() {
        
    }
    public function dashboard(){
        
        $data['title'] = 'Dashboard | holding';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('dashboard.js');
        $data['funinit'] = array('Dashboard.init()');
        $data['header'] = array(
            'title' => 'Dashboard',
            'breadcrumb' => array(
                'Dashboard' => 'Dashboard'));
        return view('admin.pages.dashboard.dashboard',$data);
    }
    
}
