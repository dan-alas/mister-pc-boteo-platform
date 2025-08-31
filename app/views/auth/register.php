<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registrarse - Mister PC Boteo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="./assets/css/landing.css" />
    <style>
        .was-validated .form-control:invalid {
            border-color: #dc3545;
        }

        .was-validated .form-control:valid {
            border-color: #198754;
        }
    </style>
</head>

<body class="bg-secondary">

    <section class="container min-vh-100 d-flex justify-content-center align-items-center">
        <div class="bg-light p-5 rounded w-100" style="max-width: 600px;">
            <figure class="text-center mb-4">
                <a href="./index.php"><img src="https://res.cloudinary.com/drztldzvn/image/upload/v1753133485/logo-mr-pc_l1rh9t.png" alt="Logo" class="img-fluid"
                        style="max-width: 150px;"></a>
            </figure>

            <div class="text-center mb-4">
                <h1 class="h4">Bienvenido a Mister Pc Boteo. Regístrate para gestionar servicios</h1>
            </div>

            <?php if (!empty($error)) : ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <?php if (!empty($success)) : ?>
                <div class="alert alert-success" id="successMessage"><?= htmlspecialchars($success) ?></div>
            <?php endif; ?>

            <!--    Formulario Inicia -->
            <form id="registerForm" method="POST" class="needs-validation" novalidate <?= !empty($success) ? 'style="display:none;"' : '' ?>>
                <div class="mb-3">
                    <label for="name" class="form-label">Ingresa tu nombre</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Tu nombre" required
                        value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
                    <div class="invalid-feedback">Este campo es obligatorio.</div>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Número de teléfono</label>
                    <input type="tel" class="form-control" id="phone" name="phone"
                        pattern="[0-9]{4}-[0-9]{4}"
                        required
                        value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>">
                    <div class="invalid-feedback">Ingresa un número válido con el formato 0000-0000.</div>
                </div>



                <div class="mb-3">
                    <label for="email" class="form-label">Dirección de correo electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="nombre@dominio.com" required
                        value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                    <div class="invalid-feedback">Ingresa un correo electrónico válido.</div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Ingresa una contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Tu contraseña" required
                        minlength="6">
                    <div class="invalid-feedback">Debe tener al menos 6 caracteres.</div>
                </div>

                <button type="submit" id="submitBtn" class="btn btn-primary w-100" <?= !empty($success) ? 'disabled' : '' ?>>
                    Regístrate ahora
                </button>
            </form>
            <!--    Formulario Finaliza -->

            <div class="d-flex gap-2 mt-3">
                <p class="mb-0">¿Ya tienes una cuenta?</p>
                <a href="./login.php">Iniciar Sesión Aquí</a>
            </div>
        </div>
    </section>

    <script>
        const form = document.getElementById('registerForm');
        const submitBtn = document.getElementById('submitBtn');

        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
                form.classList.add('was-validated');
            } else {
                submitBtn.disabled = true;
                submitBtn.innerHTML = `
          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
          Registrando usuario...
        `;
            }
        });

        const successMessage = document.getElementById('successMessage'); //Para redirigir en 2 segundos
        if (successMessage) {
            setTimeout(() => {
                window.location.href = './login.php';
            }, 2000);
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>