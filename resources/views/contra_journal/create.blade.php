@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => 'contra_journal.store','method' => 'POST']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-plus"></i></span> কন্ট্রা জার্নাল</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="date"> তারিখ </label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="form-group">
                        <label for="transfer_from">দেনাদার</label>
                        <select class="form-control" name="transfer_from" id="transfer_from" >
                            <option selected disabled value="">choose an option</option>
                            <option value="0">Cash</option>
                            @foreach($banks as $bank)
                                <option value="{{$bank->account}}">{{$bank->account}}</option>
                            @endforeach
                            @foreach($owners as $owner)
                                <option value="{{$owner->id}}">{{$owner->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="amount">টাকার পরিমান</label>
                        <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter Amount" required>
                    </div>
                    <div class="form-group">
                        <label for="transfer_to">পাওনাদার</label>
                        <select class="form-control" name="transfer_to" id="transfer_to" >
                            <option selected disabled value="">choose an option</option>
                            <option value="0">Cash</option>
                            @foreach($banks as $bank)
                                <option value="{{$bank->account}}">{{$bank->account}}</option>
                            @endforeach
                            @foreach($owners as $owner)
                                <option value="{{$owner->id}}">{{$owner->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="details">বিস্তারিত</label>
                        <textarea class="form-control" id="details" name="details"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row" style="display: none">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-12"><h3>Overview<hr/></h3></div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="transfer_amount_to">Transfer Amount To</label>
                                <input type="text" class="form-control" id="transfer_amount_to" name="transfer_amount_to" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="debit">Debit</label>
                                <input type="text" class="form-control" id="debit" name="debit" value="DR" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="debit_amount">Debit Amount</label>
                                <input type="text" class="form-control" id="debit_amount" name="debit_amount" readonly>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="transfer_amount_from">Transfer Amount From</label>
                                <input type="text" class="form-control" id="transfer_amount_from" name="transfer_amount_from" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="credit">Credit</label>
                                <input type="text" class="form-control" id="credit" name="credit" value="CR" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="credit_amount">Credit Amount</label>
                                <input type="text" class="form-control" id="credit_amount" name="credit_amount" readonly>
                            </div>
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
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-plus"></i> তৈরী করুন </button>
        </div>
    </div>
    {!! Form::close() !!}

    <script type="text/javascript">
        function _(x){
            return document.getElementById(x);
        }
        $(document).on('change', '#transfer_from', function (){
            _('transfer_amount_from').value = $(this).val();

        });
        $(document).on('input', '#amount', function (){
            _('debit_amount').value = $(this).val();
            _('credit_amount').value = $(this).val();

        });
        $(document).on('change', '#transfer_to', function (){
            _('transfer_amount_to').value = $(this).val();

        });
    </script>
@endsection
