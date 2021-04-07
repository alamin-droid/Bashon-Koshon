
@extends('master')
@php
    if(!empty($check)){
    if(!empty($attendances)){
        $dates = explode(',',str_replace(str_split('[]""'),'',$attendances->dates));
        $time = explode(',',str_replace(str_split('[]""'),'',$attendances->time));
        $overtime = explode(',',str_replace(str_split('[]""'),'',$attendances->overtime));
      }
    }
@endphp
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span>Create Attedance</h3></div>
                            <div class="card">
                                <div class="card-body">
                                    <div id="date_search">
                                        {!! Form::open(['class' =>'form-sample','route' => 'attendance_month','method' => 'POST']) !!}
                                        <input type="hidden" name="employee_id" id="eid" value="{{$id}}" />
                                        <div class="form-group">
                                            <label for="month">মাস ও বছর নির্বাচন করুন</label>
                                            <input type="month" class="form-control" id="month" name="month" required>
                                        </div>
                                        <input type="submit" class="btn btn-success btn-sm btn-block" value="জমা দিন"/>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(!empty($check))
                        <div class="row">
                            @if(!empty($attendances))
                                <div class="col-lg-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="text-center">{{$employee->name}} এর হাজিরা এই {{$month_year}} জন্যে</h3><br/>
                                            {!! Form::open(['class' =>'form-sample','route' => ['attendance.update',$attendances->id],'method' => 'PATCH']) !!}
                                            <div class="row">
                                                @for($i=1 ; $i<=$days;$i++)
                                                    <div class="col-md-2">
                                                        <input type="time" class="form-control" id="time" name="time[]" value="{{$time[$i-1]}}">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label for="time" class="text-left">ওভারটাইম/ঘন্টা</label>
                                                        <input type="number" class="form-control" id="overtime" name="overtime[]" min="1" max="100" value="{{$overtime[$i-1]}}">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <div class="text-info">
                                                            <div class="checkbox">
                                                                @if($dates[$i-1] == 0)
                                                                    <input type="checkbox" class="days_check" id="days_check_{{$i}}" data-id="days_check_{{$i}}" data-count="days_count_{{$i}}" />
                                                                @else
                                                                    <input type="checkbox" class="days_check" id="days_check_{{$i}}" data-id="days_check_{{$i}}" data-count="days_count_{{$i}}" checked/>
                                                                @endif
                                                                <input type="hidden" id="days_count_{{$i}}" name="date[]" value="{{$dates[$i-1]}}"/>
                                                                <label for="styled-checkbox-3"></label>
                                                                <span class="check-label-name">{{$i}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if($i %2 == 1 && $i !=1)
                                                        <br/> <br/> <br/> <br/> <br/> <br/>
                                                    @endif
                                                @endfor
                                            </div>
                                            <br/>
                                            <input type="submit" class="btn btn-success btn-block" value="আপডেট"/>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-lg-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="text-center">{{$employee->name}} এর হাজিরা এই {{$month_year}} জন্যে</h3>
                                            {!! Form::open(['class' =>'form-sample','route' => ['attendance.store'],'method' => 'POST']) !!}
                                            <div class="row"><div class="col-md-12 text-center "><h2 class="text-info">তারিখ</h2><hr/></div></div><br/><br/>
                                            <div class="row">
                                                @for($i=1 ; $i<=$days;$i++)
                                                    <div class="col-md-2">
                                                        <label for="time" class="text-left">সময়</label>
                                                        <input type="time" class="form-control" id="time" name="time[]">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label for="time" class="text-left">ওভারটাইম/ঘন্টা</label>
                                                        <input type="number" class="form-control" id="overtime" name="overtime[]" min="1" max="100">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <div class="text-info">
                                                            <div class="checkbox">
                                                                <input type="checkbox" class="days_check" id="days_check_{{$i}}" data-id="days_check_{{$i}}" data-count="days_count_{{$i}}" />
                                                                <input type="hidden" id="days_count_{{$i}}" name="date[]" value="0"/>
                                                                <label for="styled-checkbox-3"></label>
                                                                <span class="check-label-name">{{$i}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if($i %2 == 1 && $i !=1)
                                                        <br/> <br/> <br/> <br/> <br/> <br/>
                                                    @endif
                                                @endfor
                                            </div>
                                            <input type="hidden" class="month" name="month" value="{{$month_year}}">
                                            <input type="hidden" class="eid" name="employee_id" value="{{$employee->id}}">
                                            <input type="hidden" class="salary" name="salary" value="{{$employee->salary}}">
                                            <br/><br/>
                                            <input type="submit" class="btn btn-success btn-block" value="Create"/>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        function _(x){
            return document.getElementById(x);
        }
        $(document).on('click','.days_check',function(){
            let check = _($(this).data('id')).checked;
            if(check == true){
                _($(this).data('count')).value = 1;
            }
            else if(check == false){
                _($(this).data('count')).value = 0;
            }
        });
        $(document).on('input', '#overtime', function (){
            let overtime = $(this).val();
            if(overtime < 0){
                toastr.error("overtime can not be negative");
                _('overtime').value = '';
            }
        });
    </script>
@endsection
