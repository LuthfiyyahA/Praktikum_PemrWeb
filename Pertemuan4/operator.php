<?php
    $a = 10;
    $b = 5;

    $hasilTambah = $a + $b;
    $hasilKurang = $a - $b;
    $hasilKali = $a * $b;
    $hasilBagi = $a / $b;
    $sisaBagi = $a % $b;
    $pangkat = $a ** $b;

    echo "<b>Hasil Operator 1</b><br>";
    echo "> Penjumlahan : $a + $b = $hasilTambah<br>";
    echo "> Pengurangan : $a - $b = $hasilKurang<br>";
    echo "> Perkalian   : $a * $b = $hasilKali<br>";
    echo "> Pembagian   : $a / $b = $hasilBagi<br>";
    echo "> Sisa Bagi   : $a % $b = $sisaBagi<br>";
    echo "> Perpangkatan: $a ^ $b = $pangkat<br><br>";

    $hasilSama = $a == $b;
    $hasilTidakSama = $a != $b;
    $hasilLebihKecil = $a < $b;
    $hasilLebihBesar = $a > $b;
    $hasilLebihKecilSama = $a <= $b;
    $hasilLebihBesarSama = $a >= $b;

    echo "<b>Hasil Operator 2</b><br>";
    echo "> Sama Dengan: $a == $b = $hasilSama<br>";
    echo "> Tidak Sama Dengan: $a != $b = $hasilTidakSama<br>";
    echo "> Lebih Kecil: $a < $b = $hasilLebihKecil<br>";
    echo "> Lebih Besar: $a > $b = $hasilLebihBesar<br>";
    echo "> Lebih Kecil Sama Dengan: $a <= $b = $hasilLebihKecilSama<br>";
    echo "> Lebih Besar Sama Dengan: $a >= $b = $hasilLebihBesarSama<br><br>";
?>