@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => 'collection.store','method' => 'POST']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-currency-usd"></i></span>কালেকশন</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="date"> তারিখ </label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="form-group">
                        <label for="collection for">গ্রাহক (পাইকারি/ খুচরা)</label>
                        <select class="form-control" name="collection_for" id="collection_for" required>
                            <option selected disabled value="">choose an option</option>
                                <option value="client">Dealer</option>
                                <option value="retail">Retailer</option>
                        </select>
                    </div>
                    <div class="form-group" id="client_id_field" style="display: none">
                        <label for="clients">গ্রাহক</label>
                        <select class="form-control" name="client_id" id="client_id" >
                            <option selected disabled value="">choose an option</option>
                            @foreach($clients as $client)
                                <option value="{{$client->id .'_'.$client->name}}">{{$client->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" id="due_amount_field" style="display: none">
                        <label for="due_amount"> বকেয়া টাকা </label>
                        <input type="number" class="form-control" id="due_amount" name="due_amount" readonly >
                    </div>
                    <div class="form-group" id="retail_sell_field" style="display: none">
                        <label for="retail_sell"> খুচরা গ্রাহক </label>
                        <input type="text" class="form-control" id="retail_sell" name="retail_sell" >
                    </div>
                    <div class="form-group">
                        <label for="amount"> টাকার পরিমান </label>
                        <input type="number" class="form-control payment" id="amount" name="amount" placeholder="10,000 /-" required>
                    </div>
                    <div class="form-group">
                        <label for="mode_of_payment_received">টাকা গ্রহনের মাধ্যম</label>
                        <select class="form-control" name="mode_of_payment_received" id="mode_of_payment_received" required>
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
    <br/><br/>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-12"><h3>ওভারভিউ<hr/></h3></div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="mode_of_payment_name">টাকা গ্রহনের মাধ্যমের নাম</label>
                                <input type="text" class="form-control" id="mode_of_payment_name" name="mode_of_payment_name" readonly>
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
                                <input type="text" class="form-control" id="debit_amount" name="debit_amount" readonly>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="client_name">গ্রাহকের নাম</label>
                                <input type="text" class="form-control" id="client_name" name="client_name" readonly>
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
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-currency-usd"></i> তৈরী করুন </button>
        </div>
    </div>
    {!! Form::close() !!}
    <script type="text/javascript">
        function _(x){
            return document.getElementById(x);
        }
        $(document).on('change', '#collection_for', function (){
           let value_id = $(this).val();
           if(value_id == 'client'){
               $('#client_id_field').show();
               $('#retail_sell_field').hide();
               _('retail_sell').value = '';
               _('due_amount').value = '';
               _('client_name').value = '';
           }
           if(value_id == 'retail'){
               $('#client_id_field').hide();
               $('#due_amount_field').hide();
               $('#client_id').empty();
               $('#retail_sell_field').show();
               _('retail_sell').value = '';
               _('due_amount').value = '';
               _('client_name').value = '';
           }
        });
        $(document).on('change', '#client_id', function (){
            $('#due_amount_field').show();
            let string = $(this).val();
            let cid = string.split("_");
            $.ajax({
                url : '/client_id/' + cid[0],
                method : 'GET',
                success:function(data){
                    _('due_amount').value = data;
                }
            });
            _('client_name').value = cid[1];
        });
        $(document).on('input', '#retail_sell', function (){
           _('client_name').value = $(this).val();
        });
        $(document).on('change', '#mode_of_payment_received', function (){
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
        $(document).on('input', '#amount', function (){
            let amount = $(this).val();
            _('debit_amount').value = amount;
            _('credit_amount').value = amount;
        });
    </script>
@endsection
