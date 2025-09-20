<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - Mister PC Boteo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/css/landing.css" />
    <style>
        .login-card {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 .25rem rgba(13, 110, 253, .25);
        }

        .toggle-password {
            cursor: pointer;
        }
    </style>
</head>

<body class="bg-secondary">
    <section class="min-vh-100 d-flex justify-content-center align-items-center">
        <div class="login-card p-5 w-100" style="max-width: 480px;">
            <!-- Logo -->
            <figure class="text-center mb-4">
                <a href="./index.php">
                    <img src="https://res.cloudinary.com/drztldzvn/image/upload/v1753133485/logo-mr-pc_l1rh9t.png"
                        alt="Logo Mister PC" class="img-fluid" style="max-width: 140px;" />
                </a>
            </figure>

            <!-- Título -->
            <div class="text-center mb-4">
                <h1 class="h4 fw-bold text-dark">Iniciar Sesión</h1>
                <p class="text-muted small">Accede con tus credenciales para continuar</p>
            </div>

            <!-- Error -->
            <?php if (!empty($error)) : ?>
                <div class="alert alert-danger text-center"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <!-- Formulario -->
            <form method="POST" novalidate>
                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" name="email" id="email" class="form-control"
                        placeholder="nombre@dominio.com" required autocomplete="email" autofocus
                        value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" />
                    <div class="invalid-feedback">Por favor ingresa un correo válido.</div>
                </div>

                <!-- Password con toggle -->
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Tu contraseña" required minlength="6" autocomplete="current-password" />
                        <span class="input-group-text toggle-password">
                            👁️
                        </span>
                        <div class="invalid-feedback">La contraseña debe tener al menos 6 caracteres.</div>
                    </div>
                </div>

                <!-- Botón -->
                <button type="submit" class="btn btn-primary btn-lg w-100">Iniciar Sesión</button>
            </form>

            <!-- Mensaje de bienvenida -->
            <?php if (!empty($mensaje_bienvenida)) : ?>
                <div class="alert alert-success text-center mt-3 fw-semibold"><?= $mensaje_bienvenida ?></div>
            <?php endif; ?>

            <!-- Links -->
            <div class="d-flex flex-column align-items-center gap-2 mt-4">
                <p class="mb-0 small">¿No tienes una cuenta?
                    <a href="./register.php" class="fw-semibold">Regístrate aquí</a>
                </p>
            </div>
        </div>
    </section>

    <!-- Redirección con bienvenida -->
    <?php if (!empty($mensaje_bienvenida)) : ?>
        <script>
            setTimeout(() => {
                window.location.href = 'dashboard.php';
            }, 1200);
        </script>
    <?php endif; ?>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Validación Bootstrap
        (() => {
            'use strict';
            const forms = document.querySelectorAll('form');
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();

        // Mostrar/Ocultar contraseña
        document.querySelector('.toggle-password').addEventListener('click', () => {
            const passwordInput = document.getElementById('password');
            passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
        });
    </script>
</body>

</html>
