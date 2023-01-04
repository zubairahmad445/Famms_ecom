<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
  @include('admin.css')
 <style type="text/css">
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
                        <h3>All Products</h3>
                       
                         <table class="table table-hover">
        <thead>
            <tr>
                <th>Reg Id</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Product Category</th>
                  <th>Product Price</th>
                  <th>Product Quantity</th>
                
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>

        <tbody>
            
            @foreach($productdata as $p)
            <tr>
                <td>{{$p->id}}</td>
                 <td>{{$p->title}}</td>
                <td> <td><img src="{{asset('admin/productimage/'.$p->image)}}" width="70" height="100px"></td></td>
                <td>{{$p->pr->name}}</td>
                <td>{{$p->dis_price}}</td>
                <td>{{$p->qty}}</td>
               
                
               <td><a class="btn btn-danger button-34" onclick="return confirm('Are You Sure to Delete This!!')"  href="{{route('productdelete', [$p->id])}}">Delete</a></td>

                <td><a class="btn btn-info button-34" href="{{route('editproducts', [$p->id])}}">Edit</a></td>
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