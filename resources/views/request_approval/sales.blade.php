@extends('master')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h2 class="text-center text-info">বিক্রয় অনুমোদন তালিকা<hr/></h2><br/>
                            <table class="table table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th>ক্রমিক নং</th>
                                    <th> তারিখ </th>
                                    <th> পণ্যের বিবরণ </th>
                                    <th> অপশন </th>
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
                                                    <th>টাকা/কেজি</th>
                                                    <th>মোট</th>
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
                                                        <td>৳{{$rate_per_unit[$i]}}</td>
                                                        <td>৳{{number_format($finishedgood_quantity[$i] * $rate_per_unit[$i])}}.00</td>
                                                    </tr>
                                                @endfor
                                                </tbody>
                                            </table>
                                        </td>
                                        <td>
                                            @if($sell->status != 'approved')
                                                <button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='{{route('request_approval.sales_approve',$sell->id)}}'" data-toggle="tooltip" title="অনুমোদন">অনুমোদন</button>
                                            @else
                                                <button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='{{route('request_approval.sales_gatepass',$sell->id)}}'" data-toggle="tooltip" title="গেট পাস">গেট পাস</button>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-info">{{'কোনো বিক্রয় অনুমোদন তালিকা নেই'}}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
