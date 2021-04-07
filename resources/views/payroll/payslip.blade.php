@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="print_payslip">
                        <div class="payslip" style="border: 1px solid">
                            <br/><br/>
                            <div class="row">
                                <div class="col-sm-12 text-center"><img src="{{asset('assets/images/logo/N_Islam.png')}}"> </div>
                                <div class="col-sm-12"><h3 class="text-info text-center">এন ইসলাম অটো রাইস মিল</h3></div>
                                <div class="col-sm-12"><h5 class="text-center">ইসলামিয়া মার্কেট, নীচ তলা, সাতবর্গ বাজার, বিজয়নগর, ব্রাহ্মণবাড়িয়া।</h5></div>
                                <div class="col-sm-12"><h5 class="text-center">মোবাইল :01716-273452, 01918-776304</h5></div>
                                <br/><br/>
                                <div class="col-sm-12"><h4 class="text-center"><b> {{date('F, Y', strtotime($payroll->month))}} মাসের বেতনের স্লিপ</b>  </h4></div>
                                <br/><br/>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-2"><b>তারিখ</b></div>
                                        <div class="col-sm-1">:</div>
                                        <div class="col-sm-8">{{date('d-m-Y',strtotime($payroll->date))}}</div>
                                        <br/><br/>
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-2"><b>কর্মচারীর নাম</b></div>
                                        <div class="col-sm-1">:</div>
                                        <div class="col-sm-8">{{!empty($payroll->employee) ? $payroll->employee->name : 'N/A'}}</div>
                                        <br/><br/>
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-2"><b>মোবাইল নাম্বার</b></div>
                                        <div class="col-sm-1">:</div>
                                        <div class="col-sm-8">{{!empty($payroll->employee) ? $payroll->employee->phone : 'N/A'}}</div>
                                        <br/><br/>
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-2"><b>ঠিকানা</b></div>
                                        <div class="col-sm-1">:</div>
                                        <div class="col-sm-8">{{!empty($payroll->employee) ? $payroll->employee->address : 'N/A'}}</div>
                                        <br/><br/>
                                    </div>
                                </div>
                            </div>
                            <br/><br/>
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-10">
                                    <table class="table table-borderless">
                                        <thead>
                                        <tr class="text-center">
                                            <th><b>আয়</b></th>
                                            <th><b>টাকার পরিমাণ</b></th>
                                            <th><b>কর্তন</b></th>
                                            <th><b>টাকার পরিমাণ</b></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="text-center">
                                            <td>মূল বেতন</td><td>{{number_format($payroll->salary)}}.00</td>
                                            <td>বেতন কর্তন</td><td>{{!empty($payroll->salary_deduction) ? number_format($payroll->salary_deduction) : '0'}}.00</td>
                                        </tr>
                                        <tr class="text-center">
                                            <td>ওভারটাইম</td><td>{{!empty($payroll->overtime) ? number_format($payroll->overtime) : '0'}}.00</td>
                                            <td>অগ্রীম</td><td>{{number_format($advance)}}.00</td>
                                        </tr>
                                        <tr class="text-center">
                                            <td><b>মোট আয়</b></td>
                                            <td><b>{{number_format($payroll->salary + $payroll->overtime)}}.00</b></td>
                                            <td><b>মোট কর্তন</b></td>
                                            <td><b>{{!empty($payroll->salary_deduction) ? number_format($payroll->salary_deduction + $advance) : number_format($advance)}}.00</b></td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr class="text-center">
                                            <td colspan="2"><b>মোট টাকার পরিমাণ</b></td>
                                            <td colspan="2" ><b>{{number_format($payroll->net_amount -  $advance)}}.00</b></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <br/><br/><br/>
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-3 text-center">
                                    <h4 style="border-top: 3px dotted">কর্মচারীর স্বাক্ষর</h4>
                                </div>
                                <div class="col-sm-4"></div>
                                <div class="col-sm-3 text-center">
                                    <h4 style="border-top: 3px dotted">কর্তৃপক্ষের স্বাক্ষর</h4>
                                </div>
                            </div>
                            <br/><br/>
                        </div>
                        </div>
                        <br/><br/>
                        <div class="row text-center">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <br/>
                                    <input type="button" class="print_button btn-gradient-primary btn-block form-control" onclick="printDiv('print_payslip')" value="Print" />
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
