<?php

require "koneksi.php";

$id = $_POST["id"];
$nama = trim($_POST["nama"]);
$email = trim($_POST["email"]);
$nomor_telepon = trim($_POST["nomor_telepon"]);
$pesan = trim($_POST["pesan"]);

if (
    $nama == "" ||
    $email == "" ||
    $nomor_telepon == "" ||
    $pesan == ""
) {
    die("Semua data harus diisi.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Format email tidak valid.");
}

$sql = "UPDATE tamu
        SET nama = :nama,
            email = :email,
            nomor_telepon = :nomor_telepon,
            pesan = :pesan
        WHERE id = :id";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    "nama" => $nama,
    "email" => $email,
    "nomor_telepon" => $nomor_telepon,
    "pesan" => $pesan,
    "id" => $id
]);

header("Location: index.php");
exit;

?>