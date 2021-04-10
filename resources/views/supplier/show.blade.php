@extends('master')
@section('content')
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 text-center"><h3 class="text-info">যোগানদার জমা/খরচ হিসাব</h3><hr/></div>
                        <div class="col-sm-12">
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
                        <div class="col-sm-1"></div>
                        <div class="col-sm-3">মোট ক্রয়</div>
                        <div class="col-sm-4 text-center"> : </div>
                        <div class="col-sm-4"> {{number_format($purchases->sum('total'))}}.00</div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-3"> টাকা পরিশোধ </div>
                        <div class="col-sm-4 text-center"> : </div>
                        <div class="col-sm-4"> {{number_format($payments->sum('amount'))}}.00</div>
                        <div class="col-sm-12"><hr/></div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-3"> বকেয়া </div>
                        <div class="col-sm-4 text-center"> : </div>
                        <div class="col-sm-4"> {{number_format($purchases->sum('total') - $payments->sum('amount'))}}.00</div>
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
                                            <th> পরিমাণ </th>
                                            <th> মূল্য/বস্তা </th>
                                            <th> মোট মূল্য (৳)</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($purchases as $purchase)
                                                <tr class="text-center">
                                                    <td>{{date('d-m-Y', strtotime($purchase->date))}}</td>
                                                    <td>{{$purchase->bag}}</td>
                                                    <td>{{$purchase->unit_price}}</td>
                                                    <td>{{number_format($purchase->total_price)}}</td>
                                                </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-info">{{'কোনো ক্রয় নেই'}}</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                        <tfoot>
                                        <tr class="text-center">
                                            <td colspan="3">মোট</td>
                                            <td>{{number_format($purchases->sum('total'))}}.00</td>
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
                                            <th class="text-center"> তারিখ </th>
                                            <th class="text-center"> টাকা প্রদানের মাধ্যম</th>
                                            <th class="text-center"> টাকার পরিমাণ </th>
                                        </tr>
                                        </thead>
                                        <tbody id="table">
                                        @forelse($payments as $payment)
                                            <tr class="text-center">
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
                                            <td colspan="2">মোট</td>
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
