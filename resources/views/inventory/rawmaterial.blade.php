@extends('master')
@section('content')
    @php
        $purchased = 0;
        $used = 0;
        $total = 0;
    @endphp
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            {!! Form::open(['route' => 'inventory.date_search_raw_materials','method' => 'GET']) !!}
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
                            <div id="printCollection">
                                <br/><br/><br/>
                                @if(!empty($from))
                                    <div class="row">
                                        <div class="col-md-3">থেকে : {{$from}} <br/> পর্যন্ত : {{$to}}</div>
                                        <div class="col-md-6"><h4 class="project_info_tag text-center">মজুতকৃত কাঁচামালের রিপোর্ট</h4></div>
                                        <div class="col-md-3">তারিখ :: {{date('Y-m-d')}}</div>
                                    </div>
                                    <br/>
                                @else
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6"><h4 class="project_info_tag text-center">মজুতকৃত কাঁচামালের রিপোর্ট</h4></div>
                                        <div class="col-md-3">তারিখ :: {{date('d-m-Y')}}</div>
                                    </div>
                                    <br/>
                                @endif
                                <table class="table table-bordered">
                                    <thead>
                                    <tr class="text-center">
                                        <th>ক্রমিক নং</th>
                                        <th> পণ্য </th>
                                        <th> ক্রয়/কেজি </th>
                                        <th> উৎপাদনে ব্যবহৃত /কেজি</th>
                                        <th> অবশিষ্ট/কেজি</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($rawmaterials as $rawmaterial)
                                        <tr class="text-center">
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{$rawmaterial->name}}</td>
                                            @foreach($purchases as $purchase)
                                                @php
                                                        $materials_name = explode(',',str_replace(str_split('[]""'),'',$purchase->rawmaterial_id));
                                                        $quantity = explode(',',str_replace(str_split('[]""'),'',$purchase->quantity));
                                                @endphp
                                            @for($i=0;$i<count($materials_name) ; $i++)
                                                @if($materials_name[$i] == $rawmaterial->id)
                                                    @php
                                                        $purchased += $quantity[$i];
                                                    @endphp
                                                @endif
                                            @endfor
                                            @endforeach
                                            <td>{{$purchased}}</td>
                                            @foreach($productions as $production)
                                                @php
                                                    $rawmaterials_id = explode(',',str_replace(str_split('[]""'),'',$production->rawmaterials_id));
                                                    $rawmaterials_quantity = explode(',',str_replace(str_split('[]""'),'',$production->rawmaterials_quantity));
                                                @endphp
                                                @for($i=0; $i<count($rawmaterials_id) ; $i++)
                                                    @if($rawmaterials_id[$i] == $rawmaterial->id)
                                                        @php
                                                            $used += $rawmaterials_quantity[$i];
                                                        @endphp
                                                    @endif
                                                @endfor
                                            @endforeach
                                            <td>{{$used}}</td>
                                            <td>{{$purchased - $used}}</td>
                                        </tr>
                                        @php
                                            $purchased = 0;
                                            $used = 0;
                                            $total = 0;
                                        @endphp
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-info">{{'কোনো কাঁচামাল নেই'}}</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <br/>
                            <br/>
                                <div class="row text-center">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <br/>
                                            <input type="button" class="print_button btn-gradient-primary btn-block form-control" onclick="printDiv('printCollection')" value="প্রিন্ট করুন" />
                                        </div>
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
