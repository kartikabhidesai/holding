<?php

namespace App\Http\Controllers\admin\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Model\Inquirey;
use Session;
use Auth;
use Route;

class DashboardController extends Controller
{
    public function __construct() {
//        parent::__construct();
        $this->middleware('admin');
    }
    public function dashboard(Request $request){      
        $objInquirey = new Inquirey();
        $data['noofopeninquirey'] = $objInquirey->totalinquirey();
        $session = $request->session()->all();
        $items = Session::get('logindata')[0];
        $data['title'] = 'Admin Dashboard | holding';
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
