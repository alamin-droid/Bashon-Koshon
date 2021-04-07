@extends('master')
@section('content')
    <br/><br/>
    <div class="row">
        <div class="col-md-12 text-center"><h3 class="text-info">মালিক জমা/খরচ হিসাব</h3><hr/></div>
    </div>
    <br/><br/><br/>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center"><img class="client_image" src="{{asset('/assets/images/owner/'. $show->photo)}}" alt="Owner Image"></div>
                            <br/>
                            <div><span class="project_info_tag">নাম :</span> <span class="project_info_details"> {{$show->name}}</span> </div>
                            <div><span class="project_info_tag">ইমেইল :</span> <span class="project_info_details"> {{ !empty($show->email) ? $show->email : 'N/A' }}</span> </div>
                            <div><span class="project_info_tag">মোবাইল :</span> <span class="project_info_details"> {{$show->phone}}</span> </div>
                            <div><span class="project_info_tag">ঠিকানা :</span> <span class="project_info_details"> {{$show->designation}}</span> </div>
                        </div>
                    </div>
                    <br/><br/>
                    <h3 class="text-center text-info"> {{$show->name}} অর্থনৈতিক অবস্থা <hr/></h3>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-2"> মোট বিক্রয় </div>
                        <div class="col-md-4 text-center"> : </div>
                        <div class="col-md-4"> {{'0'}} /-</div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2"> কালেকশন </div>
                        <div class="col-md-4 text-center"> : </div>
                        <div class="col-md-4"> {{'0'}} /-</div>
                        <div class="col-md-12"><hr/></div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2"> বকেয়া </div>
                        <div class="col-md-4 text-center"> : </div>
                        <div class="col-md-4"> {{'0'}} /-</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row table-responsive">
                                <div class="col-lg-12">
                                    <h2 class="text-center text-info">বিক্রয় তালিকা<hr/></h2><br/>
                                    <table class="table table-striped">
                                        <thead>
                                        <tr class="text-center">
                                            <th>ক্রমিক নং</th>
                                            <th> তারিখ </th>
                                            <th> পণ্যের বিবরণ </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
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
                                <div class="col-lg-2 float-right"></div>
                                <div class="col-lg-12">
                                    <h2 class="text-center text-info">কালেকশন<hr/></h2><br/>
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th class="text-center">ক্রমিক নং</th>
                                            <th class="text-center"> তারিখ</th>
                                            <th class="text-center">গ্রাহক</th>
                                            <th class="text-center"> টাকার পরিমান </th>
                                            <th class="text-center"> টাকা প্রদানের মাধ্যম </th>
                                        </tr>
                                        </thead>
                                        <tbody id="table">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
@endsection
