@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => ['payroll.update', $payroll->id],'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-pencil"></i></span>বেতন-ভাতা</h3></div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="joining_date" >তারিখ</label>
                            <input type="date" class="form-control" id="date" name="date" value="{{$payroll->date}}" required>
                        </div>
                        <div class="form-group">
                            <label for="month" >মাস</label>
                            <input type="month" class="form-control" id="month" name="month" value="{{$payroll->month}}" required>
                        </div>
                        <div class="form-group">
                            <label for="Employees">কর্মচারী</label>
                            <select class="form-control" data-live-search="true" name="employee_id" id="employee_name" required>
                                <option selected disabled value="">Choose Employee</option>
                                @foreach($employees as $employee)
                                    <option value="{{$employee->id}}" @if( $employee->id == $payroll->employee_id) selected @endif>{{$employee->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="salary" >বেতন</label>
                            <input type="number" class="form-control" id="salary" name="salary" value="{{$payroll->salary}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="overtime_time">ওভারটাইম/ঘন্টা</label>
                            <input type="number" class="form-control" id="overtime_time" name="overtime_time" value="{{$payroll->overtime_time}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="overtime_amount">ওভারটাইম পারিশ্রমিক/ঘন্টা</label>
                            <input type="number" class="form-control" id="overtime_amount" name="overtime_amount" placeholder="place overtime amount per hour for this employee" value="{{$payroll->overtime_amount}}">
                        </div>
                        <div class="form-group">
                            <label for="overtime" >ওভারটাইম পারিশ্রমিক</label>
                            <input type="number" class="form-control" id="overtime" name="overtime" placeholder="place overtime amount for this month" value="{{$payroll->overtime}}">
                        </div>
                        <div class="form-group">
                            <label for="salary_deduction" >বেতন কর্তন</label>
                            <input type="number" class="form-control" id="salary_deduction" name="salary_deduction" placeholder="Salary deducted in this month" value="{{$payroll->salary_deduction}}">
                        </div>
                        <div class="form-group">
                            <label for="net_amount" >মোট টাকার পরিমাণ</label>
                            <input type="text" class="form-control" id="net_amount" name="net_amount" value="{{$payroll->net_amount}}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block" id="submit"><i class="mdi mdi-pencil"></i> তৈরী করুন </button>
        </div>
    </div>
    {!! Form::close() !!}
    <script>
        function _(x){
            return document.getElementById(x);
        }
        $(document).on('change', '#employee_name', function (){
            let employee_id = $(this).val();
            let month = employee_id.concat('_', _('month').value);
            $.ajax({
                url : '/employee_id/' + employee_id,
                method : 'GET',
                success:function(data){
                    _('salary').value = data.salary;
                    _('net_amount').value = data.salary;
                }

            });
            $.ajax({
                url : '/overtime/' + month,
                method : 'GET',
                success:function(data){
                    _('overtime_time').value = data;
                }
            });
        });
        $(document).on('input', '#overtime_amount', function (){
            if(_('salary').value == ''){
                toastr.error("Salary Is Not Set Yet")
                _('overtime_amount').value = '';
                _('overtime').value = '';
            }else{
                _('salary_deduction').value = '';
                _('overtime').value = _('overtime_time').value * _('overtime_amount').value
                let net_amount = +_('salary').value + +_('overtime').value;
                _('net_amount').value = net_amount;
            }
        });

        $(document).on('input', '#salary_deduction', function (){
            if(_('salary').value == ''){
                toastr.error("Salary Is Not Set Yet")
                _('salary_deduction').value = '';
            }else{
                let net_amount = +_('salary').value + +_('overtime').value - _('salary_deduction').value;
                _('net_amount').value = net_amount;
            }
        });
    </script>
@endsection
