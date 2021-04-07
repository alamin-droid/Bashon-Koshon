@extends('master')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h2 class="text-center text-info">Product Request for {{$factory->name}}<br/><span>{{$factory->address}}</span><hr/></h2><br/>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center">S/L</th>
                                    <th class="text-center"> Date </th>
                                    <th class="text-center"> Factory </th>
                                    <th class="text-center"> Address </th>
                                    <th class="text-center"> Product </th>
                                    <th class="text-center"> Quantity </th>
                                    <th class="text-center"> Requisition </th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($production_requests as $production_request)
                                    <tr>
                                        <td class="text-center">{{ $loop->index + 1 }}</td>
                                        <td class="text-center">{{$production_request->date}}</td>
                                        <td class="text-center">{{!empty($production_request->factory) ? $production_request->factory->name : 'N/A'}}</td>
                                        <td class="text-center">{{!empty($production_request->factory) ? $production_request->factory->address : 'N/A'}}</td>
                                        <td class="text-center">{{$production_request->product}}</td>
                                        <td class="text-center">{{$production_request->quantity}}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='{{route('requisition.create')}}'" data-toggle="tooltip" title="Submit Requisition">Submit</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-info">{{'No Product Request Created Yet'}}</td>
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
