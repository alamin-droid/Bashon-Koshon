@extends('master')
@section('content')
    @php
        $materials_name = explode(',',str_replace(str_split('[]""'),'',$edit->rawmaterial_id));
        $quantity = explode(',',str_replace(str_split('[]""'),'',$edit->quantity));
        $unit = explode(',',str_replace(str_split('[]""'),'',$edit->unit));
        $rate = explode(',',str_replace(str_split('[]""'),'',$edit->rate_per_unit));
        $supplier_name = explode(',',str_replace(str_split('[]""'),'',$edit->supplier_id));
    @endphp
    {!! Form::open(['class' =>'form-sample','route' => ['purchase.update', $edit->id],'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-rice"></i></span>ক্রয়</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date">তারিখ</label>
                                <input type="date" class="form-control" id="date" name="date" value="{{$edit->date}}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="how_many_item">ক্রয় সংখ্যা টাইপ করুন</label>
                                <input type="number" class="form-control" id="how_many_item" value="{{count($materials_name)}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="add_item">নতুন ক্রয়</label>
                                <button type="button" class="btn btn-info btn-lg btn-block" id="add_item"><i class="mdi mdi-plus menu-icon"></i></button>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="remove_item">ক্রয় মুছে ফেলুন</label>
                                <button type="button" class="btn btn-danger btn-lg btn-block remove_item" id="remove_item"><i class="mdi mdi-minus menu-icon"></i></button>
                            </div>
                        </div>
                    </div>
                    @for($i = 0 ; $i<count($materials_name) ; $i++)
                        <div class="row item_list"><div class="col-md-2"><div class="form-group"><label for="materials_{{$i}}" >কাঁচামাল</label><select class="form-control materials" name="materials[]" id="materials_{{$i}}" data-live-search="true" required><option selected disabled value="">Choose an option</option>@foreach($materials as $material)<option value="{{$material->id}}" @if($material->id == $materials_name[$i]) selected @endif data-tokens="{{$material->name}}">{{Str::upper($material->name)}}</option>@endforeach</select></div></div>
                            <div class="col-md-2"> <div class="form-group"> <label for="quantity_{{$i}}">পরিমাণ</label> <input type="number" class="form-control quantity" id="quantity_{{$i}}" name="quantity[]" value="{{$quantity[$i]}}" required> </div></div>
                            <div class="col-md-2"><div class="form-group"><label for="unit_{{$i}}" >একক</label><input type="text" class="form-control unit" id="unit_{{$i}}" name="unit[]" value="{{'KG'}}" required></div></div>
                            <div class="col-md-2"> <div class="form-group"> <label for="rate_{{$i}}">মূল্য/কেজি</label> <input type="number" class="form-control rate" id="rate_{{$i}}" name="rate[]" value="{{$rate[$i]}}" required> </div></div>
                            <div class="col-md-2"><div class="form-group"><label for="supplier_{{$i}}" >যোগানদার</label><select class="form-control supplier" name="supplier[]" id="supplier_{{$i}}" data-live-search="true" required><option selected disabled value="">Choose an option</option>@foreach($suppliers as $supplier)<option value="{{$supplier->id}}" @if($supplier->id == $supplier_name[$i]) selected @endif data-tokens="{{$supplier->name}}">{{Str::upper($supplier->name)}}</option>@endforeach</select></div></div>
                            <div class="col-md-2"> <div class="form-group"> <label for="minus_item">&nbsp;</label> <button type="button" class="form-control btn btn-danger text-center minus_item" style="border: none !important;"><i class="mdi mdi-minus menu-icon text-center" style="margin-left: -4px"></i></button> </div></div></div>
                    @endfor
                    <div id="append_item">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-rice"></i> আপডেট</button>
        </div>
    </div>
    {!! Form::close() !!}
    <script type="text/javascript">
        function _(x){
            return document.getElementById(x);
        }
        let j = 500000000;

        $(document).on('input','#how_many_item',function(){
            let how_many_item = $(this).val();
            let i;
            let html = '';
            for(i = 0 ; i < how_many_item ; i++){
                html += '<div class="row item_list"><div class="col-md-2"><div class="form-group"><label for="materials_'+ i +'" >কাঁচামাল</label><select class="form-control materials" name="materials[]" id="materials_'+ i +'" data-live-search="true" required><option selected disabled value="">Choose an option</option>@foreach($materials as $material)<option value="{{$material->id}}" data-tokens="{{$material->name}}">{{Str::upper($material->name)}}</option>@endforeach</select></div></div>' +
                    '<div class="col-md-2"> <div class="form-group"> <label for="quantity_'+ i +'">পরিমাণ</label> <input type="number" class="form-control quantity" id="quantity_'+ i +'" name="quantity[]" required> </div></div>' +
                    '<div class="col-md-2"><div class="form-group"><label for="unit_'+ i +'" >একক</label><input type="text" class="form-control unit" id="unit_'+ i +'" name="unit[]" value={{'KG'}} required></div></div>' +
                    '<div class="col-md-2"> <div class="form-group"> <label for="rate_'+ i +'">মূল্য/কেজি</label> <input type="number" class="form-control rate" id="rate_'+ i +'" name="rate[]" required> </div></div>' +
                    '<div class="col-md-2"><div class="form-group"><label for="supplier_'+ i +'" >যোগানদার</label><select class="form-control supplier" name="supplier[]" id="supplier_'+ i +'" data-live-search="true" required><option selected disabled value="">Choose an option</option>@foreach($suppliers as $supplier)<option value="{{$supplier->id}}" data-tokens="{{$supplier->name}}">{{Str::upper($supplier->name)}}</option>@endforeach</select></div></div>' +
                    '<div class="col-md-2"> <div class="form-group"> <label for="minus_item">&nbsp;</label> <button type="button" class="form-control btn btn-danger text-center minus_item" style="border: none !important;"><i class="mdi mdi-minus menu-icon text-center" style="margin-left: -4px"></i></button> </div></div></div>'
            }
            $('#append_item').empty().append(html);
            calculate();
        });
        $(document).on('click','#add_item',function(){
            let html = '';
            j += 1;
            html +=  '<div class="row item_list"><div class="col-md-2"><div class="form-group"><label for="materials_'+ j +'" >কাঁচামাল</label><select class="form-control materials" name="materials[]" id="materials_'+ j +'" data-live-search="true" required><option selected disabled value="">Choose an option</option>@foreach($materials as $material)<option value="{{$material->id}}" data-tokens="{{$material->name}}">{{Str::upper($material->name)}}</option>@endforeach</select></div></div>' +
                '<div class="col-md-2"> <div class="form-group"> <label for="quantity_'+ j +'">পরিমাণ</label> <input type="number" class="form-control quantity" id="quantity_'+ j +'" name="quantity[]" required> </div></div>' +
                '<div class="col-md-2"><div class="form-group"><label for="unit_'+ j +'" >একক</label><input type="text" class="form-control unit" id="unit_'+ j +'" name="unit[]" value={{'KG'}} required></div></div>' +
                '<div class="col-md-2"> <div class="form-group"> <label for="rate_'+ j +'">মূল্য/কেজি</label> <input type="number" class="form-control rate" id="rate_'+ j +'" name="rate[]" required> </div></div>' +
                '<div class="col-md-2"><div class="form-group"><label for="supplier_'+ j +'" >যোগানদার</label><select class="form-control supplier" name="supplier[]" id="supplier_'+ j +'" data-live-search="true" required><option selected disabled value="">Choose an option</option>@foreach($suppliers as $supplier)<option value="{{$supplier->id}}" data-tokens="{{$supplier->name}}">{{Str::upper($supplier->name)}}</option>@endforeach</select></div></div>' +
                '<div class="col-md-2"> <div class="form-group"> <label for="minus_item">&nbsp;</label> <button type="button" class="form-control btn btn-danger text-center minus_item" style="border: none !important;"><i class="mdi mdi-minus menu-icon text-center" style="margin-left: -4px"></i></button> </div></div></div>'
            $('#append_item').append(html);
            calculate();
        });
        $(document).on('click','.minus_item',function(){
            $(this).parent().parent().parent().remove();
        });
        $(document).on('click','.remove_item',function(){
            $(".item_list:last").remove();
        });
    </script>
@endsection
