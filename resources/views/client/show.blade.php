@extends('master')
@section('content')
    <br/><br/>
    <div class="row">
        <div class="col-md-12 text-center"><h3 class="text-info">গ্রাহক জমা/খরচ হিসাব</h3><hr/></div>
    </div>
    <br/><br/><br/>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center"><img class="client_image" src="{{asset('/assets/images/client/'. $client->photo)}}" alt="client_image"></div>
                            <br/>
                            <div><span class="project_info_tag">নাম :</span> <span class="project_info_details"> {{$client->name}}</span> </div>
                            <div><span class="project_info_tag">ইমেইল :</span> <span class="project_info_details"> {{$client->email}}</span> </div>
                            <div><span class="project_info_tag">মোবাইল :</span> <span class="project_info_details"> {{$client->phone}}</span> </div>
                            <div><span class="project_info_tag">ঠিকানা :</span> <span class="project_info_details"> {{$client->address}}</span> </div>
                        </div>
                    </div>
                    <br/><br/>
                    <h3 class="text-center text-info"> {{$client->name}} অর্থনৈতিক অবস্থা <hr/></h3>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-2"> মোট বিক্রয় </div>
                        <div class="col-md-4 text-center"> : </div>
                        <div class="col-md-4"> {{number_format($sells->sum('total'))}}</div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2"> কালেকশন </div>
                        <div class="col-md-4 text-center"> : </div>
                        <div class="col-md-4"> {{number_format($collections->sum('amount') + $sells->sum('payment'))}}</div>
                        <div class="col-md-12"><hr/></div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2"> বকেয়া </div>
                        <div class="col-md-4 text-center"> : </div>
                        <div class="col-md-4"> {{number_format($sells->sum('total') - $collections->sum('amount') + $sells->sum('payment'))}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row table-responsive">
                                <div class="col-lg-12">
                                    <h2 class="text-center text-info">বিক্রয় তালিকা<hr/></h2><br/>
                                    <table class="table table-striped">
                                        <thead>
                                        <tr class="text-center">
                                            <th>ক্রমিক নং</th>
                                            <th> তারিখ </th>
                                            <th> মোট বিক্রয় </th>
                                            <th> পেমেন্ট </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($sells as $sell)
                                            <tr class="text-center">
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{$sell->date}}</td>
                                                <td>{{number_format($sell->total)}}</td>
                                                <td>{{number_format($sell->payment)}}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-info">{{'কোনো বিক্রয়কৃত পণ্য নেই'}}</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row table-responsive">
                                <div class="col-lg-2 float-right"></div>
                                <div class="col-lg-12">
                                    <h2 class="text-center text-info">কালেকশন<hr/></h2><br/>
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th class="text-center">ক্রমিক নং</th>
                                            <th class="text-center"> তারিখ</th>
                                            <th class="text-center"> টাকা প্রদানের মাধ্যম </th>
                                            <th class="text-center"> টাকার পরিমান </th>
                                        </tr>
                                        </thead>
                                        <tbody id="table">
                                        @forelse($collections as $collection)
                                            <tr>
                                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                                <td class="text-center">{{ date('d-m-Y', strtotime($collection->date))}}</td>
                                                <td class="text-center">{{ $collection->mode_of_payment}}</td>
                                                <td class="text-center">{{$collection->amount}}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-info">{{'কোনো কালেকশন নেই।'}}</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                        <tfoot>
                                        <tr class="text-center">
                                            <td colspan="3">মোট</td>
                                            <td>{{number_format($collections->sum('amount'))}}.00</td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

    </div>
@endsection
