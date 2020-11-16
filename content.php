<?php 
if(empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
    echo "<h1>Gagal Login</h1><br><br>";
    echo "<a href='index.php'>Ulangi</a>";
} 
else{
    include "config/connect.php";

    //halaman home
    if($_GET['module'] == 'beranda'){
        if($_SESSION['leveluser'] == 'admin' OR $_SESSION['leveluser']== 'user'){
            include "modul/mod_beranda/beranda.php";
        }
    }

    //data module / data menu
    elseif($_GET['module']== 'modul'){
        if($_SESSION['leveluser']=='admin'){
            include "modul/mod_modul/modul.php";
        }

    }

    //data pegawai
    elseif($_GET['module']== 'datapegawai'){
        if($_SESSION['leveluser'] == 'admin'){
            include "modul/mod_pegawai/pegawai.php";
        }
    }


    else{
        echo "Modul Tidak ada";
    }


}
?>