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
                  <h1>Tampil Data Modul</h1>
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
              <h4>Tampil Data Modul</h4>
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
                 </thead>";
                 

        echo"
               </table>
                
            </div>
          </div>
        ";
        echo"
           </section>
        ";
    break;

    }
}
?>