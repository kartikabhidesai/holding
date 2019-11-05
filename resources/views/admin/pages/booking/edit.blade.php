@extends('admin.layout.app')
@section('content')
@foreach($hoardingdetails as $result) 
@endforeach
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card card-box">
            <div class="card-head">
                <header>Add Hoarding</header>

            </div>
            <div class="card-body " id="bar-parent3">
                <form id='editnewhoarding' class="" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group ">
                        <label class="control-label" >Location</label>
                        <input type="text" class="form-control" name="location" placeholder="Enter hoarding location" value="{{ $result->location }}">
                    </div>

                    <div class="form-group ">
                        <label class="control-label" >Start Date</label>
                        <input type="text" id="date" class="form-control" name="startdate" placeholder="Enter hoarding start date" value="{{ $result->startdate }}">
                    </div>

                    <div class="form-group ">
                        <label class="control-label" >End Date</label>
                        <input type="text"  id="date1" class="form-control" name="enddate" placeholder="Enter hoarding end date" value="{{ $result->enddate }}">
                    </div>

                    <div class="form-group ">
                        <label class="control-label" >Hoarding Status</label>
                        <select class="form-control" name="status">
                            <option value="">Select Hoarding status</option>
                            <option value="Available" {{ $result->status == 'Available' ? 'selected' : ''}}>Available</option>
                            <option value="Not available" {{ $result->status != 'Available' ? 'selected' : ''}}>Not available</option>
                        </select> 
                    </div>


                    <div class="form-group ">
                        <label class="control-label" >Hoarding Type</label>
                        <select class="form-control" name="type">
                            @foreach($type as $key => $value){
                            <option value="{{ $key }}" {{ $key == $result->type ? 'selected' : ''}}>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group ">
                        <label class="control-label" >Hoarding Budget</label>
                        <input type="text" class="form-control" name="budget" placeholder="Enter hoarding budget" value='{{ $result->budget }}'>
                    </div>  
                    <div class="form-group addimagesdiv">
                        <label class="control-label" >Hoarding Images </label>
                        <div class='row'>
                        @for($i=0; $i < count($hoardingdetails);$i++)
                        <div class="margin-right-10 margin-top-10">
                            <img height="100px" width="100px" src="{{ url('/public/uploads/hoarding/'.$hoardingdetails[$i]->imagename) }}" alt="product Image" value="{{ $hoardingdetails[$i]->imagename }}">
                        </div>
                        @endfor
                        </div>
                        <br>
                        <div class="row ">                        
                            <div class="col-10">
                                <input type="file"  class="form-control hoardingImageclass" name="hoarding[]">
                            </div>
                            <div class="col-2">
                                <a id="sample_editable_1_new" class="btn btn-info addimages"><i class="fa fa-plus"></i> Add New Image</a>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Submit</button>
                        <button type="button" class="btn btn-default">Cancel</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>

@endsection