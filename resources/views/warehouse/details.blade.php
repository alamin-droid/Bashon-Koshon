@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-12"><h3 class="text-center">{{$warehouse->name}}<hr/></h3></div>
    </div>
    <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">মোট উৎপাদিত পণ্যের পরিমাণ<i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">0 KG</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">মোট ক্রয়কৃত কাঁচামালের পরিমাণ<i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">0 KG</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">মোট বিক্রিত পণ্যের পরিমাণ<i class="mdi mdi-chart-line mdi-24px float-right"></i></h4>
                    <h2 class="mb-5">0 KG</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">কাঁচামালের তালিকা<hr/></h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr class="text-center">
                                <th>ক্রমিক নং</th>
                                <th> তারিখ </th>
                                <th> ক্রয় </th>
                                <th> গেট পাস </th>
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
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">বিক্রয়োত্তর পণ্যের তালিকা<hr/></h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr class="text-center">
                                <th> ক্রমিক নং </th>
                                <th> তারিখ </th>
                                <th> পণ্যের বিবরন </th>
                                <th> গেট পাস </th>
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
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h4 class="text-center">উৎপাদিত পণ্যের তালিকা<hr/></h4>
                            <table class="table table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th>ক্রমিক নং </th>
                                    <th> তারিখ </th>
                                    <th> উৎপাদিত পণ্য </th>
                                    <th> উৎপাদিত পণ্যের পরিমাণ</th>
                                    <th> উৎপাদিত পণ্যের একক </th>
                                    <th> কাঁচামালের বিবরণ </th>
                                    <th> গেট পাস </th>
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
    </div>
@endsection
