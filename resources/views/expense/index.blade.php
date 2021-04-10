@extends('master')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-2 float-right"></div>
                        <div class="col-lg-12">
                            <h2 class="text-center text-info"> খরচ<hr/></h2>
                            <br>
                            {!! Form::open(['route' => 'expense.search_date','method' => 'GET']) !!}
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
                                    <th class="text-center"> পণ্য সামগ্রী </th>
                                    <th class="text-center"> খরচ </th>
                                    <th class="text-center"> খরচের মাধ্যম</th>
                                    <th class="text-center"> অপশন </th>
                                </tr>
                                </thead>
                                <tbody id="table">
                                @forelse($expenses as $expense)
                                    <tr>
                                        <td class="text-center">{{ ($expenses->currentpage()-1) * $expenses ->perpage() + $loop->index + 1 }}</td>
                                        <td class="text-center">{{ date('d-m-Y', strtotime($expense->date))}}</td>
                                        <td class="text-center">{{$expense->item_name}}</td>
                                        <td class="text-center">{{$expense->amount}}</td>
                                        <td class="text-center">{{$expense->mode_of_payment_name}}</td>
                                        <td class="text-center">
                                                <button type="button" class="btn btn-inverse-info btn-icon" onclick="window.location='{{route('expense.edit',$expense->id)}}'"><i class="mdi mdi-pencil"></i></button>
                                                <div class="modal fade" id="delete_modal_{{$expense->id}}" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete Expense</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Do You Want To Delete Expense.</p>
                                                                <p>Once You Delete This Expense</p>
                                                                <p>You Will Delete This Expense Information Permanently</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                {!! Form::open(['route' => ['expense.destroy',$expense->id],'method' => 'DELETE']) !!}
                                                                <button type="submit" class="btn btn-success">submit</button>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-inverse-danger btn-icon" data-toggle="modal" data-target="#delete_modal_{{$expense->id}}"><i class="mdi mdi-delete-forever"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-info">{{'কোনো খরচ নেই।'}}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            {!! $expenses->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
