<?php

use App\Controllers\RegisteredController;

require "./vendor/autoload.php";

$registered_controller = new RegisteredController();


$exponents = [
    'Vicentico' => [
        'fullname' => 'Gabriel Julio Fernández',
        'exposition hour' => '10:00 am',
        'place' => 'Main stage',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/Fabulosos_Cadillacs_at_Z%C3%B3calo%2C_2023_%2852954563290%29_%28cropped%29.jpg/440px-Fabulosos_Cadillacs_at_Z%C3%B3calo%2C_2023_%2852954563290%29_%28cropped%29.jpg'
    ],
    'Yuna' => [
        'fullname' => 'Shin Yu Na',
        'exposition hour' => '11:00 am',
        'place' => 'Main stage',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fd/ITZY_Yuna_at_Busan_One_Asia_Festival_191019_%286%29.jpg/440px-ITZY_Yuna_at_Busan_One_Asia_Festival_191019_%286%29.jpg'
    ],
    'Fatoumata Diawara' => [
        'fullname' => 'Fatoumata Diawara',
        'exposition hour' => '12:00 pm',
        'place' => 'Main stage',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/37/Fatoumata_Diawara_Rudolstadt_11_%28cropped%29.jpg/440px-Fatoumata_Diawara_Rudolstadt_11_%28cropped%29.jpg'
    ],
]
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Abierta | Escuela de Música</title>

    <link rel="shortcut icon" href="./assets/icons/campana-de-la-escuela.png" type="image/x-icon">

    <!-- Styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="./web/css/styles.css">
</head>

<body>
    <header>
        <img src="./assets/icons/campana-de-la-escuela.png" alt="icon" class="icon">

        <!-- Menús container -->
        <div>
            <span class="material-symbols-rounded icon" id="toggle-menu-icon">
                menu
            </span>

            <nav class="mobile-menu hide">
                <ul>
                    <li><a href="#welcome">Bienvenido</a></li>
                    <?php foreach ($exponents as $exponent => $data) : ?>
                        <li><a href="#<?= $exponent ?>"><?= $exponent ?></a></li>
                    <?php endforeach; ?>
                    <li><a href="#register-form">Formulario de registro</a></li>
                    <li><a href="#location">Ubicación del evento</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <img id="banner" src="https://cdn.pixabay.com/photo/2017/11/02/20/31/guitars-2912447_1280.jpg" alt="">
        <h1>Melodías Sin Fronteras<br /> Un Viaje Musical alrededor del Mundo</h1>
        <p id="event-date"></p>

        <div class="countdown-container">
            <div class="event-countdown">
                <div>
                    <p id="days">00</p>
                    <span>Días</span>
                </div>
                <div>
                    <p id="hours">00</p>
                    <span>Horas</span>
                </div>
            </div>
            <br />
            <div class="event-countdown">
                <div>
                    <p id="minutes">00</p>
                    <span>Minutos</span>
                </div>
                <div>
                    <p id="seconds">00</p>
                    <span>Segundos</span>
                </div>
            </div>
        </div>

        <h2 id="welcome">¡Bienvenido!</h2>
        <p id="description">Melodías Sin Fronteras te invita a un viaje inolvidable por el corazón de la música global. Descubre los ritmos que mueven al mundo en una casa abierta única, donde cada nota cuenta una historia y cada melodía te lleva a un nuevo destino.<br /><br /> ¡Únete a nosotros para celebrar la diversidad y la armonía en una sola voz!</p>

        <section>
            <h2>Exponentes</h2>
            <div class="exponents-container">
                <?php foreach ($exponents as $exponent => $data) : ?>
                    <div class="exponent-card" id="<?= $exponent ?>">
                        <h3><?= $exponent ?></h3>
                        <img src="<?= $data['image'] ?>" alt="<?= $exponent ?>" class="exponent-image">
                        <p>Nombre completo: <?= $data['fullname'] ?></p>
                        <p>Hora de exposición: <?= $data['exposition hour'] ?></p>
                        <p>Lugar: <?= $data['place'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Formulario de registro -->
        <h2 id="register-form">Formulario de registro</h2>
        <p id="counter">Ya se han registrado <b><?= $registered_controller->count_of_registered() ?></b> personas. 🤩¿Te lo piensas perder?😎</p>
        <form action="./web/php/thanks-card.php" method="post">
            <div class="form-group">
                <label for="name" class="hide">🎵 Nombre:</label><br />
                <input type="text" name="registered[name]" class="input-text" id="name" placeholder="🎵 Nombre:" required>
            </div>

            <div class="form-group">
                <label for="lastname" class="hide">🎶 Apellido:</label><br />
                <input type="text" name="registered[lastname]" class="input-text" id="lastname" placeholder="🎶 Apellido:" required>
            </div>

            <div class="form-group">
                <label for="phone" class="hide">🎧 Teléfono:</label><br />
                <input type="tel" name="registered[phone]" class="input-text" id="phone" placeholder="🎧 Teléfono:" required>
            </div>

            <div class="form-group">
                <label for="email" class="hide">📻 Correo electrónico:</label><br />
                <input type="email" name="registered[email]" class="input-text" id="email" placeholder="📻 Correo electrónico:" required>
            </div>

            <div class="form-group">
                <input type="checkbox" name="registered[consent]" id="consent" required>
                <label for="consent">🎙️ Consentimiento de datos personales</label>
            </div>

            <button name="register-form" type="submit">¡Reserva tu entrada! ▶️</button>
        </form>

        <h2 id="location">Ubicación del evento</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15959.202481359735!2d-78.47269886660662!3d-0.1706663511397249!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d590765bc030b3%3A0xd8f8ccd812a0d84c!2sConservatorio%20Nacional%20de%20M%C3%BAsica%20de%20Ecuador!5e0!3m2!1ses!2sec!4v1710343587263!5m2!1ses!2sec" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </main>

    <footer>
        <p>
            © 2024 Casa Abierta | Escuela de Música
            <img src="./assets/icons/campana-de-la-escuela.png" alt="icon" class="icon">
        </p>
        <p>Desarrollado por: <a href="/">Gabriel Erazo</a>
        </p>

        <div class="links-container">
            <div>
                <p>Síguenos en nuestras redes sociales:</p>
                <ul>
                    <li><a href="https://www.facebook.com/escuelademusicaecuador" target="_blank">Facebook</a></li>
                    <li><a href="https://www.instagram.com/escuelademusicaecuador/" target="_blank">Instagram</a></li>
                    <li><a href="https://www.youtube.com/channel/UC9f6Q7YkL8v9Za1J6l3NQ9g" target="_blank">YouTube</a></li>
                </ul>
            </div>
            <div>
                <p>Contáctenos:</p>
                <ul>
                    <li>Teléfono: 0991234567</li>
                    <li>Correo electrónico: escuelademusica@gmail.com</li>
                </ul>

            </div>
        </div>
    </footer>

    <script src="./web/js/main.js">
    </script>
    <script>
        <?php if (isset($_GET['error']) && $_GET['error'] === 'email') : ?>
            alert('El correo electrónico ya ha sido registrado.');
        <?php endif; ?>
    </script>
</body>

</html>