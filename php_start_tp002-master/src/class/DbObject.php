<?php

/* try
{
	$db = new PDO('mysql:host=localhost;dbname=users;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$sqlQuery = 'SELECT * FROM users';
$usersStatement = $db->prepare($sqlQuery);
$usersStatement->execute();
$users = $usersStatement->fetchAll();

*/


class DbObject {
    public function getCreatedAt() {
		$date = new DateTime($this->created_at);
		return $date->format('d/m/Y H:i:s');
	}
	public function message() {
		
	}
	public function email() {
	}
	public function phone() {
	}
	public function fullname() {
	}
}
?>