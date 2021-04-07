@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => 'employee.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span> নতুন কর্মচারী</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">নাম</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Employee Name" required>
                    </div>
                    <div class="form-group">
                        <label for="age">বয়স</label>
                        <input type="number" class="form-control" id="age" name="age" placeholder="24" required>
                    </div>
                    <div class="form-group">
                        <label for="select_role" >ছবি আপলোড</label>
                        <input type='file' class="form-control" id="imageUpload" name="image" accept=".png, .jpg, .jpeg" required/>
                    </div>
                    <div class="form-group">
                        <label for="address">ঠিকানা</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                    </div>
                    <div class="form-group">
                        <label for="email">ই-মেইল</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="email@mail.com" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">মোবাইল নাম্বার</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="+88018*****" required>
                    </div>
                    <div class="form-group">
                        <label for="select_role" >জীবন বৃত্তান্ত</label>
                        <input type='file' id="cv" class="form-control" name="cv" accept=".pdf" required/>
                    </div>
                    <div class="form-group">
                        <label for="salary">বেতন</label>
                        <input type="number" class="form-control" id="salary" name="salary" placeholder="salary" required>
                    </div>
                    <div class="form-group">
                        <label for="jd">জয়েনিং ডেট</label>
                        <input type="date" class="form-control" id="joining_date" name="joining_date" value="{{date('Y-m-d')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="cy">চুক্তির বছর</label>
                        <input type="number" class="form-control" id="contract" name="contract" placeholder="1 Years" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-account"></i> তৈরী করুন </button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
