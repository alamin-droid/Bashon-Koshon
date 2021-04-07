@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => ['user.update',$edit->id],'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span>এডিট ব্যবহারকারী</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">নাম</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$edit->name}}" placeholder="Enter User Name" required>
                    </div>
                    <div class="form-group">
                        <label for="select_role" >ছবি আপলোড</label>
                        <input type='file' class="form-control" id="imageUpload" name="image" accept=".png, .jpg, .jpeg"/>
                    </div>
                    <div class="form-group">
                        <label for="email">ই-মেইল</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$edit->email}}" placeholder="Enter User Email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">মোবাইল নাম্বার</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{$edit->phone}}" placeholder="Enter User Phone Number" required>
                    </div>
                    <div class="form-group">
                        <label for="address">ঠিকানা</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{$edit->address}}" placeholder="Enter User Address" required>
                    </div>
                    <div class="form-group">
                        <label for="password">পাসওয়ার্ড</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">পাসওয়ার্ড নিশ্চিত করুন</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-account"></i> এডিট করুন </button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection

