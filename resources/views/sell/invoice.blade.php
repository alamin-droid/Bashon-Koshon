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
                                            <th>Sub Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @for($i=0; $i<count($sell->type_of_rice) ; $i++)
                                            <tr class="text-center">
                                                <td>{{$i + 1}}</td>
                                                <td>{{ !empty($product = \App\Finishedgood::find($sell->type_of_rice[$i])) ? $product->name : 'N/A'  }}</td>
                                                <td>{{$sell->quantity_kg[$i]}}</td>
                                                <td>{{$sell->unit_price[$i]}}</td>
                                                <td>{{number_format($sell->total_price[$i])}}</td>
                                            </tr>
                                        @endfor
                                        </tbody>
                                        <tfoot>
                                        <tr class="text-center">
                                            <td colspan="4"><b>Total Price</b></td>
                                            <td><b>{{ number_format($sell->total) }}</b></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br/><br/>
                        <div class="row">
                            <div class="col-sm-6 text-center"><b>Words : {{strtoupper($numberTransformer->toWords($sell->total))}} TK ONLY</b></div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-5"><b>Total Price</b></div>
                                    <div class="col-sm-1"><b>:</b></div>
                                    <div class="col-sm-6"><b>{{ number_format($sell->total) }}</b></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5"><b>Total Paid</b></div>
                                    <div class="col-sm-1"><b>:</b></div>
                                    <div class="col-sm-6"><b>{{number_format($sell->payment)}}</b></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5"><b>Total Due</b></div>
                                    <div class="col-sm-1"><b>:</b></div>
                                    <div class="col-sm-6"><b>{{number_format($sell->total - $sell->payment)}}</b></div>
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
