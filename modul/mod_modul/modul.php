<?php 
if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
    echo "<h1>Gagal Login</h1><br><br>";
    echo "<a href='index.php'>Ulangi</a>";
} 
else{
    // mengatasi variabel yang belum di definisikan (notice undefined index)
    $act = isset($_GET['act']) ? ($_GET['act']) : '';
    
    switch($act){
        //tampil outputnya
        default:
            echo "
        <section class='section'>
            <div class=\"card\">
            <div class=\"card-header\">
              <h4>Data Modul</h4><br>
            </div>
            <div class=\"card-body\">

            <input type='button' class='btn btn-info' onclick=window.location.href=\"?module=modul&act=tambahmodul\" value='Add Data'>
              <table class=\"table\">
                <thead>
                  <tr>
                    <th scope=\"col\">NO</th>
                    <th scope=\"col\">Nama Modul</th>
                    <th scope=\"col\">Link</th>
                    <th scope=\"col\">Aktif</th>
                    <th scope=\"col\">Tools</th>
                  </tr>
                </thead>";
            $query = "SELECT * FROM modul ORDER BY urutan";
            $o = mysqli_query($conn, $query);
            $no = 1;
            while($m  = mysqli_fetch_array($o)){
                echo "
                <tbody>
                    <tr>
                        <td>$no</td>
                        <td>$m[nama_modul]</td>
                        <td>$m[link]</td>
                        <td>$m[aktif]</td>
                        <td><a href='#'>Edit</a></td>
                    </tr>
                </tbody>
                ";
                $no++;
            }
                echo "
              </table>
            </div>
          </div>";

          echo "</section>";
        break;
        //tambah modul
        case "tambahmodul":
            echo "
            <section class=\"section\">
                <div class=\"section-header\">
                    <h1>Tambah Modul</h1>
                    <div class=\"section-header-breadcrumb\">
                        <div class=\"breadcrumb-item active\"><a href=\"#\">Dashboard</a></div>
                        <div class=\"breadcrumb-item\"><a href=\"#\">Forms</a></div>
                        <div class=\"breadcrumb-item\">Editor</div>
                        </div>
                    </div>
                </div>

               
          </section>
            ";
        break;


    }
}
?>