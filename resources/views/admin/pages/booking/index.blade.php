@extends('admin.layout.app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-topline-yellow">
            <div class="card-head">
                <header>Hoarding List</header>
            </div>
            <div class="card-body ">
                <div class="row p-b-20">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="btn-group pull-right">
                            <a href="{{ route("add-hoarding") }}">
                                <button id="sample_editable_1_new" class="btn btn-info"> Add New Hoarding
                                    <i class="fa fa-plus"></i>
                                </button>
                            </a>
                        </div>
                    </div>

                </div>
                <table id="bookingtable" class="display full-width">
                    {{ csrf_field() }}
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Check</th>
                            <th>Images</th>
                            <th>Location</th>                            
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th>Budget</th>           
                            <th>Cart</th>           
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