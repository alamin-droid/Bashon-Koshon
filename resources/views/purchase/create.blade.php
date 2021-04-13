@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => 'purchase.store','method' => 'POST']) !!}
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-rice"></i></span>নতুন ক্রয়</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date">তারিখ</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="supplier_id">যোগানদার</label>
                                <select class="form-control" name="supplier_id" id="supplier_id" >
                                    <option selected disabled value="">choose an option</option>
                                    @foreach($suppliers as $supplier)
                                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="product" >পণ্য</label>
                                <select class="form-control" name="product" id="product" required>
                                    <option selected disabled value="">Choose an option</option>
                                    @foreach($finished_goods as $finished_good)
                                        <option value="{{$finished_good->id}}">{{$finished_good->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="bag">বস্তার পরিমান</label>
                                <input type="number" class="form-control" id="bag" name="bag" min="1" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="quantity">ধানের পরিমান</label>
                                <input type="text" class="form-control" id="quantity" name="quantity" placeholder="মণ" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="unit_price">মূল্য/মণ</label>
                                <input type="text" class="form-control" id="unit_price" name="unit_price" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="total_price">মোট ধানের মূল্য</label>
                                <input type="text" class="form-control" id="total_price" name="total_price" readonly required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="bag_repeat">ছালার পরিমান</label>
                                <input type="number" class="form-control" id="bag_repeat" name="bag_repeat" min="1" readonly required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="bag_price">ছালার মূল্য /পিস</label>
                                <input type="text" class="form-control" id="bag_price" name="bag_price" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="total_bag_price">মোট ছালার মূল্য</label>
                                <input type="text" class="form-control" id="total_bag_price" name="total_bag_price" readonly required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="extra_expense">অতিরিক্ত খরচ</label>
                                <input type="text" class="form-control" id="extra_expense" name="extra_expense">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="total">মোট মূল্য </label>
                                <input type="text" class="form-control" id="total" name="total" readonly required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6"><button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-rice"></i> তৈরী করুন </button></div>
        <div class="col-md-3"></div>
    </div>
    {!! Form::close() !!}
    <script type="text/javascript">
        function _(x){
            return document.getElementById(x);
        }
        $(document).on('input', '#bag', function (){
            let bag = _('bag').value;
            _('bag_repeat').value = bag;
            let quantity = (bag * 50)/40;
            _('quantity').value = quantity;
            calculate();
        });
        $(document).on('input', '#quantity', function (){
            calculate();
        });
        $(document).on('input', '#unit_price', function (){
            calculate();
        });
        $(document).on('input', '#bag_price', function (){
            let bag = _('bag').value;
            let bag_price = _('bag_price').value;
            _('total_bag_price').value = bag * bag_price;
            calculate();
        });
        $(document).on('input', '#total_bag_price', function (){
            calculate();
        });
        $(document).on('input', '#extra_expense', function (){
            calculate();
        });
        function calculate(){
            let unit_price = _('unit_price').value;
            let extra_expense = _('extra_expense').value;
            let total_price =  _('quantity').value * unit_price;
            _('total_price').value = total_price;
            _('total').value = total_price + +_('total_bag_price').value + +extra_expense;
        }
    </script>
@endsection
