<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
  @include('admin.css')
 <style type="text/css">
    
    .input_color{
      color: black;
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
            <div class="form-body ">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Update Category</h3>
                        <p>Update the data below.</p>
                        <form method="POST" action="{{route('updatecategories', [$editdata->id])}}">
                             @csrf
                            <div class="col-md-12">
                               <input class="form-control rounded-pill" type="text" name="name" placeholder="Category Title" value="{{$editdata->name}}" required>
                               
                            </div>
                              <div class="form-button mt-3">
                                <button class="button-34"  type="submit" role="button">UPDATE</button>

                            </div>
                            <!-- HTML !-->


                        </form>
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