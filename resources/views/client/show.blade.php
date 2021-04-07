@extends('master')
@section('content')
    @php
    $total_sell = 0;
    $sold = 0;
    foreach ($sells as $sell){
        $finishedgood_quantity = explode(',',str_replace(str_split('[]""'),'',$sell->quantity));
        $rate_per_unit = explode(',',str_replace(str_split('[]""'),'',$sell->rate_per_unit));
        for($i=0; $i<count($finishedgood_quantity) ; $i++){
            $total_sell += $finishedgood_quantity[$i] * $rate_per_unit[$i];
        }
    }
    @endphp
    <br/><br/>
    <div class="row">
        <div class="col-md-12 text-center"><h3 class="text-info">গ্রাহক জমা/খরচ হিসাব</h3><hr/></div>
    </div>
    <br/><br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-lg-6 grid-margin stretch-card">
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
                        <div class="col-md-4"> {{number_format($total_sell)}} /-</div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2"> কালেকশন </div>
                        <div class="col-md-4 text-center"> : </div>
                        <div class="col-md-4"> {{number_format($collections->sum('amount'))}} /-</div>
                        <div class="col-md-12"><hr/></div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2"> বকেয়া </div>
                        <div class="col-md-4 text-center"> : </div>
                        <div class="col-md-4"> {{number_format($total_sell - $collections->sum('amount'))}} /-</div>
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
                                            <th> পণ্যের বিবরণ </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($sells as $sell)
                                            @php
                                                $finishedgood_name = array();
                                                    $finishedgood_id = explode(',',str_replace(str_split('[]""'),'',$sell->finishedgood_id));
                                                    $finishedgood_quantity = explode(',',str_replace(str_split('[]""'),'',$sell->quantity));
                                                    $rate_per_unit = explode(',',str_replace(str_split('[]""'),'',$sell->rate_per_unit));
                                            @endphp
                                            <tr class="text-center">
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{$sell->date}}</td>
                                                <td>
                                                    <table class="table table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th>পণ্য</th>
                                                            <th>পরিমাণ (কেজি)</th>
                                                            <th>মূল্য/কেজি</th>
                                                            <th>মোট (৳)</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @for($i=0; $i<count($finishedgood_id) ; $i++)
                                                            @foreach($finishedgoods as $finishedgood)
                                                                @if($finishedgood->id == $finishedgood_id[$i])
                                                                    @php
                                                                        $finishedgood_name[] = $finishedgood->name;
                                                                    @endphp
                                                                @endif
                                                            @endforeach
                                                        @endfor
                                                        @for($i=0; $i<count($finishedgood_id) ; $i++)
                                                            <tr>
                                                                <td>{{$finishedgood_name[$i]}}</td>
                                                                <td>{{$finishedgood_quantity[$i]}}</td>
                                                                <td>{{$rate_per_unit[$i]}}.00</td>
                                                                <td>{{number_format($finishedgood_quantity[$i] * $rate_per_unit[$i])}}.00</td>
                                                            </tr>
                                                            @php
                                                                $sold  += $finishedgood_quantity[$i] * $rate_per_unit[$i];
                                                            @endphp
                                                        @endfor
                                                        </tbody>
                                                        <tfoot>
                                                        <tr class="text-center">
                                                            <td colspan="3">মোট</td>
                                                            <td>{{number_format($sold)}}.00</td>
                                                        </tr>
                                                        </tfoot>
                                                    </table>
                                                </td>
                                            </tr>
                                            @php
                                                $sold  = 0;
                                            @endphp
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center text-info">{{'কোনো বিক্রয়কৃত পণ্য নেই'}}</td>
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
                                            <th class="text-center">গ্রাহক</th>
                                            <th class="text-center"> টাকার পরিমান </th>
                                            <th class="text-center"> টাকা প্রদানের মাধ্যম </th>
                                        </tr>
                                        </thead>
                                        <tbody id="table">
                                        @forelse($collections as $collection)
                                            <tr>
                                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                                <td class="text-center">{{ date('d-m-Y', strtotime($collection->date))}}</td>
                                                <td class="text-center">{!! (!empty($collection->client_id)) ? (!empty($collection->client) ? $collection->client->name : 'N/A' ):  $collection->retail_sell!!}</td>
                                                <td class="text-center">{{$collection->amount}}</td>
                                                <td class="text-center">{{ $collection->mode_of_payment}}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center text-info">{{'কোনো কালেকশন নেই।'}}</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                        <tfoot>
                                        <tr class="text-center">
                                            <td colspan="4">মোট</td>
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
