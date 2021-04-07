@extends('master')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            {!! Form::open(['route' => 'bank.balance_search','method' => 'GET']) !!}
                            <input type="hidden" name="id" value="{{$bank->id}}"/>
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
                            <div id="printBalance">
                                <div class="row"><div class="col-md-12"><h2 class="text-center text-info">{{$bank->bank_name}}<hr/></h2><br/></div></div>
                                @if(!empty($from))
                                    <div class="row">
                                        <div class="col-md-3">তারিখ থেকে : {{$from}} <br/> তারিখ পর্যন্ত : {{$to}}</div>
                                        <div class="col-md-6"><h4 class="project_info_tag text-center">ডেবিট এবং ক্রেডিট হিস্টোরি</h4></div>
                                        <div class="col-md-3">তারিখ :: {{date('Y-m-d')}}</div>
                                    </div>
                                    <br/>
                                @else
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6"><h4 class="project_info_tag text-center">ডেবিট এবং ক্রেডিট হিস্টোরি</h4></div>
                                        <div class="col-md-3">তারিখ :: {{date('Y-m-d')}}</div>
                                    </div>
                                    <br/>
                                @endif
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="text-center"> তারিখ </th>
                                        <th class="text-center"> ডেবিট </th>
                                        <th class="text-center"> ক্রেডিট </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @for($i = 0; $i < count($results); $i++)
                                        <tr class="text-center">
                                            <td>{{date('d-m-Y', strtotime($results[$i]['date']))}}</td>
                                            @if(!empty($results[$i]['client_id']))
                                            <td>{{number_format($results[$i]['amount'])}}.00</td>
                                            <td>0.00</td>
                                            @else
                                                <td>0.00</td>
                                                <td>{{number_format($results[$i]['amount'])}}.00</td>
                                            @endif
                                        </tr>
                                    @endfor
                                    </tbody>
                                </table>
                            </div>
                            <div class="row text-center">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <br/>
                                        <input type="button" class="print_button btn-gradient-primary btn-block form-control" onclick="printDiv('printBalance')" value="প্রিন্ট" />
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
