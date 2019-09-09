<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Customer;
use DB;

class Customer extends Model
{
    protected $table = 'customer';
    public function addCustomer($request){
       
       $objCustomer=  new Customer();
       $objCustomer->firstname = $request->input('firstname');
       $objCustomer->lastname=$request->input('lastname');
       $objCustomer->email=$request->input('email');
       $objCustomer->mobile=$request->input('mobile');
       $objCustomer->city=$request->input('city');
       $objCustomer->address=$request->input('address');
       $objCustomer->created_at=date("Y-m-d h:i:s");
       $objCustomer->updated_at=date("Y-m-d h:i:s");
       
       return $objCustomer->save();
    }
    public function getCustomer(){
       
       $result = Customer::select('*')
                 ->get();   
       return $result;
    }
    public function getCustomerDetail($request, $id){

        $result = Customer::select('*')
                 ->where('id',$id)
                 ->get();   
       return $result;
    }
    
    public function editInventory($request, $id){
        
        $result = DB::table('Customer')
                ->where('id', $id)
                ->update(['firstname' => $request->input('firstname'), 'lastname' => $request->input('lastname'),
                          'email' => $request->input('email'), 'mobile' => $request->input('mobile'),
                          'city' => $request->input('city'),
                          'address' => $request->input('address')]);
        return $result;
    }
    public function deleteInventory($request)
    {
       
    	$result = DB::table("customer")
                        ->delete($request->input('id'));
    	return $result;
    }
    
}
