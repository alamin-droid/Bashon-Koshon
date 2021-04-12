@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div id="print_invoice">
                        <br/><br/>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-2 text-right"><img src="{{asset('assets/images/logo/n_islam_logo.png')}}" style="width: 100%; margin-top: -25px"> </div>
                                <div class="col-sm-8"><h1 class="text-center"> <b> এন ইসলাম অটো রাইস মিল </b></h1></div>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8"><h5 class="text-center" style="margin-top: -55px;">প্রোপাইটর : মোঃ নজরুল ইসলাম</h5></div>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8"><h5 class="text-center" style="margin-top: -30px;">উন্নতমানের ধান, আতপ ও সিদ্ধ চাউল বিক্রেতা।</h5></div>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-12"><h5 class="text-center">ইসলামিয়া মার্কেট, নীচ তলা, সাতবর্গ বাজার, বিজয়নগর, ব্রাহ্মণবাড়িয়া।</h5></div>
                                <div class="col-sm-12"><h5 class="text-center">মোবাইল :01716-273452, 01918-776304</h5></div>
                                <br/><br/>
                                <div class="col-sm-5"></div>
                                <div class="col-sm-2"><h6 class="text-center" style="border: 2px solid"><b>ক্যাশ মেমো</b></h6></div>
                                <div class="col-sm-5"></div>
                            </div>
                            <br/><br/>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row">
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
                                            <th>মূল্য/একক</th>
                                            <th>সাব-টোটাল</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @for($i=0; $i<count($sell->type_of_rice) ; $i++)
                                            <tr class="text-center">
                                                <td>{{$i + 1}}</td>
                                                <td>{{ !empty($product = \App\Finishedgood::find($sell->type_of_rice[$i])) ? $product->name : 'N/A'  }}</td>
                                                <td>{{($sell->quantity_kg[$i] != 'null') ? $sell->quantity_kg[$i] : $sell->quantity[$i]}}</td>
                                                <td>{{$sell->unit_price[$i]}}</td>
                                                <td>{{number_format($sell->total_price[$i])}}</td>
                                            </tr>
                                        @endfor
                                        </tbody>
                                        <tfoot>
                                        <tr class="text-center">
                                            <td colspan="4"><b>মোট মূল্য</b></td>
                                            <td><b>{{ number_format($sell->total) }}</b></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br/><br/>
                        <div class="row">
                            <div class="col-sm-6 text-center"><b>কথায় : {{$num_to->bnWord($sell->total)}} টাকা মাত্র</b></div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-5"><b>মোট মূল্য</b></div>
                                    <div class="col-sm-1"><b>:</b></div>
                                    <div class="col-sm-6"><b>{{ number_format($sell->total) }}</b></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5"><b>মোট পরিশোধ</b></div>
                                    <div class="col-sm-1"><b>:</b></div>
                                    <div class="col-sm-6"><b>{{number_format($sell->payment)}}</b></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5"><b>মোট বাকেয়া</b></div>
                                    <div class="col-sm-1"><b>:</b></div>
                                    <div class="col-sm-6"><b>{{number_format($sell->total - $sell->payment)}}</b></div>
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
                                <input type="button" class="print_button btn-gradient-primary btn-block form-control" onclick="printDiv('print_invoice')" value="Print" />
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
