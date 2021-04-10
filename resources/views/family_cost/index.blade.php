@extends('master')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-2 float-right"></div>
                        <div class="col-lg-12">
                            <h2 class="text-center text-info">পারিবারিক খরচ<hr/></h2>
                            <br>
                            {!! Form::open(['route' => 'family_cost.search_date','method' => 'GET']) !!}
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
                                @forelse($family_costs as $family_cost)
                                    <tr>
                                        <td class="text-center">{{ ($family_costs->currentpage()-1) * $family_costs ->perpage() + $loop->index + 1 }}</td>
                                        <td class="text-center">{{ date('d-m-Y', strtotime($family_cost->date))}}</td>
                                        <td class="text-center">{{$family_cost->cost_for}}</td>
                                        <td class="text-center">{{$family_cost->amount}}</td>
                                        <td class="text-center">{{$family_cost->mode_of_payment_name}}</td>
                                        <td class="text-center">
                                                <button type="button" class="btn btn-inverse-info btn-icon" onclick="window.location='{{route('family_cost.edit',$family_cost->id)}}'"><i class="mdi mdi-pencil"></i></button>
                                                <div class="modal fade" id="delete_modal_{{$family_cost->id}}" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete Family Expense</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Do You Want To Delete Family Expense.</p>
                                                                <p>Once You Delete This Family Expense</p>
                                                                <p>You Will Delete This Family Expense Information Permanently</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                {!! Form::open(['route' => ['family_cost.destroy',$family_cost->id],'method' => 'DELETE']) !!}
                                                                <button type="submit" class="btn btn-success">submit</button>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-inverse-danger btn-icon" data-toggle="modal" data-target="#delete_modal_{{$family_cost->id}}"><i class="mdi mdi-delete-forever"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-info">{{'কোনো দাপ্তরিক খরচ নেই।'}}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            {!! $family_costs->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
