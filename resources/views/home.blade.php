@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">সাপ্তাহিক উৎপাদন <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{$productions->sum('finishedgood_quantity')}} KG</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">সাপ্তাহিক কাঁচামাল ক্রয় <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{$purchased}} KG</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">সাপ্তাহিক বিক্রয়<i class="mdi mdi-account mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{$sold}} KG</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-primary card-img-holder text-white">
                <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">সর্বমোট যোগানদার<i class="mdi mdi-chart-line mdi-24px float-right"></i></h4>

                    <h2 class="mb-5">{{$suppliers->count()}}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-dark card-img-holder text-white">
                <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">উৎপাদিত পণ্যের সাপ্তাহিক মজুত <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{$productions->sum('finishedgood_quantity') - $sold}} KG</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-warning card-img-holder text-white">
                <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">সর্বমোট গ্রাহক<i class="mdi mdi-account mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{$clients->count()}}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center">গ্রাহক তালিকা<hr/></h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr class="text-center">
                                <th>ক্রমিক নং</th>
                                <th> ছবি </th>
                                <th> নাম </th>
                                <th> মোবাইল নাম্বার</th>
                                <th> ই-মেইল </th>
                                <th> ঠিকানা </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($clients as $client)
                            <tr class="text-center">
                                <td>{{($clients->currentpage()-1) * $clients ->perpage() + $loop->index + 1 }}</td>
                                <td>
                                    <img src="{{asset('assets/images/client/'. $client->photo)}}" class="mr-2" alt="image">
                                </td>
                                <td>{{$client->name}}</td>
                                <td>{{$client->phone}}</td>
                                <td> {{$client->email}} </td>
                                <td> {{$client->address}} </td>
                            </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="5">কোনো গ্রাহক নেই</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <br/><br/>
                        {!! $clients->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h3 id="monthAndYear"></h3>
                    <div class="button-container-calendar">
                        <button id="previous" onclick="previous()">&#8249;</button>
                        <button id="next" onclick="next()">&#8250;</button>
                    </div>
                    <table class="table-calendar" id="calendar" data-lang="en">
                        <thead id="thead-month"></thead>
                        <tbody id="calendar-body"></tbody>
                    </table>
                    <div class="footer-container-calendar">
                        <label for="month">Jump To: </label>
                        <select id="month" onchange="jump()">
                            <option value=0>Jan</option>
                            <option value=1>Feb</option>
                            <option value=2>Mar</option>
                            <option value=3>Apr</option>
                            <option value=4>May</option>
                            <option value=5>Jun</option>
                            <option value=6>Jul</option>
                            <option value=7>Aug</option>
                            <option value=8>Sep</option>
                            <option value=9>Oct</option>
                            <option value=10>Nov</option>
                            <option value=11>Dec</option>
                        </select>
                        <select id="year" onchange="jump()"></select>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="{{asset('assets/js/calender.js')}}"></script>
@endsection
