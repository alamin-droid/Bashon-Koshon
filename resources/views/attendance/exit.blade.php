@extends('master')
@section('content')
    {!! Form::open(['route' => 'attendance.exit_store','method' => 'POST']) !!}
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-md-12">
                            <h4 class="text-center">কর্মচারী এক্সিট হাজিরা খাতা | তারিখ : {{date('d-m-Y')}}<hr/></h4>
                            <table class="table table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th> ক্রমিক নং </th>
                                    <th> নাম </th>
                                    <th> উপস্থিত </th>
                                    <th> এক্সিট টাইম </th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($employees as $employee)
                                    <tr class="text-center">
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$employee->name}}</td>
                                        <td><input type="checkbox" class="form-control exit_time_check" id="exit_time_check_{{$employee->id}}" data-id="exit_time_check_{{$employee->id}}" value="1"></td>
                                        <td><input type="time" class="form-control exit_time" id="exit_{{$employee->id}}" name="exit_time[]"></td>
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
        $(document).on('click', '.exit_time_check', function (){
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
                _('exit_' + id).value = h + ':' + m;
            }
            else{
                _('exit_' + id).value = '';
            }
        });
    </script>
@endsection
