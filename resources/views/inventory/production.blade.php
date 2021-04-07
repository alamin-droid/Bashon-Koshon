@extends('master')
@section('content')
    @php
        $produced = 0;
        $sold = 0;
    @endphp
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            {!! Form::open(['route' => 'inventory.date_search_production','method' => 'GET']) !!}
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
                                        <div class="col-md-6"><h4 class="project_info_tag text-center">মজুতকৃত পণ্যের রিপোর্ট</h4></div>
                                        <div class="col-md-3">তারিখ :: {{date('Y-m-d')}}</div>
                                    </div>
                                    <br/>
                                @else
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6"><h4 class="project_info_tag text-center">মজুতকৃত পণ্যের রিপোর্ট</h4></div>
                                        <div class="col-md-3">তারিখ :: {{date('d-m-Y')}}</div>
                                    </div>
                                    <br/>
                                @endif
                                <table class="table table-bordered">
                                    <thead>
                                    <tr class="text-center">
                                        <th>ক্রমিক নং</th>
                                        <th> পণ্য </th>
                                        <th> উৎপাদন/কেজি </th>
                                        <th> বিক্রয়/কেজি </th>
                                        <th> অবশিষ্ট/কেজি</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($finishedgoods as $finishedgood)
                                        <tr class="text-center">
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{$finishedgood->name}}</td>
                                            @foreach($productions as $production)
                                                @if($production->finishedgood->id == $finishedgood->id)
                                                    @php
                                                        $produced += $production->finishedgood_quantity;
                                                    @endphp
                                                @endif
                                            @endforeach
                                            <td>{{$produced}}</td>
                                            @foreach($sells as $sell)
                                                @php
                                                    $finishedgood_id = explode(',',str_replace(str_split('[]""'),'',$sell->finishedgood_id));
                                                    $finishedgood_quantity = explode(',',str_replace(str_split('[]""'),'',$sell->quantity));
                                                @endphp
                                                @for($i=0; $i<count($finishedgood_id) ; $i++)
                                                    @if($finishedgood_id[$i] == $finishedgood->id)
                                                        @php
                                                            $sold += $finishedgood_quantity[$i];
                                                        @endphp
                                                    @endif
                                                @endfor
                                            @endforeach
                                            <td>{{$sold}}</td>
                                            <td>{{$produced - $sold}}</td>
                                        </tr>
                                        @php
                                            $produced = 0;
                                            $sold = 0;
                                        @endphp
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-info">{{'কোনো মজুতকৃত পণ্য নেই'}}</td>
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
                                        <input type="button" class="print_button btn-gradient-primary btn-block form-control" onclick="printDiv('printCollection')" value="প্রিণ্ট করুন" />
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
