<!DOCTYPE html>
<html lang="en">
   <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TPSTEMP Cooperative</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('bower_components/jvectormap/jquery-jvectormap.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
  
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
   </head>
   <!-- <body style="background-image:url('public/img/bg.jpg');
      background-repeat:no-repeat;
      background-size:cover;"> -->
    <body>
      <div class="container">
         <!-- Outer Row -->
         <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-5 col-md-5" style="margin-top: 10%">
               <div class="card o-hidden border-0 shadow-lg my-5">
                  <div class="card-body p-0">
                    <div class="text-center pt-2">
                      <img src="public/img/duckil_logo.png" alt="" style="width: 45%">
                    </div>
                     <!-- Nested Row within Card Body -->
                     @if ($errors->any())
                           @foreach ($errors->all() as $error)
                               <div class="alert text-center text-danger m-0" role="alert">{{$error}}</div>
                           @endforeach
                      @endif
                      @if (session('invalid'))
                          <div class="alert text-center text-danger m-0" role="alert">{{ session('invalid') }}</div>
                      @endif
                      @if (session('logout_success'))
                          <div class="alert text-center text-success m-0" role="alert">{{ session('logout_success') }}</div>
                      @endif
                     <div class="row">
                        <div class="col-12">
                           <div class="p-5">
                              <div class="text-center">
                                 <h1 class="h4 text-gray-900 mb-4">Login Your Account!</h1>
                              </div>
                              <form class="user" method="POST" action="{{ url('/login') }}">
                                 @csrf
                                 <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="user_email" id="user_email" aria-describedby="emailHelp" placeholder="Enter Email Address..." value="{{ old('user_email') }}" required>
                                 </div>
                                 <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required>
                                 </div>
                                 <button type="submit" class="btn btn-primary btn-user btn-block">
                                 Login
                                 </button>
                              </form>
                              <hr>
                              <div class="text-center">
                                 <a class="small" href="{{ url('/forgot-password') }}">Forgot Password?</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Bootstrap core JavaScript-->
      <script src="{{ asset('uidesign/vendor/jquery/jquery.min.js') }}"></script>
      <script src="{{ asset('uidesign/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <!-- Core plugin JavaScript-->
      <script src="{{ asset('uidesign/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
      <!-- Custom scripts for all pages-->
      <script src="{{ asset('uidesign/js/sb-admin-2.min.js') }}"></script>
   </body>
</html>
