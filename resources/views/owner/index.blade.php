@extends('master')
@section('content')
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row table-responsive">
                            <div class="col-lg-12">
                                <h2 class="text-center text-info">মালিকদের তালিকা<hr/></h2><br/>
                                <br>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th class="text-center">ক্রমিক নং</th>
                                        <th class="text-center">ছবি</th>
                                        <th class="text-center"> নাম </th>
                                        <th class="text-center"> মোবাইল নাম্বার </th>
                                        <th class="text-center"> পদবী </th>
                                        <th class="text-center"> অপশন </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($owners as $owner)
                                            <tr>
                                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                                <td class="text-center"><img src="{{asset('assets/images/owner/'.$owner->photo)}}" alt=""></td>
                                                <td class="text-center">{{$owner->name}}</td>
                                                <td class="text-center">{{$owner->phone}}</td>
                                                <td class="text-center">{{$owner->designation}}</td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='{{route('owner.edit',$owner->id)}}'" data-toggle="tooltip" title="Edit">Edit</button>
                                                    <br/>
                                                    <button type="button" class="btn btn-inverse-primary btn-sm btn-block" onclick="window.location='{{route('owner.show',$owner->id)}}'" data-toggle="tooltip" title="Show">Show</button>
                                                    <br/>
                                                    <div class="modal fade" id="delete_modal_{{$owner->id}}" role="dialog">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Delete Owner</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are You Want To Delete This Owner.Once You Delete This Owner</p>
                                                                    <p>You Will Delete The Information Permanently</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                    {!! Form::open(['route' => ['owner.destroy',$owner->id],'method' => 'DELETE']) !!}
                                                                    <button type="submit" class="btn btn-success">submit</button>
                                                                    {!! Form::close() !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-inverse-danger btn-sm btn-block" data-toggle="modal" data-target="#delete_modal_{{$owner->id}}" data-title="tooltip" title="Delete">Delete</button>
                                                </td>
                                            </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-info">{{'কোনো মালিক তালিকা নেই'}}</td>
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
