<?php
/* SQL Abstraction script
 * Written by GrygrFlzr
 */
header("Content-Type: application/json; charset=UTF-8");
require 'auth.php';
try {
	$conn = new PDO("mysql:host=$mysql_serv;dbname=$mysql_db", $mysql_user, $mysql_pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	if(isset($_GET['mcver'])) {
		$mcver = $_GET['mcver'];
		$stmt = $conn->prepare(
			"SELECT * FROM $mysql_table
			WHERE MinecraftVersion = :mcver
			ORDER BY ModVersion DESC
			LIMIT 1"
		);
		$stmt->execute(array('mcver' => $mcver));
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		echo json_encode($row);
	} else {
		$stmt = $conn->prepare(
			"SELECT * FROM $mysql_table
			ORDER BY
				MinecraftVersion DESC,
				ModVersion DESC
			LIMIT 1"
		);
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		echo json_encode($row);
	}
} catch(PDOException $e) {
	echo 'ERROR: ' . $e->getMessage();
}
?>