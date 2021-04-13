@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-12"><h3 class="text-center">{{$warehouse->name}}<hr/></h3></div>
    </div>
    <div class="row">
        <div class="col-md-12 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">মোট ক্রয়কৃত ধানের পরিমাণ<i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{$total_purchase}} বস্তা</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">ক্রয়কৃত ধানের তালিকা<hr/></h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr class="text-center">
                                <th>ক্রমিক নং</th>
                                <th> তারিখ </th>
                                <th> পণ্য </th>
                                <th> পরিমান/ বস্তা</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($purchases as $purchase)
                                <tr class="text-center">
                                    <td>{{$counter++}}</td>
                                    <td>{{date('d-m-Y', strtotime($purchase->date))}}</td>
                                    <td>{{!empty($product = \App\Finishedgood::find($purchase->product)) ? $product->name : 'N/A' }}</td>
                                    <td>{{$purchase->bag}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
