@extends('home.userpage')
@section('middle')

@if(session()->has('message'))
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
	{{session()->get('message')}}
</div>
@endif
<div class="container px-3 my-5 clearfix">
    <!-- Shopping cart table -->
    <div class="card">
        <div class="card-header">
            <h2>Shopping Cart</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered m-0">
                <thead>
                  <tr>
                    <!-- Set columns width -->
                    <th class="text-center py-3 px-4" style="min-width: 400px;">Product Name &amp; Details</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
                    <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
                    <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                  </tr>
                </thead>
                <tbody>
        
                 <?php  $total=0;?>
                  @foreach($cart as $cart)
                  <?php 
        $qty =  $cart->qty;
        $price =  $cart->price;

      $pricetotal = $qty * $price;
     
     ?>
        
                  <tr>
                    <td class="p-4">
                      <div class="media align-items-center">
                        <img src="/admin/productimage/{{$cart->image}}" class="d-block ui-w-40 ui-bordered mr-4" alt="">
                        <div class="media-body">
                          <a href="#" class="d-block text-dark">{{$cart->product_title}}</a>
                          <small>
                            <span class="text-muted">Ships from: </span> Germany
                          </small>
                        </div>
                      </div>
                    </td>
                    <td class="text-right font-weight-semibold align-middle p-4">${{$cart->price}}</td>
                    <td class="font-weight-semibold align-middle p-4">{{$cart->qty}}</td>
                    <td class="text-right font-weight-semibold align-middle p-4">$<?php echo $pricetotal;?></td>
                    <td class="text-center align-middle px-0"><a href="{{url('remove_cart',$cart->id)}}" class="shop-tooltip close float-none text-danger" title="" data-original-title="Remove" onclick="confirmation(event)">×</a></td>
                  </tr>
                  <?php $total=$total+$pricetotal; ?>
                  @endforeach
        
                </tbody>
              </table>
            </div>
            <!-- / Shopping cart table -->
        
            <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
              <div class="mt-4">
                 
              </div>
              <div class="d-flex">
                <div class="text-right mt-4 mr-5">
                  <label class="text-muted font-weight-normal m-0">Discount</label>
                  <div class="text-large"><strong>$20</strong></div>
                </div>
                <div class="text-right mt-4">
                  <label class="text-muted font-weight-normal m-0">Total price</label>
                  <div class="text-large"><strong>${{$total}}</strong></div>
                </div>
              </div>
            </div>
        
            <div class="float-right">
              <a href="{{url('/stripe',$total)}}" type="button" class="btn btn-lg btn-primary mt-2" style="color: black !important;
              font-weight: bolder !important;">Pay Using Card</a>
              <a href="{{url('cash_oder')}}" type="button" class="btn btn-lg btn-primary mt-2" style="color: black !important;
              font-weight: bolder !important;">Cash On Delivery</a>
            </div>
        
          </div>
      </div>
  </div>
  @section('script')
<script>
      function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');  
        console.log(urlToRedirect); 
        swal({
            title: "Are you sure to cancel this product",
            text: "You will not be able to revert this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willCancel) => {
            if (willCancel) {


                 
                window.location.href = urlToRedirect;
               
            }  


        });

        
    }
</script>
  @endsection

@endsection