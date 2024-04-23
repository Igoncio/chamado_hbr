<?php 

include_once("includes/php/login.php");

?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Document</title>
</head>
<body>

    <section class="area-form">


        <form class="form-control" action="" method="POST">
            <p class="title">Login</p>
            <div class="input-field">
                <input required="" name="email" class="input" type="text" />
                <label class="label" for="input">Enter Email</label>
            </div>
            <div class="input-field">
                <input required="" class="input" name="senha" type="password" />
                <label class="label" for="input">Enter Password</label>
            </div>
            <a>Forgot your password?</a>
            <button class="submit-btn" type="submit" name="btn_submit">Sign In</button>
        </form>


    </section>
    
</body>
</html>