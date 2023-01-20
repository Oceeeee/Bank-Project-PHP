<?php
require_once __DIR__ . '/../src/init.php';

$page_title = 'Contact';
require_once __DIR__ . '/../src/templates/partials/html_head.php';

checkConnected(false, "account.php");
?>

<body>

    <form action="actions/form_login.php" method="POST">

    <div class="connexion">
        <h1 class="c">Connexion</h1>
        <div class="o">
            <input placeholder="Adresse e-mail" type="text" id="mail" name="mail" required>
        </div>

        <div class="o">
            <input placeholder="Mot de passe" type="password" id="password" name="password" required>
        </div>

        <button type="submit">Connexion</button>
    </form>
    <p class="nop">Vous n'avez pas encore de compte? <a href="register.php">Inscrivez-vous</a></p>
</div>


    <?php require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>


    <style>

        body{
            background: #325056;
            font-family: 'Helvetica', serif;

        }
        .connexion{
            text-align: center;
            padding-bottom: 150px;
            border-radius: 50px;
            margin-right: 450px;
            margin-left: 450px;
            margin-top: 150px;
            background: #325045;
            color: white;
            text-transform: uppercase;       
         }

         .c{
            padding-top: 50px;
        }

        .o{
            margin: 30px;
        }

        button{
            background: #325056;
            color: white;
            padding: 20px;
            padding-left: 40px;
            padding-right: 40px;
            margin: 20px;
            border-radius: 20px;
        }

        .nop{
            font-size: 12px;
        }

        a {
            color: white;
        }

    </style>
</body>