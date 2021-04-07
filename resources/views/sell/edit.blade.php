@extends('master')
@section('content')
    @php
        $finishedgood_ids = explode(',',str_replace(str_split('[]""'),'',$sell->finishedgood_id));
        $quantitites = explode(',',str_replace(str_split('[]""'),'',$sell->quantity));
        $rate_per_units = explode(',',str_replace(str_split('[]""'),'',$sell->rate_per_unit));
    @endphp
    {!! Form::open(['class' =>'form-sample','route' => ['sell.update', $sell->id],'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-pencil"></i></span> বিক্রয়</h3></div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="date">তারিখ</label>
                            <input type="date" class="form-control" name="date" id="date" value="{{$sell->date}}" required>
                        </div>
                        <div class="form-group">
                            <label for="buyer" >ক্রেতা</label>
                            <select class="form-control" name="buyer" id="buyer">
                                <option selected disabled value="">Choose an option</option>
                                <option value="client" @if(!empty($sell->client_id)) selected @endif>পাইকারি বিক্রয়</option>
                                <option value="retailer" @if(!empty($sell->retail_sell)) selected @endif>খুচরা বিক্রয়</option>
                            </select>
                        </div>
                        <div class="form-group" id="client_field" @if(empty($sell->client_id)) style="display: none" @endif>
                            <label for="client_id" >গ্রাহক</label>
                            <select class="form-control" name="client_id" id="client_id">
                                <option selected disabled value="">Choose an option</option>
                                @foreach($clients as $client)
                                    <option value="{{$client->id}}" @if($sell->client_id == $client->id) selected @endif>{{$client->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" id="retail_sell_field" @if(empty($sell->retail_sell)) style="display: none" @endif>
                            <label class="retail_Sell">খুচরা গ্রাহক</label>
                            <input type="text" class="form-control" name="retail_sell" id="retail_sell" value="{{$sell->retail_sell}}">
                        </div>
                        @for($i=0; $i<count($finishedgood_ids) ; $i++)
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="finishedgood_id" >পণ্য</label>
                                    <select class="form-control" name="finishedgood_id[]" id="finishedgood_id" required>
                                        <option selected disabled value="">Choose an option</option>
                                        @foreach($finishedgoods as $finishedgood)
                                            <option value="{{$finishedgood->id}}" @if($finishedgood->id == $finishedgood_ids[$i]) selected @endif>{{$finishedgood->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="quantity">পরিমাণ (কেজি)</label>
                                    <input type="number" class="form-control" name="quantity[]" id="quantity" value="{{$quantitites[$i]}}" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="rate_per_unit">মূল্য/কেজি</label>
                                    <input type="number" class="form-control" name="rate_per_unit[]" id="rate_per_unit" value="{{$rate_per_units[$i]}}" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="item"></label>
                                    <button type="button" class="btn btn-gradient-info btn-lg btn-block" id="add_item"><i class="mdi mdi-plus menu-icon text-center"></i></button>
                                </div>
                            </div>
                        </div>
                        @endfor
                        <div id="append_item">

                        </div>
                        <div class="form-group">
                            <label for="warehouse_id" >গোডাউন</label>
                            <select class="form-control" name="warehouse_id" id="warehouse_id" readonly>
                                <option selected disabled value="">Choose an option</option>
                                @foreach($warehouses as $warehouse)
                                    <option value="{{$warehouse->id}}" @if($warehouse->id == $sell->warehouse_id) selected @endif>{{$warehouse->name}}</option>
                                @endforeach
                            </select>
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
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-pencil"></i> আপডেট </button>
        </div>
    </div>
    {!! Form::close() !!}
    <script>
        function _(x){
            return document.getElementById(x);
        }
        $(document).on('click', '#buyer', function (){
            let val = $(this).val();
            console.log(val);
            if(val == 'client'){
                $('#client_field').show();
                $('#retail_sell').val('');
                $('#retail_sell_field').hide();
            }
            if(val == 'retailer'){
                $('#retail_sell_field').show();
                $('#client_id').val('');
                $('#client_field').hide();
            }
        });
        $(document).on('click', '#add_item', function (){
            var html ='';
            html += '<div class="row"> <div class="col-md-3">\n' + '<div class="form-group">\n' + '<label for="finishedgood_id" >পণ্য</label>\n' + '<select class="form-control" name="finishedgood_id[]" id="finishedgood_id" required >\n' + '<option selected disabled value="">Choose an option</option>\n' + '@foreach($finishedgoods as $finishedgood)\n' + '    <option value="{{$finishedgood->id}}">{{$finishedgood->name}}</option>\n' + '@endforeach\n' + '</select>\n' + '</div>\n' + '</div><div class="col-md-3"> <div class="form-group"> <label for="quantity">পরিমাণ</label> <input type="number" id="rawmaterials_quantity" name="quantity[]" class="form-control" required> </div> </div><div class="col-md-3"> <div class="form-group"> <label for="rate_per_unit">মূল্য/কেজি</label> <input type="number" id="rate_per_unit" name="rate_per_unit[]" class="form-control" required> </div> </div><div class="col-md-3"><label for="item"></label> <div class="form-group"><button type="button" class="btn btn-gradient-info btn-lg btn-block" id="minus_item"><i class="mdi mdi-minus menu-icon"></i></button></div> </div></div>'
            $('#append_item').append(html);
        });
        $(document).on('click','#minus_item',function(){
            $(this).parent().parent().parent().remove();

        });
    </script>
@endsection

