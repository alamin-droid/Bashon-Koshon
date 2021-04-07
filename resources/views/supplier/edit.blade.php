@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => ['supplier.update', $supplier->id],'method' => 'PATCH']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-pencil"></i></span>আপডেট যোগানদার</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">নামে</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Supplier Name" value="{{$supplier->name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">মোবাইল নাম্বার</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone" value="{{$supplier->phone}}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">ই-মেইল (ঐচ্ছিক)</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{$supplier->email}}">
                    </div>
                    <div class="form-group">
                        <label for="address">ঠিকানা</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="{{$supplier->address}}" required>
                    </div>
                    <div class="form-group">
                        <label for="bank_account">ব্যাংক অ্যাাকাউন্ট (ঐচ্ছিক)</label>
                        <input type="text" class="form-control" id="bank_account" name="bank_account" placeholder="Enter Bank Account" value="{{$supplier->bank_account}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-pencil"></i>আপডেট</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection

