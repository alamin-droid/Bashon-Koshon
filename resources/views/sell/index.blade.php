@extends('master')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
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
                                        <td>{{date('d-m-Y', strtotime($sell->date))}}</td>
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
                                                        <td>{{$rate_per_unit[$i]}}</td>
                                                        <td>{{number_format($finishedgood_quantity[$i] * $rate_per_unit[$i])}}.00</td>
                                                    </tr>
                                                @endfor
                                                </tbody>
                                            </table>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-inverse-success btn-sm btn-block" onclick="window.location='{{route('sell.show',$sell->id)}}'" data-toggle="tooltip" title="Invoice">Invoice</button>
                                            <br/>
                                            <button type="button" class="btn btn-inverse-dark btn-sm btn-block" onclick="window.location='{{route('sell.challan',$sell->id)}}'" data-toggle="tooltip" title="Challan">Challan</button>
                                            <br/>
                                            <button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='{{route('sell.edit',$sell->id)}}'" data-toggle="tooltip" title="Edit">Edit</button>
                                            <br/>
                                            <div class="modal fade" id="delete_modal_{{$sell->id}}" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Delete Production</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are You Want To Delete This Sell</p>
                                                            <p>Once You Delete This Sell</p>
                                                            <p>You Will Delete the Information Permanently</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            {!! Form::open(['route' => ['sell.destroy',$sell->id],'method' => 'DELETE']) !!}
                                                            <button type="submit" class="btn btn-success">submit</button>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-inverse-danger btn-sm btn-block" data-toggle="modal" data-target="#delete_modal_{{$sell->id}}" data-title="tooltip" title="Delete">Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-info">{{'কোনো বিক্রয়কৃত পণ্য নেই'}}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                                <br/><br/>
                                {{$sells->links()}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
