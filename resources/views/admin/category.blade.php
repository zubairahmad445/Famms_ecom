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
    td{
    
    color: white;
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
                        <h3>Add Category</h3>
                        <p>Fill in the data below.</p>
                        <form method="POST" action="{{url('/add_category')}}">
                             @csrf
                            <div class="col-md-12">
                               <input class="form-control rounded-pill" type="text" name="name" placeholder="Category Title" required>
                               
                            </div>
                              <div class="form-button mt-3">
                                <button class="button-34"  type="submit" role="button">ADD</button>

                            </div>
                            <!-- HTML !-->


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <div class="form-body ">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>All Categories</h3>
                       
                         <table class="table table-hover">
        <thead>
            <tr>
                <th>Reg Id</th>
                <th>Category Title</th>
                
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>

        <tbody>
            
            @foreach($categorydata as $p)
            <tr>
                <td>{{$p->id}}</td>
                <td>{{$p->name}}</td>
                
               <td><a class="btn btn-danger button-34" onclick="return confirm('Are You Sure to Delete This!!')"  href="{{route('categorydelete', [$p->id])}}">Delete</a></td>

                <td><a class="btn btn-info button-34" href="{{route('editcategories', [$p->id])}}">Edit</a></td>
            </tr>

            @endforeach
        </tbody>
    </table>
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