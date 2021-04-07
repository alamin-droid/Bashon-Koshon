@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => 'advance.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span>অগ্রীম বেতন-ভাতা</h3></div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="joining_date" >তারিখ</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                        <div class="form-group">
                            <label for="Employees">কর্মচারী</label>
                            <select class="form-control" data-live-search="true" name="employee_id" id="employee_name" required>
                                <option selected disabled value="">Choose Employee</option>
                                @foreach($employees as $employee)
                                    <option value="{{$employee->id}}">{{$employee->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="amount" >টাকার পরিমাণ</label>
                            <input type="number" class="form-control" id="amount" name="amount" placeholder="Amount taken" required>
                        </div>
                        <div class="form-group">
                            <label for="repaid_per_month" >প্রতি মাসে পরিশোধিত টাকার পরিমাণ</label>
                            <input type="number" class="form-control" id="repaid_per_month" name="repaid_per_month" placeholder="Monthly Paid Amount" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block" id="submit"><i class="mdi mdi-account"></i> তৈরী করুন </button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
