@extends('master')
@section('content')
    {!! Form::open(['route' => 'attendance.entry_store','method' => 'POST']) !!}
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-md-12">
                            <h4 class="text-center">কর্মচারী এন্ট্রি হাজিরা খাতা | তারিখ : {{date('d-m-Y')}}<hr/></h4>
                            <table class="table table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th> ক্রমিক নং </th>
                                    <th> নাম </th>
                                    <th> উপস্থিত </th>
                                    <th> এন্ট্রি টাইম </th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($employees as $employee)
                                    <tr class="text-center">
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$employee->name}}</td>
                                        <td><input type="checkbox" class="form-control entry_time_check" id="entry_time_check_{{$employee->id}}" data-id="entry_time_check_{{$employee->id}}" value="1"></td>
                                        <td><input type="time" class="form-control entry_time" id="entry_{{$employee->id}}" name="entry_time[]"></td>
                                        <input type="hidden" class="form-control"  name="employee_id[]" value="{{$employee->id}}">
                                        <input type="hidden" class="form-control"  name="date" value="{{date('Y-m-d')}}">
                                        <input type="hidden" class="form-control"  name="exit_time[]">
                                        <input type="hidden" class="form-control"  name="total_time[]" value="0">
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-info">{{'কোনো কর্মচারী নেই'}}</td>
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
        $(document).on('click', '.entry_time_check', function (){
            let check = _($(this).data('id')).checked;
            let string = $(this).attr('id');
            let split = string.split('_');
            let id = split[3];
            if(check == true){
                let date = new Date();
                let h = date.getHours();
                let m = date.getMinutes();
                if(h < 10) h = '0' + h;
                if(m < 10) m = '0' + m;
                _('entry_' + id).value = h + ':' + m;
            }
            else{
                _('entry_' + id).value = '';
            }
        });
    </script>
@endsection
