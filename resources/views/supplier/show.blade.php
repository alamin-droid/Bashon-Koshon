@extends('master')
@section('content')
    @php
        $total_price = 0;
    @endphp
    @foreach($purchases as $purchase)
        @php
                $quantity = explode(',',str_replace(str_split('[]""'),'',$purchase->quantity));
                $rate = explode(',',str_replace(str_split('[]""'),'',$purchase->rate_per_unit));
                $supplier_name = explode(',',str_replace(str_split('[]""'),'',$purchase->supplier_id));
        @endphp
        @for($i=0; $i<count($supplier_name) ; $i++)
            @if($supplier->id == $supplier_name[$i])
                @php
                    $total_price += $quantity[$i] * $rate[$i];
                @endphp
            @endif
        @endfor
    @endforeach
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-center"><h3 class="text-info">যোগানদার জমা/খরচ হিসাব</h3><hr/></div>
                        <div class="col-md-12">
                            <div><span class="project_info_tag">নাম :</span> <span class="project_info_details"> {{$supplier->name}}</span> </div>
                            <div><span class="project_info_tag">ইমেইল :</span> <span class="project_info_details"> {{$supplier->email}}</span> </div>
                            <div><span class="project_info_tag">মোবাইল :</span> <span class="project_info_details"> {{$supplier->phone}}</span> </div>
                            <div><span class="project_info_tag">ঠিকানা :</span> <span class="project_info_details"> {{$supplier->address}}</span> </div>
                            <div><span class="project_info_tag">ব্যাংক অ্যাকাউন্ট :</span> <span class="project_info_details"> {{$supplier->bank_account}}</span> </div>
                        </div>
                    </div>
                    <br/><br/>
                    <h3 class="text-center text-info"> {{$supplier->name}} অর্থনৈতিক অবস্থা  <hr/></h3>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-3">মোট ক্রয়</div>
                        <div class="col-md-4 text-center"> : </div>
                        <div class="col-md-4"> {{number_format($total_price)}}.00</div>
                        <div class="col-md-1"></div>
                        <div class="col-md-3"> টাকা পরিশোধ </div>
                        <div class="col-md-4 text-center"> : </div>
                        <div class="col-md-4"> {{number_format($payments->sum('amount'))}}.00</div>
                        <div class="col-md-12"><hr/></div>
                        <div class="col-md-1"></div>
                        <div class="col-md-3"> বকেয়া </div>
                        <div class="col-md-4 text-center"> : </div>
                        <div class="col-md-4"> {{number_format($total_price - $payments->sum('amount'))}}.00</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row table-responsive">
                                <div class="col-lg-12">
                                    <h2 class="text-center text-info">ক্রয় তালিকা<hr/></h2><br/>
                                    <table class="table table-striped">
                                        <thead>
                                        <tr class="text-center">
                                            <th> তারিখ </th>
                                            <th> কাঁচামাল </th>
                                            <th> পরিমাণ </th>
                                            <th> একক </th>
                                            <th> মূল্য/কেজি </th>
                                            <th> মোট মূল্য (৳)</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($purchases as $purchase)
                                            @php
                                                $materials_name_array = array();
                                                    $materials_name = explode(',',str_replace(str_split('[]""'),'',$purchase->rawmaterial_id));
                                                    $quantity = explode(',',str_replace(str_split('[]""'),'',$purchase->quantity));
                                                    $unit = explode(',',str_replace(str_split('[]""'),'',$purchase->unit));
                                                    $rate = explode(',',str_replace(str_split('[]""'),'',$purchase->rate_per_unit));
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
                                            @endfor
                                            @for($i=0; $i<count($supplier_name) ; $i++)
                                                @if($supplier->id == $supplier_name[$i])
                                                <tr class="text-center">
                                                    <td>{{date('d-m-Y', strtotime($purchase->date))}}</td>
                                                    <td>{{$materials_name_array[$i]}}</td>
                                                    <td>{{$quantity[$i]}}</td>
                                                    <td>{{$unit[$i]}}</td>
                                                    <td>{{number_format($rate[$i])}}</td>
                                                    <td>{{number_format($quantity[$i] * $rate[$i])}}</td>
                                                </tr>
                                            @endif
                                            @endfor
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center text-info">{{'কোনো ক্রয় নেই'}}</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                        <tfoot>
                                        <tr class="text-center">
                                            <td colspan="5">মোট</td>
                                            <td>{{number_format($total_price)}}.00</td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row table-responsive">
                                <div class="col-lg-12">
                                    <h2 class="text-center text-info">পেমেন্ট তালিকা<hr/></h2><br/>
                                    <table class="table table-striped">
                                        <thead>
                                        <tr class="text-center">
                                            <th class="text-center">ক্রমিক নং</th>
                                            <th class="text-center"> তারিখ </th>
                                            <th class="text-center"> টাকা প্রদানের মাধ্যম</th>
                                            <th class="text-center"> টাকার পরিমাণ </th>
                                        </tr>
                                        </thead>
                                        <tbody id="table">
                                        @forelse($payments as $payment)
                                            <tr class="text-center">
                                                <td class="text-center">{{$loop->index + 1 }}</td>
                                                <td class="text-center">{{date('d-m-Y', strtotime($payment->date))}}</td>
                                                <td class="text-center">{{$payment->mode_of_payment_name}}</td>
                                                <td class="text-center">{{number_format($payment->amount)}}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-info">{{'কোনো পেমেন্ট নেই।'}}</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                        <tfoot>
                                        <tr class="text-center">
                                            <td colspan="3">মোট</td>
                                            <td>{{number_format($payments->sum('amount'))}}.00</td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
