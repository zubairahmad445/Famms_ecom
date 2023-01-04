<!DOCTYPE html>
<html>
   <head>
     
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="{{asset('home/images/favicon.png')}}" type="">
      <title>Famms - Fashion HTML Template</title>
      
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css')}}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
       <style>
       .styled-table {
    border-collapse: collapse !important;
    margin: 25px 0 !important;
    font-size: 0.9em !important;
    font-family: sans-serif !important;
    width: 60%;
    margin: auto !important;
    display: block;
    min-width: 400px !important;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15) !important;
}
.styled-table thead tr {
    background-color: #009879 !important;
    color: #ffffff !important;
    text-align: left !important;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px !important;
}
.styled-table tbody tr {
    border-bottom: 1px solid #dddddd !important;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3 !important;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879 !important;
}
.styled-table tbody tr.active-row {
    font-weight: bold !important;
    color: #009879 !important;
}
    </style>
   </head>
   <body style="background-color: white;">
       <div class="hero_area">
     
         <!-- header section strats -->
        @include('home.header');

        <table class="styled-table">
    <thead>
        <tr>
            <th>Product Title</th>
            <th>Product Quantity</th>
             <th>Product Price</th>
            <th>Payment Status</th>
             <th>Delivery Status</th>
            <th>Product Image</th>
            <th>Cancel Oder</th>
        </tr>
    </thead>
    <tbody>
       @include('sweetalert::alert')
      @foreach($oder as $oder)
        <tr class="active-row">
            <td>{{$oder->product_title}}</td>
            <td>{{$oder->qty}}</td>
             <td>{{$oder->price}}</td>
            <td>{{$oder->payment_status}}</td>
             <td>{{$oder->delivery_status}}</td>
            <td><img src="/admin/productimage/{{$oder->image}}" width="30px"></td>

            <td>
                  @if($oder->delivery_status=='processing')
                  <a href="{{url('cancel_oder',$oder->id)}}" class="button-34"onclick="confirmation(event)">X</a>
                  @else
                  <p>Not Allowed</p>
                  @endif
            </td>
        </tr>
        @endforeach
        <!-- and so on... -->
    </tbody>
</table>
        </div>
           
      
      <!-- jQery -->
      <script src="{{asset('home/js/jquery-3.4.1.min.js')}}"></script>
      <!-- popper js -->
      <script src="{{asset('home/js/popper.min.js')}}"></script>
      <!-- bootstrap js -->
      <script src="{{asset('home/js/bootstrap.js')}}"></script>
      <!-- custom js -->
      <script src="{{asset('home/js/custom.js')}}"></script>
      <script type="text/javascript">
         
    // Animations initialization
    new WOW().init();

  </script>
  <script>
      function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');  
        console.log(urlToRedirect); 
        swal({
            title: "Are you sure to cancel this Oder",
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
   </body>
</html>