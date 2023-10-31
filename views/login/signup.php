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
                        <input type="email" autocomplete="off" name="username" placeholder="Email Address *"/>
                    </div>

                    <div class="field-wrap">
                        <input type="password"  autocomplete="off" name="password" placeholder="Set A Password *"/>
                    </div>

                    <div class="field-wrap">
                        <select name="role">
                            <option value="" selected>Set A Role</option>
                            <option value="user" >User</option>
                            <option value="admin" >Admin</option>

                        </select>
                    </div>
                    <div class="field-wrap">
                        <input type="number"  autocomplete="off" name="phone" placeholder="Set A Phone Number *"/>
                    </div>
                    <div class="field-wrap">
                        <input type="text"  autocomplete="off" name="user_name" placeholder="Set A Name of User *"/>
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
