<?php
    include "config/connect.php";

    //jika menu akses admin
    if($_SESSION['leveluser'] == 'admin'){
        $query = "SELECT * FROM modul WHERE aktif = 'Y' ORDER BY urutan";
        $hasil = mysqli_query($conn, $query);
        while($a = mysqli_fetch_array($hasil)){
            echo "<li><a class='nav-link' href='$a[link]'><i class=\"far fa-home\"></i> <span>$a[nama_modul]</span></a></li>";
        }
    }

?>

<li class="menu-header">Starter</li>
<li class="menu-header">Stisla</li>