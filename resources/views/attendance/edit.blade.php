@extends('master')
@section('content')
    @php
        $employee_id = explode(',',str_replace(str_split('[]""'),'',$edit->employee_id));
        $entry_time = explode(',',str_replace(str_split('[]""'),'',$edit->in_time));
        $exit_time = explode(',',str_replace(str_split('[]""'),'',$edit->out_time));
        $total_time = explode(',',str_replace(str_split('[]""'),'',$edit->total_time));
    @endphp
    {!! Form::open(['route' => ['attendance.update', $edit->id],'method' => 'PATCH']) !!}
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-md-12">
                            <h4 class="text-center">কর্মচারী হাজিরা খাতা | তারিখ : {{date('d-m-Y', strtotime($edit->date))}}<hr/></h4>
                            <table class="table table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th> ক্রমিক নং </th>
                                    <th> নাম </th>
                                    <th> এন্ট্রি টাইম </th>
                                    <th> এক্সিট টাইম </th>
                                    <th> টোটাল টাইম (ঘন্টা) </th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($employees as $employee)
                                    <tr class="text-center">
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$employee->name}}</td>
                                        @for($i=0; $i<count($employee_id) ; $i++)
                                            @if($employee->id == $employee_id[$i])
                                        <td><input type="time" class="form-control entry_time" id="entry_{{$employee->id}}" name="entry_time[]" value="{{$entry_time[$i]}}"></td>
                                        <td><input type="time" class="form-control exit_time" id="exit_{{$employee->id}}" name="exit_time[]" value="{{$exit_time[$i]}}"></td>
                                        <td><input type="text" class="form-control total_time" id="total_{{$employee->id}}" name="total_time[]" value="{{$total_time[$i] == 'null' ? '' : $total_time[$i]}}" readonly></td>
                                            @endif
                                        @endfor
                                        <input type="hidden" class="form-control"  name="employee_id[]" value="{{$employee->id}}">
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-info">{{'কোনো হাজিরা দেওয়া নেই'}}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <input type="submit" class="btn btn-success btn-sm btn-block" value="জমা দিন"/>
        </div>
    </div>
    {!! Form::close() !!}
    <script>
        function _(x){
            return document.getElementById(x);
        }
        $(document).on('change', '.entry_time', function (){
            let entry_time = $(this).val();
            let string = $(this).attr('id');
            let split = string.split('_');
            let id = split[1];
            let exit_time = _('exit_' +id).value;
            if(exit_time == ''){
                toastr.error('exit time is not set yet');
            }
            else{
                calculate(entry_time, exit_time, id);
            }
        });
        $(document).on('change', '.exit_time', function (){
            let exit_time = $(this).val();
            let string = $(this).attr('id');
            let split = string.split('_');
            let id = split[1];
            let entry_time = _('entry_' +id).value;
            if(entry_time == ''){
                toastr.error('entry time is not set yet');
            }
            else{
                calculate(entry_time, exit_time, id);
            }
        });
        function calculate(a, b, id){
            let splitted1 = a.split(":");
            let splitted2 = b.split(":");
            let time1 = splitted1[0]+splitted1[1];
            let time2 = splitted2[0]+splitted2[1];
            let time_diff =  time2 - time1;
            let time = Math.round(time_diff/100);
            if(time < 0){
                time = Math.abs(time);
                _('total_' +id).value = time + 1;
            }
            if(time == 0){
                _('total_' +id).value = '12';
            }
            else{
                _('total_' +id).value = time;
            }
        }
    </script>
@endsection
