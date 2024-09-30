function validasi() {
    var nama = document.forms["myForm"]["nama"].value;
    var alamat = document.forms["myForm"]["alamat"].value;
    var ttl = document.forms["myForm"]["var2"].value;
    var jk = document.getElementById("jk1").checked || document.getElementById("jk2").checked;
    var hobi = document.getElementById("hobi1").checked || document.getElementById("hobi2").checked || document.getElementById("hobi3").checked;
    var kerja = document.getElementById("kerja1").checked || document.getElementById("kerja2").checked || document.getElementById("kerja3").checked;
    var cek = document.getElementById("cek").checked;

    if (nama && alamat && ttl && jk && hobi && kerja && cek) {
        alert("Form Telah Terkirim");
        document.forms["myForm"].reset();
        return;
    }

    if (!nama) {
        alert("Nama Belum Terisi");
        return;
    }

    if (!alamat) {
        alert("Alamat Belum Terisi");
        return;
    }

    if (!ttl) {
        alert("Tempat Tanggal Lahir Belum Terisi");
        return;
    }

    if (!jk) {
        alert("Jenis Kelamin Belum Dipilih");
        return;
    }

    if (!hobi) {
        alert("Hobby Belum Dipilih");
        return;
    }

    if (!kerja) {
        alert("Pekerjaan Belum Dipilih");
        return;
    } else if (kerja.kerja1 && kerja.kerja2 && kerja.kerja3) {
        alert("Hanya Boleh Memilih Salah Satu Pekerjaan");
        return;
    }

    if (!cek) {
        alert("checklist check box");
        return;
    }
}