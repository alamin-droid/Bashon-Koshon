@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => ['owner.update', $edit->id],'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span>আপডেট মালিক</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">নাম</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$edit->name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="select_role" >ছবি আপলোড</label>
                        <input type='file' id="imageUpload" class="form-control" name="photo" accept=".png, .jpg, .jpeg" />
                    </div>
                    <div class="form-group">
                        <label for="email">ই-মেইল</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{$edit->email}}">
                    </div>
                    <div class="form-group">
                        <label for="phone">মোবাইল নাম্বার</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{$edit->phone}}" required>
                    </div>
                    <div class="form-group">
                        <label for="designation">পদবী</label>
                        <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation" value="{{$edit->designation}}" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-account"></i>আপডেট </button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
