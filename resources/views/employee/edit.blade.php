@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => ['employee.update', $employee->id],'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span> আপডেট কর্মচারী</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">নাম</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$employee->name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="age">বয়স</label>
                        <input type="number" class="form-control" id="age" name="age" value="{{$employee->age}}" required>
                    </div>
                    <div class="form-group">
                        <label for="select_role" >ছবি আপলোড</label>
                        <input type='file' id="imageUpload" class="form-control" name="image" accept=".png, .jpg, .jpeg" />
                    </div>
                    <div class="form-group">
                        <label for="address">ঠিকানা</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{$employee->address}}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">ই-মেইল</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$employee->email}}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">মোবাইল নাম্বার</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{$employee->phone}}" required>
                    </div>
                    <div class="form-group">
                        <label for="select_role" >জীবন বৃত্তান্ত</label>
                        <input type='file' id="cv" class="form-control" name="cv" accept=".pdf" />
                    </div>
                    <div class="form-group">
                        <label for="salary">বেতন</label>
                        <input type="text" class="form-control" id="salary" name="salary" value="{{$employee->salary}}" required>
                    </div>
                    <div class="form-group">
                        <label for="jd">জয়েনিং ডেট</label>
                        <input type="date" class="form-control" id="joining_date" name="joining_date" value="{{$employee->joining_date}}" required>
                    </div>
                    <div class="form-group">
                        <label for="cy">চুক্তির বছর</label>
                        <input type="number" class="form-control" id="contract" name="contract" value="{{$employee->contract}}" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-account"></i> আপডেট </button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
