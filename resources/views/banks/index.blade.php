@extends('master')
@section('content')
    <div class="container">
         <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h2 class="text-center text-info">Banks<hr/></h2><br/>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th> S/L</th>
                                    <th>Bank Name</th>
                                    <th> Branch </th>
                                    <th> Account Number </th>
                                    <th> Option </th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($banks as $bank)
                                    <tr>
                                        <td>{{ ($banks->currentpage()-1) * $banks ->perpage() + $loop->index + 1 }}</td>
                                        <td>{{$bank->bank_name}}</td>
                                        <td>{{$bank->branch}} </td>
                                        <td>{{$bank->account}} </td>
                                        <td>
                                            <button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='{{route('bank.edit',$bank->id)}}'" data-toggle="tooltip" title="Edit">Edit</button>
                                            <button type="button" class="btn btn-inverse-primary btn-sm btn-block" onclick="window.location='{{route('bank.show',$bank->id)}}'" data-toggle="tooltip" title="Show">Show</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-info">{{'No Bank Created Yet'}}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            {!! $banks->links() !!}
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
