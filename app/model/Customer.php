<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Customer;
use DB;
use File;
use Illuminate\Support\Facades\Hash;

class Customer extends Model
{
    protected $table = 'customer';
    public function addCustomer($request){
       
        $name = '';
        if($request->file()){
            $image = $request->file('holding_img');
            $name = 'holding_img'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/inventory/');
            $image->move($destinationPath, $name);    
        }
       $objCustomer=  new Customer();
       $objCustomer->fname = $request->input('fname');
       $objCustomer->lname = $request->input('lname');
       $objCustomer->email = $request->input('email');
       $objCustomer->mobile = $request->input('mobile');
       $objCustomer->city = $request->input('city');
       $objCustomer->address = $request->input('address');
       $objCustomer->holding_img = $name;
       $objCustomer->created_at = date("Y-m-d h:i:s");
       $objCustomer->updated_at = date("Y-m-d h:i:s");
       
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
        
        $name = '';
        $result = Customer::find($id);
        if($request->file()){
           
            $existImage = public_path('/uploads/inventory/').$result->holding_img;
            if (File::exists($existImage)) { // unlink or remove previous company image from folder
                File::delete($existImage);
            }
            
            $image = $request->file('holding_img');
            $name = 'holding_img'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/inventory/');
            $image->move($destinationPath, $name);    
            $result->holding_img = $name;
        }
        
        $result->firstname = $request->input('firstname');
        $result->lastname = $request->input('lastname');
        $result->email = $request->input('email');;
        $result->mobile = $request->input('mobile');
        $result->city = $request->input('city');;
        $result->address = $request->input('address');;
        $result->holding_img = $name;
        $result->created_at = date('Y-m-d H:i:s');
        $result->updated_at = date('Y-m-d H:i:s');
        if ($result->save()) {
            return TRUE;
        } else {

            return FALSE;
        }   
    }
    public function deleteInventory($data)
    {
    	$result = DB::table("customer")
                        ->delete($data['id']);
    	return $result;
    }
    
    public function Agencies($request)
    {
    	$objCustomer=  new Customer();
        $objCustomer->firstname = $request->input('firstname');
        $objCustomer->lastname = $request->input('lastname');
        $objCustomer->email = $request->input('email');
        $objCustomer->mobile = $request->input('mobile');
        $objCustomer->password = Hash::make($request->input('password'));
        $objCustomer->created_at = date("Y-m-d h:i:s");
        $objCustomer->updated_at = date("Y-m-d h:i:s");
       
       return $objCustomer->save();
    }
}
