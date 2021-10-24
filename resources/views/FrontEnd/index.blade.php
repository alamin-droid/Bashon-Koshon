@extends('FrontEnd.master')
@section('title','Home | Bashon-Koshon')
@section('content')
<!-- <section class="slideshow">
  <div class="slideshow-container slide">
    <img class="image_slider" src="{{asset('assets\FrontEnd\image\banner_image1.jpg')}}"/>
    <img class="image_slider" src="{{asset('assets\FrontEnd\image\banner_image2.png')}}"/>
    <img class="image_slider" src="{{asset('assets\FrontEnd\image\banner_image3.jpg')}}"/>
  </div>
</section>-->
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../assets/FrontEnd/image/banner_image2.png" class="d-block w-100" alt="1">
    </div>
    <div class="carousel-item">
      <img src="../assets/FrontEnd/image/kitchen.jpg" class="d-block w-100"  alt="2">
    </div>
    <div class="carousel-item">
      <img src="../assets/FrontEnd/image/kitchen2.jpg" class="d-block w-100"  alt="3">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
 <!-- <-- card-group -->
 <br>
  <div class="container">
    <br>
    
    <h4 class="text-center " id="pp">popular products</h4>
    <hr>
    <br>

    <div class="row">
      <div class="col-md-4">
      <div class="card cup">
        <img src="{{asset('assets\FrontEnd\image\water-mug.jpg')}}" class="card-img-top"  alt="water jar">
        <div class="overlay"></div>
        <div class="card-body">
          <h5 class="card-title">Color Glass jar</h5>
          <p class="card-text">Size : 5.3*2.5 Inch
            Capacity : 400ml
            Made in China</p>
        </div>
        <div class="card-footer">
          <small class="text-muted"> Price : 390 Tk</small>
          <a href="#" class="btn btn-primary">parchase</a>
        </div>
      </div>
      </div>

      <div class="col-md-4">
      <div class="card cup">
      <img src="{{asset('assets\FrontEnd\image\w-btl5.jpg')}}" class="card-img-top" alt="water jug">
        <div class="overlay"></div>
        <div class="card-body">
          <h5 class="card-title">Glass Oil Vinegar Bottle</h5>
          <p class="card-text">Size : 5.3*2.5 Inch
          Size : 10*2.8Inch
            Capacity :600ml</p>
        </div>
        <div class="card-footer">
          <small class="text-muted">Price :490 Tk</small>
          <a href="#" class="btn btn-primary">parchase</a>
        </div>
        </div>
      </div>
      

      <div class="col-md-4">
      <div class="card cup">
      <img src="{{asset('assets\FrontEnd\image\water-mug.jpg')}}" class="card-img-top" alt="mug">
        <div class="card-body">
          <h5 class="card-title">Water jug </h5>
          <p class="card-text">Color Glass jar
            Size : 5.3*2.5 Inch
            Capacity : 400ml

            Made in China</p>
        </div>
        <div class="card-footer">
          <small class="text-muted"> Price : 390 Tk</small>
          <a href="#" class="btn btn-primary">parchase</a>
        </div>
      </div>
    </div>
    <section>
