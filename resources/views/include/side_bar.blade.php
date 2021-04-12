<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{asset('assets/images/user/' . Auth::user()->image)}}" alt="profile">
                    <span class="login-status online"></span>
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">{{Auth::user()->name}}</span>
                    <span class="text-secondary text-small">{{'Admin'}}</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">
                <span class="menu-title">ড্যাসবোর্ড</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#user-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">ব্যবহারকারী</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
            <div class="collapse" id="user-basic">
                <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('user.create')}}">নতুন ব্যবহারকারী</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('user.index')}}">ব্যবহারকারীর তালিকা</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#owner-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">মালিকপক্ষ</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
            <div class="collapse" id="owner-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('owner.create')}}">নতুন মালিক</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('owner.index')}}">মালিকদের তালিকা</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#employee-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">কর্মচারী</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
            <div class="collapse" id="employee-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('employee.create')}}">নতুন কর্মচারী</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('employee.index')}}">কর্মচারী তালিকা</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#supplier-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">যোগানদার</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
            <div class="collapse" id="supplier-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('supplier.create')}}">নতুন যোগানদার</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('supplier.index')}}">যোগানদার তালিকা</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#clients-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">গ্রাহক</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
            <div class="collapse" id="clients-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('client.create')}}">নতুন গ্রাহক</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('client.index')}}">গ্রাহক তালিকা</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#attendance-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">হাজিরা</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-book menu-icon"></i>
            </a>
            <div class="collapse" id="attendance-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('attendance.attendance_create')}}">নতুন হাজিরা</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('attendance.attendance_info')}}">হাজিরা তালিকা</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#raw_materials-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">কাঁচা মাল</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-rice menu-icon"></i>
            </a>
            <div class="collapse" id="raw_materials-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('rawmaterials.create')}}">নতুন কাঁচা মাল</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('rawmaterials.index')}}">কাঁচা মাল তালিকা</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#finished_goods-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">পণ্য</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-rice menu-icon"></i>
            </a>
            <div class="collapse" id="finished_goods-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('finishedgood.create')}}">নতুন পণ্য</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('finishedgood.index')}}">পণ্যের তালিকা</a></li>
                </ul>
            </div>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" data-toggle="collapse" href="#production-basic" aria-expanded="false" aria-controls="ui-basic">--}}
{{--                <span class="menu-title">উৎপাদন</span>--}}
{{--                <i class="menu-arrow"></i>--}}
{{--                <i class="mdi mdi-rice menu-icon"></i>--}}
{{--            </a>--}}
{{--            <div class="collapse" id="production-basic">--}}
{{--                <ul class="nav flex-column sub-menu">--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{route('production.create')}}">নতুন উৎপাদন</a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{route('production.index')}}">উৎপাদন তালিকা</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </li>--}}
        @php
            $warehouses = \App\Warehouse::orderBy('id','DESC')->get();
        @endphp
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#warehouse-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">গোডাউন</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-factory menu-icon"></i>
            </a>
            <div class="collapse" id="warehouse-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('warehouse.index')}}">গোডাউন তালিকা</a></li>
                    @foreach($warehouses as $warehouse)
                        <li class="nav-item"> <a class="nav-link" href="{{route('warehouse.warehouse_details', $warehouse->id)}}">{{$warehouse->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" data-toggle="collapse" href="#inventory-basic" aria-expanded="false" aria-controls="ui-basic">--}}
{{--                <span class="menu-title">মজুতকৃত পন্য</span>--}}
{{--                <i class="menu-arrow"></i>--}}
{{--                <i class="mdi mdi-stack-exchange menu-icon"></i>--}}
{{--            </a>--}}
{{--            <div class="collapse" id="inventory-basic">--}}
{{--                <ul class="nav flex-column sub-menu">--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{route('inventory.rawmaterial')}}">কাঁচামাল</a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{route('inventory.production')}}">উৎপাদিত পণ্য</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </li>--}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#purchase-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">ক্রয়</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-cash menu-icon"></i>
            </a>
            <div class="collapse" id="purchase-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('purchase.create')}}">নতুন ক্রয়</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('purchase.index')}}">ক্রয় তালিকা</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#sales-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">বিক্রয়</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-cash menu-icon"></i>
            </a>
            <div class="collapse" id="sales-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('sell.create')}}">নতুন বিক্রয়</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('sell.index')}}">বিক্রয় তালিকা</a></li>
                </ul>
            </div>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" data-toggle="collapse" href="#request_approval-basic" aria-expanded="false" aria-controls="ui-basic">--}}
{{--                <span class="menu-title">অনুমোদন করুন</span>--}}
{{--                <i class="menu-arrow"></i>--}}
{{--                <i class="mdi mdi-cash menu-icon"></i>--}}
{{--            </a>--}}
{{--            <div class="collapse" id="request_approval-basic">--}}
{{--                <ul class="nav flex-column sub-menu">--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{route('request_approval.purchase')}}">ক্রয় অনুমোদন</a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{route('request_approval.production')}}">উৎপাদিত পণ্যের অনুমোদন</a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{route('request_approval.sales')}}">বিক্রয় অনুমোদন</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </li>--}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#collection-basic" aria-expanded="false" aria-controls="head-basic">
                <span class="menu-title">কালেকশন</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-currency-usd menu-icon"></i>
            </a>
            <div class="collapse" id="collection-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('collection.create')}}">নতুন কালেকশন</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('collection.index')}}">কালেকশন লিস্ট</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#head-basic" aria-expanded="false" aria-controls="head-basic">
                <span class="menu-title">পেমেন্ট</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-currency-usd menu-icon"></i>
            </a>
            <div class="collapse" id="head-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('payment.create')}}">নতুন পেমেন্ট</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('payment.index')}}">পেমেন্ট লিস্ট</a></li>
                </ul>
            </div>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" data-toggle="collapse" href="#salary_advance-basic" aria-expanded="false" aria-controls="ui-basic">--}}
{{--                <span class="menu-title">অগ্রীম</span>--}}
{{--                <i class="menu-arrow"></i>--}}
{{--                <i class="mdi mdi-cash menu-icon"></i>--}}
{{--            </a>--}}
{{--            <div class="collapse" id="salary_advance-basic">--}}
{{--                <ul class="nav flex-column sub-menu">--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{route('advance.create')}}">নতুন অগ্রীম</a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{route('advance.index')}}">অগ্রীম তালিকা</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </li>--}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#payroll-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">বেতন-ভাতা</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-cash menu-icon"></i>
            </a>
            <div class="collapse" id="payroll-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('payroll.create')}}">নতুন বেতন-ভাতা</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('payroll.index')}}">বেতন-ভাতা তালিকা</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#shooter-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">শ্যুটার</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-cash menu-icon"></i>
            </a>
            <div class="collapse" id="shooter-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#">নতুন শ্যুটার</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">শ্যুটার তালিকা</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#general-basic" aria-expanded="false" aria-controls="head-basic">
                <span class="menu-title">সাধারন খরচ</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-currency-usd menu-icon"></i>
            </a>
            <div class="collapse" id="general-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('expense.create')}}">নতুন খরচ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('expense.index')}}">খরচ তালিকা</a></li>
                </ul>
            </div>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" data-toggle="collapse" href="#administrative-basic" aria-expanded="false" aria-controls="head-basic">--}}
{{--                <span class="menu-title">দাপ্তরিক খরচ</span>--}}
{{--                <i class="menu-arrow"></i>--}}
{{--                <i class="mdi mdi-currency-usd menu-icon"></i>--}}
{{--            </a>--}}
{{--            <div class="collapse" id="administrative-basic">--}}
{{--                <ul class="nav flex-column sub-menu">--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{route('administrative.create')}}">নতুন দাপ্তরিক খরচ</a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{route('administrative.index')}}">দাপ্তরিক খরচ তালিকা</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" data-toggle="collapse" href="#family-basic" aria-expanded="false" aria-controls="head-basic">--}}
{{--                <span class="menu-title">পারিবারিক খরচ</span>--}}
{{--                <i class="menu-arrow"></i>--}}
{{--                <i class="mdi mdi-currency-usd menu-icon"></i>--}}
{{--            </a>--}}
{{--            <div class="collapse" id="family-basic">--}}
{{--                <ul class="nav flex-column sub-menu">--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{route('family_cost.create')}}">নতুন পারিবারিক খরচ</a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{route('family_cost.index')}}">পারিবারিক খরচ তালিকা</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </li>--}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#contra_journal-basic" aria-expanded="false" aria-controls="head-basic">
                <span class="menu-title">কন্ট্রা জার্নাল</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-currency-usd menu-icon"></i>
            </a>
            <div class="collapse" id="contra_journal-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('contra_journal.create')}}">নতুন কন্ট্রা জার্নাল</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('contra_journal.index')}}">কন্ট্রা জার্নাল তালিকা</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#bank-basic" aria-expanded="false" aria-controls="head-basic">
                <span class="menu-title">ব্যাংক</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-bank menu-icon"></i>
            </a>
            <div class="collapse" id="bank-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('bank.create')}}">নতুন ব্যাংক</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('bank.index')}}">ব্যাংকের তালিকা</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('cheque.create')}}">চেক বই এন্ট্রি</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('cheque.index')}}">চেক বই প্রিন্ট</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#template-basic" aria-expanded="false" aria-controls="head-basic">
                <span class="menu-title">টেমপ্লেট ডিজাইন</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-bank menu-icon"></i>
            </a>
            <div class="collapse" id="template-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('ref_pad')}}">রেফারেন্স প্যাড</a></li>
                </ul>
            </div>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" data-toggle="collapse" href="#report-basic" aria-expanded="false" aria-controls="head-basic">--}}
{{--                <span class="menu-title">রিপোর্ট</span>--}}
{{--                <i class="menu-arrow"></i>--}}
{{--                <i class="mdi mdi-book-open-outline menu-icon"></i>--}}
{{--            </a>--}}
{{--            <div class="collapse" id="report-basic">--}}
{{--                <ul class="nav flex-column sub-menu">--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{route('report.balance')}}">ব্যালেন্স রিপোর্ট</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </li>--}}

        {{--        Accounting Section Ends--}}
    </ul>
</nav>
