@extends('master')
@section('content')
    @php
        $i = 0;
    @endphp
    {!! Form::open(['class' =>'form-sample','route' => 'shooter.store','method' => 'POST']) !!}
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span> শ্যুটার</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="date">তারিখ</label>
                                <input type="date" class="form-control" name="date" id="date" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="client_id" >গ্রাহক</label>
                                <select class="form-control" name="client_id" id="client_id">
                                    <option selected disabled value="">Choose an option</option>
                                    @foreach($clients as $client)
                                        <option value="{{$client->id}}">{{$client->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="before_shooter_qty">চালের বস্তা গ্রহন</label>
                                <input type="text" class="form-control" name="before_shooter_qty" id="before_shooter_qty" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="after_shooter_qty">চালের বস্তা প্রদান</label>
                                <input type="text" class="form-control" name="after_shooter_qty" id="after_shooter_qty" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="shooter_price_per_bag">মূল্য/বস্তা</label>
                                <input type="text" class="form-control" name="shooter_price_per_bag" id="shooter_price_per_bag" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="shooter_total_price">মোট শ্যুটার মুল্য</label>
                                <input type="text" class="form-control" name="shooter_total_price" id="shooter_total_price" readonly required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="excess_item_{{$i}}" >পণ্য</label>
                                <select class="form-control excess_item" name="excess_item[]" id="excess_item_{{$i}}">
                                    <option selected disabled value="">Choose an option</option>
                                    @foreach($finished_goods as $finished_good)
                                        <option value="{{$finished_good->id}}">{{$finished_good->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="excess_item_qty_{{$i}}">পরিমাণ/বস্তা</label>
                                <input type="number" class="form-control quantity" name="excess_item_qty[]" id="excess_item_qty_{{$i}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="excess_item_price_bag_{{$i}}">মূল্য/বস্তা</label>
                                <input type="number" class="form-control excess_item_price_bag" name="excess_item_price_bag[]" id="excess_item_price_bag_{{$i}}" >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="excess_item_total_price_{{$i}}">সাব-টোটাল</label>
                                <input type="number" class="form-control excess_item_total_price" name="excess_item_total_price[]" id="excess_item_total_price_{{$i}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="item"></label>
                                <button type="button" class="btn btn-info btn-lg btn-block" id="add_item"><i class="mdi mdi-plus menu-icon text-center"></i></button>
                            </div>
                        </div>
                    </div>
                    <div id="append_item"></div>
                </div>
            </div>
            <br/>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="total">মোট মূল্য</label>
                                <input type="text" class="form-control" name="total" id="total" readonly required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="due">বাকী</label>
                                <input type="text" class="form-control" name="due" id="due" readonly required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="payment">পেমেন্ট</label>
                                <input type="number" class="form-control" name="payment" id="payment" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="mode_of_payment" >টাকা গ্রহ্নের মাধ্যম</label>
                                <select class="form-control" name="mode_of_payment" id="mode_of_payment" required>
                                    <option selected disabled value="">Choose an option</option>
                                    <option value="1">Cash</option>
                                    <option value="2">Bank</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12" id="bank_field" style="display: none">
                            <div class="form-group">
                                <label for="bank_account" >ব্যাংক</label>
                                <select class="form-control" name="bank_account" id="bank_account">
                                    <option selected disabled value="">Choose an option</option>
                                    @foreach($banks as $bank)
                                        <option value="{{$bank->account}}">{{$bank->account}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="note">বিস্তারিত</label>
                                <textarea class="form-control" id="notes" name="notes" rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6"><button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-account"></i> তৈরী করুন </button></div>
        <div class="col-md-3"></div>
    </div>
    {!! Form::close() !!}
    <script>
        let i=0;
        function _(x){
            return document.getElementById(x);
        }
        $(document).on('click', '#add_item', function (){
            i++;
            var html ='';
            html += '<div class="row"> <div class="col-md-3">\n' + '<div class="form-group">\n' + '<label for="excess_item_'+ i + '" >পণ্য</label>\n' + '<select class="form-control excess_item" name="excess_item[]" id="excess_item_'+ i + '"  >\n' + '<option selected disabled value="">Choose an option</option>\n' + '@foreach($finished_goods as $finished_good)\n' + '<option value="{{$finished_good->id}}">{{$finished_good->name}}</option>\n' + '@endforeach\n' + '</select>\n' + '</div>\n' + '</div><div class="col-md-2"> <div class="form-group"> <label for="excess_item_qty_'+ i + '">পরিমান/বস্তা</label> <input type="number" id="excess_item_qty_'+ i + '" name="excess_item_qty[]" class="form-control excess_item_qty"> </div> </div><div class="col-md-2"> <div class="form-group"> <label for="excess_item_price_bag_'+ i + '">মূল্য/বস্তা</label> <input type="number" id="excess_item_price_bag_' + i + '" name="excess_item_price_bag[]" class="form-control excess_item_price_bag"> </div> </div><div class="col-md-3"><div class="form-group"><label class="excess_item_total_price_'+ i +'">সাব-টোটাল</label><input type="number" class="form-control excess_item_total_price" name="excess_item_total_price[]" id="excess_item_total_price_'+ i +'" readonly></div></div><div class="col-md-2"><label for="item"></label> <div class="form-group"><button type="button" class="btn btn-danger btn-lg btn-block minus_item" id="minus_item_' + i + '"><i class="mdi mdi-minus menu-icon"></i></button></div> </div></div>'
            $('#append_item').append(html);
        });
        $(document).on('click','.minus_item',function(){
            $(this).parent().parent().parent().remove();
            calculate();
        });
        $(document).on('input', '#after_shooter_qty', function (){
            calculate();
        });
        $(document).on('input', '#shooter_price_per_bag', function (){
            calculate();
        });
        $(document).on('input', '.excess_item_qty', function (){
            calculate();
        });
        $(document).on('input', '.excess_item_price_bag', function (){
            let unit_price = $(this).val();
            let string = $(this).attr('id');
            let split = string.split('_');
            let id = split[4];
            let qty = _('excess_item_qty_' + id).value;
            _('excess_item_total_price_' + id).value = qty * unit_price;
            calculate();
        });
        $(document).on('input', '#payment', function (){
            calculate();
        });
        function calculate(){
            let qty = _('after_shooter_qty').value;
            let unit_price = _('shooter_price_per_bag').value;
            _('shooter_total_price').value = qty * unit_price;
            let sum = 0;
            let payment = _('payment').value;
            let shooter_total_price = _('shooter_total_price').value;
            $('.excess_item_total_price').each(function(){
                sum += + $(this).val();
            });
            _('total').value = shooter_total_price - +sum;
            _('due').value = shooter_total_price - +payment - +sum;
        }
        $(document).on('change', '#mode_of_payment', function (){
            let string = $(this).val();
            if(string == 2){
                $('#bank_field').show();
            }
            else{
                _('bank_account').value ='';
                $('#bank_field').hide();
            }
        });
    </script>
@endsection