<br>
<hr>
<div id="carousel-example-multi" class="carousel slide carousel-multi-item v-2 product-carousel" data-ride="carousel">
  <!-- Indicators -->
  <!-- <ol class="carousel-indicators">
    <li data-target="#carousel-example-multi" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-multi" data-slide-to="1"></li>
    <li data-target="#carousel-example-multi" data-slide-to="2"></li>
    <li data-target="#carousel-example-multi" data-slide-to="3"></li>
    <li data-target="#carousel-example-multi" data-slide-to="4"></li>
    <li data-target="#carousel-example-multi" data-slide-to="5"></li>
    <li data-target="#carousel-example-multi" data-slide-to="6"></li>
    <li data-target="#carousel-example-multi" data-slide-to="7"></li>
    <li data-target="#carousel-example-multi" data-slide-to="8"></li>
  </ol> -->
  <!--/.Indicators-->
 <div class="carousel-inner product_carousel" role="listbox">

 <div class="carousel-item active mx-auto">
      <div class="col-12 col-md-4 col-lg-2 mx-auto">
        <div class="card  mb-2">
          <div class="view overlay">
            <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Square/img(4).jpg" alt="Card image cap">
            <a href="#!">
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>
          <div class="card-body p-3">
            <h5 class="card-title font-weight-bold fuchsia-rose-text mb-0">Moda</h5>
            <p class="aqua-sky-text mb-0">Plan B</p>
            <ul class="list-unstyled list-inline my-2">
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="fas fa-star-half-alt mimosa-text"></i></li>
            </ul>
            <p class="chili-pepper-text mb-0">9,99 $</p>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="col-12 col-md-4 col-lg-2 mx-auto">
        <div class="card mb-2">
          <div class="view overlay">
            <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Square/img(1).jpg" alt="Card image cap">
            <a href="#!">
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>
          <div class="card-body p-3">
            <h5 class="card-title font-weight-bold fuchsia-rose-text mb-0">Indie City</h5>
            <p class="aqua-sky-text mb-0">Pixies</p>
            <ul class="list-unstyled list-inline my-2">
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="far fa-star mimosa-text"></i></li>
            </ul>
            <p class="chili-pepper-text mb-0">14,99 $</p>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="col-12 col-md-4 col-lg-2 mx-auto">
        <div class="card mb-2">
          <div class="view overlay">
            <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Square/img(7).jpg" alt="Card image cap">
            <a href="#!">
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>
          <div class="card-body p-3">
            <h5 class="card-title font-weight-bold fuchsia-rose-text mb-0">Year</h5>
            <p class="aqua-sky-text mb-0">Indielectru</p>
            <ul class="list-unstyled list-inline my-2">
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
            </ul>
            <p class="chili-pepper-text mb-0">12,99 $</p>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="col-12 col-md-4 col-lg-2 mx-auto">
        <div class="card mb-2">
          <div class="view overlay">
            <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Square/img(8).jpg" alt="Card image cap">
            <a href="#!">
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>
          <div class="card-body p-3">
            <h5 class="card-title font-weight-bold fuchsia-rose-text mb-0">L'Hiver Indien</h5>
            <p class="aqua-sky-text mb-0">Baloji</p>
            <ul class="list-unstyled list-inline my-2">
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="fas fa-star-half-alt mimosa-text"></i></li>
            </ul>
            <p class="chili-pepper-text mb-0">10,99 $</p>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="col-12 col-md-4 col-lg-2 mx-auto">
        <div class="card mb-2">
          <div class="view overlay">
            <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Square/img(6).jpg" alt="Card image cap">
            <a href="#!">
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>
          <div class="card-body p-3">
            <h5 class="card-title font-weight-bold fuchsia-rose-text mb-0">Indie Funk</h5>
            <p class="aqua-sky-text mb-0">Generation Funk</p>
            <ol class="list-unstyled list-inline my-2">
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
            </ol>
            <p class="chili-pepper-text mb-0">19,99 $</p>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="col-12 col-md-4 col-lg-2 mx-auto">
        <div class="card mb-2">
          <div class="view overlay">
            <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Square/img(2).jpg" alt="Card image cap">
            <a href="#!">
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>
          <div class="card-body p-3">
            <h5 class="card-title font-weight-bold fuchsia-rose-text mb-0">Rockferry</h5>
            <p class="aqua-sky-text mb-0">Duffy</p>
            <ul class="list-unstyled list-inline my-2">
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="fas fa-star-half-alt mimosa-text"></i></li>
            </ul>
            <p class="chili-pepper-text mb-0">17,99 $</p>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="col-12 col-md-4 col-lg-2 mx-auto">
        <div class="card mb-2">
          <div class="view overlay">
            <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Square/img(3).jpg" alt="Card image cap">
            <a href="#!">
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>
          <div class="card-body p-3">
            <h5 class="card-title font-weight-bold fuchsia-rose-text mb-0">Rock 'N' Roll</h5>
            <p class="aqua-sky-text mb-0">Chuck Berry</p>
            <ul class="list-unstyled list-inline my-2">
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="fas fa-star-half-alt mimosa-text"></i></li>
            </ul>
            <p class="chili-pepper-text mb-0">29,99 $</p>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="col-12 col-md-4 col-lg-2 mx-auto">
        <div class="card mb-2">
          <div class="view overlay">
            <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Square/img(5).jpg" alt="Card image cap">
            <a href="#!">
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>
          <div class="card-body p-3">
            <h5 class="card-title font-weight-bold fuchsia-rose-text mb-0">Rock 'N' Roll</h5>
            <p class="aqua-sky-text mb-0">Chuck Berry</p>
            <ul class="list-unstyled list-inline my-2">
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="fas fa-star-half-alt mimosa-text"></i></li>
            </ul>
            <p class="chili-pepper-text mb-0">29,99 $</p>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="col-12 col-md-4 col-lg-2 mx-auto">
        <div class="card  mb-2">
          <div class="view overlay">
            <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Square/img(9).jpg" alt="Card image cap">
            <a href="#!">
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>
          <div class="card-body p-3">
            <h5 class="card-title font-weight-bold fuchsia-rose-text mb-0">High Voltage</h5>
            <p class="aqua-sky-text mb-0">AC/DC</p>
            <ul class="list-unstyled list-inline my-2">
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
              <li class="list-inline-item mx-0"><i class="fas fa-star mimosa-text"></i></li>
            </ul>
            <p class="chili-pepper-text mb-0">24,99 $</p>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</section>
