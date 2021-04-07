@extends('master')
@section('content')
    @php
            $rawmaterials_id = explode(',',str_replace(str_split('[]""'),'',$production->rawmaterials_id));
            $rawmaterials_quantity = explode(',',str_replace(str_split('[]""'),'',$production->rawmaterials_quantity));
            $rawmaterials_unit = explode(',',str_replace(str_split('[]""'),'',$production->rawmaterials_unit));
    @endphp
    {!! Form::open(['class' =>'form-sample','route' => ['production.update', $production->id],'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-pencil"></i></span> উৎপাদন</h3></div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="date">তারিখ</label>
                            <input type="date" class="form-control" name="date" id="date" value="{{$production->date}}" required>
                        </div>
                        <div class="form-group">
                            <label for="finishedgood_id" >উৎপাদিত পণ্য</label>
                            <select class="form-control" name="finishedgood_id" id="finishedgood_id" required>
                                <option selected disabled value="">Choose an option</option>
                                @foreach($finishedgoods as $finishedgood)
                                    <option value="{{$finishedgood->id}}" @if($finishedgood->id == $production->finishedgood_id) selected @endif>{{$finishedgood->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="finishedgood_quantity">পরিমাণ (কেজি)</label>
                            <input type="number" class="form-control" name="finishedgood_quantity" id="finishedgood_quantity" value="{{$production->finishedgood_quantity}}" required>
                        </div>
                        @for($i=0; $i<count($rawmaterials_id) ; $i++)
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="rawmaterials_id" >কাঁচামাল</label>
                                    <select class="form-control" name="rawmaterials_id[]" id="rawmaterials_id" required >
                                        <option selected disabled value="">Choose an option</option>
                                        @foreach($rawmaterials as $rawmaterial)
                                            <option value="{{$rawmaterial->id}}" @if($rawmaterial->id == $rawmaterials_id[$i]) selected @endif>{{$rawmaterial->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="quantity">পরিমাণ</label>
                                    <input type="number" id="rawmaterials_quantity" name="rawmaterials_quantity[]" class="form-control" value="{{$rawmaterials_quantity[$i]}}" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="unit">একক</label>
                                    <input type="text" id="unit" name="unit[]" class="form-control" value="KG" readonly>
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
                            <select class="form-control" name="warehouse_id" id="warehouse_id" required>
                                <option selected disabled value="">Choose an option</option>
                                @foreach($warehouses as $warehouse)
                                    <option value="{{$warehouse->id}}" @if($warehouse->id == $production->warehouse_id) selected @endif>{{$warehouse->name}}</option>
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
        $(document).on('click', '#add_item', function (){
            var html ='';
            html += '<div class="row"> <div class="col-md-3">\n' + '<div class="form-group">\n' + '<label for="rawmaterials_id" >কাঁচামাল</label>\n' + '<select class="form-control" name="rawmaterials_id[]" id="rawmaterials_id" required >\n' + '<option selected disabled value="">Choose an option</option>\n' + '@foreach($rawmaterials as $rawmaterial)\n' + '    <option value="{{$rawmaterial->id}}">{{$rawmaterial->name}}</option>\n' + '@endforeach\n' + '</select>\n' + '</div>\n' + '</div><div class="col-md-3"> <div class="form-group"> <label for="rawmaterials_quantity">পরিমাণ</label> <input type="number" id="rawmaterials_quantity" name="rawmaterials_quantity[]" class="form-control" required> </div> </div><div class="col-md-3"> <div class="form-group"> <label for="unit">একক</label> <input type="text" id="unit" name="unit[]" class="form-control" value="KG" readonly> </div> </div><div class="col-md-3"><label for="item"></label> <div class="form-group"><button type="button" class="btn btn-gradient-info btn-lg btn-block" id="minus_item"><i class="mdi mdi-minus menu-icon"></i></button></div> </div></div>'
            $('#append_item').append(html);
        });
        $(document).on('click','#minus_item',function(){
            $(this).parent().parent().parent().remove();

        });
    </script>
@endsection

