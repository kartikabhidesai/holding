<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use File;
use Illuminate\Support\Facades\Hash;

class Vender extends Model{
    
    protected $table = 'vender';
    public function addVender($request){
        
        $name = '';
        if($request->file()){
            $image = $request->file('profile');
            $name = 'profile'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/profile/');
            $image->move($destinationPath, $name);    
        }
        $objVender = new Vender();
        $objVender->firstname = $request->input('fname');
        $objVender->lastname = $request->input('lname');
        $objVender->mobileno = $request->input('mobile');
        $objVender->email = $request->input('email');
        $objVender->profile = $name;
        $objVender->password = Hash::make($request->input('password'));
        $objVender->state = $request->input('state');
        $objVender->city = $request->input('city');
        $objVender->address = $request->input('address');
        $objVender->created_at = date("Y-m-d h:i:s");
        $objVender->updated_at = date("Y-m-d h:i:s");
        return $objVender->save();
    }
    public function editVender($request, $id){
        
        $name = '';
        $objVender = Vender::find($id);
        if($request->file()){
            $existImage = public_path('/uploads/profile/').$objVender->profile;
            if (File::exists($existImage)) { // unlink or remove previous company image from folder
                File::delete($existImage);
            }
            
            $image = $request->file('profile');
            $name = 'profile'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/profile/');
            $image->move($destinationPath, $name);    
            $objVender->profile = $name;
        }
        $objVender->firstname = $request->input('fname');
        $objVender->lastname = $request->input('lname');
        $objVender->mobileno = $request->input('mobile');
        $objVender->email = $request->input('email');
        $objVender->profile = $name;
        $objVender->password = Hash::make($request->input('password'));
        $objVender->state = $request->input('state');
        $objVender->city = $request->input('city');
        $objVender->address = $request->input('address');
        $objVender->created_at = date("Y-m-d h:i:s");
        $objVender->updated_at = date("Y-m-d h:i:s");
        if ($objVender->save()) {
            return TRUE;
        } else {

            return FALSE;
        }   
    }

    public function deleteVender($data){
        
        $result = DB::table("vender")
                        ->delete($data['id']);
    	return $result;
    }

    public function getVender(){
        
        $result = Vender::select('*')
                 ->get();   
        return $result;
    }
    
    public function getvenderDetails($request, $id){
        
        $result = Vender::select('*')
                 ->where('id',$id)
                 ->get();  
        return $result;
    }
    
    public function getstate(){
        
        $result = DB::table('states')->select('name', 'id')
                ->where('country_id', 101)
                ->get();
        return $result;
    }
    public function getcityDetails($request, $id){
        
        $result = DB::table('cities')->select('name', 'id')
                        ->where('state_id', $id)
                        ->get();
        return $result;
    }
    public function getcity($request, $id){
        
        $result = DB::table('cities')->select('name', 'id')
                        ->where('id', $id)
                        ->get();
        return $result;
    }
}
