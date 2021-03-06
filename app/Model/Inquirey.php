<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Inquirey extends Model {

    protected $table = 'inquiry';

    public function getdatatable() {
        $requestData = $_REQUEST;
        $columns = array(
            // datatable column index  => database column name
            0 => 'id',
            1 => 'fname',
            2 => 'lname',
            3 => 'mobile',
            4 => 'landline',
            5 => 'companyname',
            6 => 'email',
            7 => 'inquirytime',
            8 => 'inquirydate',
            9 => 'inquirysource',
            10 => 'status',
        );

        $query = Inquirey::from('inquiry')
                ->where('status', 'open');
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
        $inquireytime = Config::get('constants.inquirey_time');
        $i = 0;
        $data = array();
        foreach ($resultArr as $row) {
            $i++;
//            


            if ($row["status"] == 'open') {
                $statushtml = '<span class="label label-info label-mini">Open</span>';
                $actionHtml = '<button class="btn btn-warning btn-xs closeinquirey" data-toggle="modal" data-target="#closeinquireyModel" data-id="' . $row['id'] . '"><i class="fa fa-close"></i></button><br><a href="' . route('edit-inquiry', $row["id"]) . '"><button class="btn btn-primary btn-xs" data-id="' . $row['id'] . '"><i class="fa fa-pencil"></i></button></a><br><button class="btn btn-danger btn-xs deleteinquirey" data-toggle="modal" data-target="#deleteModel" data-id="' . $row['id'] . '" ><i class="fa fa-trash-o "></i></button>';
            } else {
                $statushtml = '<span class="label label-success  label-mini">Close</span>';
                $actionHtml = '<button class="btn btn-warning btn-xs openinquirey" data-toggle="modal" data-target="#openinquireyModel"  data-id="' . $row["id"] . '"><i class="fa fa-check"></i></button><br><a href="' . route('edit-inquiry', $row["id"]) . '"><button class="btn btn-primary btn-xs" data-id="' . $row["id"] . '"><i class="fa fa-pencil"></i></button></a><br><button class="btn btn-danger btn-xs deleteinquirey" data-toggle="modal" data-target="#deleteModel" data-id="' . $row["id"] . '"><i class="fa fa-trash-o "></i></button>';
            }

            $nestedData = array();
            $nestedData[] = $i;
            $nestedData[] = $row["fname"] . " " . $row["lname"];
            $nestedData[] = $row["companyname"];
            $nestedData[] = $row["mobile"];
            $nestedData[] = $row["landline"];
            $nestedData[] = $row["email"];
            $nestedData[] = $inquireytime[$row["inquirytime"]];
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

    public function getdatatableclose() {

        $requestData = $_REQUEST;
        $columns = array(
            // datatable column index  => database column name
            0 => 'id',
            1 => 'fname',
            2 => 'lname',
            3 => 'mobile',
            4 => 'landline',
            5 => 'companyname',
            6 => 'email',
            7 => 'inquirytime',
            8 => 'inquirydate',
            9 => 'inquirysource',
            10 => 'status',
        );

        $query = Inquirey::from('inquiry')
                ->where('status', 'close');
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

            if ($row["status"] == 'open') {
                $statushtml = '<span class="label label-info label-mini">Open</span>';
                $actionHtml = '<button class="btn btn-warning btn-xs closeinquirey" data-toggle="modal" data-target="#closeinquireyModel" data-id="' . $row['id'] . '"><i class="fa fa-close"></i></button><br><a href="' . route('edit-inquiry', $row["id"]) . '"><button class="btn btn-primary btn-xs" data-id="' . $row['id'] . '"><i class="fa fa-pencil"></i></button></a><br><button class="btn btn-danger btn-xs deleteinquirey" data-toggle="modal" data-target="#deleteModel" data-id="' . $row['id'] . '" ><i class="fa fa-trash-o "></i></button>';
            } else {
                $statushtml = '<span class="label label-success  label-mini">Close</span>';
                $actionHtml = '<button class="btn btn-warning btn-xs openinquirey" data-toggle="modal" data-target="#openinquireyModel"  data-id="' . $row["id"] . '"><i class="fa fa-check"></i></button><br><a href="' . route('edit-inquiry', $row["id"]) . '"><button class="btn btn-primary btn-xs" data-id="' . $row["id"] . '"><i class="fa fa-pencil"></i></button></a><br><button class="btn btn-danger btn-xs deleteinquirey" data-toggle="modal" data-target="#deleteModel" data-id="' . $row["id"] . '"><i class="fa fa-trash-o "></i></button>';
            }

            $nestedData = array();
            $nestedData[] = $i;
            $nestedData[] = $row["fname"] . " " . $row["lname"];
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

    public function addInquirey($request) {

        $result = Inquirey::where("email", $request->input('email'))
                ->count();
        if ($result == 0) {
            $objaddinquirey = new Inquirey();
            $objaddinquirey->fname = $request->input('fname');
            $objaddinquirey->lname = $request->input('lname');
            $objaddinquirey->mobile = $request->input('mono');
            $objaddinquirey->landline = $request->input('landline');
            $objaddinquirey->companyname = $request->input('companyname');
            $objaddinquirey->email = $request->input('email');
            $objaddinquirey->inquirytime = $request->input('time');
            $objaddinquirey->inquirydate = date("Y-m-d", strtotime($request->input('idate')));
            $objaddinquirey->inquirysource = $request->input('isources');
            $objaddinquirey->status = "open";
            $objaddinquirey->created_at = date("Y-m-d h:i:s");
            $objaddinquirey->updated_at = date("Y-m-d h:i:s");
            if ($objaddinquirey->save()) {
                return "add";
            } else {
                return "wrong";
            }
        } else {
            return "exits";
        }
    }
    public function editInquirey($request) {
      
        $result = Inquirey::where("email", $request->input('email'))
                ->where("id","!=", $request->input('editId'))
                ->count();
        if ($result == 0) {
            
            $objaddinquirey = Inquirey::find($request->input('editId'));
            $objaddinquirey->fname = $request->input('fname');
            $objaddinquirey->lname = $request->input('lname');
            $objaddinquirey->mobile = $request->input('mono');
            $objaddinquirey->landline = $request->input('landline');
            $objaddinquirey->companyname = $request->input('companyname');
            $objaddinquirey->email = $request->input('email');
            $objaddinquirey->inquirytime = $request->input('time');
            $objaddinquirey->inquirydate = date("Y-m-d", strtotime($request->input('idate')));
            $objaddinquirey->inquirysource = $request->input('isources');
            $objaddinquirey->created_at = date("Y-m-d h:i:s");
            $objaddinquirey->updated_at = date("Y-m-d h:i:s");
            if ($objaddinquirey->save()) {
                return "updated";
            } else {
                return "wrong";
            }
        } else {
            return "exits";
        }
    }

    public function closeinquirey($id) {
        $objInquirey = Inquirey::find($id);
        $objInquirey->status = "close";
        return $objInquirey->save();
    }

    public function openinquirey($id) {
        $objInquirey = Inquirey::find($id);
        $objInquirey->status = "open";
        return $objInquirey->save();
    }

    public function deleteinquirey($id) {
        $delete = Inquirey::where('id', $id)->delete();
        return $delete;
    }
    
    public function getdetails($id){
        $result = Inquirey::select("*")
                ->where('id',$id)
                ->get();
        return $result;
    }
    
    public function totalinquirey(){
        $result = Inquirey::where("status","open")
                    ->count();
        return $result;
    }

}
