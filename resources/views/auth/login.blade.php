
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>

<style>

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: "Poppins", sans-serif;
  background: #f2f4f7;
}

.content {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}


.head{
  font-size: 40px;
  font-family: 'Allerta', sans-serif;
}


.flex-div {
  display: flex;
  justify-content: space-evenly;
  align-items: center;
}

.name-content {
  margin-right: 7rem;
}

.name-content .logo {
  font-size: 3.5rem;
  color: #1877f2;
}

.name-content p {
  font-size: 1.3rem;
  font-weight: 500;
  margin-bottom: 5rem;
}


form {
  display: flex;
  flex-direction: column;
  background: #fff;
  padding: 2rem;
  width: 530px;
  height: 500px;
  border-radius: 0.5rem;
  box-shadow: 0 2px 4px rgb(0 0 0 / 10%), 0 8px 16px rgb(0 0 0 / 10%);
}

form input {
  outline: none;
  padding: 0.8rem 1rem;
  margin-bottom: 0.8rem;
  font-size: 1.1rem;
}

form input:focus {
  border: 1.8px solid  black;
}

form .login {
  outline: none;
  border: none;
  background: #56238A;
  padding: 0.8rem 1rem;
  border-radius: 0.4rem;
  font-size: 1.1rem;
  color: white;
}

form .login:hover {
  background: #D28304;
  color:#56238A;
  cursor: pointer;
}

form a {
  text-decoration: none;
  text-align: center;
  font-size: 1rem;
  padding-top: 0.8rem;
  color: #1877f2;
}

form hr {
  background: #f7f7f7;
  margin: 1rem;
}

form .create-account {
  outline: none;
  border: none;
  background: #06b909;
  padding: 0.8rem 1rem;
  border-radius: 0.4rem;
  font-size: 1.1rem;
  color: #fff;
  width: 75%;
  margin: 0 auto;
}

form .create-account:hover {
  background: #03ad06;
  cursor: pointer;
}



@media (max-width: 500px) {
  html {
    font-size: 60%;
  }

  .name-content {
    margin: 0;
    text-align: center;
  }

  form {
    width: 300px;
    height: fit-content;
  }

  form input {
    margin-bottom: 1rem;
    font-size: 1.5rem;
  }

  form .login {
    font-size: 1.5rem;
  }

  form a {
    font-size: 1.5rem;
    color: black;
  }

  form .create-account {
    font-size: 1.5rem;
  }

  .flex-div {
    display: flex;
    flex-direction: column;
  }
}

@media (min-width: 501px) and (max-width: 768px) {
  html {
    font-size: 60%;
  }

  .name-content {
    margin: 0;
    text-align: center;
  }

  form {
    width: 300px;
    height: fit-content;
  }

  form input {
    margin-bottom: 1rem;
    font-size: 1.5rem;
  }

  form .login {
    font-size: 1.5rem;
  }

  form a {
    font-size: 1.5rem;
  }

  form .create-account {
    font-size: 1.5rem;
  }

  .flex-div {
    display: flex;
    flex-direction: column;
  }
}

@media (min-width: 769px) and (max-width: 1200px) {
  html {
    font-size: 60%;
  }

  .name-content {
    margin: 0;
    text-align: center;
  }

  form {
    width: 300px;
    height: fit-content;
  }

  form input {
    margin-bottom: 1rem;
    font-size: 1.5rem;
  }

  form .login {
    font-size: 1.5rem;
  }

  form a {
    font-size: 1.5rem;
  }

  form .create-account {
    font-size: 1.5rem;
  }

  .flex-div {
    display: flex;
    flex-direction: column;
  }

  @media (orientation: landscape) and (max-height: 500px) {
    .header {
      height: 90vmax;
    }
  }  
}


</style>

<body>

	<div class="content">
		@if ($message = Session::get('success'))

		<div class="alert alert-success">
		
			<p>{{ $message }}</p>
		
		</div>
		
		@endif
		<div class="flex-div">
		  <div class="name-content">
			<div >
			  <img src="{{asset('public/admin/logo.png')}}"  style="width:500px !important" alt="not working">
			  </div>
		  
		  </div>
		  <form action="{{ route('auth.check') }}" method="POST">

			@if(Session::get('fail'))
			   <div class="alert alert-danger">
				  {{ Session::get('fail') }}
			   </div>
			@endif
			
			@csrf
			  <h6 style="color: black" class="head">AIMHUNDRED</h6>
			  <br>
			  <h4 style="color: black">SIGN IN</h4>
			  <br>
			  <label for="uname"><b>Username</b></label>
			  <input id="email" type="email" value="<?php echo !empty($check->email)?$check->email:""; ?>" name="email" required autocomplete="email" autofocus placeholder="Enter Email Address." required>
			  <span class="text-danger">@error('email'){{ $message }} @enderror</span>



			  <label for="psw"><b>Password</b></label>
			  <input  id="password" type="password" value="<?php echo !empty($value[1])?$value[1]:""; ?>" name="password" placeholder="Password" required>
			  <span class="text-danger">@error('password'){{ $message }} @enderror</span>

			  <label  style="color: black">
				<input type="checkbox" checked="checked" name="remember"> Remember me
			  </label>
			  <button class="login"> sign In</button>
			
			  <a href="#">Forgot Password ?</a>
			  <hr>
	
			</form>
		</div>
	  </div>





{{-- 
    <div class="login-card">
        <div class="login-card-content">
          <div class="header">
            <div >
            <img src="{{asset('public/admin/logo.png')}}" width="200px" alt="not working">
            </div>
			@if ($message = Session::get('success'))

			<div class="alert alert-success">
			
				<p>{{ $message }}</p>
			
			</div>
			
			@endif
          </div>
          <div class="form">
			<form action="{{ route('auth.check') }}" method="POST">

				@if(Session::get('fail'))
				   <div class="alert alert-danger">
					  {{ Session::get('fail') }}
				   </div>
				@endif
				
				@csrf
            <div class="form-field username">
              <div class="icon">
                <i class="far fa-user"></i>
              </div>
			  <input id="email" type="email" value="<?php echo !empty($check->email)?$check->email:""; ?>" name="email" required autocomplete="email" autofocus placeholder="Enter Email Address." required>
			  <span class="text-danger">@error('email'){{ $message }} @enderror</span>
		  
            </div>
            <div class="form-field password">
              <div class="icon">
                <i class="fas fa-lock"></i>
              </div>
			  <input  id="password" type="password" value="<?php echo !empty($value[1])?$value[1]:""; ?>" name="password" placeholder="Password" required>
			  <span class="text-danger">@error('password'){{ $message }} @enderror</span>
            </div>
		     	<div class="row align-items-center remember">
				<input type="checkbox"  type="checkbox" name="remember" id="customCheck">Remember Me
			   </div>

            <button style="cursor: pointer;" type="submit">
              Login
            </button>
           <a style="font-size:15px;" href="">Forget Password?</a>
		</form>
          </div>
        </div>
       
      </div> --}}

</body>
</html>
