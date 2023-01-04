<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
           
               <form action="{{url('pro_search')}}"  method="GET">
                @csrf
                 <div class="input-group row">
              <div class="col-md-4"></div>

  <div class="form-outline col-md-3" >
    <input type="text"  class="form-control" name="search"  placeholder="Search Product" />
 
  </div>
  <div class="col-md-1">
    <button type="submit" class="btn btn-primary " style="color: black;">
    <i class="fas fa-search"></i>
  </button>
  </div>
  </div>
  </form>
    @if(session()->has('message'))

             <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
               {{session()->get('message')}}
             </div>


            @endif
  

            <div class="row">
               @foreach($product as $item)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                          <form action="{{url('add_cart',$item->id)}}" method="POST">
                           @csrf
                           <div class="row">
                              <div class="col-md-5">
                           <input type="number" name="qty" class="option2" value="1" min="1" max="{{$item->qty}}"  style="border-radius: 30px;">
                           </div>
                           <div class="col-md-3">
                             <input type="submit" class="option1" style="border-radius: 30px;" value="Add To Cart">
                             </div>
                             </div>
                          </form>
                           <a href="{{url('product_details',$item->id)}}" class="option2">
                          Product Details
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                       <img src="{{asset('admin/productimage/'.$item->image)}}">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$item->title}}
                        </h5>
                        @if($item->dis_price!=null)
                           <h6 style="text-decoration: line-through; color: blue; font-weight: bold;" >
                           ${{$item->price}}
                        </h6>
                        <h6  class="ml-3" style="color: red;font-weight: bold;">
                           ${{$item->dis_price}}
                        </h6>
                      
                        @else
                         <h6 class="ml-5" style="color: blue; font-weight: bold;">
                           ${{$item->price}}
                        </h6>
                        

                        @endif



                        
                     </div>
                  </div>
               </div>

               @endforeach
               <span style="padding-top: 20px;margin: auto;" class="mt-10">
               {{ $product->links("pagination::bootstrap-4")}}</span>
               
               
              
              
              
               
           
         </div>
      </section>