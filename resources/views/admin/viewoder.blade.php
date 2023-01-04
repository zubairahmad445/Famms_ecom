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
     th{
   
    color: white;
    }
    table{

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
           <div style="padding-left:400px;padding-bottom: 20px; width: 100%;">
  <form action="{{url('search')}}" method="get">
    @csrf
    <input type="text" name="search" placeholder="Search for Oder" style="width: 30% !important; margin:auto!important; color: black;" >
    <input type="submit" value="Search" class="btn btn-outline-primary" style="width: 10% !important;" >
   </form>
  
 
     </div>
      <div class="form-body ">
        <div class="row">
            <div class="" style="margin-top: 20px;">
                <div class="form-content">
                    <div class="form-items" style="margin-left: 0px;padding: 5px;">
                        <h3>All Oders Customer Detail</h3>
                 
                         <table class="table table-hover" >
        <thead>
            <tr >
                
                <th>Customer Name</th>
                
                <th>Customer Email</th>
                  <th>Customer Phone</th>
                  <th>Customer Address</th>
                  
                
               
            </tr>
        </thead>

        <tbody>
            
            @foreach($oder as $p)
           
            <tr>
              
                 <td>{{$p->name}}</td>
                <td>{{$p->email}}</td>
                <td>{{$p->phone}}</td>
                <td>{{$p->address}}</td>
                
               
                
              
            </tr>
             
            @endforeach
        </tbody>
    </table>
   <table class="table table-hover" >
        <thead>
            <tr >
             
                <th>Product Image</th>
               
                   <th>Product_title</th>
                   <th>Product_Quantity</th>
                   <th>Product_Price</th>
                   <th>Payment_Status</th>
                   <th>Delivery_Status</th>
                  
                   <th>Deliverd</th>
                    <th>Print Pdf</th>
                     <th>Send Email</th>
                
               
            </tr>
        </thead>

        <tbody>
            
            @forelse($oder as $p)
           
            <tr>
              
               
                 
               
                <td>{{$p->product_title}}</td>
                <td><img src="/admin/productimage/{{$p->image}}" width="70" height="100px"></td>
                <td>{{$p->qty}}</td>
                <td>{{$p->price}}</td>
                <td>{{$p->payment_status}}</td>
                <td>{{$p->delivery_status}}</td>
                

                <td style="color: green;">
                	@if($p->delivery_status=='processing')
                	<a href="{{url('delivered',$p->id)}}" class="button-34" onclick="return confirm('Are You Sure This Product Is Delivered?')">Delivered</a>
                	@else
                	Delivered
                	@endif
                </td>
               <td><a href="{{url('print_pdf',$p->id)}}" class="button-34">Pdf</a></td>
               <td><a href="{{url('send_email',$p->id)}}" class="button-34">Email</a></td>
                
              
            </tr>
            @empty 
            <tr>
              <td>NO Data Found</td>
            </tr>
            @endforelse
            
        </tbody>
    </table>
  <center> <span style="padding-top: 20px;margin: auto;" class="mt-10">
               </span></center>
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