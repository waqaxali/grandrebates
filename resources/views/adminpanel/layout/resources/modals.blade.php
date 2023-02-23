<div class="hide">
  <div class="modal auth-modal mobile-full-screen" id="modal-sign-in">
  <div class="content auth-modal-content">
    <header>
      <h4>Log In</h4>
    </header>

    <form class="auth-form" action="{{route('auth')}}"  accept-charset="UTF-8" method="post">
        <input type="hidden" name="token" value="ciV7yCwqy+6fi30OsICRTLf9u0p0PSGBNAwLnF4gyDDBScCwwCJwmD6aXt+63oC8u/FaQO9dcD64sAluHw9xjA==" />
@csrf
      <a class="button expand secondary hollow facebook" href="#">
      <span class="has-icon icon-apple">Sign in with Apple</span>
</a>
      <a class="button expand secondary hollow facebook" href="{{route('login.google')}}">
      <span class="has-icon icon-google">Sign in with Google</span>
</a>
      <a class="button expand secondary hollow facebook nomar" href="{{route('login.facebook')}}">
      <span class="has-icon icon-facebook">Sign in with Facebook</span>
</a>
      <div class="separator">Or, sign in with email</div>

      <input value="true" type="hidden" name="user[remember_me]" id="user_remember_me" />

      <div class="form-group">
          <input value="" placeholder="Email" required="required" class="expand gray" id="signin_user_email" type="email" name="email" />

      </div>

      <div class="form-group">
        <input autocomplete="off" placeholder="Password" required="required" class="expand gray" id="signin_user_password" type="password" name="password" />
      </div>

      <input type="submit" name="commit" value="Log in" class="button primary nomar expand" data-disable-with="Log in" />


      <div class="additional-links">
        <p><a target="" href="{{route('password.request')}}">Forgot password?</a></p>
        <p>Don’t have an account? <a href="#" data-fancybox data-modal="" data-src="#modal-sign-up"
        data-fancybox-close-parent
        data-source="sign-in">Sign Up</a></p>
      </div>

</form>  </div>
</div>

  <div class="modal auth-modal mobile-full-screen" id="modal-sign-up">
  <div class="content two-columns auth-modal-content">
    <div class="left">
      <div class="text-content">
        <p>Join thousands of people using Refermate to earn the highest cash back and commission at over 25,000 brands.</p>
      </div>
      <div class="sign-up-brands"></div>
    </div>
    <div class="right">
      <h5>Sign up</h5>
      <p></p>
      <p class="text-bonus">Join now and earn a $5 Welcome Bonus in 2 easy steps!</p>

<form class="auth-form" action="{{ route('register') }}" method="post" accept-charset="UTF-8">

@csrf
	<input value="" tabindex="203" placeholder="Email address" required="required" class="expand" id="" type="email" name="email" />

	<input autocomplete="new-password" tabindex="204" placeholder="Password (8+ characters)" pattern=".{0}|.{8,}" required="required" class="expand" id="" type="password" name="password" />
	<input type="submit" name="commit" value="Sign up with email" class="button expand nomar" tabindex="206" data-disable-with="Sign up with email" />

  <div class="separator">Or, sign up with</div>

		  <a class="button expand secondary hollow facebook" href="">
			<span class="has-icon icon-apple">Apple</span>
		</a>
		  <a class="button expand secondary hollow facebook" href="">
			<span class="has-icon icon-google">Google</span>
		</a>
		  <a class="button expand secondary hollow facebook" href="">
			<span class="has-icon icon-facebook">Facebook</span>
		</a>
  <div class="additional-links">
    <p>Already have an account? <a href="#" data-fancybox-close-parent data-fancybox data-modal="" data-src="#modal-sign-in">Sign In</a></p>
  </div>

  <p class="mt-10 super-small">By signing up, you agree to our &nbsp;<a href="terms.html" target="_blank">Terms and Privacy Policy</a>.</p>

</form>
    </div>
  </div>
</div>

  <div class="modal auth-modal mobile-full-screen" id="modal-sign-up-short">
  <div class="content auth-modal-content">
    <header class=""><h2 class="">Log In</h2></header>


<form class="auth-form" action="" accept-charset="UTF-8" method="post">
	 <input value="" tabindex="203" placeholder="Email address" required="required" class="expand" id="" type="email" name="user[email]" />
	 <input autocomplete="new-password" tabindex="204" placeholder="Password (8+ characters)" pattern=".{0}|.{8,}" required="required" class="expand" id="" type="password" name="user[password]" />
	 <input type="submit" name="commit" value="Sign up with email" class="button expand nomar" tabindex="206" data-disable-with="Sign up with email" />

  <div class="separator">Or, sign up with</div>

	<a class="button expand secondary hollow facebook" href="">
		<span class="has-icon icon-apple">Apple</span>
	</a>
	<a class="button expand secondary hollow facebook" href="#">
		<span class="has-icon icon-google">Google</span>
	</a>
	<a class="button expand secondary hollow facebook" href="#">
		<span class="has-icon icon-facebook">Facebook</span>
	</a>
  <div class="additional-links">
    <p>Already have an account? <a href="indexec70.html?auth=sign_in" data-fancybox-close-parent data-fancybox data-modal="" data-src="#modal-sign-in">Sign In</a></p>
  </div>

		<p class="mt-10 super-small">By signing up, you agree to our &nbsp;<a href="terms.html" target="_blank">Terms and Privacy Policy</a>.</p>
	</form>
  </div>
</div>
</div>





