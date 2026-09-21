<?php

require "koneksi.php";

$sql = "SELECT * FROM tamu ORDER BY id DESC";

$stmt = $pdo->query($sql);

$dataTamu = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Buku Tamu</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h1>Buku Tamu</h1>

    <form action="proses.php" method="POST">
        <p>
            Nama:<br>
            <input type="text" name="nama" required>
        </p>

        <p>
            Nomor Telepon:<br>
            <input type="text" name="nomor_telepon" required>
        </p>

        <p>
            Email:<br>
            <input type="email" name="email" required>
        </p>

        <p>
            Pesan:<br>
            <textarea name="pesan" required></textarea>
        </p>

        <button type="submit">Simpan</button>

    </form>

    <hr>
    <h2>Daftar Tamu</h2>

    <?php foreach ($dataTamu as $tamu): ?>
        <h3><?= htmlspecialchars($tamu["nama"]) ?></h3>
        <p>Email: <?= htmlspecialchars($tamu["email"]) ?></p>
        <p>Nomor Telepon: <?= htmlspecialchars($tamu["nomor_telepon"] ?? "", ENT_QUOTES, "UTF-8") ?></p>
        <p><?= htmlspecialchars($tamu["pesan"]) ?></p>
        <small><?= htmlspecialchars($tamu["created_at"]) ?></small>
        <p>
            <a href="edit.php?id=<?= (int) $tamu["id"] ?>">Edit</a>
            <a
                href="hapus.php?id=<?= (int) $tamu["id"] ?>"
                onclick="return confirm('Yakin ingin menghapus?');"
            >
                Hapus
            </a>
        </p>
        <hr>

    <?php endforeach; ?>

</body>

</html>