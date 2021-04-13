@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-12"><h3 class="text-center">{{$warehouse->name}}<hr/></h3></div>
    </div>
    <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">মোট উৎপাদিত চালের পরিমাণ<i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{$total_production}} বস্তা</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">মোট বিক্রিত চালের পরিমাণ<i class="mdi mdi-chart-line mdi-24px float-right"></i></h4>
                    <h2 class="mb-5">{{$total_sell}} বস্তা</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">স্টকের চালের পরিমাণ<i class="mdi mdi-chart-line mdi-24px float-right"></i></h4>
                    <h2 class="mb-5">{{$total_production - $total_sell}} বস্তা</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">ক্রয়কৃত চালের তালিকা<hr/></h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr class="text-center">
                                <th>ক্রমিক নং</th>
                                <th> তারিখ </th>
                                <th> পরিমান/ বস্তা</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($productions as $production)
                                <tr class="text-center">
                                    <td>{{$counter++}}</td>
                                    <td>{{date('d-m-Y', strtotime($production->date))}}</td>
                                    <td>{{$production->finishedgood_quantity}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @php
            $counter = 1;
        @endphp
        <div class="col-sm-6 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">বিক্রিত চালের তালিকা<hr/></h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr class="text-center">
                                <th>ক্রমিক নং</th>
                                <th> তারিখ </th>
                                <th> পরিমান/ বস্তা</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sells as $sell)
                                @php
                                    $sell['type_of_rice'] = explode(',',str_replace(str_split('[]""'),'',$sell->type_of_rice));
                                    $sell['quantity'] = explode(',',str_replace(str_split('[]""'),'',$sell->quantity));
                                @endphp
                                @for($i=0;$i<count($sell->type_of_rice) ;$i++)
                                    @if($sell->type_of_rice[$i] != '5' || $sell->type_of_rice[$i] != '6')
                                        <tr class="text-center">
                                            <td>{{$counter++}}</td>
                                            <td>{{date('d-m-Y', strtotime($sell->date))}}</td>
                                            <td>{{$sell->quantity[$i]}}</td>
                                        </tr>
                                    @endif
                                @endfor
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection