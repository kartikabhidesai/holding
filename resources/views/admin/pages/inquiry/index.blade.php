@extends('admin.layout.app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-topline-yellow">
            <div class="card-head">
                <header>Inquirey List</header>
                
            </div>
            <div class="card-body ">
                <div class="row p-b-20">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="btn-group pull-right">
                            <a href="{{ route("add-inquiry") }}">
                                <button id="sample_editable_1_new" class="btn btn-info"> Add New
                                    <i class="fa fa-plus"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                    
                </div>
                <table id="inquireytable" class="display full-width">
                    {{ csrf_field() }}
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Company Name</th>
                            <th>Mo No</th>
                            <th>Landline</th>
                            <th>Email</th>
                            <th>Inquirey Time</th>
                            <th>Inquirey Date</th>
                            <th>Inquirey Source</th>                            
                            <th>Inquirey Status</th>                            
                            <th>Action</th>                            
                        </tr>
                    </thead>
                    <tbody>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection