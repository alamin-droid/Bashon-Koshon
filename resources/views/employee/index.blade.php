@extends('master')
@section('content')
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row table-responsive">
                            <div class="col-lg-12">
                                <h2 class="text-center text-info">কর্মচারী তালিকা<hr/></h2><br/>
                                <br>
                                {!! Form::open(['route' => 'employee.search','method' => 'GET']) !!}
                                <div class="row text-center">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="item" name="item" placeholder="Search in table.....">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <button class="btn btn-gradient-info btn-lg btn-block" id="search_balance">খুজুন</button>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                                <br>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th class="text-center">ক্রমিক নং</th>
                                        <th class="text-center">ছবি</th>
                                        <th class="text-center"> নাম </th>
                                        <th class="text-center"> মোবাইল নাম্বার </th>
                                        <th class="text-center"> অপশন </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($employees as $employee)
                                        <tr>
                                            <td class="text-center">{{ ($employees->currentpage()-1) * $employees ->perpage() + $loop->index + 1 }}</td>
                                            <td class="text-center"><img src="{{asset('assets/images/employees/'.$employee->image)}}" alt=""></td>
                                            <td class="text-center">{{$employee->name}}</td>
                                            <td class="text-center">{{$employee->phone}}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-inverse-primary btn-sm btn-block" onclick="window.location='{{route('employee.show',$employee->id)}}'" data-toggle="tooltip" title="Show">Show</button>
                                                <br/>
                                                <button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='{{route('employee.edit',$employee->id)}}'" data-toggle="tooltip" title="Edit">Edit</button>
                                                <br/>
                                                <div class="modal fade" id="delete_modal_{{$employee->id}}" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete Employee</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are You Want To Delete This Employee</p>
                                                                <p>Once You Delete This Employee</p>
                                                                <p>You Will Delete His/Her Information Permanently</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                {!! Form::open(['route' => ['employee.destroy',$employee->id],'method' => 'DELETE']) !!}
                                                                <button type="submit" class="btn btn-success">submit</button>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-inverse-danger btn-sm btn-block" data-toggle="modal" data-target="#delete_modal_{{$employee->id}}" data-title="tooltip" title="Delete">Delete</button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-info">{{'কোনো কর্মচারীর তালিকা নেই'}}</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                                <br/><br/>
                                {!! $employees->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
