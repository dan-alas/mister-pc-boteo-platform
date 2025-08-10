<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - Mister PC Boteo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/css/landing.css" />
</head>

<body class="bg-secondary">
    <section class="min-vh-100 d-flex justify-content-center align-items-center">
        <div class="bg-light p-5 rounded w-100" style="max-width: 600px;">
            <figure class="text-center mb-4">
                <a href="./index.php">
                    <img src="https://res.cloudinary.com/drztldzvn/image/upload/v1753133485/logo-mr-pc_l1rh9t.png"
                        alt="Logo" class="img-fluid" style="max-width: 150px;" />
                </a>
            </figure>

            <div class="text-center mb-4">
                <h1 class="h4">Iniciar Sesión</h1>
            </div>

            <?php if (!empty($error)) : ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <!-- Formulario Inicia -->
            <form method="POST" novalidate>
                <label for="email" class="mb-1">Dirección de correo electrónico</label>
                <input type="email" name="email" id="email" class="form-control mb-3" placeholder="nombre@dominio.com"
                    required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" />

                <label for="password" class="mb-1">Ingresa tu contraseña</label>
                <input type="password" name="password" id="password" class="form-control mb-3"
                    placeholder="Tu contraseña" required minlength="6" />

                <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
            </form>
            <!-- Formulario Termina -->

            <?php if (!empty($mensaje_bienvenida)) : ?>
                <div class="alert alert-success text-center mt-3"><?= $mensaje_bienvenida ?></div>
            <?php endif; ?>

            <div class="d-flex gap-2 mt-3">
                <p>¿No tienes una cuenta?</p>
                <a href="./register.php">Regístrate Aquí</a>
            </div>
        </div>

    </section>

    <?php if (!empty($mensaje_bienvenida)) : ?>
        <script>
            setTimeout(() => {
                window.location.href = 'dashboard.php';
            }, 1000);
        </script>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>