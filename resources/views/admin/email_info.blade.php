<!DOCTYPE html>
<html lang="en">
  <head>
  	<base href="/public">
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
  @include('admin.css')

 
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
        <div class="form-body ">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Send Email To {{$oder->email}}</h3>
                        <p>Fill in the data below.</p>
                         <form action="{{url('/send_user_email',$oder->id)}}" method="POST">
                        	@csrf
                        	  <div class="col-md-12">
                               <input class="form-control rounded-pill" type="text" name="greeting" placeholder="Email Greeting" required>
                               
                            </div>
                             <div class="col-md-12">
                               <input class="form-control rounded-pill" type="text" name="fistline" placeholder="Email Firstline" required>
                               
                            </div>
                             <div class="col-md-12">
                               <input class="form-control rounded-pill" type="text" name="body" placeholder="Email Body" required>
                               
                            </div>
                             <div class="col-md-12">
                               <input class="form-control rounded-pill" type="text" name="button" placeholder="Email Button Name" required>
                               
                            </div>
                             <div class="col-md-12">
                               <input class="form-control rounded-pill" type="text" name="url" placeholder="Email Url" required>
                               
                            </div>
                             <div class="col-md-12">
                               <input class="form-control rounded-pill" type="text" name="lastline" placeholder="Email Lastline" required>
                               
                            </div>
                             <div class="col-md-12">
                        	<button type="submit" class="button-34"> Send Email</button>
                        </div>
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