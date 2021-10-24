@extends('FrontEnd.master')
@section('title','Home | Bashon-Koshon')
@section('content')


<br>
  <div class="container">
    <br>
    
    <h4 class="text-center " id="fcsb">All Dining & Serving product's </h4>
    <hr>
    <br>

    <div class="row">
    <div class="col-md-4">
      <div class="card">
        <img src="{{asset('assets\FrontEnd\image\drs.jpg')}}" class="card-img-top" alt="water jar">
        <div class="overlay"></div>
        <div class="card-body">
          <h5 class="card-title">0000</h5>
          <p class="card-text">Size : 000000
            Capacity : 00000
            </p>
        </div>
        <div class="card-footer">
          <small class="text-muted"> Price : 000 Tk</small>
          <a href="#" class="btn btn-primary">parchase</a>
        </div>
      </div>
      </div>

      <div class="col-md-4">
      <div class="card">
        <img src="{{asset('assets\FrontEnd\image\drs2.jpg')}}" class="card-img-top" alt="water jar">
        <div class="overlay"></div>
        <div class="card-body">
          <h5 class="card-title">0000</h5>
          <p class="card-text">Size : 000000
            Capacity : 00000
            </p>
        </div>
        <div class="card-footer">
          <small class="text-muted"> Price : 000 Tk</small>
          <a href="#" class="btn btn-primary">parchase</a>
        </div>
      </div>
      </div>

    

      <div class="col-md-4">
      <div class="card">
        <img src="{{asset('assets\FrontEnd\image\drs3.jpg')}}" class="card-img-top" alt="water jar">
        <div class="overlay"></div>
        <div class="card-body">
          <h5 class="card-title">0000</h5>
          <p class="card-text">Size : 000000
            Capacity : 00000
            </p>
        </div>
        <div class="card-footer">
          <small class="text-muted"> Price : 000 Tk</small>
          <a href="#" class="btn btn-primary">parchase</a>
        </div>
      </div>
      </div>


      <br>
      <br>
      <br>
    </div>
  </div>

@endsection