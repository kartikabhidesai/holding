<?php

namespace App\Http\Controllers\admin\vender;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VenderController extends Controller
{
    //
    public function __construct() {
        
    }
    
    public function index(){
        $data['result']=[];
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
    public function add(Request $request){
        $data['title'] = 'Add Vender | Hoading';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array('jquery.validate.min.js');
        $data['js'] = array('ajaxfileupload.js', 'jquery.form.min.js', 'vender.js');
        $data['funinit'] = array('Vender.add()');
        $data['header'] = array(
            'title' => 'Vender List',
            'breadcrumb' => array(
                'Dashboard' => 'dashboard',
                'Vender List' => 'dashboard',
                'Add Vender' => 'Add-Vender'));
        return view('admin.pages.vender.add', $data);
    }
}
