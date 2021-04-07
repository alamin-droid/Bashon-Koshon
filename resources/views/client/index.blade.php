@extends('master')
@section('content')
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row table-responsive">
                            <div class="col-lg-12">
                                <h2 class="text-center text-info">গ্রাহক তালিকা<hr/></h2><br/>
                                <br>
                                {!! Form::open(['route' => 'client.search','method' => 'GET']) !!}
                                <div class="row text-center">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="item" name="item" placeholder="Search in table.....">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button class="btn btn-gradient-primary btn-lg btn-block form-control" id="search_balance">খুজুন</button>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                                <br>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th class="text-center">ক্রমিক নং</th>
                                        <th class="text-center">ছবি</th>
                                        <th class="text-center"> নাম </th>
                                        <th class="text-center"> ঠিকানা </th>
                                        <th class="text-center"> ই-মেইল </th>
                                        <th class="text-center"> মোবাইল নাম্বার </th>
                                        <th class="text-center"> অপশন </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($clients as $client)
                                            <tr>
                                                <td class="text-center">{{ ($clients->currentpage()-1) * $clients ->perpage() + $loop->index + 1 }}</td>
                                                <td class="text-center"><img src="{{asset('assets/images/client/'.$client->photo)}}" alt=""></td>
                                                <td class="text-center">{{$client->name}}</td>
                                                <td class="text-center">{{$client->address}}</td>
                                                <td class="text-center">{{$client->email}}</td>
                                                <td class="text-center">{{$client->phone}}</td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='{{route('client.edit',$client->id)}}'" data-toggle="tooltip" title="Edit">Edit</button>
                                                    <br/>
                                                    <button type="button" class="btn btn-inverse-primary btn-sm btn-block" onclick="window.location='{{route('client.show',$client->id)}}'" data-toggle="tooltip" title="Show">Show</button>
                                                    <br/>
                                                    <div class="modal fade" id="delete_modal_{{$client->id}}" role="dialog">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Delete Client</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are You Want To Delete This Client.Once You Delete This Client</p>
                                                                    <p>You Will Delete The Information Permanently</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                    {!! Form::open(['route' => ['client.destroy',$client->id],'method' => 'DELETE']) !!}
                                                                    <button type="submit" class="btn btn-success">submit</button>
                                                                    {!! Form::close() !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-inverse-danger btn-sm btn-block" data-toggle="modal" data-target="#delete_modal_{{$client->id}}" data-title="tooltip" title="Delete">Delete</button>
                                                </td>
                                            </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-info">{{'কোনো গ্রাহক তালিকা নেই'}}</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <br/><br/>
                                {!! $clients->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
