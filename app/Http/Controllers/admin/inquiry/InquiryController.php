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
        $data['js'] = array('inquiry.js','ajaxfileupload.js', 'jquery.form.min.js');
        $data['funinit'] = array('Inquiry.init()');
        $data['header'] = array(
            'title' => 'Inquiry List',
            'breadcrumb' => array(
            'Inquiry' => 'Inquiry'));
        return view('admin.pages.inquiry.index',$data);
    }
    
    
    public function add(Request $request){
        if ($request->isMethod('post')) {
            $objInquirey = new Inquirey();
            $ret = $objInquirey->addInquirey($request);
            if ($ret == "add") {
                $return['status'] = 'success';
                $return['message'] = 'Inquirey added successfully.';
                $return['redirect'] = route('inquiry');
            } 
            if ($ret == "exits") {
                $return['status'] = 'error';
                $return['message'] = 'Cilent email address already exits.';
            }
            
            if ($ret == "wrong") {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }
        
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
    
    public function edit(Request $request , $id){
        if ($request->isMethod('post')) {
            $objInquirey = new Inquirey();
            $ret = $objInquirey->editInquirey($request);
            if ($ret == "updated") {
                $return['status'] = 'success';
                $return['message'] = 'Inquirey updted successfully.';
                $return['redirect'] = route('inquiry');
            } 
            if ($ret == "exits") {
                $return['status'] = 'error';
                $return['message'] = 'Cilent email address already exits.';
            }
            
            if ($ret == "wrong") {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }
        $objInquirey = new Inquirey();
        $data['getinquireydetails']= $objInquirey->getdetails($id);
        
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
        $data['funinit'] = array('Inquiry.edit()');
        $data['header'] = array(
            'title' => 'Add Inquiry',
            'breadcrumb' => array(
            'Add Inquiry' => 'Add Inquiry'));
        return view('admin.pages.inquiry.edit',$data);
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
            case 'closeinquirey':
                
                $objInquirey = new Inquirey();
                $res = $objInquirey->closeinquirey($request->input('data')['id']);
                if ($res == "add") {
                    $return['status'] = 'success';
                    $return['message'] = 'Inquirey closed successfully.';
                    $return['redirect'] = route('close-inquiry');
                }else{
                    $return['status'] = 'error';
                     $return['message'] = 'something will be wrong.';
                }
                echo json_encode($return);
                break;
                
            case 'openinquirey':
                
                $objInquirey = new Inquirey();
                $res = $objInquirey->openinquirey($request->input('data')['id']);
                if ($res) {
                    $return['status'] = 'success';
                    $return['message'] = 'Inquirey open successfully.';
                    $return['redirect'] = route('inquiry');
                }else{
                    $return['status'] = 'error';
                     $return['message'] = 'something will be wrong.';
                }
                echo json_encode($return);
                break;
                
            case 'open-deleteinquirey':
                
                $objInquirey = new Inquirey();
                $res = $objInquirey->deleteinquirey($request->input('data')['id']);
                if ($res) {
                    $return['status'] = 'success';
                    $return['message'] = 'Inquirey deleted successfully.';
                    $return['redirect'] = route('inquiry');
                }else{
                    $return['status'] = 'error';
                     $return['message'] = 'something will be wrong.';
                }
                echo json_encode($return);
                break;
            case 'close-deleteinquirey':
                
                $objInquirey = new Inquirey();
                $res = $objInquirey->deleteinquirey($request->input('data')['id']);
                if ($res) {
                    $return['status'] = 'success';
                    $return['message'] = 'Inquirey deleted successfully.';
                    $return['redirect'] = route('close-inquiry');
                }else{
                    $return['status'] = 'error';
                     $return['message'] = 'something will be wrong.';
                }
                echo json_encode($return);
                break;
            
        }
    }
}
