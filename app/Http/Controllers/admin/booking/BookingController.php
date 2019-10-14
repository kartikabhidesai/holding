<?php

namespace App\Http\Controllers\admin\booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
class BookingController extends Controller
{
    function __construct() {
        $this->middleware('admin');
    }
    
    public function index(Request $request){
        
        $data['title'] = 'Booking List | holding';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('booking.js');
        $data['funinit'] = array('Booking.init()');
        $data['header'] = array(
            'title' => 'Booking List',
            'breadcrumb' => array(
            'Booking' => 'Booking'));
        return view('admin.pages.booking.index',$data);
    }
}
