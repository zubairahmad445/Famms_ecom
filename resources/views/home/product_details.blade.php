@extends('home.userpage')
@section('middle')


 
  


  

  <!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container dark-grey-text mt-5">

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <img src="{{asset('admin/productimage/'.$product->image)}}" class="img-fluid" alt="">

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <!--Content-->
          <div class="p-4">

            <div class="mb-3">
              <a href="">
                <span class="lead font-weight-bold mr-1">Category: {{$product->pr->name}}</span>
              </a>
              
            </div>
            <p class="lead font-weight-bold">Product Name: {{$product->title}}</p>
            <p class="lead">
              <span class="mr-1">
                <del>${{$product->price}}</del>
              </span>
              <span>${{$product->dis_price}}</span>
            </p>

            <p class="lead font-weight-bold">Description</p>

            <p>{{$product->des}}</p>

            <form action="{{url('add_cart',$product->id)}}" method="POST">
                           @csrf
                           <div class="row">
                              <div class="col-md-3">
                           <input type="number" name="qty" class="option2" value="1" min="1" max="{{$product->qty}}"  style="border-radius: 30px;">
                           </div>
                           <div class="col-md-4">
                             <input type="submit" class="option1" style="border-radius: 30px;" value="Add To Cart">
                             </div>
                             </div>
                          </form>

          </div>
          <!--Content-->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

      <hr>

      <!--Grid row-->
      <div class="row d-flex justify-content-center wow fadeIn">

        <!--Grid column-->
        <div class="col-md-6 text-center">

          <h4 class="my-4 h4">Additional information</h4>

          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus suscipit modi sapiente illo soluta odit
            voluptates,
            quibusdam officia. Neque quibusdam quas a quis porro? Molestias illo neque eum in laborum.</p>

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-lg-4 col-md-12 mb-4">

          <img src="{{asset('home/images/p4.png')}}" style="height: 230px;" class="img-fluid" alt="">

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-4 col-md-6 mb-4">

          <img src="{{asset('home/images/p5.png')}}" style="height: 230px;" class="img-fluid" alt="">

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-4 col-md-6 mb-4">

          <img src="{{asset('home/images/p8.png')}}" style="height: 230px;" class="img-fluid" alt="">

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </div>
  </main>
  <!--Main layout-->

  

 
  

@endsection