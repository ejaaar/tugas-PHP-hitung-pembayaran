<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Barang</title>
</head>
<body>

    <h2>Form Pembayaran Barang</h2>

    <form method="POST" action="">
        
        <label>Nama Barang:</label><br>
        <input type="text" name="nama_barang" required>
        <br><br>

        <label>Harga Satuan:</label><br>
        <input type="number" name="harga" min="0" required>
        <br><br>

        <label>Jumlah Pembelian:</label><br>
        <input type="number" name="jumlah" min="1" required>
        <br><br>

        <button type="submit">Hitung Pembayaran</button>

    </form>
    <br>


    <?php
    if (isset($_POST['nama_barang'])) {

        $nama_barang = $_POST['nama_barang'];
        $harga = $_POST['harga'];
        $jumlah = $_POST['jumlah'];

        if ($harga < 0) {
            echo "<p>Harga tidak boleh bernilai negatif.</p>";

        } elseif ($jumlah < 1) {
            echo "<p>Jumlah pembelian minimal 1.</p>";

        } else {
            $total_harga = $harga * $jumlah;

            if ($total_harga >= 500000) {
                $diskon_persen = 20;

            } elseif ($total_harga >= 250000) {
                $diskon_persen = 10;

            } else {
                $diskon_persen = 0;
            }
            
            $jumlah_diskon = $total_harga * ($diskon_persen / 100);
            $total_pembayaran = $total_harga - $jumlah_diskon;

            echo "<h2>Hasil Pembayaran</h2>";

            echo "Nama Barang: " . htmlspecialchars($nama_barang) . "<br>";
            echo "Harga Satuan: Rp" . number_format($harga, 0, ',', '.') . "<br>";
            echo "Jumlah Pembelian: " . $jumlah . "<br>";
            echo "Total Harga: Rp" . number_format($total_harga, 0, ',', '.') . "<br>";
            echo "Diskon: " . $diskon_persen . "%<br>";
            echo "Jumlah Diskon: Rp" . number_format($jumlah_diskon, 0, ',', '.') . "<br>";
            echo "Total Pembayaran: Rp" . number_format($total_pembayaran, 0, ',', '.') . "<br>";
        }
    }?>

</body>
</html>