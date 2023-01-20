<?php

$err_mail = "";
$email_Ok = 0;

function generate_french_iban()
{
    $check_digits = sprintf('%02d', mt_rand(0, 98));
    $bank_code = sprintf('%010d', mt_rand(0, 9999999999));
    $account_number = sprintf('%011d', mt_rand(0, 99999999999));
    $iban = 'FR' . $check_digits . $bank_code . $account_number;
    return $iban;
}

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true){
    header('location:index.php');
} else {
    if (isset($_POST['register-submit'])) {
        if (!isset($_POST['firstname'], $_POST['lastname'], $_POST['birthdate'], $_POST['mail'], $_POST['password']) && empty($_POST['firstname']) || empty($_POST['lastname']) || empty('birthdate') || empty($_POST['mail']) || empty($_POST['password'])) {
            $error_Msg = 'champ Obligatoire';
        } else {
            $firstname = trim($_POST['firstname']);
            $lastname = trim($_POST['lastname']);
            $birthdate = $_POST['birthdate'];
            $email = trim($_POST['mail']);
            $password = $_POST['password'];
            if ((filter_var($email, FILTER_VALIDATE_EMAIL))) {
                $check_Email = $dbManager->select('SELECT * FROM users WHERE mail = ?', [$email], 'User');
                if ($check_Email) {
                    $err_mail = 'Email est déjà utilisé';
                } else {
                    $iban_number = generate_french_iban();
                    $insertuser = $dbManager->insert('INSERT INTO users(role_id, firstname, lastname, birthdate, mail, password, iban) VALUES(?,?,?,?,?,?,?)',
                    [1, $firstname, $lastname, $birthdate, $email, hash('sha256', $password), $iban_number]);
                }
            } else {
                $err_mail = "Email n'est pas valide";
            }

            
        }
    }
}

?>