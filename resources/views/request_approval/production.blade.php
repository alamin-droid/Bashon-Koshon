@extends('master')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h2 class="text-center text-info">উৎপাদন অনুমোদন তালিকা<hr/></h2><br/>
                            <table class="table table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th>ক্রমিক নং</th>
                                    <th> তারিখ </th>
                                    <th> উৎপাদিত পণ্য</th>
                                    <th> পণ্যের বিবরণ </th>
                                    <th> অপশন </th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($productions as $production)
                                    @php
                                        $materials_name = array();
                                            $raw_materials = explode(',',str_replace(str_split('[]""'),'',$production->rawmaterials_id));
                                            $quantity = explode(',',str_replace(str_split('[]""'),'',$production->rawmaterials_quantity));
                                            $unit = explode(',',str_replace(str_split('[]""'),'',$production->rawmaterials_unit));
                                    @endphp
                                    <tr class="text-center">
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{$production->date}}</td>
                                        <td>{{!empty($production->finishedgood) ? $production->finishedgood->name : 'N/A'}}</td>
                                        <td>
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>পণ্য</th>
                                                    <th>পরিমাণ (কেজি)</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @for($i=0; $i<count($raw_materials) ; $i++)
                                                    @foreach($materials as $material)
                                                        @if($material->id == $raw_materials[$i])
                                                            @php
                                                                $materials_name[] = $material->name;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                @endfor
                                                @for($i=0; $i<count($raw_materials) ; $i++)
                                                    <tr>
                                                        <td>{{$materials_name[$i]}}</td>
                                                        <td>{{$quantity[$i]}}</td>
                                                    </tr>
                                                @endfor
                                                </tbody>
                                            </table>
                                        </td>
                                        <td>
                                            @if($production->status != 'approved')
                                                <button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='{{route('request_approval.production_approve',$production->id)}}'" data-toggle="tooltip" title="অনুমোদন">অনুমোদন</button>
                                            @else
                                                <button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='#'" data-toggle="tooltip" title="গেট পাস">গেট পাস</button>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-info">{{'কোনো উৎপাদন অনুমোদন তালিকা নেই'}}</td>
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
