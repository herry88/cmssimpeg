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
           <section class = \"section\">
              <div class=\"section-header\">
              <h1>Halaman Modul</h1>
                <div class=\"section-header-breadcrumb\">
                  <div class=\"breadcrumb-item active\"><a href=\"#\">Dashboard</a></div>
                  <div class=\"breadcrumb-item\"><a href=\"#\">Layout</a></div>
                  <div class=\"breadcrumb-item\">Default Layout</div>
                </div>
              </div>

              <div class=\"section-body\">
                <h2 class=\"section-title\">Halaman Tampil Modul</h2>
                <p class=\"section-lead\">Halaman ini menampilkan data modul.</p>
                
              </div>";
        echo"
          <div class='card'>
            <div class='card-header'>
            <p><button onclick='window.location.href=\"?module=modul&act=tambahmodul\"' class='btn btn-info'>Add Data</button></p>

            </div>
            <div class=\"card-body\">
               <table class=\"table\">
                 <thead>
                    <tr>
                      <th scope=\"col\">#</th>
                      <th scope=\"col\">Nama Modul</th>
                      <th scope=\"col\">Link</th>
                      <th scope=\"col\">Status</th>
                      <th scope=\"col\">Tools</th>
                    </tr>
                 </thead>
                 <tbody>";

                 $query = "SELECT * FROM modul ORDER BY urutan ";
                 $hasil = mysqli_query($conn, $query);
                 while($r = mysqli_fetch_array($hasil)){
                    echo "
                      <tr>
                          <td>$r[urutan]</td>
                          <td>$r[nama_modul]</td>
                          <td>$r[link]</td>
                          <td>$r[status]</td>
                          <td><a href='#' class='btn btn-success'>Edit</a></td>
                      </tr>
                    ";
                 }
        echo"</tbody>
               </table>
                <p>Data Modul Tidak Dapat Di hapus</p>
            </div>
          </div>
        ";
        echo"
           </section>
        ";
    break;
    //page tambah modul
    case "tambahmodul":
        echo "
          <section class=\"section\">
            <div class='section-header'>
              <h1>Tambah Modul</h1>
              <div class='section-header-breadcrumb'>
                <div class=\"breadcrumb-item active\"><a href=\"#\">Dashboard</a></div>
               <div class=\"breadcrumb-item\"><a href=\"#\">Layout</a></div>
                <div class=\"breadcrumb-item\">Default Layout</div>
              </div>
            </div>
            <div class=\"section-body\">
                <h2 class=\"section-title\">Halaman Tambah Modul</h2>
                <p class=\"section-lead\">Halaman tambah</p>
                
            </div>";
        echo"
          <div class=\"card\">
            <div class='card-header'>
              <h4>Halaman Tambah</h4>
            </div>
            <div class='card-body'>
                <form action='#' method='POST'>
                  <table class='table table-bordered'>
                      <tr>
                        <td><strong>Nama Modul :</strong></td>
                        <td><input type='text' name='nama_modul' class='form-control' placeholder='nama modul'> </td>
                      </tr>
                      <tr>
                        <td><strong>Link :</strong></td>
                        <td><input type='text' name='link' class='form-control' placeholder='link'> </td>
                      </tr>
                      <tr>
                        <td colspan='2'><input type='submit' class='btn btn-primary' value='Simpan Data'></td>                      </tr>
                  </table>
                </form>
            
            </div>
          
          </div>
        ";

        echo "</section>";
    break;


    }
}
?>