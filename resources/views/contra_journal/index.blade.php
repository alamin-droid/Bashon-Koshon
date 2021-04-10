@extends('master')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-2 float-right"></div>
                        <div class="col-lg-12">
                            <h2 class="text-center text-info">Contra Journal<hr/></h2><br/>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center">S/L</th>
                                    <th class="text-center">Transfer From</th>
                                    <th class="text-center"> Amount </th>
                                    <th class="text-center"> Transfer To </th>
                                    <th class="text-center"> Option </th>
                                </tr>
                                </thead>
                                <tbody id="table">
                                @forelse($contra_journals as $contra_journal)
                                    <tr>
                                        <td class="text-center">{{ ($contra_journals->currentpage()-1) * $contra_journals ->perpage() + $loop->index + 1 }}</td>
                                        <td class="text-center">{{$contra_journal->transfer_from == 0 ? 'Cash' : ( !empty($owner = \App\Owner::find($contra_journal->transfer_from)) ? $owner->name : $contra_journal->transfer_from)}}</td>
                                        <td class="text-center">{{number_format($contra_journal->amount)}}</td>
                                        <td class="text-center">{{$contra_journal->transfer_to == 0 ? 'Cash' : ( !empty($owner = \App\Owner::find($contra_journal->transfer_to)) ? $owner->name : $contra_journal->transfer_to)}}</td>
                                        <td class="text-center">
                                                <button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='{{route('contra_journal.edit',$contra_journal->id)}}'" data-toggle="tooltip" title="Edit">Edit</button>
                                            <br/>
                                                <div class="modal fade" id="delete_modal_{{$contra_journal->id}}" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete Contra journal</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Do You Want To Delete This Contra journal.</p>
                                                                <p>Once You Delete This Contra journal</p>
                                                                <p>You Will Delete This Contra journal Information Permanently</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                {!! Form::open(['route' => ['contra_journal.destroy',$contra_journal->id],'method' => 'DELETE']) !!}
                                                                <button type="submit" class="btn btn-success">submit</button>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-inverse-danger btn-sm btn-block" data-toggle="modal" data-target="#delete_modal_{{$contra_journal->id}}" data-title="tooltip" title="Delete">Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-info">{{'No Contra Journal Created Yet'}}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            <br/><br/>
                            {!! $contra_journals->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
