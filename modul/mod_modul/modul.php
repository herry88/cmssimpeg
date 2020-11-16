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
            <div class=\"card\">
            <div class=\"card-header\">
              <h4>Data Modul</h4><br>
            </div>
            <div class=\"card-body\">

            <button class='btn btn-info text-right'>Add Data</button>

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


    }
}
?>