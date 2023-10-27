<head>
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/login.css">
</head>
<div class="form">

      <ul class="tab-group">
        <li class="tab active"><a href="login" data-tab="login">Log In</a></li>
        <li class="tab"><a href="<?php echo constant('URL');?>signup" data-tab="signup">Sign Up</a></li>
      </ul>

      <div class="tab-contents">
        <div id="login"  class="tab-content">
          <h1 class="navbar-brand" href="#"><i class="fa fa-square-o "></i>&nbsp;FINANZAS</h1>

          <form action="<?php echo constant('URL'); ?>loguin/authenticate" method="post">

            <div class="field-wrap">
<!--              <label>Email Address<span class="req">*</span>-->
<!--              </label>-->
              <input type="email"autocomplete="off" name="username" placeholder="Email Address *"/>
            </div>

            <div class="field-wrap">
              <label>Password<span class="req">*</span>
              </label>
              <input type="password"autocomplete="off" name="password"/>
            </div>

            <p class="forgot"><a href="#">Forgot Password?</a></p>

            <button class="button button-block"/>Log In</button>

          </form>

        </div>

        <div id="signup" class="tab-content">
          <h1>Sign Up for Free</h1>

          <form action="/" method="post">

          <div class="top-row">
            <div class="field-wrap">
              <label>First Name<span class="req">*</span>
              </label>
              <input name="first_name" type="text" required autocomplete="off" />
            </div>

            <div class="field-wrap">
              <label>Last Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name="last_name"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name="email"/>
          </div>

          <div class="field-wrap">
            <label>Set A Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name="password"/>
          </div>

          <button type="submit" class="button button-block"/>Get Started</button>
            <p>
              ¿Tienes una cuenta? <a href="<?php echo constant('URL'); ?>">Iniciar sesion</a>
            </p>

          </form>

        </div>

      </div><!-- tab-content -->

</div> <!-- /form -->
<!--<script src="--><?php //=assets('login.js')?><!--">-->

</script>