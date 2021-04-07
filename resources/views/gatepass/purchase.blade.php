@extends('master')
@section('content')
    @php
        $materials_name_array = array();
        $supplier_name_array = array();
            $materials_name = explode(',',str_replace(str_split('[]""'),'',$purchase->rawmaterial_id));
            $quantity = explode(',',str_replace(str_split('[]""'),'',$purchase->quantity));
            $unit = explode(',',str_replace(str_split('[]""'),'',$purchase->unit));
            $supplier_name = explode(',',str_replace(str_split('[]""'),'',$purchase->supplier_id));
    @endphp
    @for($i=0; $i<count($materials_name) ; $i++)
        @foreach($materials as $material)
            @if($material->id == $materials_name[$i])
                @php
                    $materials_name_array[] = $material->name;
                @endphp
            @endif
        @endforeach
        @foreach($suppliers as $supplier)
            @if($supplier->id == $supplier_name[$i])
                @php
                    $supplier_name_array[] = $supplier->name;
                @endphp
            @endif
        @endforeach
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
                            <div class="col-md-12"><h4 class="text-center"><b>কাঁচামালের গেট পাস</b><hr/> </h4></div>
                            <br/><br/><br/><br/><br/><br/>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5"><b>ক্রয়ের ক্রমিক নং</b></div>
                                    <div class="col-md-1">:</div>
                                    <div class="col-md-5">{{$purchase->id}}</div>
                                    <br/><br/>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5"><b>তারিখ</b></div>
                                    <div class="col-md-1">:</div>
                                    <div class="col-md-5">{{$purchase->date}}</div>
                                    <br/><br/>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5"><b>গোডাউন</b></div>
                                    <div class="col-md-1">:</div>
                                    <div class="col-md-5">{{!empty($purchase->warehouse) ? $purchase->warehouse->name : 'N/A'}}</div>
                                </div>
                            </div>
                        </div>
                        <br/><br/><br/><br/>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr class="text-center">
                                            <th>কাঁচামাল</th>
                                            <th>যোগানদার</th>
                                            <th>পরিমাণ</th>
                                            <th>একক</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @for($i=0; $i<count($materials_name) ; $i++)
                                            <tr class="text-center">
                                                <td>{{$materials_name_array[$i]}}</td>
                                                <td>{{$supplier_name_array[$i]}}</td>
                                                <td>{{$quantity[$i]}}</td>
                                                <td>{{$unit[$i]}}</td>
                                            </tr>
                                        @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br/><br/><br/><br/>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10 text-center" style="text-align: justify">
                                <h4>হেড অফিসের অনুমতিক্রমে পণ্য গোডাউনে রাখার অনুমতি প্রদান করা হইল। এই গেট পাস ব্যাতিত পণ্য বিনিময় করা যাইবে না।</h4>
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
