<?php

require_once __DIR__ . '/../src/init.php';
// $db
// $_SESSION

$page_title = '/CodeBank | Inscription';
require_once __DIR__ . '/../src/templates/partials/html_head.php';
require_once __DIR__ . '/actions/form_register.php';

?>

<body>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">

    <div class="inscription">
        <h1 class="c">Inscription</h1>
            <div class="o">
                    <input placeholder="Nom" type="text" id="lastname" name="lastname" required>
            </div>
            <div class="o">
                    <input placeholder="Prénom" type="text" id="firstname" name="firstname" required>
            </div>
            <div class="o">
                    <input placeholder="Adresse e-mail" type="email" id="mail" name="mail" required>
            </div>
            <div class="o">
                    <input placeholder="Mot de passe" type="password" id="password" name="password" required>
            </div>
            <div class="o">
                    <input placeholder="Date de naissance" type="date" id="birthdate" name="birthdate" required>
            </div>
            <button name="register-submit" type="submit">INSCRIPTION</button>
    </div>
    </form>

    <style>
        
        body{
            background: #325056;
            font-family: 'Helvetica', serif;
        }
        .inscription{
            text-align: center;
            padding-bottom: 150px;
            border-radius: 50px;
            margin-right: 450px;
            margin-left: 450px;
            margin-top: 150px;
            margin-bottom: 150px;
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

        </style>
    <?php require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>
</body>
</html>
