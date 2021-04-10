@extends('master')
@section('content')
    @php
    $i = 0;
    @endphp
    {!! Form::open(['class' =>'form-sample','route' => 'sell.store','method' => 'POST']) !!}
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span> বিক্রয়</h3></div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="date">তারিখ</label>
                            <input type="date" class="form-control" name="date" id="date" required>
                        </div>
                        <div class="form-group">
                            <label for="client_id" >গ্রাহক</label>
                            <select class="form-control" name="client_id" id="client_id">
                                <option selected disabled value="">Choose an option</option>
                                @foreach($clients as $client)
                                    <option value="{{$client->id}}">{{$client->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="total">মোট মূল্য</label>
                                    <input type="number" class="form-control" name="total" id="total" readonly required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="payment">payment</label>
                                    <input type="number" class="form-control" name="payment" id="payment" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="mode_of_payment" >mode_of_payment</label>
                                    <select class="form-control" name="mode_of_payment" id="mode_of_payment" required>
                                        <option selected disabled value="">Choose an option</option>
                                        <option value="1">Cash</option>
                                        <option value="2">Bank</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3" id="bank_field" style="display: none">
                                <div class="form-group">
                                    <label for="bank_account" >bank</label>
                                    <select class="form-control" name="bank_account" id="bank_account">
                                        <option selected disabled value="">Choose an option</option>
                                        @foreach($banks as $bank)
                                            <option value="{{$bank->account}}">{{$bank->account}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="finished_good_id_{{$i}}" >পণ্য</label>
                                    <select class="form-control" name="finished_good_id[]" id="finished_good_id_{{$i}}" required>
                                        <option selected disabled value="">Choose an option</option>
                                        @foreach($finished_goods as $finished_good)
                                            <option value="{{$finished_good->id}}">{{$finished_good->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="quantity_{{$i}}">পরিমাণ/বস্তা</label>
                                    <input type="number" class="form-control quantity" name="quantity[]" id="quantity_{{$i}}" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="quantity_kg_{{$i}}">পরিমাণ /কেজি</label>
                                    <input type="number" class="form-control quantity_kg" name="quantity_kg[]" id="quantity_kg_{{$i}}" readonly required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="unit_price_{{$i}}">মূল্য/বস্তা</label>
                                    <input type="number" class="form-control unit_price" name="unit_price[]" id="unit_price_{{$i}}" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="total_price_{{$i}}">সাব-টোটাল</label>
                                    <input type="number" class="form-control total_price" name="total_price[]" id="total_price_{{$i}}" readonly required>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="item"></label>
                                    <button type="button" class="btn btn-gradient-info btn-lg btn-block" id="add_item"><i class="mdi mdi-plus menu-icon text-center"></i></button>
                                </div>
                            </div>
                        </div>
                        <div id="append_item">

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
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-account"></i> তৈরী করুন </button>
        </div>
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
            html += '<div class="row"> <div class="col-md-2">\n' + '<div class="form-group">\n' + '<label for="finished_good_id_'+ i + '" >পণ্য</label>\n' + '<select class="form-control finished_good_id" name="finished_good_id[]" id="finished_good_id_'+ i + '" required >\n' + '<option selected disabled value="">Choose an option</option>\n' + '@foreach($finished_goods as $finished_good)\n' + '<option value="{{$finished_good->id}}">{{$finished_good->name}}</option>\n' + '@endforeach\n' + '</select>\n' + '</div>\n' + '</div><div class="col-md-2"> <div class="form-group"> <label for="quantity_'+ i + '">পরিমান/বস্তা</label> <input type="number" id="quantity_'+ i + '" name="quantity[]" class="form-control quantity" required> </div> </div><div class="col-md-2"><div class="form-group"><label class="quantity_kg_'+ i + '">পরিমাণ /কেজি</label><input type="number" class="form-control quantity_kg" name="quantity_kg[]" id="quantity_kg_' + i + '" readonly required></div></div><div class="col-md-2"> <div class="form-group"> <label for="unit_price_'+ i + '">মূল্য/বস্তা</label> <input type="number" id="unit_price_' + i + '" name="unit_price[]" class="form-control unit_price" required> </div> </div><div class="col-md-2"><div class="form-group"><label class="total_price_'+ i +'">সাব-টোটাল</label><input type="number" class="form-control total_price" name="total_price[]" id="total_price_'+ i +'" readonly required></div></div><div class="col-md-1"><label for="item"></label> <div class="form-group"><button type="button" class="btn btn-gradient-info btn-lg btn-block" id="minus_item"><i class="mdi mdi-minus menu-icon"></i></button></div> </div></div>'
            $('#append_item').append(html);
        });
        $(document).on('click','#minus_item',function(){
            $(this).parent().parent().parent().remove();
        });
        $(document).on('input', '.quantity', function (){
            let quantity = $(this).val();
            let string = $(this).attr('id');
            let split = string.split('_');
            let id = split[1];
            let quantity_kg = quantity * 50;
            _('quantity_kg_' + id).value = quantity_kg;
            calculate();
        });
        $(document).on('input', '.unit_price', function (){
            let unit_price = $(this).val();
            let string = $(this).attr('id');
            let split = string.split('_');
            let id = split[2];
            let qty = _('quantity_' + id).value;
            _('total_price_' + id).value = qty * unit_price;
            calculate();
        });
        function calculate(){
            let sum = 0;
            $('.total_price').each(function(){
                sum += + $(this).val();
            });
            _('total').value = sum;
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

