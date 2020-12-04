<!DOCTYPE html> 
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>SPARKPAY | PAY</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<!-- Favicons -->
		<link type="image/x-icon" href="{{asset('assets/img/favicon.png') }}" rel="icon">
		
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
	<body>

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
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Checkout</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Checkout</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">

					<div class="row">
						<div class="col-md-8 offset-md-2">
							
							<div class="card">
								<div class="card-body">
								
									<!-- Checkout Form -->
									<form action="{{ route('stripe.post') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
										@csrf
									
										<!-- Personal Information -->
										<!--<div class="info-widget">
											<h4 class="card-title">Personal Information</h4>
											<div class="row">
												<div class="col-md-6 col-sm-12">
													<div class="form-group card-label">
														<label>First Name</label>
														<input class="form-control" type="text">
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group card-label">
														<label>Last Name</label>
														<input class="form-control" type="text">
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group card-label">
														<label>Email</label>
														<input class="form-control" type="email">
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group card-label">
														<label>Phone</label>
														<input class="form-control" type="text">
													</div>
												</div>
											</div>
											<div class="exist-customer">Existing Customer? <a href="#">Click here to login</a></div>
										</div>-->
										<!-- /Personal Information -->
										
										<div class="payment-widget">
											<h4 class="card-title">Credit card</h4>
											
											<!-- Credit Card Payment -->
											<div class="payment-list">

												<input type="hidden" name="amount" value="10"/>
												<!--<label class="payment-radio credit-card-option">
													<input type="radio" name="radio" checked>
													<span class="checkmark"></span>
													Credit card
												</label>-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group card-label">
															<label for="card_name">Name on Card</label>
															<input class="form-control" id="card_name" type="text">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group card-label">
															<label for="card_number">Card Number</label>
															<input class="form-control card-number" id="card_number" placeholder="1234  5678  9876  5432" type="text">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group card-label">
															<label for="expiry_month">Expiry Month</label>
															<input class="form-control card-expiry-month" id="expiry_month" placeholder="MM" type="text">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group card-label">
															<label for="expiry_year">Expiry Year</label>
															<input class="form-control card-expiry-year" id="expiry_year" placeholder="YY" type="text">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group card-label">
															<label for="cvv">CVV</label>
															<input class="form-control card-cvc" id="cvv" type="text">
														</div>
													</div>
												</div>

												
												<div class="form-row row">
													<div class="col-md-12 error form-group hide">
														<div class='alert-danger alert'>Please correct the errors and try again.</div>
													</div>
												</div>
											</div>
											<!-- /Credit Card Payment -->
											
											<!-- Paypal Payment -->
											<!--<div class="payment-list">
												<label class="payment-radio paypal-option">
													<input type="radio" name="radio">
													<span class="checkmark"></span>
													Paypal
												</label>
											</div>-->
											<!-- /Paypal Payment -->
											
											<!-- Terms Accept -->
											<!--<div class="terms-accept">
												<div class="custom-checkbox">
												   <input type="checkbox" id="terms_accept">
												   <label for="terms_accept">I have read and accept <a href="#">Terms &amp; Conditions</a></label>
												</div>
											</div>-->
											<!-- /Terms Accept -->
											
											<!-- Submit Section -->
											<div class="submit-section mt-4">
												<button type="submit" class="btn btn-primary submit-btn">Confirm and Pay</button>
											</div>
											<!-- /Submit Section -->
											
										</div>
									</form>
									<!-- /Checkout Form -->
									
								</div>
							</div>

					
							
						</div>
						
						
							
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
		
		<!-- Slick JS -->
		<script src="{{asset('assets/js/slick.js') }}"></script>
		
		<!-- Custom JS -->
		<script src="{{asset('assets/js/script.js') }}"></script>

		<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

		<script type="text/javascript">

			$(function() {

				var $form = $(".require-validation");

			    $('form.require-validation').bind('submit', function(e) {

			        var $form = $(".require-validation"),

			        inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]', 'input[type=file]', 'textarea'].join(', '),

			        $inputs = $form.find('.required').find(inputSelector),

			        $errorMessage = $form.find('div.error'),

			        valid = true;

			        $errorMessage.addClass('hide');

			        $('.has-error').removeClass('has-error');

			          $inputs.each(function(i, el) {

			          var $input = $(el);

			          if ($input.val() === '') {
			            $input.parent().addClass('has-error');
			            $errorMessage.removeClass('hide');
			            e.preventDefault();
			          }

			        });

			        if (!$form.data('cc-on-file')) {
			          e.preventDefault();

			          Stripe.setPublishableKey($form.data('stripe-publishable-key'));

			          Stripe.createToken({
			            number: $('.card-number').val(),
			            cvc: $('.card-cvc').val(),
			            exp_month: $('.card-expiry-month').val(),
			            exp_year: $('.card-expiry-year').val()
			          }, stripeResponseHandler);
			        }

			  });

			      function stripeResponseHandler(status, response) {

			        if (response.error) {

			            $('.error')

			                .removeClass('hide')

			                .find('.alert')

			                .text(response.error.message);

			        } else {

			            /* token contains id, last4, and card type */

			            var token = response['id'];

			            $form.find('input[type=text]').empty();

			            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");

			            $form.get(0).submit();

			        }

			    }

			});
		</script>
		
	</body>
</html>