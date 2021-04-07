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
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-1 text-right"><img src="{{asset('assets/images/logo/n_islam_logo.png')}}" style="width: 100%;"> </div>
                                <div class="col-sm-8"><h3 class="text-center">এন ইসলাম অটো রাইস মিল</h3></div>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-12"><h5 class="text-center">মোঃ নজরুল ইসলাম</h5></div>
                                <div class="col-sm-12"><h5 class="text-center">উন্নতমানের ধান, আতপ ও সিদ্ধ চাউল বিক্রেতা।</h5></div>
                                <div class="col-sm-12"><h5 class="text-center">ইসলামিয়া মার্কেট, নীচ তলা, সাতবর্গ বাজার, বিজয়নগর, ব্রাহ্মণবাড়িয়া।</h5></div>
                                <div class="col-sm-12"><h5 class="text-center">মোবাইল :01716-273452, 01918-776304</h5></div>
                                <br/><br/>
                                <div class="col-sm-5"></div>
                                <div class="col-sm-2"><h6 class="text-center" style="border: 2px solid"><b>চালান</b></h6></div>
                                <div class="col-sm-5"></div>
                            </div>
                            <br/><br/>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-4">গ্রাহক আইডি</div>
                                        <div class="col-sm-1">:</div>
                                        <div class="col-sm-7">{{$sell->client->id}}</div>
                                        <div class="col-sm-4">গ্রাহকের নাম</div>
                                        <div class="col-sm-1">:</div>
                                        <div class="col-sm-7">{{!empty($sell->client) ? $sell->client->name : 'N/A'}}</div>
                                        <div class="col-sm-4">মোবাইল নাম্বার</div>
                                        <div class="col-sm-1">:</div>
                                        <div class="col-sm-7">{{!empty($sell->client) ? $sell->client->phone : 'N/A'}}</div>
                                        <div class="col-sm-4">ঠিকানা</div>
                                        <div class="col-sm-1">:</div>
                                        <div class="col-sm-7">{{!empty($sell->client) ? $sell->client->address : 'N/A'}}</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-4">তারিখ</div>
                                        <div class="col-sm-1">:</div>
                                        <div class="col-sm-7">{{$sell->date}}</div>
                                        <div class="col-sm-4">বিক্রয় ক্রমিক নং</div>
                                        <div class="col-sm-1">:</div>
                                        <div class="col-sm-7">{{$sell->id}}</div>
                                        <div class="col-sm-4">বিক্রয় কর্মী</div>
                                        <div class="col-sm-1">:</div>
                                        <div class="col-sm-7">Authorized</div>
                                        <div class="col-sm-4">গেট পাস নং</div>
                                        <div class="col-sm-1">:</div>
                                        <div class="col-sm-7">{{$gatepass->id}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br/><br/><br/>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <thead>
                                        <tr class="text-center">
                                            <th>ক্রমিক নং</th>
                                            <th>পণ্য</th>
                                            <th>পরিমাণ</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @for($i=0; $i<count($finishedgood_id) ; $i++)
                                            <tr class="text-center">
                                                <td>{{$i + 1}}</td>
                                                <td>{{$finishedgood_name[$i]}}</td>
                                                <td>{{$finishedgood_quantity[$i]}} কেজি</td>
                                            </tr>
                                        @endfor
                                        </tbody>
                                        <tfoot>
                                        <tr class="text-center">
                                            <td colspan="2"><b>মোট পরিমাণ</b></td>
                                            <td><b>{{$total_quantity}} কেজি</b></td>
                                        </tr>
                                        <tr class="text-center">
                                            <td colspan="2"><b>মোট পণ্য</b></td>
                                            <td><b>{{count($finishedgood_id)}} টি</b></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br/><br/><br/><br/><br/><br/><br/><br/>
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-3 text-center">
                                <h4 style="border-top: 3px dotted">ক্রেতার স্বাক্ষর</h4>
                            </div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-3 text-center">
                                <h4 style="border-top: 3px dotted">বিক্রেতার স্বাক্ষর</h4>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-sm-12 text-center text-info">গাছ লাগান, পরিবেশ বাঁচান</div>
                        </div>
                    </div>
                    <br/><br/>
                    <div class="row text-center">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <br/>
                                <input type="button" class="print_button btn-gradient-primary btn-block form-control" onclick="printDiv('print_report')" value="প্রিন্ট স্লিপ" />
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
