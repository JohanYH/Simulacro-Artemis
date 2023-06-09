<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">  
    <title>Login/Register</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="login-wrap">
                <div class="login-html">
                    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Iniciar Sesion</label>
                    <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Registrarse</label>
                    <div class="login-form">
                        <form action="Iniciar.php" method="POST">
                        <div class="sign-in-htm">
                            <div class="group">
                                <label for="email" class="label">Email</label>
                                <input 
                                id="email"
                                name="email" 
                                type="text" 
                                class="input"
                                >
                            </div>
                            <div class="group">
                                <label for="password" class="label">Password</label>
                                <input 
                                id="password" 
                                type="password" 
                                name="password"
                                class="input" 
                                data-type="password"
                                >
                            </div>
                            <div class="group">
                                <input type="submit" class="button" value="Iniciar" name=Iniciar>
                            </div>
                        </div>
                        </form>
                        <div class="sign-up-htm">
                        <form action="NewUser.php" method="POST"> 
                            <div class="group">
                                <label for="usuario" class="label">Username</label>
                                <input 
                                id="usuario"
                                name="usuario" 
                                type="text" 
                                class="input"
                                >
                            </div>
                            <div class="group">
                                <label for="pass" class="label">Password</label>
                                <input 
                                id="password"
                                name="password" 
                                type="password" 
                                class="input" 
                                data-type="password">
                            </div>
                            <div class="group">
                                <label for="email" class="label">Email</label>
                                <input 
                                id="email"
                                name="email" 
                                type="text" 
                                class="input"
                                >
                            </div>
                            <div class="group">
                                <input type="submit" class="button" value="Registrar" name="Registrar">
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
</body>
</html>