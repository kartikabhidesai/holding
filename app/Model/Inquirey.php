<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
class Inquirey extends Model
{
    protected $table = 'inquiry';
    
    public function getdatatable(){
        $requestData = $_REQUEST;
        $columns = array(
            // datatable column index  => database column name
            0 => 'id',
            1 => 'fname',
            2 => 'lname',
            3 => 'mobile',
            4=> 'landline',
            5=> 'companyname',
            6=>'email',
            7=>'inquirytime',
            8=>'inquirydate',
            9=>'inquirysource',
            10=>'status',
        );

        $query = Inquirey::from('inquiry')
                ->where('status','open');
        if (!empty($requestData['search']['value'])) {
            // if there is a search parameter, $requestData['search']['value'] contains search parameter
            $searchVal = $requestData['search']['value'];
            $query->where(function($query) use ($columns, $searchVal, $requestData) {
                        $flag = 0;
                        foreach ($columns as $key => $value) {
                            $searchVal = $requestData['search']['value'];
                            if ($requestData['columns'][$key]['searchable'] == 'true') {
                                if ($flag == 0) {
                                    $query->where($value, 'like', '%' . $searchVal . '%');
                                    $flag = $flag + 1;
                                } else {
                                    $query->orWhere($value, 'like', '%' . $searchVal . '%');
                                }
                            }
                        }
                    });
        }
       // print_r($requestData);exit;
        $temp = $query->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);

        $totalData = count($temp->get());
        $totalFiltered = count($temp->get());

        $resultArr = $query->skip($requestData['start'])
                           ->take($requestData['length'])
                           ->select('*')->get();
        $i = 0;
        $data = array();
        foreach ($resultArr as $row) {
            $i++;
//            
           
           
           if($row["status"] == 'open'){
               $statushtml ='<span class="label label-info label-mini">Open</span>';
               $actionHtml = '<button class="btn btn-warning btn-xs"><i class="fa fa-close"></i></button><br><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button><br><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>';
           }else{
               $statushtml ='<span class="label label-success  label-mini">Close</span>';
               $actionHtml = '<button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button><br><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button><br><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>';
           }
           
            $nestedData = array();
            $nestedData[] = $i;
            $nestedData[] = $row["fname"]." ".$row["lname"];
            $nestedData[] = $row["companyname"];
            $nestedData[] = $row["mobile"];
            $nestedData[] = $row["landline"];
            $nestedData[] = $row["email"];
            $nestedData[] = $row["inquirytime"];
            // $nestedData[] = '<img src="{{URL::asset("'.$row["company_image"].'")}}" alt="Company Pic" height="100" width="100">';
            $nestedData[] = $row["inquirydate"];
            $nestedData[] = $row["inquirysource"];
            $nestedData[] = $statushtml;
            $nestedData[] = $actionHtml;
            $data[] = $nestedData;
        }
       //echo "<pre>";print_r($data);exit;

        $json_data = array(
            "draw" => intval($requestData['draw']), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
            "recordsTotal" => intval($totalData), // total number of records
            "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data" => $data   // total data array
        );
        
        

        return $json_data;
    }
    
    public function getdatatableclose(){
        
        $requestData = $_REQUEST;
        $columns = array(
            // datatable column index  => database column name
            0 => 'id',
            1 => 'fname',
            2 => 'lname',
            3 => 'mobile',
            4=> 'landline',
            5=> 'companyname',
            6=>'email',
            7=>'inquirytime',
            8=>'inquirydate',
            9=>'inquirysource',
            10=>'status',
        );

        $query = Inquirey::from('inquiry')
                ->where('status','close');
        if (!empty($requestData['search']['value'])) {
            // if there is a search parameter, $requestData['search']['value'] contains search parameter
            $searchVal = $requestData['search']['value'];
            $query->where(function($query) use ($columns, $searchVal, $requestData) {
                        $flag = 0;
                        foreach ($columns as $key => $value) {
                            $searchVal = $requestData['search']['value'];
                            if ($requestData['columns'][$key]['searchable'] == 'true') {
                                if ($flag == 0) {
                                    $query->where($value, 'like', '%' . $searchVal . '%');
                                    $flag = $flag + 1;
                                } else {
                                    $query->orWhere($value, 'like', '%' . $searchVal . '%');
                                }
                            }
                        }
                    });
        }
       // print_r($requestData);exit;
        $temp = $query->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);

        $totalData = count($temp->get());
        $totalFiltered = count($temp->get());

        $resultArr = $query->skip($requestData['start'])
                           ->take($requestData['length'])
                           ->select('*')->get();
        $i = 0;
        $data = array();
        $inquireytime = Config::get('constants.inquirey_time');
        
        foreach ($resultArr as $row) {
            $i++;
//            
           
           if($row["status"] == 'open'){
               $statushtml ='<span class="label label-info label-mini">Open</span>';
               $actionHtml = '<button class="btn btn-warning btn-xs"><i class="fa fa-close"></i></button><br><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button><br><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>';
           }else{
               $statushtml ='<span class="label label-success  label-mini">Close</span>';
               $actionHtml = '<button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button><br><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button><br><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>';
           }
           
            $nestedData = array();
            $nestedData[] = $i;
            $nestedData[] = $row["fname"]." ".$row["lname"];
            $nestedData[] = $row["companyname"];
            $nestedData[] = $row["mobile"];
            $nestedData[] = $row["landline"];
            $nestedData[] = $row["email"];
            $nestedData[] = $inquireytime[$row["inquirytime"]];
            // $nestedData[] = '<img src="{{URL::asset("'.$row["company_image"].'")}}" alt="Company Pic" height="100" width="100">';
            $nestedData[] = date("d-m-Y", strtotime($row["inquirydate"]));
            $nestedData[] = $row["inquirysource"];
            $nestedData[] = $statushtml;
            $nestedData[] = $actionHtml;
            $data[] = $nestedData;
        }
       //echo "<pre>";print_r($data);exit;

        $json_data = array(
            "draw" => intval($requestData['draw']), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
            "recordsTotal" => intval($totalData), // total number of records
            "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data" => $data   // total data array
        );
        
        

        return $json_data;
    }
}
