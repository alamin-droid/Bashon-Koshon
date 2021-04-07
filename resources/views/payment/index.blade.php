@extends('master')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-2 float-right"></div>
                        <div class="col-lg-12">
                            <h2 class="text-center text-info">পেমেন্ট তালিকা<hr/></h2><br/>
                            <br>
                            {!! Form::open(['route' => 'payment.search_date','method' => 'GET']) !!}
                            <div class="row text-center">
                                <div class="col-md-2"></div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="age">তারিখ থেকে</label>
                                        <input type="date" class="form-control" id="date_from" name="date_from">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="age">তারিখ পর্যন্ত</label>
                                        <input type="date" class="form-control" id="date_to" name="date_to">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="none"></label>
                                        <button class="btn btn-gradient-primary btn-lg btn-block form-control" id="search_balance">খুজুন</button>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center">ক্রমিক নং</th>
                                    <th class="text-center"> তারিখ </th>
                                    <th class="text-center"> যোগানদার </th>
                                    <th class="text-center"> টাকার পরিমাণ </th>
                                    <th class="text-center"> টাকা প্রদানের মাধ্যম</th>
                                    <th class="text-center"> অপশন </th>
                                </tr>
                                </thead>
                                <tbody id="table">
                                @forelse($payments as $payment)
                                    <tr>
                                        <td class="text-center">{{ ($payments->currentpage()-1) * $payments ->perpage() + $loop->index + 1 }}</td>
                                        <td class="text-center">{{date('d-m-Y', strtotime($payment->date))}}</td>
                                        <td class="text-center">{{!empty($payment->supplier) ? $payment->supplier->name : 'N/A'}}</td>
                                        <td class="text-center">{{$payment->amount}}</td>
                                        <td class="text-center">{{$payment->mode_of_payment_name}}</td>
                                        <td class="text-center">
                                                <button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='{{route('payment.edit',$payment->id)}}'" data-toggle="tooltip" title="Edit">Edit</button>
                                            <br/>
                                                <div class="modal fade" id="delete_modal_{{$payment->id}}" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete Payment</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are You Want To Delete This Collection.Once You Delete This Payment</p>
                                                                <p>You Will Delete This Payment Information Permanently</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                {!! Form::open(['route' => ['payment.destroy',$payment->id],'method' => 'DELETE']) !!}
                                                                <button type="submit" class="btn btn-success">submit</button>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-inverse-danger btn-sm btn-block" data-toggle="modal" data-target="#delete_modal_{{$payment->id}}" data-title="tooltip" title="Delete">Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-info">{{'কোনো পেমেন্ট নেই।'}}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            {!! $payments->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
