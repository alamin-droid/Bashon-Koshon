@extends('master')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h2 class="text-center text-info">ব্যবহারকারীর তালিকা<hr style=""/></h2><br/>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center">ক্রমিক নং</th>
                                    <th class="text-center"> নাম </th>
                                    <th class="text-center"> ই-মেইল </th>
                                    <th class="text-center"> অপশন </th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($users->count() ==! 0)
                                    @foreach($users as $user)
                                        <tr>
                                            <td class="text-center">{{ ($users->currentpage()-1) * $users ->perpage() + $loop->index + 1 }}</td>
                                            <td class="text-center">{{$user->name}}</td>
                                            <td class="text-center">{{$user->email}}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='{{route('user.edit',$user->id)}}'" data-title="tooltip" title="Edit">Edit</button>
                                                <br/>
                                                <div class="modal fade" id="myModal_user_{{$user->id}}" role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">ব্যবহারকারীর বিস্তারিত</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <div class="row table-responsive">
                                                                            <div class="col-lg-12">
                                                                                <table class="table table-striped">
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th colspan="2">
                                                                                            <img src="{{asset('/assets/images/user/'. $user->image)}}" class="user_image">
                                                                                        </th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <td>নাম</td>
                                                                                        <td>{{$user->name}}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>ই-মেইল</td>
                                                                                        <td>{{$user->email}}</td>

                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>মোবাইল নাম্বার</td>
                                                                                        <td>{{$user->phone}}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>ঠিকানা</td>
                                                                                        <td>{{$user->address}}</td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">বন্ধ করুন</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-inverse-success btn-sm btn-block" data-toggle="modal" data-target="#myModal_user_{{$user->id}}" data-title="tooltip" title="Show">Show</button>
                                                <br/>
                                                <div class="modal fade" id="delete_modal_{{$user->id}}" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete User</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are You Want To Delete These User.Once You Delete These User</p>
                                                                <p>You Will Delete His/Her Information Permanently</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                {!! Form::open(['route' => ['user.destroy',$user->id],'method' => 'DELETE']) !!}
                                                                <button type="submit" class="btn btn-success">submit</button>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-inverse-danger btn-sm btn-block" data-toggle="modal" data-target="#delete_modal_{{$user->id}}" data-title="tooltip" title="Delete">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center text-info">{{'কোনো ব্যবহারকারী নেই'}}</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
