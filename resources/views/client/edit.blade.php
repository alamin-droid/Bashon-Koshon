@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => ['client.update', $client->id],'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span>আপডেট গ্রাহক</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">নাম</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$client->name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="select_role" >ছবি আপলোড</label>
                        <input type='file' id="imageUpload" class="form-control" name="photo" accept=".png, .jpg, .jpeg" />
                    </div>
                    <div class="form-group">
                        <label for="address">ঠিকানা</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{$client->address}}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">ই-মেইল</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{$client->email}}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">মোবাইল নাম্বার</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{$client->phone}}" required>
                    </div>
                    <div class="form-group">
                        <label for="c_person">যোগাযোগকারী</label>
                        <input type="text" class="form-control" id="c_person" name="c_person" placeholder="Contact Person" value="{{$client->c_person}}" required>
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
