@extends('master')
@section('content')
    <div class="container">
        {!! Form::open(['class' =>'form-sample','route' => 'rawmaterials.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span>নতুন কাঁচামাল</h3></div>
        <div class="form-group">
            <label for="select_role" >কাঁচামালের নাম</label>
            <input type='text' id="name" class="form-control" name="name" placeholder="Material Name" required/>
        </div>
        <br/><br/>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-material-design"></i> তৈরী করুন </button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
