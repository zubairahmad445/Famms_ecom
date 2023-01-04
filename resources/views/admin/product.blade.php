<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
  @include('admin.css')
 <style type="text/css">
   
    .input_color{
      color: white !important;
    }
   
 </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            @if(session()->has('message'))

             <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
               {{session()->get('message')}}
             </div>


            @endif
            <div class="div_center">
               
               <div class="form-body ">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Add Product</h3>
                        <p>Fill in the data below.</p>
                        <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                                   @csrf
                            <div class="col-md-12">
                               <input class="form-control rounded-pill " type="text" name="title" placeholder="Product title" required>
                               
                            </div>
                            <div class="col-md-12">
                              
                               <textarea class="form-control mt-3" name="des"  placeholder="Product Description" required rows="3" cols="2" ></textarea>
                               
                            </div>

                            <div class="col-md-12">
                                <input class="form-control rounded-pill input_color" type="file" name="image" placeholder="Product image" required>
                               
                            </div>

                           <div class="col-md-12">
                                <select class="form-select rounded-pill mt-3 " name="category" required>
                                      <option selected disabled value="">Select Category</option>
                                       @foreach($category as $p)
                                       <option value="{{$p->id}}">{{$p->name}}</option>
                                         @endforeach
                                     
                               </select>
                                
                           </div>


                           <div class="col-md-12">
                              <input class="form-control rounded-pill mt-3 input_color" type="number" name="price" placeholder="Real Price" required>
                              
                           </div>
                           <div class="col-md-12">
                              <input class="form-control rounded-pill mt-3 input_color" type="number" name="dis_price" placeholder="Discont Price" required>
                              
                           </div>
                           <div class="col-md-12">
                              <input class="form-control rounded-pill mt-3 input_color" type="number" name="qty" placeholder="Product Quantity" required>
                              
                           </div>


                           

                  

                             <div class="form-button mt-3">
                                <button class="button-34"  type="submit" role="button">ADD</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

            </div>
            

        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>