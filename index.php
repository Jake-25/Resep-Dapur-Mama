<?php
// Informasi koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Fungsi untuk menampilkan resep
function tampilkanResep($resep) {
    ?>
        <div class="reseplist">
            <a href="resep_detail.php?id=<?= $resep['id'] ?>">
                <img src="<?= $resep['gambar'] ?>" alt="<?= $resep['judul'] ?>" class="gambar-resep">
                <h2 class="judul-resep"><?= $resep['judul'] ?></h2>
            </a>
            <div class="rating">Rating: <?= $resep['rating'] ?></div>
            <div class="detail">
                <p>Daerah Asal: <?= $resep['daerah_asal'] ?></p>
                <p>Rasa: <?= $resep['rasa'] ?></p>
                <p>Halal: <?= $resep['halal'] ? 'Ya' : 'Tidak' ?></p>
                <p>Vegetarian: <?= $resep['vegetarian'] ? 'Ya' : 'Tidak' ?></p>
            </div>
        </div>
    <?php
    }
    

// Query untuk mengambil data resep
$sql = "SELECT * FROM resep";
$result = $conn->query($sql);

// Memeriksa apakah query berhasil
if ($result->num_rows > 0) {
    // Mengumpulkan hasil query ke dalam array
    $reseps = [];
    while ($row = $result->fetch_assoc()) {
        $reseps[] = $row;
    }
} else {
    echo "Tidak ada resep.";
}

// Menutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resep Dapur Mama</title>
    <link rel="stylesheet" href="index.css">
    <!-- Tambahkan link CSS sesuai dengan nama file CSS yang sesuai -->
</head>

<body>
    <header>
        <a href="profile.php" class="logo">Profil</a>
        <h1>Resep Dapur Mama</h1>
        <div class="search-bar">
            <!-- Tambahkan formulir pencarian sesuai kebutuhan -->
            <form action="hasil_pencarian.php" method="get">
                <label for="cari">Cari Resep:</label>
                <input type="text" id="cari" name="cari">
                <button type="submit">Cari</button>
            </form>
        </div>
    </header>

    <div class="filter">
        <!-- Tambahkan elemen filter sesuai kebutuhan -->
        <!-- Contoh filter: Daerah Asal, Rasa, Halal/Non-Halal, Vegetarian -->
        <label for="daerah-asal">Daerah Asal:</label>
        <select id="daerah-asal" name="daerah-asal">
            <option value="">Semua</option>
            <option value="Indonesia">Indonesia</option>
            <option value="Lombok">Lombok</option>
            <!-- tambahkan opsi lainnya sesuai kebutuhan -->
        </select>

        <label for="rasa">Rasa:</label>
        <select id="rasa" name="rasa">
            <option value="">Semua</option>
            <option value="Manis">Manis</option>
            <option value="Pedas">Pedas</option>
            <option value="Gurih">Gurih</option>
            <option value="Pahit">Pahit</option>
            <option value="Asin">Asin</option>
            <option value="Asam">Asam</option>
            <!-- tambahkan opsi lainnya sesuai kebutuhan -->
        </select>

        <label for="halal">Halal:</label>
        <input type="checkbox" id="halal" name="halal">

        <label for="vegetarian">Vegetarian:</label>
        <input type="checkbox" id="vegetarian" name="vegetarian">
    </div>

    <div class="reseps-container">
        <?php
        // Tampilkan resep
        foreach ($reseps as $resep) {
            tampilkanResep($resep);
        }
        ?>
    </div>
</body>

</html>