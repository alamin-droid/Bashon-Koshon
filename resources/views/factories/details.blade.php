@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-12"><h3 class="text-center">{{$factory->name}} Factory<hr/></h3></div>
    </div>
    <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Production Request <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{$product_requests->count()}}</h2>
                    <h6 class="card-text">Approved Production Request</h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Requisition Submitted <i class="mdi mdi-file-outline mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{$requisitions_pending->count()}}</h2>
                    <h6 class="card-text">Click to approve</h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Requisition Approved<i class="mdi mdi-file mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{$requisitions_approved->count()}}</h2>
                    <h6 class="card-text">Approved</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Product Requests Approved<hr/></h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr class="text-center">
                                <th> S/L </th>
                                <th> Date </th>
                                <th> Product </th>
                                <th> Company </th>
                                <th> Party </th>
                                <th> Delivery Address </th>
                                <th> Delivery Date </th>
                                <th> Status </th>
                                <th> Option </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($product_requests_approved as $product_request_approved)
                                <tr class="text-center">
                                    <td>{{$loop->index +1}}</td>
                                    <td>{{$product_request_approved->date}}</td>
                                    <td>{{$product_request_approved->product_name}}</td>
                                    <td>{{$product_request_approved->company}}</td>
                                    <td>{{$product_request_approved->party_name}}</td>
                                    <td>{{$product_request_approved->delivery_address}}</td>
                                    <td>{{$product_request_approved->delivery_date}}</td>
                                    <td>
                                        <label class="badge badge-gradient-success">{{$product_request_approved->status}}</label>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='{{route('requisition.production_create',$product_request_approved->id)}}'" data-toggle="tooltip" title="Requisition">Requisition</button>
                                        <button type="button" class="btn btn-inverse-dark btn-sm btn-block" onclick="window.location='{{route('wastage.create',$product_request_approved->id)}}'" data-toggle="tooltip" title="Wastage">Wastage</button>
                                        <button type="button" class="btn btn-inverse-success btn-sm btn-block" onclick="window.location='{{route('delivery.create',$product_request_approved->id)}}'" data-toggle="tooltip" title="Delivery">Delivery</button>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="9">No Product Request Available</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Requisition Approved<hr/></h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr class="text-center">
                                <th> S/L </th>
                                <th> Date </th>
                                <th> Production </th>
                                <th> Quantity </th>
                                <th> Status </th>
                                <th> Option </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($requisitions_approved as $requisition_approved)
                                <tr class="text-center">
                                    <td>{{$loop->index +1}}</td>
                                    <td>{{$requisition_approved->date}}</td>
                                    <td> {{ !empty($requisition_approved->product_request) ? $requisition_approved->product_request->product_name : 'N/A'}}</td>
                                    <td>
                                        @php
                                            $requisition_items = explode(',',str_replace(str_split('[]""'),'',$requisition_approved->items));
                                            $requisition_quantity = explode(',',str_replace(str_split('[]""'),'',$requisition_approved->quantity));
                                            $j=0;
                                        @endphp
                                @for($i=0; $i<count($requisition_quantity) ; $i++)
                                    @php
                                      $j += $requisition_quantity[$i];
                                    @endphp
                                    @endfor
                                        {{$j}}
                                    </td>
                                    <td>
                                        <label class="badge badge-gradient-success">{{$requisition_approved->status}}</label>
                                    </td>
                                    <td><button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='{{route('request_approval.requisition_gatepass',$requisition_approved->id)}}'" data-toggle="tooltip" title="Gate Pass">Gate Pass</button> </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="4">No Requisition Available</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Production Ratio</h4>
                    <canvas id="areaChart" style="height:250px"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Waste/Year</h4>
                    <canvas id="barChart" style="height:230px"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Delivery Report<hr/></h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr class="text-center">
                                <th> S/L</th>
                                <th> Date </th>
                                <th> Order No </th>
                                <th> Product </th>
                                <th> Delivery Date </th>
                                <th>Gatepass</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($deliveries as $delivery)
                                <tr class="text-center">
                                    <td>{{$loop->index +1}}</td>
                                    <td>{{$delivery->date}}</td>
                                    <td>{{!empty($delivery->product_request) ?$delivery->product_request->order_no : 'N/A'}}</td>
                                    <td>{{!empty($delivery->product_request) ?$delivery->product_request->product_name : 'N/A'}}</td>
                                    <td>{{$delivery->delivery_date}}</td>
                                    <td><button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='{{route('request_approval.delivery_gatepass',$delivery->id)}}'" data-toggle="tooltip" title="Gate Pass">Gate Pass</button> </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="6">{{'No Deliveries approved'}}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Waste Report<hr/></h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr class="text-center">
                                <th> S/L</th>
                                <th>Order No</th>
                                <th> Date </th>
                                <th> product </th>
                                <th> Warehouse </th>
                                <th> Gatepass </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($wastages as $wastage)
                            <tr class="text-center">
                                <td>{{$loop->index +1}}</td>
                                <td>{{!empty($wastage->product_request) ?$wastage->product_request->order_no : 'N/A'}}</td>
                                <td>{{$wastage->date}}</td>
                                <td>{{!empty($wastage->product_request) ?$wastage->product_request->product_name : 'N/A'}}</td>
                                <td>{{!empty($wastage->warehouse) ?$wastage->warehouse->name : 'N/A'}}</td>
                                <td><button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='{{route('request_approval.wastage_gatepass',$wastage->id)}}'" data-toggle="tooltip" title="Gate Pass">Gate Pass</button> </td>
                            </tr>
                            @empty
                            <tr class="text-center">
                                <td colspan="6">{{'No wastages approved'}}</td>
                            </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
