<?php
session_start();
if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
    echo "<h1>Gagal Login</h1><br><br>";
    echo "<a href='index.php'>Ulangi</a>";
} else{
    include "../../config/connect.php";
    $module = $_GET['module'];
    $act = $_GET['act'];

    //input data modul function
    if($module =='modul' AND $act =='input'){
        //cari urutan terakhir
        $query = mysqli_query($conn, "SELECT urutan FROM modul ORDER BY urutan DESC LIMIT 1");
        $r = mysqli_fetch_array($query);
        $urutan = $r['urutan']+1;
        $nama_modul = $_POST['nama_modul'];
        $link = $_POST['link'];

        $input = "INSERT modul SET nama_modul = '$nama_modul',
                                   link = '$link',
                                   urutan = '$urutan'";
        mysqli_query($conn, $input);
        header("location:../../media.php?module=".$module);        
    }
    //Update Data modul adfa

}
?>