@extends('home.userpage')
@section('middle')
<!-- slider section -->
@include('home.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
      @include('home.whysection')
      <!-- end why section -->
      
      <!-- arrival section -->
      @include('home.arival')
      <!-- end arrival section -->
      
      <!-- product section -->
      @include('home.products')
      <!-- end product section -->
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


      <!-- subscribe section -->
     
      <!-- end subscribe section -->
      <!-- client section -->
      @include('home.client')
      <!-- end client section -->
      @section('script')
      <script type="text/javascript">
            function replay(caller) {
             document.getElementById('commentId').value=$(caller).attr('data-Commentid');     
            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();
            }
             function replay_close(caller) {
           
            $('.replyDiv').hide();
            }
      </script>
      <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
      @endsection
@endsection