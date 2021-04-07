@extends('master')
@section('content')
    @php
        $finishedgood_name = array();
        $total = 0;
        $total_quantity = 0;
        $total_rate = 0;
            $finishedgood_id = explode(',',str_replace(str_split('[]""'),'',$sell->finishedgood_id));
            $finishedgood_quantity = explode(',',str_replace(str_split('[]""'),'',$sell->quantity));
            $rate_per_unit = explode(',',str_replace(str_split('[]""'),'',$sell->rate_per_unit));
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
            $total += $finishedgood_quantity[$i] * $rate_per_unit[$i];
            $total_quantity += $finishedgood_quantity[$i];
            $total_rate += $rate_per_unit[$i];
        @endphp
    @endfor
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div id="print_invoice">
                        <br/><br/>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-1 text-right"><img src="{{asset('assets/images/logo/n_islam_logo.png')}}" style="width: 100%;"> </div>
                                <div class="col-sm-8"><h3 class="text-center">N. Islam Auto Rice Mill Ltd</h3></div>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-12"><h6 class="text-center">Md. Najrul Islam</h6></div>
                                <div class="col-sm-12"><h6 class="text-center">Shatbarga Bus stand, Dhaka Sylhet highway, P.O.: Bijoy Nagar. Zila: B.B, Bangladesh</h6></div>
                                <div class="col-sm-12"><h6 class="text-center">Mobile : 01716-273452, 01918-776304</h6></div>
                                <br/><br/>
                                <div class="col-sm-5"></div>
                                <div class="col-sm-2"><h6 class="text-center" style="border: 2px solid"><b>Invoice</b></h6></div>
                                <div class="col-sm-5"></div>
                            </div>
                            <br/><br/>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-4">Party Code</div>
                                        <div class="col-sm-1">:</div>
                                        <div class="col-sm-7">{{$sell->client_id}}</div>
                                        <div class="col-sm-4">Party Name</div>
                                        <div class="col-sm-1">:</div>
                                        <div class="col-sm-7">{{!empty($sell->client) ? $sell->client->name : 'N/A'}}</div>
                                        <div class="col-sm-4">Mobile</div>
                                        <div class="col-sm-1">:</div>
                                        <div class="col-sm-7">{{!empty($sell->client) ? $sell->client->phone : 'N/A'}}</div>
                                        <div class="col-sm-4">Address</div>
                                        <div class="col-sm-1">:</div>
                                        <div class="col-sm-7">{{!empty($sell->client) ? $sell->client->address : 'N/A'}}</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-4">Date</div>
                                        <div class="col-sm-1">:</div>
                                        <div class="col-sm-7">{{$sell->date}}</div>
                                        <div class="col-sm-4">Sell No</div>
                                        <div class="col-sm-1">:</div>
                                        <div class="col-sm-7">{{$sell->id}}</div>
                                        <div class="col-sm-4">Sales Person</div>
                                        <div class="col-sm-1">:</div>
                                        <div class="col-sm-7">Admin</div>
                                        <div class="col-sm-4">Gate Pass No</div>
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
                                            <th>SL.No.</th>
                                            <th>Item</th>
                                            <th>Quantity/KG</th>
                                            <th>Rate/Unit</th>
                                            <th>Total Price</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @for($i=0; $i<count($finishedgood_id) ; $i++)
                                            <tr class="text-center">
                                                <td>{{$i + 1}}</td>
                                                <td>{{$finishedgood_name[$i]}}</td>
                                                <td>{{$finishedgood_quantity[$i]}}</td>
                                                <td>{{$rate_per_unit[$i]}}</td>
                                                <td>{{number_format($finishedgood_quantity[$i] * $rate_per_unit[$i])}}</td>
                                            </tr>
                                        @endfor
                                        </tbody>
                                        <tfoot>
                                        <tr class="text-center">
                                            <td colspan="2"><b>Total</b></td>
                                            <td><b>{{$total_quantity}}</b></td>
                                            <td><b>{{$total_rate}}</b></td>
                                            <td><b>{{number_format($total)}}</b></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br/><br/>
                        <div class="row">
                            <div class="col-sm-6 text-center"><b>Words : {{strtoupper($numberTransformer->toWords($total))}} TK ONLY</b></div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-5"><b>Total Item</b></div>
                                    <div class="col-sm-1"><b>:</b></div>
                                    <div class="col-sm-6"><b>{{count($finishedgood_id)}}</b></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5"><b>Total Quantity</b></div>
                                    <div class="col-sm-1"><b>:</b></div>
                                    <div class="col-sm-6"><b>{{$total_quantity}} KG</b></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5"><b>Total Rate Per Unit</b></div>
                                    <div class="col-sm-1"><b>:</b></div>
                                    <div class="col-sm-6"><b>{{$total_rate}}.00</b></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5"><b>Total Price</b></div>
                                    <div class="col-sm-1"><b>:</b></div>
                                    <div class="col-sm-6"><b>{{number_format($total)}}.00</b></div>
                                </div>
                            </div>
                        </div>
                        <br/><br/><br/><br/><br/><br/><br/><br/>
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-3 text-center">
                                <h4 style="border-top: 3px dotted">Buyer's Signature</h4>
                            </div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-3 text-center">
                                <h4 style="border-top: 3px dotted">Seller's Signature</h4>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-sm-12 text-center text-info">Plant Trees, Save the Environment</div>
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
