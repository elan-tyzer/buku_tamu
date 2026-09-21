```php
<?php

require "koneksi.php";

$id = $_GET["id"];

$sql = "SELECT * FROM tamu WHERE id = :id";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    "id" => $id
]);

$tamu = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Edit Tamu</title>
</head>

<body>

    <h1>Edit Data Tamu</h1>

    <form action="proses_edit.php" method="POST">

        <input
            type="hidden"
            name="id"
            value="<?php echo $tamu["id"]; ?>"
        >

        <p>
            Nama:<br>
            <input
                type="text"
                name="nama"
                value="<?php echo htmlspecialchars($tamu["nama"]); ?>"
                required
            >
        </p>

        <p>
            Email:<br>
            <input
                type="email"
                name="email"
                value="<?php echo htmlspecialchars($tamu["email"]); ?>"
                required
            >
        </p>

        <p>
            Nomor Telepon:<br>
            <input
                type="text"
                name="nomor_telepon"
                value="<?php echo htmlspecialchars($tamu["nomor_telepon"]); ?>"
                required
            >
        </p>

        <p>
            Pesan:<br>
            <textarea name="pesan" required><?php echo htmlspecialchars($tamu["pesan"]); ?></textarea>
        </p>

        <button type="submit">
            Simpan Perubahan
        </button>

    </form>

    <p>
        <a href="index.php">Batal</a>
    </p>

</body>

</html>
```
