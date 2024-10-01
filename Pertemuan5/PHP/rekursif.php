<?php
function tampilkanHaloDunia(){
    echo "Halo dunia! <br>";

    tampilkanHaloDunia();
}

tampilkanHaloDunia();

//Menampilkan angka 1-25
for ($i=1; $i <= 25 ; $i++) { 
    echo "Perulangan ke-{$i} <br>";
}

//Menggunakan fungsi rekrusif
function tampilkanAngka(int $jumlah, int $indeks = 1){
    echo "Perulangan ke-{$indeks} <br>";

    if($indeks < $jumlah){
        tampilkanAngka($jumlah, $indeks + 1);
    }
}

tampilkanAngka(20);
?>