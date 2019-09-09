<?php

namespace App\Http\Controllers\admin\inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Customer;

class InventoryController extends Controller {

    public function __construct() {
        
    }

    public function newinventory(Request $request) {

        if ($request->isMethod('post')) {
            $objCustomer = new Customer();
            $result = $objCustomer->addCustomer($request);
        }
        $data['title'] = 'Dashboard | holding';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array('jquery.validate.min.js');
        $data['js'] = array('demo.js');
        $data['funinit'] = array('Demo.init()');
        $data['header'] = array(
            'title' => 'NewInventory',
            'breadcrumb' => array(
                'Dashboard' => 'Dashboard',
                'NewInventory' => 'newinventory'));
        return view('admin.pages.inventory.newinventory', $data);
    }

    public function viewinventory() {

        $objCustomer = new Customer();
        $data['result'] = $objCustomer->getCustomer();
        $data['title'] = 'Dashboard | holding';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('demo.js');
        $data['funinit'] = array('Demo.add()');
        $data['header'] = array(
            'title' => 'ViewInventory',
            'breadcrumb' => array(
                'Dashboard' => 'Dashboard',
                'ViewInventory' => 'viewinventory'));
        return view('admin.pages.inventory.viewinventory', $data);
    }

    public function editinventory(Request $request, $id) {

        if ($request->isMethod('post')) {
            $objCustomer = new Customer();
            $result = $objCustomer->editInventory($request, $id);
        }
        $data['title'] = 'update Incentory | dashiothemedemo';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('demo.js');
        $data['funinit'] = array('Demo.init()');
        $data['header'] = array(
            'title' => 'UpdateInventory',
            'breadcrumb' => array(
                'Dashboard' => 'Dashboard',
                'UpdateInventory' => 'updateinventory'));
        $objCustomer = new Customer();
        $data['result'] = $objCustomer->getCustomerDetail($request, $id);
        return view('admin.pages.inventory.updateinventory', $data);
    }

    public function deleteinventory(Request $request) {
        
        $objCustomer = new Customer();
        $result = $objCustomer->deleteInventory($request);
        if ($result) {
            $return['status'] = 'success';
            $return['message'] = 'Record created successfully.';
            $return['redirect'] = route('viewinventory');
        } else {
            $return['status'] = 'error';
            $return['message'] = 'Record created successfully.';
        }

        return json_encode($return);
        exit();
    }

}
