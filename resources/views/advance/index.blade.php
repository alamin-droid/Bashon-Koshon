@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(['route' => 'advance.date_search','method' => 'GET']) !!}
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
                                        <div class="col-md-6"><h4 class="project_info_tag text-center">অগ্রীম বেতন-ভাতা তালিকা<hr/></h4></div>
                                        <div class="col-md-3">তারিখ :: {{date('Y-m-d')}}</div>
                                    </div>
                                    <br/>
                                @else
                                    <h2 class="text-center text-info">অগ্রীম বেতন-ভাতা তালিকা<hr/></h2><br/>
                                @endif
                                <table class="table table-striped">
                                    <thead>
                                    <tr class="text-center">
                                        <th> ক্রমিক নং</th>
                                        <th> তারিখ </th>
                                        <th> কর্মচারীর নাম</th>
                                        <th> টাকার পরিমাণ</th>
                                        <th> প্রতি মাসে পরিশোধিত টাকার পরিমাণ</th>
                                        <th> মোট পরিশোধিত টাকা</th>
                                        <th> বাকী টাকার পরিমাণ</th>
                                        <th> অপশন</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($advances as $advance)
                                        <tr class="text-center">
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{date('d-m-Y', strtotime($advance->date))}}</td>
                                            <td>{{!empty($advance->employee) ? $advance->employee->name : 'N/A'}}</td>
                                            <td>{{!empty($advance->amount) ? number_format($advance->amount) : '0'}} .00</td>
                                            <td>{{!empty($advance->repaid_per_month) ? number_format($advance->repaid_per_month) : '0'}} .00</td>
                                            <td>{{!empty($advance->total_paid) ? number_format($advance->total_paid) : '0'}} .00</td>
                                            <td>{{!empty($advance->due_amount) ? number_format($advance->due_amount) : '0'}} .00</td>
                                            <td>
                                                <button type="button" class="btn btn-inverse-primary btn-sm btn-block" onclick="window.location='{{route('advance.edit',$advance->id)}}'" data-toggle="tooltip" title="Edit">Edit</button>
                                                <br/>
                                                <div class="modal fade" id="delete_modal_{{$advance->id}}" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete Advance</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Do You Want To Delete This Advance.</p>
                                                                <p>Once You Delete This Advance</p>
                                                                <p>You Will Delete This Advance Information Permanently</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                {!! Form::open(['route' => ['advance.destroy',$advance->id],'method' => 'DELETE']) !!}
                                                                <button type="submit" class="btn btn-success">submit</button>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-inverse-danger btn-sm btn-block" data-toggle="modal" data-target="#delete_modal_{{$advance->id}}" data-title="tooltip" title="Delete">Delete</button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center text-info">{{'কোনো অগ্রীম বেতন-ভাতা নেই'}}</td>
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
