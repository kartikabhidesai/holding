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
            if ($result) {
                $return['status'] = 'success';
                $return['message'] = 'Record created successfully.';
                $return['redirect'] = route('Inventory-List');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }
        $data['title'] = 'New Inventory | holding';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array('jquery.validate.min.js');
        $data['js'] = array('ajaxfileupload.js', 'jquery.form.min.js', 'inventory.js');
        $data['funinit'] = array('Inventory.init()');
        $data['header'] = array(
            'title' => 'Add New Inventory',
            'breadcrumb' => array(
                'Dashboard' => 'dashboard',
                'Add New Inventory' => 'Inventory'));
        return view('admin.pages.inventory.newinventory', $data);
    }

    public function viewinventory() {

        $objCustomer = new Customer();
        $data['result'] = $objCustomer->getCustomer();
        $data['title'] = 'View Inventory | holding';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array('jquery.validate.min.js');
        $data['js'] = array('ajaxfileupload.js', 'jquery.form.min.js', 'inventory.js');
        $data['funinit'] = array('Inventory.init()');
        $data['header'] = array(
            'title' => 'Inventory List',
            'breadcrumb' => array(
                'Dashboard' => 'dashboard',
                'Inventory List' => 'Inventory-List'));
        return view('admin.pages.inventory.viewinventory', $data);
    }

    public function editinventory(Request $request, $id) {
        
        if ($request->isMethod('post')) {
            $objCustomer = new Customer();
            $result = $objCustomer->editInventory($request, $id);
        }
        $data['title'] = 'Edit Inventory | holding';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array('jquery.validate.min.js');
        $data['js'] = array('inventory.js');
        $data['funinit'] = array('Inventory.init()');
        $data['header'] = array(
            'title' => 'Update Inventory',
            'breadcrumb' => array(
                'Dashboard' => 'dashboard',
                'Update Inventory' => 'Update-Inventory'));
        $objCustomer = new Customer();
        $data['result'] = $objCustomer->getCustomerDetail($request, $id);
        return view('admin.pages.inventory.updateinventory', $data);
    }

    public function inventoryajaxaction(Request $request) {

        $action = $request->input('action');
        switch ($action) {
            case 'deleteInventory':
                $data = $request->input('data');
                $objCustomer = new Customer();
                $result = $objCustomer->deleteInventory($data);
                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Record deleted successfully.';
                    $return['redirect'] = route('Inventory-List');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'Record Not Deleted';
                }

                return json_encode($return);
                break;
            case 'deleteDemo':
                $result = $this->deleteDemo($request->input('data'));
                break;
        }
    }

}
