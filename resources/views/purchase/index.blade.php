@extends('master')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h2 class="text-center text-info">ক্রয় তালিকা<hr/></h2><br/>
                            <table class="table table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th>ক্রমিক নং</th>
                                    <th> তারিখ </th>
                                    <th> ক্রয় </th>
                                    <th> গোডাউন</th>
                                    <th> অবস্থা </th>
                                    <th> অপশন </th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($purchases as $purchase)
                                    @php
                                        $total_price = 0;
                                        $materials_name_array = array();
                                        $supplier_name_array = array();
                                            $materials_name = explode(',',str_replace(str_split('[]""'),'',$purchase->rawmaterial_id));
                                            $quantity = explode(',',str_replace(str_split('[]""'),'',$purchase->quantity));
                                            $unit = explode(',',str_replace(str_split('[]""'),'',$purchase->unit));
                                            $rate = explode(',',str_replace(str_split('[]""'),'',$purchase->rate_per_unit));
                                            $supplier_name = explode(',',str_replace(str_split('[]""'),'',$purchase->supplier_id));
                                    @endphp
                                    @for($i=0; $i<count($materials_name) ; $i++)
                                        @foreach($materials as $material)
                                            @if($material->id == $materials_name[$i])
                                                @php
                                                    $materials_name_array[] = $material->name;
                                                @endphp
                                            @endif
                                        @endforeach
                                        @foreach($suppliers as $supplier)
                                            @if($supplier->id == $supplier_name[$i])
                                                @php
                                                    $supplier_name_array[] = $supplier->name;
                                                @endphp
                                            @endif
                                        @endforeach
                                    @endfor
                                    <tr class="text-center">
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{$purchase->date}}</td>
                                        <td>
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>কাঁচামাল</th>
                                                    <th>যোগানদার</th>
                                                    <th>পরিমাণ</th>
                                                    <th>একক</th>
                                                    <th>মূল্য/কেজি</th>
                                                    <th>মোট মূল্য (৳)</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @for($i=0; $i<count($materials_name) ; $i++)
                                                <tr>
                                                    <td>{{$materials_name_array[$i]}}</td>
                                                    <td>{{$supplier_name_array[$i]}}</td>
                                                    <td>{{$quantity[$i]}}</td>
                                                    <td>{{$unit[$i]}}</td>
                                                    <td>{{$rate[$i]}}</td>
                                                    <td>{{number_format($quantity[$i] * $rate[$i])}}</td>
                                                </tr>
                                                    @php
                                                        $total_price += $quantity[$i] * $rate[$i];
                                                    @endphp
                                                @endfor
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <td colspan="5">মোট ক্রয় মূল্য (৳)</td>
                                                    <td>{{number_format($total_price)}}</td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </td>
                                        <td>{{!empty($purchase->warehouse) ? $purchase->warehouse->name : 'N/A'}}</td>
                                        <td>{{$purchase->status}}</td>
                                        <td>
                                            <button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='{{route('purchase.edit',$purchase->id)}}'" data-toggle="tooltip" title="Edit">Edit</button>
                                            <br/>
                                            <div class="modal fade" id="delete_modal_{{$purchase->id}}" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Delete Purchase</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are You Want To Delete This Purchase</p>
                                                            <p>Once You Delete This Purchase</p>
                                                            <p>You Will Delete the Information Permanently</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            {!! Form::open(['route' => ['purchase.destroy',$purchase->id],'method' => 'DELETE']) !!}
                                                            <button type="submit" class="btn btn-success">submit</button>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-inverse-danger btn-sm btn-block" data-toggle="modal" data-target="#delete_modal_{{$purchase->id}}" data-title="tooltip" title="Delete">Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="11" class="text-center text-info">{{'কোনো ক্রয় নেই'}}</td>
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
