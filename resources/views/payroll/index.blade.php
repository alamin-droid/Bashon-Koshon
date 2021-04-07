@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(['route' => 'payroll.date_search','method' => 'GET']) !!}
                        <div class="row text-center">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="age">তারিখ থেকে</label>
                                    <input type="date" class="form-control" id="date_from" name="date_from" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="age">তারিখ পর্যন্ত</label>
                                    <input type="date" class="form-control" id="date_to" name="date_to" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="none"></label>
                                    <button class="btn btn-gradient-primary btn-lg btn-block form-control" id="search_balance">খুজুন</button>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                            <br/><br/>
                            <div class="row table-responsive">
                                <div class="col-lg-12">
                                    @if(!empty($from))
                                        <div class="row">
                                            <div class="col-md-3">তারিখ থেকে : {{date('d-m-Y', strtotime($from))}} <br/> তারিখ পর্যন্ত : {{date('d-m-Y', strtotime($to))}}</div>
                                            <div class="col-md-6"><h4 class="project_info_tag text-center">বেতন-ভাতা রিপোর্ট<hr/></h4></div>
                                            <div class="col-md-3">তারিখ :: {{date('Y-m-d')}}</div>
                                        </div>
                                        <br/>
                                    @else
                                        <h2 class="text-center text-info">বেতন-ভাতা রিপোর্ট<hr/></h2><br/>
                                    @endif
                                    <table class="table table-striped">
                                        <thead>
                                        <tr class="text-center">
                                            <th> ক্রমিক নং</th>
                                            <th> তারিখ</th>
                                            <th> মাস</th>
                                            <th> কর্মচারী</th>
                                            <th> বেতন</th>
                                            <th> ওভারটাইম </th>
                                            <th> বেতন কর্তন </th>
                                            <th> মোট </th>
                                            <th> অপশন</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($payrolls as $payroll)
                                            <tr class="text-center">
                                                <td>{{$loop->index+1}}</td>
                                                <td>{{date('d-m-Y', strtotime($payroll->date))}}</td>
                                                <td>{{date('F Y', strtotime($payroll->month))}}</td>
                                                <td>{{!empty($payroll->employee) ? $payroll->employee->name : 'N/A'}}</td>
                                                <td>{{!empty($payroll->salary) ? number_format($payroll->salary) : '0'}} .00</td>
                                                <td>{{!empty($payroll->overtime) ? number_format($payroll->overtime) : '0'}} .00</td>
                                                <td>{{!empty($payroll->salary_deduction) ? number_format($payroll->salary_deduction) : '0'}} .00</td>
                                                <td>{{number_format($payroll->net_amount)}} .00</td>
                                                <td>
                                                    <button type="button" class="btn btn-inverse-primary btn-sm btn-block" onclick="window.location='{{route('payroll.edit',$payroll->id)}}'" data-toggle="tooltip" title="Edit">Edit</button>
                                                    <br/>
                                                    <div class="modal fade" id="delete_modal_{{$payroll->id}}" role="dialog">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Delete Payroll</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Do You Want To Delete This Payroll.</p>
                                                                    <p>Once You Delete This Payroll</p>
                                                                    <p>You Will Delete This Payroll Information Permanently</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                    {!! Form::open(['route' => ['payroll.destroy',$payroll->id],'method' => 'DELETE']) !!}
                                                                    <button type="submit" class="btn btn-success">submit</button>
                                                                    {!! Form::close() !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-inverse-danger btn-sm btn-block" data-toggle="modal" data-target="#delete_modal_{{$payroll->id}}" data-title="tooltip" title="Delete">Delete</button>
                                                    <br/>
                                                    <button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='{{route('payroll.payslip',$payroll->id)}}'" data-toggle="tooltip" title="Payslip">Payslip</button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9" class="text-center text-info">{{'কোনো বেতন-ভাতা নেই'}}</td>
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
    </div>
@endsection
