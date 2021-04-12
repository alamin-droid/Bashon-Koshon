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
        <div class="col-lg-12 grid-margin stretch-card">
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
                                    <th> বেতন</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($payrolls as $payroll)
                                    <tr class="text-center">
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{date('d-m-Y', strtotime($payroll->date))}}</td>
                                        <td>{{number_format($payroll->amount)}} .00</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-info">{{'কোনো বেতন-ভাতা নেই'}}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                                <tfoot>
                                <tr class="text-center">
                                    <td colspan="2">মোট</td>
                                    <td>{{number_format($payrolls->sum('amount'))}}</td>
                                </tr>
                                </tfoot>
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
                                    <th> তারিখ </th>
                                    <th>এন্ট্রি টাইম</th>
                                    <th> এক্সিট টাইম</th>
                                    <th> টোটাল টাইম (ঘন্টা)</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($attendances as $attendance)
                                    <tr class="text-center">
                                        @php
                                            $employee_id = explode(',',str_replace(str_split('[]""'),'',$attendance->employee_id));
                                            $entry_time = explode(',',str_replace(str_split('[]""'),'',$attendance->in_time));
                                            $exit_time = explode(',',str_replace(str_split('[]""'),'',$attendance->out_time));
                                            $total_time = explode(',',str_replace(str_split('[]""'),'',$attendance->total_time));
                                        @endphp
                                        @for($i=0; $i<count($employee_id) ; $i++)
                                            @if($employee->id == $employee_id[$i])
                                                <td>{!! '<h6 class=text-info>'.date('d-m-Y', strtotime($attendance->date)).'</h6>' !!}</td>
                                                <td> {!! ($entry_time[$i] != 'null') ? '<h6 class=text-success>'.date('h:i a', strtotime($entry_time[$i])).'</h6>' : '<h6 class=text-danger>অনুম্পস্থিত</h6>' !!}</td>
                                                <td> {!! ($exit_time[$i] != 'null') ? '<h6 class=text-success>'.date('h:i a', strtotime($exit_time[$i])).'</h6>' : '<h6 class=text-danger>অনুম্পস্থিত</h6>' !!}</td>
                                                <td>{!! $total_time[$i] == 'null' ? '<h6 class=text-danger>অনুম্পস্থিত</h6>' : '<h6 class=text-success>'.$total_time[$i] .'</h6>'!!}</td>
                                            @endif
                                        @endfor
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <br/><br/>
                            {!! $attendances->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
