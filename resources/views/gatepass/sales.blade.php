@extends('master')
@section('content')
    @php
        $finishedgood_name = array();
        $total_quantity = 0;
        $finishedgood_id = explode(',',str_replace(str_split('[]""'),'',$sell->finishedgood_id));
        $finishedgood_quantity = explode(',',str_replace(str_split('[]""'),'',$sell->quantity));
    @endphp
    @for($i=0; $i<count($finishedgood_id) ; $i++)
        @foreach($finishedgoods as $finishedgood)
            @if($finishedgood->id == $finishedgood_id[$i])
                @php
                    $finishedgood_name[] = $finishedgood->name;
                @endphp
            @endif
        @endforeach
        @php
            $total_quantity += $finishedgood_quantity[$i];
        @endphp
    @endfor
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div id="print_report">
                        <br/><br/>
                        <div class="row">
                            <div class="col-md-12 text-center"><img src="{{asset('assets/images/logo/N_Islam.png')}}"> </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-md-12"><h3 class="text-info text-center">এন ইসলাম অটো রাইস মিল</h3></div>
                            <div class="col-md-12"><h5 class="text-center">ইসলামিয়া মার্কেট, নীচ তলা, সাতবর্গ বাজার, বিজয়নগর, ব্রাহ্মণবাড়িয়া।</h5></div>
                            <div class="col-md-12"><h5 class="text-center">মোবাইল :01716-273452, 01918-776304</h5></div>
                            <br/><br/>
                            <div class="col-md-12"><h4 class="text-center"><b>বিক্রিত পণ্যের গেট পাস</b><hr/> </h4></div>
                            <br/><br/><br/><br/><br/><br/>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5"><b>বিক্রয় ক্রমিক নং</b></div>
                                    <div class="col-md-1">:</div>
                                    <div class="col-md-5">{{$sell->id}}</div>
                                    <br/><br/>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5"><b>তারিখ</b></div>
                                    <div class="col-md-1">:</div>
                                    <div class="col-md-5">{{$sell->date}}</div>
                                    <br/><br/>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5"><b>গোডাউন</b></div>
                                    <div class="col-md-1">:</div>
                                    <div class="col-md-5">{{!empty($sell->warehouse) ? $sell->warehouse->name : 'N/A'}}</div>
                                    <br/><br/>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5"><b>গ্রাহক</b></div>
                                    <div class="col-md-1">:</div>
                                    <div class="col-md-5">{{!empty($sell->client_id) ? $sell->client->name : $sell->retail_sell}}</div>
                                </div>
                            </div>
                        </div>
                        <br/><br/><br/><br/>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr class="text-center">
                                            <th>ক্রমিক নং</th>
                                            <th>পণ্য</th>
                                            <th>পরিমাণ(কেজি)</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @for($i=0; $i<count($finishedgood_id) ; $i++)
                                            <tr class="text-center">
                                                <td>{{$i + 1}}</td>
                                                <td>{{$finishedgood_name[$i]}}</td>
                                                <td>{{$finishedgood_quantity[$i]}}</td>
                                            </tr>
                                        @endfor
                                        </tbody>
                                        <tfoot>
                                        <tr class="text-center">
                                            <td colspan="2">মোট পরিমাণ</td>
                                            <td> {{$total_quantity}}</td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br/><br/><br/><br/>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10 text-center" style="text-align: justify">
                                <h4>হেড অফিসের অনুমতিক্রমে প্রদত্ত বিক্রিত পণ্য এই গোডাউন হইতে ডেলিভারী দেওয়ার অনুমতি প্রদান করা হইল। এই গেট পাস ব্যাতিত পণ্য বিনিময় করা যাইবে না।</h4>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                        <br/><br/><br/><br/><br/><br/><br/><br/>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-3 text-center">
                                <h4 style="border-top: 3px dotted">গ্রহীতার স্বাক্ষর</h4>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-1"></div>
                            <div class="col-md-3 text-center">
                                <h4 style="border-top: 3px dotted">স্বাক্ষর</h4>
                            </div>
                        </div>
                    </div>
                    <br/><br/>
                    <div class="row text-center">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <br/>
                                <input type="button" class="print_button btn-gradient-primary btn-sm btn-block form-control" onclick="printDiv('print_report')" value="প্রিন্ট স্লিপ" />
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
