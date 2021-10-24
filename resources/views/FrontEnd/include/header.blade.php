  <!-- Nav bar start -->
  <section nav class="text-center">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark navtext fixed-top text-center">
      <div class="container-fluid">
        <a class="navbar-brand navtext" href="{{route('welcome')}}">BashonKoshon</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active navtext" aria-current="page" href="{{route('FrontEnd_product.contact')}}">Home</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link navtext " href="#">Login</a>
              
            </li>
            <li class="nav-item dropdown dropdown_head">
              <a class="nav-link navtext dropdown-toggle" href="#" id="navbarDropdown" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                KITCHEN ITEM
              </a>
              <ul class="dropdown-menu navtext dropdown_content" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item list" href="{{route('frontend_kitchen.index')}}">All</a></li>

                <li><a class="dropdown-item list" href="{{route('frontend_kitchen.cookware')}}">Cookware</a></li>

                <li><a class="dropdown-item list" href="{{route('frontend_kitchen.fryinpan')}}">Frying Pans</a></li>

                <li><a class="dropdown-item list" href="{{route('frontend_kitchen.kitchenstore')}}">Kitchen Storage</a></li>

                <li><a class="dropdown-item list" href="{{route('frontend_kitchen.DishRak_Drainer')}}">Dish Rack & Drainer</a></li>

                <li><a class="dropdown-item list" href="{{route('frontend_kitchen.foodcontantstor')}}">Food Containers Storage Box</a></li>

                <li><a class="dropdown-item list" href="{{route('frontend_kitchen.pressurecooker')}}">Pressure Cooker</a></li>

                <li><a class="dropdown-item list" href="{{route('frontend_kitchen.tawa')}}">Tawa</a></li>

                <li><a class="dropdown-item list" href="{{route('frontend_kitchen.hotpot')}}">Hot Pot</a></li>

                <li><a class="dropdown-item list" href="{{route('frontend_kitchen.stainsteltifin')}}">Stainless Steel Tiffin Carrier</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown dropdown_head">


              <a class="nav-link navtext dropdown-toggle" href="#" id="navbarDropdown" role="button"
                data-bs-toggle="dropdown">
                DINING & SERVING
              </a>
              
              <ul class="dropdown-menu navtext dropdown_content" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item list" href="{{route('frontend_dining.index')}}">All</a></li>

                <li><a class="dropdown-item list" href="{{route('frontend_dining.DinnerSet')}}">Dinner Set</a></li>

                <li><a class="dropdown-item list" href="{{route('frontend_dining.FullPlateSet')}}">Full Plate Set</a></li>

                <li><a class="dropdown-item list" href="{{route('frontend_dining.chafingDish')}}">Chafing Dish (Buffet Style Dish)</a></li>

                <li><a class="dropdown-item list" href="{{route('frontend_dining.CasseroleDishest')}}">Casserole Dishes</a></li>

                <li><a class="dropdown-item list" href="{{route('frontend_dining.ServeWare')}}">Serveware</a></li>

                <li><a class="dropdown-item list" href="{{route('frontend_dining.CakeServingPlate')}}">Cake Serving Platter</a></li>

                <li><a class="dropdown-item list" href="{{route('frontend_dining.WaterBottle')}}">Water Bottle</a></li>

                <li><a class="dropdown-item list" href="{{route('frontend_dining.jug&jugSet')}}">Jug & Jug Set</a></li>

                <li><a class="dropdown-item list" href="{{route('frontend_dining.CupSet')}}">Cup Sets</a></li>

                <li><a class="dropdown-item list" href="{{route('frontend_dining.TeaCoffiMug')}}">Tea & Coffee Mugs</a></li>

                <li><a class="dropdown-item list" href="{{route('frontend_dining.KettleTeaPot')}}">Kettle & Tea Pot</a></li>

                <li><a class="dropdown-item list" href="{{route('frontend_dining.CalySet')}}">Clay Sets</a></li>

              </ul>
            </li>

            <li class="nav-item dropdown dropdown_head">
              <a class="nav-link navtext dropdown-toggle" href="#" id="navbarDropdown" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                HOME & LIFESTYLE
              </a>

              <ul class="dropdown-menu navtext dropdown_content" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item list" href="{{route('frontend_Lifestyle.tablecloth')}}">Table Cloth</a></li>

                <li><a class="dropdown-item list" href="{{route('frontend_Lifestyle.homedecor')}}">Showpiece & Home Decor</a></li>

                <li><a class="dropdown-item list" href="{{route('frontend_Lifestyle.bedset')}}">Bed Sheets/Bed Cover</a></li>

                <li><a class="dropdown-item list" href="{{route('frontend_Lifestyle.canfurniture')}}">Cane Furniture</a></li>

                <li><a class="dropdown-item list" href="{{route('frontend_Lifestyle.woodfurnuture')}}">Wooden Furniture</a></li>

                <li><a class="dropdown-item list" href="{{route('frontend_Lifestyle.woodcrafe')}}">Wooden Crafts</a></li>

              </ul>
            </li>


            <li class="nav-item dropdown dropdown_head">
              <a class="nav-link navtext dropdown-toggle" href="#" id="navbarDropdown" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                BATHROOM & HARDWARE
              </a>

              <ul class="dropdown-menu navtext dropdown_content" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item list" href="{{route('frontend_bathroom.soapdispenser')}}">Soap Dispenser</a></li>

                <li><a class="dropdown-item list" href="{{route('frontend_bathroom.bathroomfitings')}}">Bathroom Fittings</a></li>

                <li><a class="dropdown-item list" href="{{route('frontend_bathroom.bathroomaccessories')}}">Bathroom Accessories</a></li>

                <li><a class="dropdown-item list" href="{{route('frontend_bathroom.door&locks')}}">Door Knob & Locks</a></li>
              </ul>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link navtext" href="#" tabindex="-1" aria-disabled="true">others</a> -->
            </li>
          </ul>
          <!-- <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form> -->
        </div>
      </div>
    </nav>
  </section>
  <!-- Nav close. -->