<?php

namespace Web\php;

use App\Controllers\RegisteredController;

require "../../vendor/autoload.php";
require "mail.php";

if (!isset($_POST['register-form'])) {
    header('Location: ../');
    exit();
}

$registered = $_POST['registered'];

$registered['name'] = htmlentities($registered['name']);
$registered['lastname'] = htmlentities($registered['lastname']);
$registered['phone'] = filter_var($registered['phone'], FILTER_SANITIZE_NUMBER_INT);
$registered['email'] = filter_var($registered['email'], FILTER_SANITIZE_EMAIL);
$registered['consent'] = isset($registered['consent']);

$registered_controller = new RegisteredController();
try {
    $registered_controller->store($registered);
} catch (\Exception $e) {
    header('Location: ../../?error=email');
    exit();
}

sendMail($registered['name'], $registered['lastname'], $registered['email']);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Abierta | Escuela de Música</title>

    <link rel="shortcut icon" href="https://www.flaticon.es/download/icon/10143442?icon_id=10143442&author=1056&team=1056&keyword=campana+de+la+escuela&pack=10143323&style=gradient+fill&style_id=1377&format=png&color=%23000000&colored=2&size=512&selection=1&type=standard&search=escuelas+de+musica" type="image/x-icon">

    <!-- Styles -->
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../css/thanks-card.css">
</head>

<body>
    <main>
        <div class="fullscreen-container">
            <video loop muted autoplay class="fullscreen-video">
                <source src="../../assets/videos/floating_headphones.mp4" type="video/mp4">
            </video>
        </div>

        <div class="thanks-card-container">
            <div class="thanks-card">
                <h1>¡Gracias por registrarte!</h1>
                <p>Nombre:<br />
                    <span><?= $registered['name'] . ' ' . $registered['lastname'] ?></span>
                </p>
                <p>Teléfono:<br />
                    <span><?= $registered['phone'] ?></span>
                </p>
                <p>Email:<br />
                    <span><?= $registered['email'] ?></span>
                </p>
                <p>Te hemos enviado un correo electrónico confirmando tu registro. 👍</p>
                <div class="button">
                    <a href="../..">
                        <button>
                            Volver al inicio
                        </button>
                    </a>
                </div>
                <p class="disclaimer"><small>Recuerda que has dado tu consentimiento para el uso de tus datos personales.</small></p>
                <p class="disclaimer"><small>Revisa que tus datos sean correctos y en caso contrario contactar con soporte.</small></p>
            </div>
        </div>
    </main>
</body>

</html>