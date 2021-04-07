@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => 'factory.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-factory"></i></span> Add New Factory</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" minlength="1" maxlength="24" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Factory Address" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Incharge ID</label>
                        <input type="text" class="form-control" id="incharge_id" name="incharge_id" placeholder="Factory Incahrge ID" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-factory"></i> Create </button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
