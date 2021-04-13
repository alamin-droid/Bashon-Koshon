@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => 'production.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span> উৎপাদন</h3></div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="date">তারিখ</label>
                            <input type="date" class="form-control" name="date" id="date" required>
                        </div>
                        <div class="form-group">
                            <label for="finishedgood_id" >উৎপাদিত পণ্য</label>
                            <select class="form-control" name="finishedgood_id" id="finishedgood_id" required>
                                <option selected disabled value="">Choose an option</option>
                                @foreach($finishedgoods as $finishedgood)
                                    <option value="{{$finishedgood->id}}">{{$finishedgood->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="finishedgood_quantity">পরিমাণ (বস্তা)</label>
                            <input type="number" class="form-control" name="finishedgood_quantity" id="finishedgood_quantity" required>
                        </div>
                        <div class="form-group">
                            <label for="warehouse_id" >গোডাউন</label>
                            <select class="form-control" name="warehouse_id" id="warehouse_id" required>
                                <option selected disabled value="">Choose an option</option>
                                @foreach($warehouses as $warehouse)
                                    <option value="{{$warehouse->id}}">{{$warehouse->name}}</option>
                                @endforeach
                            </select>
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
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-account"></i> তৈরী করুন </button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection

