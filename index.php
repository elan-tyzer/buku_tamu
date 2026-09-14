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
</head>

<body>

    <h1>Buku Tamu</h1>

    <form action="proses.php" method="POST">

        <p>
            Nama:<br>
            <input type="text" name="nama" required>
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

        <h3>
            <?php echo htmlspecialchars($tamu["nama"]); ?>
        </h3>

        <p>
            Email:
            <?php echo htmlspecialchars($tamu["email"]); ?>
        </p>

        <p>
            <?php echo htmlspecialchars($tamu["pesan"]); ?>
        </p>

        <small>
            <?php echo $tamu["created_at"]; ?>
        </small>

        <hr>

    <?php endforeach; ?>

</body>

</html>