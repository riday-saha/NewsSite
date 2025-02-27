
<!doctype html>
<html lang="en">
  <head>
  	<title>News | Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/stylelogin.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(img/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				{{-- <div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login</h2>
				</div> --}}
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Have an account?</h3>
		      	<form action="{{ route('login') }}" method="POST" class="signin-form">
                    @csrf
		      		<div class="form-group">
		      			<input type="email" name="email" id="email" class="form-control" value="{{old('email')}}" placeholder="Email" required autofocus autocomplete="username">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
		      		</div>
	            <div class="form-group">
	              <input id="password" type="password" class="form-control" name="password" placeholder="Password" required autocomplete="current-password">
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                  <x-input-error :messages="$errors->get('password')" class="mt-2" />
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary" >Remember Me
									  <input type="checkbox" id="remember_me" name="remember" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
                                    @if (Route::has('password.request'))
									<a href="{{ route('password.request') }}" style="color: #fff">Forgot Password</a>
                                    @endif
								</div>
	            </div>
	          </form>
	          <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
	          <div class="social d-flex text-center">
	          	<a href="{{route('login.google')}}" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Google</a>
	          	{{-- <a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a> --}}
	          </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{asset('js/jquerylogin.min.js')}}"></script>
  <script src="{{asset('js/popperlogin.js')}}"></script>
  <script src="{{asset('js/bootstraplogin.min.js')}}"></script>
  <script src="{{asset('js/mainlogin.js')}}"></script>

	</body>
</html>

