<?php

namespace App\Http\Controllers\admin\vender;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Vender;
use DB;

class VenderController extends Controller {

    public function __construct() {
        
    }

    public function index() {

        $objVender = new Vender();
        $data['result'] = $objVender->getVender();
        $data['title'] = 'Vender List | Hoading';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array('jquery.validate.min.js');
        $data['js'] = array('ajaxfileupload.js', 'jquery.form.min.js', 'vender.js');
        $data['funinit'] = array('Vender.init()');
        $data['header'] = array(
            'title' => 'Vender List',
            'breadcrumb' => array(
                'Dashboard' => 'dashboard',
                'Vender List' => 'Vender-List'));
        return view('admin.pages.vender.index', $data);
    }

    public function add(Request $request) {

        if ($request->isMethod('post')) {
            $objVender = new Vender();
            $result = $objVender->addVender($request);
            if ($result) {
                $return['status'] = 'success';
                $return['message'] = 'Vender created successfully.';
                $return['redirect'] = route('vender');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }
        $objVender = new Vender();
        $data['result'] = $objVender->getstate();
        $data['title'] = 'Add Vender | Hoading';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array('jquery.validate.min.js');
        $data['js'] = array('ajaxfileupload.js', 'jquery.form.min.js', 'vender.js');
        $data['funinit'] = array('Vender.add()');
        $data['header'] = array(
            'title' => 'Add New Vender',
            'breadcrumb' => array(
                'Dashboard' => 'dashboard',
                'Vender List' => 'dashboard',
                'Add Vender' => 'Add-Vender'));
        return view('admin.pages.vender.add', $data);
    }
    
    public function edit(Request $request, $id){
        
        if($request->isMethod('post')){
          $objVender = new Vender();
            $result = $objVender->editVender($request, $id);
            if ($result) {
                $return['status'] = 'success';
                $return['message'] = 'Vender Edited successfully.';
                $return['redirect'] = route('vender');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }
        $objVender = new Vender();
        $data1 = $objVender->getvenderDetails($request, $id);
        $data['result1'] = $data1;
        $data['result'] = $objVender->getstate();
        $data['result2'] = $objVender->getcity($request, $data1[0]->city);
        $data['title'] = 'Edit Vender | Hoading';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array('jquery.validate.min.js');
        $data['js'] = array('ajaxfileupload.js', 'jquery.form.min.js', 'vender.js');
        $data['funinit'] = array('Vender.edit()');
        $data['header'] = array(
            'title' => 'Edit Vender',
            'breadcrumb' => array(
                'Dashboard' => 'dashboard',
                'Edit Vender' => 'dashboard',
                'Edit Vender' => 'Edit-Vender'));
        return view('admin.pages.vender.edit', $data);
    }

    public function ajaxaction(Request $request) {
        $action = $request->input('action');
        switch ($action) {
            case 'changestate':
                $id = $request->input('id');
                $objVender = new Vender();
                $result = $objVender->getcityDetails($request, $id);
                return json_encode($result);
                break;
            case 'deleteVender':
                $data = $request->input('data');
                $objVender = new Vender();
                $result = $objVender->deleteVender($data);
                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Vender deleted successfully.';
                    $return['redirect'] = route('vender');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'Vender Not Deleted';
                }

                return json_encode($return);
                break;
        }
    }

}
