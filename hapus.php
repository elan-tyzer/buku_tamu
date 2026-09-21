<?php

require "koneksi.php";

$id = $_GET["id"];

$sql = "DELETE FROM tamu WHERE id = :id";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    "id" => $id
]);

header("Location: index.php");
exit;

?>