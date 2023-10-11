<head>
    <?php
        include_once './public/include/head.php';
    ?>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/login.css">
    <title>Signup</title>
</head>
<body>
<?php $this->showMessages();?>
<div class="form_signup">
    <div class="tab-contents">
            <div id="signup" class="tab-content">
                <h1>Sign Up for Free</h1>

                <form action="<?php echo constant('URL'); ?>signup/newUser" method="POST">

                    <div class="field-wrap">
                        <label>Email Address<span class="req">*</span>
                        </label>
                        <input type="email" autocomplete="off" name="username"/>
                    </div>

                    <div class="field-wrap">
                        <label>Set A Password<span class="req">*</span>
                        </label>
                        <input type="password"  autocomplete="off" name="password"/>
                    </div>

                    <div class="field-wrap">
                        <label>Set A Role<span class="req">*</span>
                        </label>
                        <select name="role">
                            <option value="" selected></option>
                            <option value="user" >User</option>
                            <option value="admin" >Admin</option>

                        </select>
                    </div>
                    <div class="field-wrap">
                        <label>Set A Phone Number<span class="req">*</span>
                        </label>
                        <input type="number"  autocomplete="off" name="phone"/>
                    </div>
                    <div class="field-wrap">
                        <label>Set A Name of User<span class="req">*</span>
                        </label>
                        <input type="text"  autocomplete="off" name="user_name"/>
                    </div>

                    <button type="submit" class="button button-block"/>Get Started</button>
                    <p>
                        ¿Tienes una cuenta? <a href="<?php echo constant('URL'); ?>">Iniciar sesion</a>
                    </p>

                </form>

            </div>
    </div>
</div>
</body>
