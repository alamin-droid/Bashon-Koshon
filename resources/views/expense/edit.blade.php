@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => ['expense.update', $edit->id],'method' => 'PATCH']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-currency-usd"></i></span> খরচ</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="date"> তারিখ </label>
                        <input type="date" class="form-control" id="date" name="date" value="{{$edit->date}}" required>
                    </div>
                    <div class="form-group">
                        <label for="item"> পণ্যের নাম </label>
                        <input type="text" class="form-control" id="item" name="item"  value="{{$edit->item_name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="amount"> খরচের পরিমান </label>
                        <input type="number" class="form-control payment" id="amount" name="amount" placeholder="10,000 /-" value="{{$edit->amount}}" required>
                    </div>
                    <div class="form-group" id="mode_of_payment_field">
                        <label for="mode_of_payment">খরচের মাধ্যম</label>
                        <select class="form-control" name="mode_of_payment" id="mode_of_payment">
                            <option selected disabled value="">choose an option</option>
                            <option value="bank" @if($edit->mode_of_payment == 'bank') selected @endif>Bank</option>
                            <option value="cash" @if($edit->mode_of_payment == 'cash') selected @endif>Cash</option>
                        </select>
                    </div>
                    <div class="form-group" id="bank_field" @if($edit->mode_of_payment == 'cash') style="display: none" @endif>
                        <label for="bank">ব্যাংক</label>
                        <select class="form-control" name="bank" id="bank">
                            <option selected disabled value="">choose an option</option>
                            @foreach($banks as $bank)
                                <option value="{{$bank->account}}" @if($edit->mode_of_payment_name == $bank->account) selected @endif>{{$bank->account}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row text-center" id="overview1">
                        <div class="col-md-12"><h3>ওভারভিউ<hr/></h3></div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="item_name">পণ্যের নাম</label>
                                <input type="text" class="form-control" id="item_name" name="item_name" value="{{$edit->item_name}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="debit">ডেবিট</label>
                                <input type="text" class="form-control" id="debit" name="debit" value="DR" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="debit_amount">ডেবিট টাকার পরিমান</label>
                                <input type="text" class="form-control" id="debit_amount" name="debit_amount" value="{{$edit->debit_amount}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="mode_of_payment_name">খরচের মাধ্যমের নাম</label>
                                <input type="text" class="form-control" id="mode_of_payment_name" name="mode_of_payment_name" value="{{$edit->mode_of_payment_name}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="credit">ক্রেডিট</label>
                                <input type="text" class="form-control" id="credit" name="credit" value="CR" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="credit_amount">ক্রেডিট টাকার পরিমান</label>
                                <input type="text" class="form-control" id="credit_amount" name="credit_amount" value="{{$edit->credit_amount}}" readonly>
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
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-currency-usd"></i> আপডেট </button>
        </div>
    </div>
    {!! Form::close() !!}
    <script type="text/javascript">
        function _(x){
            return document.getElementById(x);
        }
        $(document).on('input', '#item', function (){
            _('item_name').value = $(this).val();
        });
        $(document).on('input', '#amount', function (){
            _('debit_amount').value = $(this).val();
            _('credit_amount').value = $(this).val();
        });
        $(document).on('change', '#mode_of_payment', function (){
            let value = $(this).val();
            if(value == 'bank'){
                $('#bank_field').show();
                $(document).on('change', '#bank', function (){
                    _('mode_of_payment_name').value = $('#bank').val();
                });
            }
            else{
                $("#bank").removeAttr('required');
                $('#bank_field').hide();
                _('mode_of_payment_name').value = $(this).val();
            }
        });
    </script>
@endsection
