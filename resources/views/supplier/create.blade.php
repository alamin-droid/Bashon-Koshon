@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => 'supplier.store','method' => 'POST']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-plus"></i></span>নতুন যোগানদার</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">নাম</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Supplier Name" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">মোবাইল নাম্বার</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone" required>
                    </div>
                    <div class="form-group">
                        <label for="email">ই-মেইল (ঐচ্ছিক)</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label for="address">ঠিকানা</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
                    </div>
                    <div class="form-group">
                        <label for="bank_account">ব্যাংক অ্যাাকাউন্ট (ঐচ্ছিক)</label>
                        <input type="text" class="form-control" id="bank_account" name="bank_account" placeholder="Enter Bank Account">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-plus"></i> তৈরী করুন </button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection

