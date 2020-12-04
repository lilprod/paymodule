<!DOCTYPE html> 
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>SPARKPAY| Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        
        <!-- Favicons -->
        <link href="assets/img/favicon.png" rel="icon">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css') }}">
        
        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
        <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css') }}">
        
        <!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/style.css') }}">
        
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="assets/js/html5shiv.min.js"></script>
            <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    
    </head>
    <body class="account-page">

        <!-- Main Wrapper -->
        <div class="main-wrapper">
        
            <!-- Header -->
            @include('website.header')
            <!-- /Header -->
            
        <!-- Breadcrumb -->
            <div class="breadcrumb-bar">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-12 col-12">
                            <nav aria-label="breadcrumb" class="page-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"></li>
                                </ol>
                            </nav>
                            <h2 class="breadcrumb-title">Home</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Breadcrumb -->

            <!-- Page Content -->
            <div class="content">
                <div class="container-fluid">
                    
                    <div class="row">
                        <div class="col-md-8 offset-md-4">
                            
                            <!-- Login Tab Content -->
                            <div class="account-content">
                                    <div class="col-lg-6">
                                        <div class="login-header">
                                            <h3>Welcome to <span>SPARK PAY</span></h3>
                                        </div>

                                        @include('inc.messages')

                                        <form  method="POST" action="{{route('post_mode')}}">
                                            @csrf
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group mb-3">
                                                            <!--<label>Payment Method </label>-->
                                                            <select class="form-control" id="mode" name="mode" required>
                                                                <option value = "">--Please select your payment method--</option>
                                                                <option value="1">Flooz</option>
                                                                <option value="2">Paypal</option>
                                                                <option value="3">Stripe</option>
                                                            </select>
                
                                                            @error('mode')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <!--<input type="text" class="form-control floating" name="amount" value="">-->
                                                    </div>
                                                </div>

                                            <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Submit</button>
                                        </form>
                                    </div>
                            </div>
                            <!-- /Login Tab Content -->
                                
                        </div>
                    </div>

                </div>

            </div>      
            <!-- /Page Content -->
   
            <!-- Footer -->
            @include('website.footer')
            <!-- /Footer -->
           
        </div>
        <!-- /Main Wrapper -->
      
        <!-- jQuery -->
        <script src="{{asset('assets/js/jquery.min.js') }}"></script>
        
        <!-- Bootstrap Core JS -->
        <script src="{{asset('assets/js/popper.min.js') }}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js') }}"></script>
        
        <!-- Custom JS -->
        <script src="{{asset('assets/js/script.js') }}"></script>
        
    </body>
</html>