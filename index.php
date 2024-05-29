<?php 

include_once("includes/php/login.php");

?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Document</title>
</head>
<body>

    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="" method="POST">
                    <h2>Login</h2>
                    <div class="inputbox">
                        <i class="bi bi-envelope"></i>
                        <input type="email" name="email" required>
                        <label>Email</label>
                    </div>
                    <div class="inputbox">
                        <i class="bi bi-lock"></i>
                        <input type="password" name="senha" required>
                        <label>Password</label>
                    </div>
                    <div class="forget">
                        <label><input type="checkbox">Lembrar de mim<a href="#">Esqueceu a senha?</a></label>
                    </div>
                    <button type="submit">Log in</button>
                </form>
            </div>
        </div>
    </section>
    
</body>
</html>
<!-- <input required="" class="input" name="senha" type="password" /> -->
<!-- <input required="" name="email" class="input" type="text" /> -->