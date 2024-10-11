<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <script src="jquery-3.7.1.js"></script>
    <script>
        $(document).ready(function() {
            $(".tombol").click(function(){
                $("#tabel").show();
            });
        });
    </script>
    <title>Data Siswa</title>
</head>

<body>
    <header>
        <h1>Data Siswa</h1>
    </header>
    <div class="tombol" style="cursor: pointer;">Click to show database</div>
    
    <div id="tabel" style="display: none;">
        <?php
            $data = array(
                array(
                    'nama' => 'Andi',
                    'umur' => '15',
                    'kelas' => '10A',
                    'alamat' => 'Malang'),
                array(
                    'nama' => 'Siti',
                    'umur' => '16',
                    'kelas' => '10B',
                    'alamat' => 'Batu'),
                array(
                    'nama' => 'Budi',
                    'umur' => '15',
                    'kelas' => '10A',
                    'alamat' => 'Dinoyo'),
                array(
                    'nama' => 'Anton',
                    'umur' => '25',
                    'kelas' => '15A',
                    'alamat' => 'Dinoyo')
            );
        
            $table = "<h1>Data Siswa</h1>";
            $table .= "<table>
            <tr>
                <th>Nama</th>
                <th>Umur</th>
                <th>Kelas</th>
                <th>Alamat</th>
            </tr>";
            foreach ($data as $siswa) {
                $table .= "<tr>";
                $table .= "<td>{$siswa['nama']}</td>";
                $table .= "<td>{$siswa['umur']}</td>";
                $table .= "<td>{$siswa['kelas']}</td>";
                $table .= "<td>{$siswa['alamat']}</td>";
                $table .= "</tr>";
            }
            $table .= "</table>";
        
            $jumlah = 0;
            foreach ($data as $siswa) {
                $jumlah += $siswa['umur'];
            }
            $rataRata = $jumlah / count($data);
            $table .= "<h3>Rata-rata Umur Siswa: " . $rataRata. " tahun</h3>";
        
            echo $table;
        ?>
    </div>
</body>
</html>