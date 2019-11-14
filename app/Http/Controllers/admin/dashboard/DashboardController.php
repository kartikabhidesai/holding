<?php

namespace App\Http\Controllers\admin\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Model\Inquirey;
use Session;
use Auth;
use Route;
use App\Model\Booking;

class DashboardController extends Controller {

    public function __construct() {
//        parent::__construct();
        $this->middleware('admin');
    }

    public function dashboard(Request $request) {
        $objInquirey = new Inquirey();
        $data['noofopeninquirey'] = $objInquirey->totalinquirey();
        $session = $request->session()->all();
        $items = Session::get('logindata')[0];
        $data['title'] = 'Admin Dashboard | holding';
        $data['css'] = array();
        $data['plugincss'] = array('plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css');
        $data['pluginjs'] = array('plugins/datatables/jquery.dataTables.min.js', 'plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js','js/jquery.validate.min.js');
        $data['js'] = array('dashboard.js', 'ajaxfileupload.js', 'jquery.form.min.js');
        $data['funinit'] = array('Dashboard.init()');
        $data['header'] = array(
            'title' => 'Dashboard',
            'breadcrumb' => array(
                'Dashboard' => 'Dashboard'));
        return view('admin.pages.dashboard.dashboard', $data);
    }

    public function ajaxAction(Request $request) {

        $action = $request->input('action');
        switch ($action) {
            case 'getdatatable':
                $objBooking = new Booking();
                $bookingList = $objBooking->getdatatable();
                echo json_encode($bookingList);
                break;
        }
    }

}
