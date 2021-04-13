@extends('master')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h4 class="text-center">কর্মচারী হাজিরা খাতা<hr/></h4>
                            <br>
                            {!! Form::open(['route' => 'attendance.date_search','method' => 'GET']) !!}
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
                            <br>
                            <table class="table table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th> তারিখ </th>
                                    <th> হাজিরা </th>
                                    <th> অপশন </th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($attendances as $attendance)
                                    @php
                                        $attendance['employee_id'] = explode(',',str_replace(str_split('[]""'),'',$attendance->employee_id));
                                        $attendance['in_time'] = explode(',',str_replace(str_split('[]""'),'',$attendance->in_time));
                                        $attendance['out_time'] = explode(',',str_replace(str_split('[]""'),'',$attendance->out_time));
                                        $attendance['total_time'] = explode(',',str_replace(str_split('[]""'),'',$attendance->total_time));
                                    @endphp
                                    <tr class="text-center">
                                        <td>{{date('d-m-Y', strtotime($attendance->date))}}</td>
                                        <td>
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>কর্মচারী</th>
                                                    <th>এন্ট্রি টাইম</th>
                                                    <th>এক্সিট টাইম</th>
                                                    <th>সময়কাল</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @for($i=0; $i<count($attendance->employee_id); $i++)
                                                <tr>
                                                    <td>{{!empty($employee = \App\Employee::find($attendance->employee_id[$i])) ? $employee->name : 'N/A' }}</td>
                                                    <td>{!! ($attendance->in_time[$i] != 'null') ? date('h:i a', strtotime($attendance->in_time[$i]))  : '<h6 class=text-danger>অনুম্পস্থিত</h6>' !!}</td>
                                                    <td>{!! ($attendance->in_time[$i] != 'null') ? date('h:i a', strtotime($attendance->out_time[$i])) : '<h6 class=text-danger>অনুম্পস্থিত</h6>' !!}</td>
                                                    <td>{{$attendance->total_time[$i]}}</td>
                                                </tr>
                                                @endfor
                                                </tbody>
                                            </table>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm btn-block" onclick="window.location='{{route('attendance.edit',$attendance->id)}}'" data-toggle="tooltip" title="Edit">Edit</button>
                                            <br/>
                                            <div class="modal fade" id="delete_modal_{{$attendance->id}}" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Delete Attendance</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are You Want To Delete This Attendance</p>
                                                            <p>Once You Delete This Attendance</p>
                                                            <p>You Will Delete the Information Permanently</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            {!! Form::open(['route' => ['attendance.destroy',$attendance->id],'method' => 'DELETE']) !!}
                                                            <button type="submit" class="btn btn-success">submit</button>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-inverse-danger btn-sm btn-block" data-toggle="modal" data-target="#delete_modal_{{$attendance->id}}" data-title="tooltip" title="Delete">Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center text-info">{{'কোনো হাজিরা দেওয়া নেই'}}</td>
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
