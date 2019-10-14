<?php

namespace App\Http\Controllers\admin\inquiry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Inquirey;
use Illuminate\Support\Facades\Config;

class InquiryController extends Controller
{
    function __construct() {
        $this->middleware('admin');
    }
    
    public function index(){
        $data['title'] = 'Inquiry List | holding';
        $data['css'] = array();
        $data['plugincss'] = array('plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css');
        $data['pluginjs'] = array('plugins/datatables/jquery.dataTables.min.js','plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js');
        $data['js'] = array('inquiry.js');
        $data['funinit'] = array('Inquiry.init()');
        $data['header'] = array(
            'title' => 'Inquiry List',
            'breadcrumb' => array(
            'Inquiry' => 'Inquiry'));
        return view('admin.pages.inquiry.index',$data);
    }
    
    
    public function add(){
        $data['inquireytime'] =  Config::get('constants.inquirey_time');
        $data['title'] = 'Add Inquiry | holding';
        $data['css'] = array();
        $data['plugincss'] = array('plugins/material-datetimepicker/bootstrap-material-datetimepicker.css');
        $data['pluginjs'] = array('plugins/material-datetimepicker/moment-with-locales.min.js',
                                'plugins/material-datetimepicker/bootstrap-material-datetimepicker.js',
                                'plugins/material-datetimepicker/datetimepicker.js',
                                'js/jquery.validate.min.js'
                            );
        $data['js'] = array('inquiry.js','ajaxfileupload.js', 'jquery.form.min.js');
        $data['funinit'] = array('Inquiry.add()');
        $data['header'] = array(
            'title' => 'Add Inquiry',
            'breadcrumb' => array(
            'Add Inquiry' => 'Add Inquiry'));
        return view('admin.pages.inquiry.add',$data);
    }
    
    
    public function closeinquiry(){
        $data['title'] = 'Close Inquiry List | holding';
        $data['css'] = array();
        $data['plugincss'] = array('plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css');
        $data['pluginjs'] = array('plugins/datatables/jquery.dataTables.min.js','plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js');
        $data['js'] = array('inquiry.js');
        $data['funinit'] = array('Inquiry.close()');
        $data['header'] = array(
            'title' => 'Close Inquiry List',
            'breadcrumb' => array(
            'Close Inquiry' => 'Close Inquiry'));
        return view('admin.pages.inquiry.closeinquiry',$data);
    }
    
    public function ajaxAction(Request $request){
        $action = $request->input('action');

        switch ($action) {
            case 'getdatatable':
                $objInquirey = new Inquirey();
                $compnyList = $objInquirey->getdatatable();
                echo json_encode($compnyList);
                break;
            case 'getdatatableclose':
                $objInquirey = new Inquirey();
                $compnyList = $objInquirey->getdatatableclose();
                echo json_encode($compnyList);
                break;
            
        }
    }
}
