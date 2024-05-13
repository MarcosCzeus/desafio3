<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a Nuestra Empresa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilos personalizados */
        body {
            background-image: url('https://via.placeholder.com/1500x800'); /* Fondo de pantalla de ejemplo */
            background-size: cover;
            background-position: center;
            color: #fff;
            font-family: Arial, sans-serif;
            padding-top: 50px;
        }
        .overlay {
            background-color: rgba(0, 0, 0, 0.5); /* Capa de superposición semitransparente */
            padding: 50px 20px;
            text-align: center;
        }
        .welcome-container {
            max-width: 800px;
            margin: 0 auto;
        }
        h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.2em;
            margin-bottom: 30px;
        }
        .btn {
            font-size: 1.2em;
            padding: 10px 20px;
        }
        .btn-login {
            margin-right: 10px;
        }
    </style>
</head>
<body>

<div class="overlay">
    <div class="welcome-container">
        <h1>Bienvenido a Nuestra Empresa</h1>
        <p>En nuestra empresa nos dedicamos a ofrecerte las mejores soluciones para tus necesidades laborales. ¡Explora lo que tenemos para ofrecer!</p>
        <a href="{{ route('login') }}" class="btn btn-primary btn-login">Iniciar Sesión</a>
        <a href="{{ route('register') }}" class="btn btn-secondary">Registrarse</a>
    </div>
</div>

</body>
</html>
