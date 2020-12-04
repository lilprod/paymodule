<!DOCTYPE html> 
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>SPARKPAY| FLooz</title>
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
                                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">FLooz</li>
                                </ol>
                            </nav>
                            <h2 class="breadcrumb-title">Flooz Payment</h2>
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
                                            <h3>Pay with <span>FLOOZ</span></h3>
                                        </div>

                                        @include('inc.messages')

                                        <form  method="POST" action="{{route('flooz_pay')}}">
                                            @csrf
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-focus">
                                                            <input type="text" class="form-control floating @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="text" autofocus>
                                                            <label class="focus-label">Phone number</label>

                                                            @error('phone_number')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>


                                                        <div class="form-group form-focus">
                                                            <input type="hidden" class="form-control floating"  name="order_amount" value="1">
                                                            <input type="text" class="form-control floating" value="1" disabled>
                                                            <label class="focus-label">Amount</label>
                                            
                                                        </div>
                                                    </div>
                                                </div>

                                            <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Pay</button>
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