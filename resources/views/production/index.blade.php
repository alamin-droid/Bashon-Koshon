@extends('master')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h2 class="text-center text-info">উৎপাদিত পণ্যের তালিকা<hr/></h2><br/>
                            <table class="table table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th>ক্রমিক নং </th>
                                    <th> তারিখ </th>
                                    <th> উৎপাদিত পণ্য </th>
                                    <th> উৎপাদিত পণ্যের পরিমাণ</th>
                                    <th> উৎপাদিত পণ্যের একক </th>
                                    <th> কাঁচামালের বিবরণ </th>
                                    <th> গোডাউন</th>
                                    <th> অপশন </th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($productions as $production)
                                    @php
                                    $raw_materials = array();
                                        $rawmaterials_id = explode(',',str_replace(str_split('[]""'),'',$production->rawmaterials_id));
                                        $rawmaterials_quantity = explode(',',str_replace(str_split('[]""'),'',$production->rawmaterials_quantity));
                                        $rawmaterials_unit = explode(',',str_replace(str_split('[]""'),'',$production->rawmaterials_unit));
                                    @endphp
                                    <tr class="text-center">
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{$production->date}}</td>
                                        <td>{{!empty($production->finishedgood) ? $production->finishedgood->name : 'N/A'}}</td>
                                        <td>{{$production->finishedgood_quantity}}</td>
                                        <td>{{'KG'}}</td>
                                        <td>
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>কাঁচামাল</th>
                                                    <th>একক</th>
                                                    <th>পরিমাণ</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @for($i=0; $i<count($rawmaterials_id) ; $i++)
                                                    @foreach($rawmaterials as $rawmaterial)
                                                        @if($rawmaterial->id == $rawmaterials_id[$i])
                                                            @php
                                                                $raw_materials[] = $rawmaterial->name;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                @endfor
                                                @for($i=0; $i<count($rawmaterials_id) ; $i++)
                                                    <tr>
                                                        <td>{{$raw_materials[$i]}}</td>
                                                        <td>{{$rawmaterials_quantity[$i]}}</td>
                                                        <td>{{$rawmaterials_unit[$i]}}</td>
                                                    </tr>
                                                @endfor
                                                </tbody>
                                            </table>
                                        </td>
                                        <td>{{!empty($production->warehouse) ? $production->warehouse->name : 'N/A'}}</td>
                                        <td>
                                            {{--                                            <button type="button" class="btn btn-inverse-primary btn-sm btn-block" onclick="window.location='{{route('factory.show',$factory->id)}}'" data-toggle="tooltip" title="Show">Show</button>--}}
                                            <button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='{{route('production.edit',$production->id)}}'" data-toggle="tooltip" title="Edit">Edit</button>
                                            <br/>
                                            <div class="modal fade" id="delete_modal_{{$production->id}}" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Delete Production</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are You Want To Delete This Production</p>
                                                            <p>Once You Delete This Production</p>
                                                            <p>You Will Delete the Information Permanently</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            {!! Form::open(['route' => ['production.destroy',$production->id],'method' => 'DELETE']) !!}
                                                            <button type="submit" class="btn btn-success">submit</button>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-inverse-danger btn-sm btn-block" data-toggle="modal" data-target="#delete_modal_{{$production->id}}" data-title="tooltip" title="Delete">Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center text-info">{{'কোনো উৎপাদিত পণ্য তৈরী হয় নেই'}}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                                <br/><br/>
                                {{$productions->links()}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
