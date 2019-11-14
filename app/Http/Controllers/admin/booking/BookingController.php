<?php

namespace App\Http\Controllers\admin\booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Model\Booking;
use Config;

class BookingController extends Controller {

    function __construct() {
        $this->middleware('admin');
    }

    public function index(Request $request) {
        $data['title'] = 'Hoarding List | Hoarding';
        $data['css'] = array();
        $data['plugincss'] = array('plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css');
        $data['pluginjs'] = array('plugins/datatables/jquery.dataTables.min.js', 'plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js');
        $data['js'] = array('booking.js', 'ajaxfileupload.js', 'jquery.form.min.js');
        $data['funinit'] = array('Booking.init()');
        $data['header'] = array(
            'title' => 'Hoarding List',
            'breadcrumb' => array(
                'Hoarding  List' => 'Hoarding List'));
        return view('admin.pages.booking.index', $data);
    }

    public function add(Request $request) {
        if ($request->isMethod('post')) {
            $objBooking = new Booking();
            $res = $objBooking->addHoarding($request);
            if ($res == "add") {
                $return['status'] = 'success';
                $return['message'] = 'Hoarding added successfully.';
                $return['redirect'] = route('booking');
            }
            if ($res == "exits") {
                $return['status'] = 'error';
                $return['message'] = 'Hoarding location already exits.';
            }

            if ($res == "wrong") {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }
        $data['type'] = Config::get('constants.hoarding_type');
        $data['title'] = 'Add Hoarding | Hoarding';
        $data['css'] = array();
        $data['plugincss'] = array('plugins/material-datetimepicker/bootstrap-material-datetimepicker.css');
        $data['pluginjs'] = array('plugins/material-datetimepicker/moment-with-locales.min.js',
            'plugins/material-datetimepicker/bootstrap-material-datetimepicker.js',
            'plugins/material-datetimepicker/datetimepicker.js',
            'js/jquery.validate.min.js'
        );
        $data['js'] = array('booking.js', 'ajaxfileupload.js', 'jquery.form.min.js');
        $data['funinit'] = array('Booking.add()');
        $data['header'] = array(
            'title' => 'Add Hoarding',
            'breadcrumb' => array(
                'Add Hoarding' => 'Add Hoarding'));
        return view('admin.pages.booking.add', $data);
    }

    public function edit(Request $request, $id) {
        if ($request->isMethod('post')) {
            $objBooking = new Booking();
            $res = $objBooking->EditHoarding($request, $id);
            if ($res == "add") {
                $return['status'] = 'success';
                $return['message'] = 'Hoarding Edited successfully.';
                $return['redirect'] = route('booking');
            }
            if ($res == "exits") {
                $return['status'] = 'error';
                $return['message'] = 'Hoarding location already exits.';
            }

            if ($res == "wrong") {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }
        $objBooking = new Booking();
        $data['hoardingdetails'] = $objBooking->gethoardingdetails($id);
        $data['type'] = Config::get('constants.hoarding_type');
        $data['title'] = 'Add Hoarding | Hoarding';
        $data['css'] = array();
        $data['plugincss'] = array('plugins/material-datetimepicker/bootstrap-material-datetimepicker.css');
        $data['pluginjs'] = array('plugins/material-datetimepicker/moment-with-locales.min.js',
            'plugins/material-datetimepicker/bootstrap-material-datetimepicker.js',
            'plugins/material-datetimepicker/datetimepicker.js',
            'js/jquery.validate.min.js'
        );
        $data['js'] = array('booking.js', 'ajaxfileupload.js', 'jquery.form.min.js');
        $data['funinit'] = array('Booking.edit()');
        $data['header'] = array(
            'title' => 'Edit Hoarding',
            'breadcrumb' => array(
                'Edit Hoarding' => 'Edit Hoarding'));
        return view('admin.pages.booking.edit', $data);
    }

    public function ajaxAction(Request $request) {
        $action = $request->input('action');

        switch ($action) {
            case 'getdatatable':
                $objBooking = new Booking();
                $bookingList = $objBooking->getdatatable();
                echo json_encode($bookingList);
                break;

            case 'getdata':
                $objBooking = new Booking();
                $booking = $objBooking->getdata($request['data']);
                if ($booking != "") {
                    $return['status'] = 'success';
                    $return['message'] = 'Booking share successfully.';
                    $return['redirect'] = route('booking');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'something will be wrong.';
                }
                return json_encode($return);
                break;

            case 'deletebooking':
                $objBooking = new Booking();
                $res = $objBooking->deletebooking($request->input('data')['id']);
                if ($res) {
                    $return['status'] = 'success';
                    $return['message'] = 'Booking Deleted successfully.';
                    $return['redirect'] = route('booking');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'something will be wrong.';
                }
                echo json_encode($return);
                break;
        }
    }

}