<!--Controls-->
<div class="controls-top my-3">
    <a class="btn-floating btn-sm" href="#carousel-example-multi" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
    <a class="btn-floating btn-sm" href="#carousel-example-multi" data-slide="next"><i class="fas fa-chevron-right"></i></a>
 </div>
  <!--/.Controls-->


    <br>

<h4 class="text-center" id="rp">Recent products</h4>
    <hr>
    <br>
<div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="card cup">
          <img src="{{asset('assets\FrontEnd\image\ovendisk.jpg')}}" alt="ovendisk">
          <div class="card-body">
            <h5 class="card-title">4 Pcs Oven Proof Serving Disk Set</h5>
            <p class="card-text">
              Size :
              Small :10*7.5 Inch
              Medium :11.8*8.3Inch
              Large :13*9.5 Inch
              Extra Large :15*11 Inch</p>
            
            <div class="card-footer">
              <small class="text-muted">Price :3550Tk</small>
              <a href="#" class="btn btn-primary">parchase</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card cup">
          <img src="{{asset('assets\FrontEnd\image\Casserole Set.jpg')}}" alt="col6">
          <div class="card-body">
            <h5 class="card-title">3 Pcs Tempered Glass Rectangular Casserole Set</h5>
            <p class="card-text">
              Size :
              Small :10*6.2 Inch
              Medium :12*7.5Inch
              Large :13*8.5Inch
              Made in China</p>
            
            <div class="card-footer">
              <small class="text-muted">Price :2660Tk</small>
              <a href="#" class="btn btn-primary">parchase</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card cup">
          <img src="{{asset('assets\FrontEnd\image\watar-mug2.jpg')}}" alt="Glass water">
          <div class="card-body">
            <h5 class="card-title">Glass Water Pot</h5>
            <p class="card-text">
              Size & Capacity:
              Large- 12 Inch, 1000ml</p>
            
            <div class="card-footer">
              <small class="text-muted"> Price : 390 Tk</small>
              <a href="#" class="btn btn-primary">parchase</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <br>
    <br>
    <div class="row">
      <div class="col-md-4">
        <div class="card cup">
          <img src="{{asset('assets\FrontEnd\image\seramic serving.jpg')}}" alt="s disk">
          <div class="card-body">
            <h5 class="card-title">Ceramic Serving Disk</h5>
            <p class="card-text">
              Size : 8.2*8.2*2 Inch
            </p>
            
            <div class="card-footer">
              <small class="text-muted"> Price :1350Tk</small>
              <a href="#" class="btn btn-primary">parchase</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card cup">
          <img src="{{asset('assets\FrontEnd\image\gls.lid.jpg')}}" alt="gls.lid">
          <div class="card-body">
            <h5 class="card-title">Tempered Glass Casserole</h5>
            <p class="card-text">
              Size : 16*10 Inch
              Capacity : 3Litter
              Made in China</p>
            <div class="card-footer">
              <small class="text-muted"> Price :1580Tk</small>
              <a href="#" class="btn btn-primary">parchase</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card cup">
          <img src="{{asset('assets\FrontEnd\image\container set.jpg')}}" alt="container set">
          <div class="card-body">
            <h5 class="card-title">3 Pcs Oven Proof Glass Food Container Set</h5>
            <p class="card-text"> Size:
              S: 11*8.5 Inch (1.5L)
              M: 13*9.5 Inch (2.1L)
              L:15*11 Inch(3.0L)
              Made in China</p>
            <div class="card-footer">
              <small class="text-muted"> Price: 3990 Tk</small>
              <a href="#" class="btn btn-primary">parchase</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <br>
    <div class="row">
      <div class="col-md-4">
        <div class="card cup">
          <img src="{{asset('assets\FrontEnd\image\Tea Pot.jpg')}}" alt="tea">
          <div class="card-body">
            <h5 class="card-title">Glass Tea Pot With Lid</h5>
            <p class="card-text">
              Size: 5.5 x 5.5 Inch
              500 ml
              Stove Proof</p>
            <div class="card-footer">
              <small class="text-muted">Price: 180 Tk</small>
              <a href="#" class="btn btn-primary">parchase</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card cup overlay">
          <img src="{{asset('assets\FrontEnd\image\Casserole Set.jpg')}}" alt="3pis">
          <div class="card-body">
            <h5 class="card-title">3 Pcs Tempered Glass Rectangular Casserole Set With Lid</h5>
            <p class="card-text">
              Size:
              Large- 9.5x7.5inch,Capacity:2Liter,
              Medium-8.5x6.5inch,Capacity:1.5Liter
              Oven Proof</p>
            <div class="card-footer">
              <small class="text-muted">Price:2890 Tk</small>
              <a href="#" class="btn btn-primary">parchase</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">

        <div class="card cup card-image hover-overlay hover-zoom hover-shadow ripple">
          <img src="{{asset('assets\FrontEnd\image\water jug (2).jpg')}}" alt="jug">
          <div class="hover-zoom">
            <div class="card-body">
              <h5 class="card-title">Color Glass jar</h5>
              <p class="card-text">
                Size : 5.3*2.5 Inch
                Capacity : 400ml
                Made in China
              </p>
              
              <a class="mask" href="#!"></a>
              <div class="card-footer">
                <small class="text-muted">Price : 390 Tk</small>
                <a href="#" class="btn btn-primary">parchase</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
  </div>
  </div>

  <!-- cntact -->
  <!-- <br>
  <h3 class="text-center">Contact With Us<h3> -->
    <br><br>
  <h3 class="text-center">Customer review & Contact !</h3>
