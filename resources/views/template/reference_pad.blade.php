@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div id="print_report">
                        <br/><br/>
                        <div class="container">
                            <div class="row">
{{--                                <div class="col-sm-1"></div>--}}
                                <div class="col-sm-2 text-right"><img src="{{asset('assets/images/logo/n_islam_logo.png')}}" style="width: 100%; margin-top: -25px"> </div>
                                <div class="col-sm-8"><h1 class="text-center"> <b> এন ইসলাম অটো রাইস মিল </b></h1></div>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8"><h5 class="text-center" style="margin-top: -55px;">প্রোপাইটর : মোঃ নজরুল ইসলাম</h5></div>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8"><h5 class="text-center" style="margin-top: -30px;">উন্নতমানের ধান, আতপ ও সিদ্ধ চাউল বিক্রেতা।</h5></div>
                                <div class="col-sm-2"></div>
                            </div>
                            <br/><br/>
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-1">সূত্র :</div>
                                <div class="col-sm-6"></div>
                                <div class="col-sm-2 text-right">তারিখ :</div>
                                <div class="col-sm-2"></div>
                            </div>
                        </div>
                        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                        <div class="row footer_reference" style="background-color: #3bb54c; color: #fff">
                            <div class="col-sm-12 text-center"><h4 style="margin-top: 10px;"> ইসলামিয়া মার্কেট, নীচ তলা, সাতবর্গ বাজার, বিজয়নগর, ব্রাহ্মণবাড়িয়া। মোবাইল : ০১৭১৬-২৭৩৪৫২, ০১৯১৮-৭৭৬৩০৪ </h4> </div>
                        </div>
                    </div>
                    <br/><br/>
                    <div class="row text-center">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <br/>
                                <input type="button" class="print_button btn-gradient-primary btn-block form-control" onclick="printDiv('print_report')" value="প্রিন্ট স্লিপ" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function printDiv(divName)
        {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@endsection
