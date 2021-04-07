@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => 'payment.store','method' => 'POST']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-plus"></i></span> নতুন পেমেন্ট</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="date"> তারিখ </label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="form-group">
                        <label for="supplier_id">যোগানদার</label>
                        <select class="form-control" name="supplier_id" id="supplier_id" >
                            <option selected disabled value="">choose an option</option>
                            @foreach($suppliers as $supplier)
                                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="due_amount">বকেয়া টাকা</label>
                        <input type="number" class="form-control" id="due_amount" name="due_amount" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="amount">প্রদত্ত টাকা</label>
                        <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter Amount" required>
                    </div>
                    <div class="form-group">
                        <label for="mode_of_payment">টাকা প্রদানের মাধ্যম</label>
                        <select class="form-control" name="mode_of_payment" id="mode_of_payment">
                            <option selected disabled value="">choose an option</option>
                            <option value="bank">Bank</option>
                            <option value="cash">Cash</option>
                        </select>
                    </div>
                    <div class="form-group" id="bank_id_field" style="display: none">
                        <label for="bank_account">ব্যাংক</label>
                        <select class="form-control" name="bank_account" id="bank_account">
                            <option selected disabled value="">choose an option</option>
                            @foreach($banks as $bank)
                                <option value="{{$bank->account}}">{{$bank->account}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/><br/><br/>
    <div class="row" id="overview">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-12"><h3>ওভারভিউ<hr/></h3></div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="overview_mode_of_payment">টাকা প্রদানের মাধ্যম</label>
                                <input type="text" class="form-control" id="overview_mode_of_payment" name="overview_mode_of_payment" readonly required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="debit">ডেবিট</label>
                                <input type="text" class="form-control" id="debit" name="debit" value="DR" readonly required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="debit_amount">ডেবিট টাকার পরিমান</label>
                                <input type="text" class="form-control" id="debit_amount" name="debit_amount" readonly required>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="mode_of_payment_name">টাকা প্রদানের মাধ্যমের নাম</label>
                                <input type="text" class="form-control" id="mode_of_payment_name" name="mode_of_payment_name" readonly required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="credit">ক্রেডিট</label>
                                <input type="text" class="form-control" id="credit" name="credit" value="CR" readonly required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="credit_amount">ক্রেডিট টাকার পরিমান</label>
                                <input type="text" class="form-control" id="credit_amount" name="credit_amount" readonly required>
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
        $(document).on('change', '#supplier_id', function (){
            let supplier_id = $(this).val();
            _('due_amount').value = '';
            $.ajax({
                url : '/supplier_due/' + supplier_id,
                method : 'GET',
                success:function(data){
                    _('due_amount').value = data;
                }
            });
        });
        $(document).on('input', '#amount', function (){
           let due = _('due_amount').value;
           let amount = $(this).val();
           if(amount > due){
               toastr.error("amount exceeds due amount");
               _('amount').value = '';
               _('debit_amount').value = '';
               _('credit_amount').value = '';
           }
            _('debit_amount').value = _('amount').value;
            _('credit_amount').value = _('amount').value;
        });
        $(document).on('change', '#mode_of_payment', function (){
            _('overview_mode_of_payment').value = $(this).val();
            $('#bank_account').val('');
            $('#bank_id_field').hide();
            if($(this).val() == 'bank'){
                _('mode_of_payment_name').value = '';
                $('#bank_id_field').show();
                $(document).on('change', '#bank_account', function (){
                    let bank_account = $('#bank_account').val();
                    _('mode_of_payment_name').value = bank_account;
                });
            }
            else{
                _('mode_of_payment_name').value = $(this).val();
            }
        });
    </script>
@endsection
