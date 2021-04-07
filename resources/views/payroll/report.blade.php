@extends('master')
@section('content')
    @php
    $loan_amount = 0;
    @endphp
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(['route' => 'payroll.report_date_search','method' => 'GET']) !!}
                        <div class="row text-center">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="age">Date From</label>
                                    <input type="date" class="form-control" id="date_from" name="date_from" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="age">Date To</label>
                                    <input type="date" class="form-control" id="date_to" name="date_to" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="none"></label>
                                    <button class="btn btn-gradient-primary btn-lg btn-block form-control" id="search_balance">Search</button>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                        <br/><br/>
                        <div id="print_report">
                            <br/><br/><br/>
                        <div class="row table-responsive">
                            <div class="col-lg-12">
                                @if(!empty($from))
                                    <div class="row">
                                        <div class="col-md-3">From : {{$from}} <br/> To : {{$to}}</div>
                                        <div class="col-md-6"><h4 class="project_info_tag text-center">Payroll Report Sheet<hr/></h4></div>
                                        <div class="col-md-3">Date :: {{date('Y-m-d')}}</div>
                                    </div>
                                    <br/>
                                @else
                                    <h2 class="text-center text-info">Payroll Report Sheet<hr/></h2><br/>
                                @endif
                                <table class="table table-striped">
                                    <thead>
                                    <tr class="text-center">
                                        <th> S/L</th>
                                        <th> Month</th>
                                        <th> Employee</th>
                                        <th> Department</th>
                                        <th> Salary</th>
                                        <th> KPI</th>
                                        <th> Performance Bonus</th>
                                        <th> Apprisal</th>
                                        <th> Bonus</th>
                                        <th> Leave Deduction</th>
                                        <th> Late Attendance Fee</th>
                                        <th> Loan</th>
                                        <th> Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($payrolls as $payroll)
                                        <tr class="text-center">
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$payroll->month}}</td>
                                            <td>{{!empty($payroll->employee) ? $payroll->employee->name : 'N/A'}}</td>
                                            <td>{{!empty($payroll->department) ? $payroll->department->department_name : 'N/A'}}</td>
                                            <td>{{!empty($payroll->salary) ? $payroll->salary : '0'}} .00</td>
                                            <td>{{!empty($payroll->kpi) ? $payroll->kpi : '0'}} .00</td>
                                            <td>{{!empty($payroll->performance_bonus) ? $payroll->performance_bonus : '0'}} .00</td>
                                            <td>{{!empty($payroll->apprisal) ? $payroll->apprisal : '0'}} .00</td>
                                            <td>{{!empty($payroll->bonus) ? $payroll->bonus : '0'}} .00</td>
                                            <td>{{!empty($payroll->leave_deduction) ? ($payroll->leave_deduction * $payroll->number_of_leaves) : '0'}} .00</td>
                                            <td>{{!empty($payroll->late_attendance) ? ($payroll->late_attendance * $payroll->late_attendance_fee) : '0'}} .00</td>
                                            <td>
                                                @php
                                                    foreach($loans as $loan){
                                                    if($loan->employee_id == $payroll->employee_id){
                                                        $loan_amount += $loan->repaid_p_m;
                                                    }
                                                }
                                                @endphp
                                                {{$loan_amount}}.00
                                            </td>
                                            <td>{{$payroll->net_amount -  $loan_amount}} .00</td>
                                            @php
                                                $loan_amount = 0;
                                            @endphp
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="12" class="text-center text-info">{{'No Payroll Created Yet'}}</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                        <br/><br/>
                        <div class="row text-center">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <br/>
                                    <input type="button" class="print_button btn-gradient-primary btn-block form-control" onclick="printDiv('print_report')" value="Print" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function printDiv(divName)
        {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@endsection
