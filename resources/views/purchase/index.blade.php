@extends('master')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h2 class="text-center text-info">ক্রয় তালিকা<hr/></h2><br/>
                            <table class="table table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th>ক্রমিক নং</th>
                                    <th> তারিখ </th>
                                    <th> যোগানদার </th>
                                    <th> বস্তার পরিমান </th>
                                    <th> পণ্যের মূল্য </th>
                                    <th> ছালার মূল্য </th>
                                    <th> মোট মূল্য </th>
                                    <th> অপশন </th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($purchases as $purchase)
                                    <tr class="text-center">
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{$purchase->date}}</td>
                                        <td>{{!empty($purchase->supplier)  ? $purchase->supplier->name : 'N/A'}}</td>
                                        <td>{{$purchase->bag}}</td>
                                        <td>{{number_format($purchase->total_price)}}</td>
                                        <td>{{ number_format($purchase->total_bag_price)}}</td>
                                        <td>{{ number_format($purchase->total)}}</td>
                                        <td>
                                            <button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='{{route('purchase.edit',$purchase->id)}}'" data-toggle="tooltip" title="Edit">Edit</button>
                                            <br/>
                                            <div class="modal fade" id="delete_modal_{{$purchase->id}}" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Delete Purchase</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are You Want To Delete This Purchase</p>
                                                            <p>Once You Delete This Purchase</p>
                                                            <p>You Will Delete the Information Permanently</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            {!! Form::open(['route' => ['purchase.destroy',$purchase->id],'method' => 'DELETE']) !!}
                                                            <button type="submit" class="btn btn-success">submit</button>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-inverse-danger btn-sm btn-block" data-toggle="modal" data-target="#delete_modal_{{$purchase->id}}" data-title="tooltip" title="Delete">Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center text-info">{{'কোনো ক্রয় নেই'}}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            <br/><br/>
                            {!! $purchases->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
