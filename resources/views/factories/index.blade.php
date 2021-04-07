@extends('master')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h2 class="text-center text-info">Factories<hr/></h2><br/>
                            <table class="table table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th>S/L</th>
                                    <th> Name </th>
                                    <th> Address </th>
                                    <th> Incharge ID</th>
                                    <th> Option </th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($factories as $factory)
                                    <tr class="text-center">
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{$factory->factory_name}}</td>
                                        <td>{{$factory->address}}</td>
                                        <td>{{$factory->incharge_id}}</td>
                                        <td>
{{--                                            <button type="button" class="btn btn-inverse-primary btn-sm btn-block" onclick="window.location='{{route('factory.show',$factory->id)}}'" data-toggle="tooltip" title="Show">Show</button>--}}
                                            <button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='{{route('factory.edit',$factory->id)}}'" data-toggle="tooltip" title="Edit">Edit</button>
                                            <br/>
                                            <div class="modal fade" id="delete_modal_{{$factory->id}}" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Delete Factory</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are You Want To Delete This Factory</p>
                                                            <p>Once You Delete This Factory</p>
                                                            <p>You Will Delete the Information Permanently</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            {!! Form::open(['route' => ['factory.destroy',$factory->id],'method' => 'DELETE']) !!}
                                                            <button type="submit" class="btn btn-success">submit</button>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-inverse-danger btn-sm btn-block" data-toggle="modal" data-target="#delete_modal_{{$factory->id}}" data-title="tooltip" title="Delete">Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-info">{{'No Factory Created Yet'}}</td>
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
