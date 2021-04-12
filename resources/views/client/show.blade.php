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
                        <div class="col-md-4"> {{number_format($sells->sum('total') + $shooters->sum('total'))}}</div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2"> কালেকশন </div>
                        <div class="col-md-4 text-center"> : </div>
                        <div class="col-md-4"> {{number_format($collections->sum('amount') + $sells->sum('payment') + $shooters->sum('payment'))}}</div>
                        <div class="col-md-12"><hr/></div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2"> বকেয়া </div>
                        <div class="col-md-4 text-center"> : </div>
                        <div class="col-md-4"> {{number_format($sells->sum('total') + $shooters->sum('total') - $collections->sum('amount') - $sells->sum('payment') - $shooters->sum('payment'))}}</div>
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
                                    <h4 class="text-center text-info">বিক্রয় তালিকা<hr/></h4><br/>
                                    <table class="table table-striped">
                                        <thead>
                                        <tr class="text-center">
                                            <th>ক্রমিক নং</th>
                                            <th> তারিখ </th>
                                            <th> বিস্তারিত </th>
                                            <th> মোট বিক্রয় </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($sells as $sell)
                                            <tr class="text-center">
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{$sell->date}}</td>
                                                <td><button type="button" class="btn btn-inverse-success btn-sm btn-block" onclick="window.location='{{route('sell.show',$sell->id)}}'" data-toggle="tooltip" title="Details">Details</button></td>
                                                <td>{{number_format($sell->total)}}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-info">{{'কোনো বিক্রয়কৃত পণ্য নেই'}}</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                        <tfoot>
                                        <tr class="text-center">
                                            <td colspan="3">মোট</td>
                                            <td>{{number_format($sells->sum('total'))}}.00</td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    <br/><br>
                                    {!! $sells->links() !!}
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
                                    <h4 class="text-center text-info">কালেকশন<hr/></h4><br/>
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

                                    <br/><br>
                                    {!! $collections->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body table-responsive">
                    <h4 class="text-center text-info">বিক্রয়োত্তর পণ্যের তালিকা<hr/></h4><br/>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">ক্রমিক নং</th>
                            <th class="text-center">পণ্যের নাম</th>
                            <th class="text-center">পরিমান</th>
                            <th class="text-center">বস্তা সংখ্যা</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($rows as $row)
                            <tr class="text-center">
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$row->product_name}}</td>
                                <td>{{($row->quantity_kg == 0) ? $row->quantity.' বস্তা' : $row->quantity_kg.' কেজি'}}</td>
                                <td>{{$row->quantity}}</td>
                            </tr>
                        @empty
                            <tr class="text-center"><td colspan="4">{{"কোনো বিক্রয়োত্তর পণ্যের তালিকা নেই"}}</td></tr>
                        @endforelse
                        </tbody>
                        <tfoot>
                        <tr class="text-center">
                            <td colspan="3">মোট</td>
                            <td>{{number_format($rows->sum('quantity'))}} বস্তা</td>
                        </tr>
                        </tfoot>
                    </table>
                    <br/><br/>
                    {!! $rows->links() !!}
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body table-responsive">
                    <h4 class="text-center text-info">শ্যুটারকৃত পণ্যের তালিকা<hr/></h4><br/>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">ক্রমিক নং</th>
                            <th class="text-center">তারিখ</th>
                            <th class="text-center">বস্তা সংখ্যা</th>
                            <th class="text-center">মোট মূল্য</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($shooters as $shooter)
                            <tr class="text-center">
                                <td>{{$loop->index + 1}}</td>
                                <td>{{date('d-m-Y', strtotime($shooter->date))}}</td>
                                <td>{{$shooter->after_shooter_qty}}</td>
                                <td>{{number_format($shooter->total)}}</td>
                            </tr>
                        @empty
                            <tr class="text-center"><td colspan="4">{{"কোনো বিক্রয়োত্তর পণ্যের তালিকা নেই"}}</td></tr>
                        @endforelse
                        </tbody>
                        <tfoot>
                        <tr class="text-center">
                            <td colspan="3">মোট</td>
                            <td>{{number_format($shooters->sum('total'))}}.00</td>
                        </tr>
                        </tfoot>
                    </table>
                    <br/><br/>
                    {!! $shooters->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
