@extends('master')
@section('content')
    <br/><br/>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center"><img class="client_image" src="{{asset('/assets/images/employees/'. $employee->image)}}" alt="Employee_image"></div>
                            <br/>
                            <div><span class="project_info_tag">নাম :</span> <span class="project_info_details"> {{$employee->name}}</span> </div><br/>
                            <div><span class="project_info_tag">ইমেইল :</span> <span class="project_info_details"> {{$employee->email}}</span> </div><br/>
                            <div><span class="project_info_tag">মোবাইল :</span> <span class="project_info_details"> {{$employee->phone}}</span> </div><br/>
                            <div><span class="project_info_tag">ঠিকানা :</span> <span class="project_info_details"> {{$employee->address}}</span> </div><br/>
                            <div><span class="project_info_tag">বয়স :</span> <span class="project_info_details"> {{$employee->age}}</span> </div><br/>
                            <div><span class="project_info_tag">কাজ শুরুর তারিখ :</span> <span class="project_info_details"> {{date('d-m-Y', strtotime($employee->joining_date))}}</span></div><br/>
                            <div><span class="project_info_tag">চুক্তি :</span> <span class="project_info_details"> {{$employee->contract}} Years</span></div><br/>
                            <div><span class="project_info_tag">জীবন বৃত্তান্ত :</span> <span class="project_info_details" style="margin-left: 20px"> <a href="{{asset('/assets/images/employees/cv/'. $employee->cv)}}" class="btn btn-info"  target="_blank">CV</a> </span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                                <h2 class="text-center text-info">অগ্রীম বেতন-ভাতা তালিকা<hr/></h2><br/>
                            <table class="table table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th> ক্রমিক নং</th>
                                    <th> তারিখ </th>
                                    <th> টাকার পরিমাণ</th>
                                    <th> মোট পরিশোধিত টাকা</th>
                                    <th> বকেয়া</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($advances as $advance)
                                    <tr class="text-center">
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{date('d-m-Y', strtotime($advance->date))}}</td>
                                        <td>{{!empty($advance->amount) ? number_format($advance->amount) : '0'}} .00</td>
                                        <td>{{!empty($advance->total_paid) ? number_format($advance->total_paid) : '0'}} .00</td>
                                        <td>{{!empty($advance->due_amount) ? number_format($advance->due_amount) : '0'}} .00</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-info">{{'কোনো অগ্রীম বেতন-ভাতা নেই'}}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                                <tfoot>
                                <tr class="text-center">
                                    <td colspan="4">মোট বকেয়া</td>
                                    <td>{{!empty($advance->due_amount) ? number_format($advances->sum('due_amount')) : '0'}}.00</td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                                <h2 class="text-center text-info">বেতন-ভাতা রিপোর্ট<hr/></h2><br/>
                            <table class="table table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th> ক্রমিক নং</th>
                                    <th> তারিখ</th>
                                    <th> মাস</th>
                                    <th>বেতন</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($payrolls as $payroll)
                                    <tr class="text-center">
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{date('d-m-Y', strtotime($payroll->date))}}</td>
                                        <td>{{date('F Y', strtotime($payroll->month))}}</td>
                                        <td>{{number_format($payroll->net_amount)}} .00</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-info">{{'কোনো বেতন-ভাতা নেই'}}</td>
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
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h2 class="text-center text-info">হাজিরা তালিকা<hr/></h2><br/>
                            <table class="table table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th> ক্রমিক নং</th>
                                    <th> তারিখ </th>
                                    <th>এন্ট্রি টাইম</th>
                                    <th> এক্সিট টাইম</th>
                                    <th> টোটাল টাইম (ঘন্টা)</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($attendances as $attendance)
                                    <tr class="text-center">
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{date('d-m-Y', strtotime($attendance->date))}}</td>
                                        @php
                                            $employee_id = explode(',',str_replace(str_split('[]""'),'',$attendance->employee_id));
                                            $entry_time = explode(',',str_replace(str_split('[]""'),'',$attendance->in_time));
                                            $exit_time = explode(',',str_replace(str_split('[]""'),'',$attendance->out_time));
                                            $total_time = explode(',',str_replace(str_split('[]""'),'',$attendance->total_time));
                                        @endphp
                                        @for($i=0; $i<count($employee_id) ; $i++)
                                            @if($employee->id == $employee_id[$i])
                                            <td>{{$entry_time[$i] == 'null' ? 'অনুপস্থিত' : $entry_time[$i]}}</td>
                                            <td>{{$exit_time[$i] == 'null' ? 'অনুপস্থিত' : $exit_time[$i]}}</td>
                                            <td>{{$total_time[$i] == 'null' ? 'অনুপস্থিত' : $total_time[$i]}}</td>
                                            @endif
                                        @endfor
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-info">{{'কোনো হাজিরা নেই'}}</td>
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
