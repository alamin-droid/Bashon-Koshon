@extends('master')
@section('content')
    <div class="container">
        {!! Form::open(['class' =>'form-sample','route' => 'finishedgood.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

        <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span>নতুন উৎপাদিত পণ্য</h3></div>
        <div class="form-group">
            <label for="select_role" >উৎপাদিত পণ্যের নাম</label>
            <input type='text' id="name" class="form-control" name="name" placeholder="Finished Good Name" required/>
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