<hr>
    <div class="container">
<div class="row">
  <div class="col-md-6"><div class="container">  
  <form id="contact" action="" method="post">
    
    <h4>Contact us for custom quote</h4>
    <fieldset>
      <input placeholder="Your name" type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Your Email Address" type="email" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="Your Phone Number (optional)" type="tel" tabindex="3" required>
    </fieldset>
    <fieldset>
      <input placeholder="subject (optional)" type="url" tabindex="4" required>
    </fieldset>
    <fieldset>
      <textarea placeholder="Type your message here...." tabindex="5" required></textarea>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
    
  </form>
  
</div>
</div>

  <div class="col-md-6">

  <section class="testimonial text-center">
        <div class="container">
            <div id="testimonial4" class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x" data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">
             
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <div class="testimonial4_slide">
                            <img src="https://i.ibb.co/8x9xK4H/team.jpg" class="img-circle img-responsive" />
                            <p class="reviewtext">Lorem Ipsum is simply dummy text of the printing</p>
              
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="testimonial4_slide">
                            <img src="https://i.ibb.co/8x9xK4H/team.jpg" class="img-circle img-responsive" /><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the </p>
                   
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="testimonial4_slide">
                            <img src="https://i.ibb.co/8x9xK4H/team.jpg" class="img-circle img-responsive" />
                            <p class="reviewtext">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s </p>
                     
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#testimonial4" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#testimonial4" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>

    </section>
   
    
</div>
</div>
</div>

  <!-- location -->
  <br>
  <h3 class="text-center">Find us Here 👇👇 !</h3>
  
    <hr>
    <div class="container">
    <div class="row">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.8099147532034!2d90.4093370142963!3d23.718481195913405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b95e51ccd13b%3A0x2545983a136fe579!2sShahjalal%20Islami%20Bank%20Limited%2C%20Nawabpur%20Road%20Branch!5e0!3m2!1sbn!2sbd!4v1630679046809!5m2!1sbn!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    </div>


<br><br>
</body>
@endsection

