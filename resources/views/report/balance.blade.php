@extends('master')
@section('content')
    <div class="col-lg-12 text-center"><h3>অর্থনৈতিক বিবৃতির অবস্থান </h3><hr/></div>
    <br/><br/>
    <div class="col-lg-12">
        {!! Form::open(['route' => 'report.date_search_balance_sheet','method' => 'GET']) !!}
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
                    <div class="row text-center">
                        <div class="col-md-12"><h3>অর্থনৈতিক বিবৃতির অবস্থান</h3></div>
                        <br/>
                        @if(date('Y') == date('Y', strtotime($to)) && empty($from))
                            <div class="col-md-12 text-center text-primary"><h3>as 31 Dec' {{date('Y')}}</h3></div>
                        @else
                            <div class="col-md-12 text-center text-primary"><h4>{{date('F-d-Y', strtotime($from))}} &nbsp; - &nbsp;{{date('F-d-Y', strtotime($to))}}</h4></div>
                        @endif
                    </div>
                    <br/><br/><br/>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 text-center"><h3>খরচ</h3><hr/></div>
                                <div class="col-md-6"><h4 class="text-center">পার্টিকুলার<hr/></h4></div>
                                <div class="col-md-6"><h4 class="text-center">টাকা<hr/></h4></div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-6"><h5>পেমেন্ট</h5></div>
                                <div class="col-md-4"><h5>{{number_format($payments->sum('amount'))}}.00</h5></div>
                                <div class="col-md-2"></div>
                                <div class="col-md-6"><h5>দাপ্তরিক খরচ</h5></div>
                                <div class="col-md-4"><h5>{{number_format($administratives->sum('amount'))}}.00</h5></div>
                                <div class="col-md-2"></div>
                                <div class="col-md-6"><h5>অগ্রীম</h5></div>
                                <div class="col-md-4"><h5>{{number_format($advances->sum('due_amount'))}}.00</h5></div>
                                <div class="col-md-2"></div>
                                <div class="col-md-6"><h5>বেতন-ভাতা</h5></div>
                                <div class="col-md-4"><h5>{{number_format($payrolls->sum('net_amount'))}}.00</h5></div>
                                <div class="col-md-12"><hr/></div>
                                <div class="col-md-6"><h3 class="text-info text-center">মোট</h3></div>
                                <div class="col-md-6"><h3 class="text-info text-center">{{number_format($payments->sum('amount') + $administratives->sum('amount') + $advances->sum('due_amount') + $payrolls->sum('net_amount'))}}.00</h3></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 text-center"><h3>জমা</h3><hr/></div>
                                <div class="col-md-6"><h4 class="text-center">পার্টিকুলার<hr/></h4></div>
                                <div class="col-md-6"><h4 class="text-center">টাকা<hr/></h4></div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-6"><h5>কালেকশন</h5></div>
                                <div class="col-md-4"><h5>{{number_format($collections->sum('amount'))}}.00</h5></div>
                                <br/><br/><br/><br/><br/><br/>
                                <div class="col-md-12"><hr/></div>
                                <div class="col-md-6"><h3 class="text-info text-center">মোট</h3></div>
                                <div class="col-md-6"><h3 class="text-info text-center">{{number_format($collections->sum('amount'))}}.00</h3></div>
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
