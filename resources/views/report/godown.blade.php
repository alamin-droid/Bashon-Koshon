@extends('master')
@section('content')
    @php
    $total_purchase = 0;
    $total_sell = 0;
    @endphp
    <div class="col-lg-12 text-center"><h3>গোডাউন রিপোর্ট </h3><hr/></div>
    <br/><br/>
    <div class="col-lg-12">
        {!! Form::open(['route' => 'report.date_search_godown','method' => 'GET']) !!}
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
    </div>
    <br/><br/>
    <div class="card">
        <div class="card-body">
            <div id="print_balance_sheet">
                <br/><br/><br/>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-2 text-right"><img src="{{asset('assets/images/logo/n_islam_logo.png')}}" style="width: 70%; margin-top: -25px"> </div>
                        <div class="col-sm-8"><h1 class="text-center"> <b> এন ইসলাম অটো রাইস মিল </b></h1></div>
                        <div class="col-sm-2"></div>
                        <br/><br/>
                        <div class="col-sm-12"><h3 class="text-center" style=" margin-top: -25px">গোডাউন রিপোর্ট</h3></div>
                    </div>
                    <br/>
                    <div class="row text-center">
                        <div class="col-sm-12 text-center text-primary"><h4>{{date('F-d-Y', strtotime($from))}} &nbsp; - &nbsp;{{date('F-d-Y', strtotime($to))}}</h4></div>
                    </div>
                    <br/><br/><br/>
                    <div class="row">
                        <div class="col-sm-6 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title text-center">ক্রয়কৃত কুড়ার তালিকা<hr/></h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr class="text-center">
                                                <th>ক্রমিক নং</th>
                                                <th> তারিখ </th>
                                                <th> পরিমান/ বস্তা</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($purchases_kura as $purchase)
                                                <tr class="text-center">
                                                    <td>{{$counter++}}</td>
                                                    <td>{{date('d-m-Y', strtotime($purchase->date))}}</td>
                                                    <td>{{$purchase->bag}}</td>
                                                </tr>
                                                @php
                                                    $total_purchase += $purchase->bag;
                                                @endphp
                                            @endforeach
                                            @foreach($productions_kura as $production)
                                                <tr class="text-center">
                                                    <td>{{$counter++}}</td>
                                                    <td>{{date('d-m-Y', strtotime($production->date))}}</td>
                                                    <td>{{$production->finishedgood_quantity}}</td>
                                                </tr>
                                                @php
                                                    $total_purchase += $production->finishedgood_quantity;
                                                @endphp
                                            @endforeach
                                            @foreach($shooters_kura as $shooter)
                                                @php
                                                    $shooter['excess_item'] = explode(',',str_replace(str_split('[]""'),'',$shooter->excess_item));
                                                    $shooter['excess_item_qty'] = explode(',',str_replace(str_split('[]""'),'',$shooter->excess_item_qty));
                                                @endphp
                                                @for($i=0;$i<count($shooter->excess_item) ;$i++)
                                                    @if($shooter->excess_item[$i] == '6')
                                                        <tr class="text-center">
                                                            <td>{{$counter++}}</td>
                                                            <td>{{date('d-m-Y', strtotime($shooter->date))}}</td>
                                                            <td>{{$shooter->excess_item_qty[$i]}}</td>
                                                        </tr>
                                                        @php
                                                            $total_purchase += $shooter->excess_item_qty[$i];
                                                        @endphp
                                                    @endif
                                                @endfor
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr class="text-center">
                                                <td colspan="2">মোট</td>
                                                <td>{{$total_purchase}}</td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $counter = 1;
                        @endphp
                        <div class="col-sm-6 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title text-center">বিক্রিত কুড়ার তালিকা<hr/></h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr class="text-center">
                                                <th>ক্রমিক নং</th>
                                                <th> তারিখ </th>
                                                <th> পরিমান/ বস্তা</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($sells as $sell)
                                                @php
                                                    $sell['type_of_rice_kura'] = explode(',',str_replace(str_split('[]""'),'',$sell->type_of_rice));
                                                    $sell['quantity_kura'] = explode(',',str_replace(str_split('[]""'),'',$sell->quantity));
                                                @endphp
                                                @for($i=0;$i<count($sell->type_of_rice_kura) ;$i++)
                                                    @if($sell->type_of_rice_kura[$i] == '6')
                                                        <tr class="text-center">
                                                            <td>{{$counter++}}</td>
                                                            <td>{{date('d-m-Y', strtotime($sell->date))}}</td>
                                                            <td>{{$sell->quantity_kura[$i]}}</td>
                                                        </tr>
                                                        @php
                                                            $total_sell += $sell->quantity_kura[$i];
                                                        @endphp
                                                    @endif
                                                @endfor
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr class="text-center">
                                                <td colspan="2">মোট</td>
                                                <td>{{$total_sell}}</td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 text-center text-info"> <h4>স্টকঃ {{$total_purchase - $total_sell}} বস্তা</h4> </div>
                    </div>
                    @php
                        $counter = 1;
                        $total_purchase = 0;
                        $total_sell = 0;
                    @endphp
                    <br/>
                    <div class="row">
                        <div class="col-sm-6 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title text-center">ক্রয়কৃত চালের তালিকা<hr/></h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr class="text-center">
                                                <th>ক্রমিক নং</th>
                                                <th> তারিখ </th>
                                                <th> পরিমান/ বস্তা</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($productions_rice as $production)
                                                <tr class="text-center">
                                                    <td>{{$counter++}}</td>
                                                    <td>{{date('d-m-Y', strtotime($production->date))}}</td>
                                                    <td>{{$production->finishedgood_quantity}}</td>
                                                </tr>
                                                @php
                                                    $total_purchase += $production->finishedgood_quantity;
                                                @endphp
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr class="text-center">
                                                <td colspan="2">মোট</td>
                                                <td>{{$total_purchase}}</td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $counter = 1;
                        @endphp
                        <div class="col-sm-6 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title text-center">বিক্রিত চালের তালিকা<hr/></h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr class="text-center">
                                                <th>ক্রমিক নং</th>
                                                <th> তারিখ </th>
                                                <th> পরিমান/ বস্তা</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($sells as $sell)
                                                @php
                                                    $sell['type_of_rice_production'] = explode(',',str_replace(str_split('[]""'),'',$sell->type_of_rice));
                                                    $sell['quantity_production'] = explode(',',str_replace(str_split('[]""'),'',$sell->quantity));
                                                @endphp
                                                @for($i=0;$i<count($sell->type_of_rice_production) ;$i++)
                                                    @if($sell->type_of_rice_production[$i] != '5' || $sell->type_of_rice_production[$i] != '6')
                                                        <tr class="text-center">
                                                            <td>{{$counter++}}</td>
                                                            <td>{{date('d-m-Y', strtotime($sell->date))}}</td>
                                                            <td>{{$sell->quantity_production[$i]}}</td>
                                                        </tr>
                                                        @php
                                                            $total_sell += $sell->quantity_production[$i];
                                                        @endphp
                                                    @endif
                                                @endfor
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr class="text-center">
                                                <td colspan="2">মোট</td>
                                                <td>{{$total_sell}}</td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 text-center text-info"> <h4>স্টকঃ {{$total_purchase - $total_sell}} বস্তা</h4> </div>
                    </div>
                    @php
                        $counter = 1;
                        $total_purchase = 0;
                        $total_sell = 0;
                    @endphp
                    <br/>
                    <div class="row">
                        <div class="col-sm-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title text-center">ক্রয়কৃত ধানের তালিকা<hr/></h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr class="text-center">
                                                <th>ক্রমিক নং</th>
                                                <th> তারিখ </th>
                                                <th> পণ্য </th>
                                                <th> পরিমান/ বস্তা</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($purchases_paddy as $purchase)
                                                <tr class="text-center">
                                                    <td>{{$counter++}}</td>
                                                    <td>{{date('d-m-Y', strtotime($purchase->date))}}</td>
                                                    <td>{{!empty($product = \App\Finishedgood::find($purchase->product)) ? $product->name : 'N/A' }}</td>
                                                    <td>{{$purchase->bag}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr class="text-center">
                                                <td colspan="3">মোট</td>
                                                <td>{{$purchases_paddy->sum('bag')}}</td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 text-center text-info"> <h4>স্টকঃ{{$purchases_paddy->sum('bag')}} বস্তা</h4> </div>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
            <br/><br/>
            <div class="row text-center">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <br/>
                        <input type="button" class="print_button btn-gradient-primary btn-block form-control" onclick="printDiv('print_balance_sheet')" value="প্রিণ্ট" />
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
