@extends('home.userpage')
@section('middle')
<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  All <span>products</span>
               </h2>
            </div>

          
           
               <form action="{{url('search_pro')}}"  method="GET">
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
 <!-- comment and replay system start here -->
      <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Comment <span>Here</span>
               </h2>
            </div>
             <form action="{{url('add_comment')}}" method="POST">
                  @csrf
                        <fieldset>
                          
                           <textarea placeholder="Comment something Here" style="width: 60%;border-radius: 40px;margin:auto;display: block;" name="comment" required></textarea>
                           <input type="submit" value="Comment" style="margin-top: 30px;border-radius: 30px;" />
                        </fieldset>
                     </form>
      </div></section>
       <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  All <span>Comments</span>
               </h2>
            </div>
            
                        <div class="detail-box">
                              @foreach($comment as $com)
                              <div>
                           <h5 style="margin: auto !important; display: block !important; text-align: center;">
                              {{$com->name}}
                           </h5>
                           <h6 style="margin: auto !important; display: block !important; text-align: center;">
                              Customer
                           </h6>
                           <p style="text-align: center;">
                             {{$com->comment}}
                           </p>
                           <a href="javascript::void(0);" style="margin: auto !important; display: block !important; text-align: center;color: blue;" onclick="replay(this)" data-Commentid="  {{$com->id}}" >Replay</a>
                           @foreach($reply as $rep)
                           @if($rep->comment_id==$com->id)
                             <div style="padding-left: 3%;padding-bottom: 10px;padding-top: 10px;">
                                   <b style="margin: auto !important;font-size: 12px; display: block !important; text-align: center;margin-left:20px; ">{{$rep->name}}</b>
                                   <p style="margin: auto !important;font-size: 10px; display: block !important; text-align: center;margin-left:20px;">{{$rep->reply}}</p>


                             </div>
                             @endif
                             @endforeach
                              <a href="javascript::void(0);" style="margin: auto !important; display: block !important; text-align: center;color: blue; font-size: 12px;" onclick="replay(this)" data-Commentid="  {{$com->id}}" >Replay</a>
                            
                           </div>
                           @endforeach
                           <div style="display: none;" class="replyDiv">
                              <form action="{{url('add_reply')}}" method="POST">
                                    @csrf
                              <input type="text" id="commentId" name="commentId" hidden="" >
                         <textarea class="" style="width: 500px;height: 100px;margin:auto;display: block;" placeholder="Write Replay"name="reply"></textarea>
                         <br>
                         <input type="submit" name="" href="" class="btn btn-primary" style="margin:auto;display: block;" value="Replay">
                         <a href="javascript::void(0);" class="btn" onclick="replay_close(this)" style="width:100px;margin:auto;display: block; color: red;font-size: 20px;font-weight: bolder;">X</a>
                         </form>
                         </div>
                        </div>

            
      </div></section>
@endsection