<?php
$produk_list = [
    ["nama" => "Smart Monitor", "kategori" => "MONITOR", "harga" => 2200000, "stok" => 5],
    ["nama" => "Ultra Laptop", "kategori" => "LAPTOP", "harga" => 9000000, "stok" => 2],
    ["nama" => "Wireless Mouse", "kategori" => "AKSESORIS", "harga" => 300000, "stok" => 10],
    ["nama" => "RGB Keyboard", "kategori" => "AKSESORIS", "harga" => 650000, "stok" => 0],
    ["nama" => "Bluetooth Headset", "kategori" => "AUDIO", "harga" => 1300000, "stok" => 6],
    ["nama" => "SSD 1TB", "kategori" => "PENYIMPANAN", "harga" => 1400000, "stok" => 4]
];

$total_produk = count($produk_list);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Cia Store</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            background: #f2f2f2;
        }

        /* HEADER */
        header {
            background: white;
            padding: 20px 8%;
            display: flex;
            justify-content: space-between;
            border-bottom: 1px solid #ddd;
        }

        header h2 {
            margin: 0;
            color: #2563eb;
        }

        nav a {
            margin-left: 20px;
            text-decoration: none;
            color: #333;
        }

        /* JUDUL */
        .judul {
            text-align: center;
            padding: 40px 20px;
        }

        .judul h1 {
            margin-bottom: 10px;
        }

        .judul p {
            color: #666;
        }

        /* PRODUK */
        .produk {
            width: 85%;
            margin: auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 50px;
        }

        .card {
            background: white;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;

            display: flex;
            flex-direction: column;
        }

        .kategori {
            font-size: 12px;
            color: #2563eb;
        }

        .harga {
            font-size: 20px;
            font-weight: bold;
        }

        .diskon {
            color: red;
        }

        .tersedia {
            color: green;
        }

        .habis {
            color: red;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: #2563eb;
            color: white;
            margin-top: auto;
        }

        button:disabled {
            background: #ccc;
        }

        /* FOOTER */
        footer {
            text-align: center;
            background: white;
            padding: 20px;
            color: #666;
        }

        /* RESPONSIVE */
        @media (max-width: 700px) {
            .produk {
                grid-template-columns: 1fr;
            }

            header {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <header>
        <h2>Cia Store</h2>

        <nav>
            <a href="#">Home</a>
            <a href="#">Produk</a>
            <a href="#">Kontak</a>
        </nav>
    </header>


    <!-- JUDUL -->
    <section class="judul">
        <h1>Produk Teknologi</h1>

        <p>
            Pilihan perangkat teknologi untuk kebutuhanmu.
        </p>

        <p>
            Total Produk: <strong><?= $total_produk ?></strong>
        </p>
    </section>


    <!-- DAFTAR PRODUK -->
    <section class="produk">

        <?php foreach ($produk_list as $produk) : ?>

            <?php
                $harga_awal = $produk["harga"];

                if ($harga_awal >= 1000000) {
                    $harga_akhir = $harga_awal * 0.90;
                    $diskon = true;
                } else {
                    $harga_akhir = $harga_awal;
                    $diskon = false;
                }
            ?>

            <div class="card">

                <p class="kategori">
                    <?= $produk["kategori"] ?>
                </p>

                <h3>
                    <?= $produk["nama"] ?>
                </h3>


                <?php if ($diskon) : ?>

                    <p>
                        <del>
                            Rp<?= number_format($harga_awal, 0, ',', '.') ?>
                        </del>
                    </p>

                    <p class="harga diskon">
                        Rp<?= number_format($harga_akhir, 0, ',', '.') ?>
                    </p>

                    <p>Diskon 10%</p>

                <?php else : ?>

                    <p class="harga">
                        Rp<?= number_format($harga_akhir, 0, ',', '.') ?>
                    </p>

                <?php endif; ?>


                <?php if ($produk["stok"] > 0) : ?>

                    <p class="tersedia">
                        Stok tersedia: <?= $produk["stok"] ?>
                    </p>

                    <button>Beli</button>

                <?php else : ?>

                    <p class="habis">
                        Stok habis
                    </p>

                    <button disabled>
                        Tidak Tersedia
                    </button>

                <?php endif; ?>

            </div>

        <?php endforeach; ?>

    </section>


    <!-- FOOTER -->
    <footer>
        <p>Cia Store © 2026</p>
    </footer>

</body>
</html>
```
