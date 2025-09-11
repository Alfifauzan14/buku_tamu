<?php
// panggil file koneksi.php
require_once('koneksi.php');

// membuat query ke / dari database
function query($query) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

// fungsi tambah data
function tambah_tamu($data){
    global $koneksi;
    
    $kode = htmlspecialchars($data['id_tamu']);
    $tanggal = date('Y-m-d');
    $nama_tamu = htmlspecialchars($data['nama_tamu']);
    $alamat = htmlspecialchars($data['alamat']);
    $no_hp = htmlspecialchars($data['no_hp']);
    $bertamu = htmlspecialchars($data['bertamu']);
    $kepentingan = htmlspecialchars($data['kepentingan']);

    // query insert data
    $query = "INSERT INTO buku_tamu VALUES ('$kode', '$tanggal', '$nama_tamu', '$alamat', '$no_hp', '$bertamu', '$kepentingan')
            ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
?>