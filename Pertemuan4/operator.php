<?php
    $a = 10;
    $b = 5;

    $hasilTambah = $a + $b;
    $hasilKurang = $a - $b;
    $hasilKali = $a * $b;
    $hasilBagi = $a / $b;
    $sisaBagi = $a % $b;
    $pangkat = $a ** $b;

    echo "<b>Hasil Operator</b><br>";
    echo "> Penjumlahan : $a + $b = $hasilTambah<br>";
    echo "> Pengurangan : $a - $b = $hasilKurang<br>";
    echo "> Perkalian   : $a * $b = $hasilKali<br>";
    echo "> Pembagian   : $a / $b = $hasilBagi<br>";
    echo "> Sisa Bagi   : $a % $b = $sisaBagi<br>";
    echo "> Perpangkatan: $a ^ $b = $pangkat<br>";
?>