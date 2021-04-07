@extends('master')
@section('content')
    <div class="card">
            <div class="card-body">
                <div class="row table-responsive">
                    <div class="col-lg-12">
                        <h2 class="text-center text-info">চেক বুক এন্ট্রি<hr/></h2><br/>
                        <table class="table table-striped">
                            <thead>
                            <tr class="text-center">
                                <th> ক্রমিক নং</th>
                                <th>তারিখ</th>
                                <th> প্রাপক </th>
                                <th> টাকার পরিমান</th>
                                <th> অ্যাকাউন্ট পে</th>
                                <th> অপশন </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($cheques as $cheque)
                                <tr class="text-center">
                                    <td>{{ ($cheques->currentpage()-1) * $cheques ->perpage() + $loop->index + 1 }}</td>
                                    <td>{{$cheque->date}}</td>
                                    <td>{{$cheque->pay_to}} </td>
                                    <td>{{$cheque->amount}} </td>
                                    <td>{{strtoupper($cheque->ac_payee)}} </td>
                                    <td>
                                        <button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='{{route('cheque.edit',$cheque->id)}}'" data-toggle="tooltip" title="Edit">Edit</button>
                                        <br/>
                                        <button type="button" class="btn btn-inverse-primary btn-sm btn-block" onclick="window.location='{{route('cheque.show',$cheque->id)}}'" data-toggle="tooltip" title="Print">Print</button>
                                        <br/>
                                        <div class="modal fade" id="delete_modal_{{$cheque->id}}" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Delete Cheque</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are You Want To Delete This Cheque.Once You Delete This Cheque</p>
                                                        <p>You Will Delete This Cheque Information Permanently</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        {!! Form::open(['route' => ['cheque.destroy',$cheque->id],'method' => 'DELETE']) !!}
                                                        <button type="submit" class="btn btn-success">submit</button>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-inverse-danger btn-sm btn-block" data-toggle="modal" data-target="#delete_modal_{{$cheque->id}}" data-title="tooltip" title="Delete">Delete</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-info">{{'কোনো চেক বুক এন্ট্রি নেই'}}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <br/><br/>
                        {!! $cheques->links() !!}
                    </div>
                </div>
            </div>
        </div>
@endsection
