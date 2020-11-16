<?php
include "../config/connect.php";

//fungso injection
function anti_injection($data){
    $filter = stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)));
    return $filter;
}

//deklarasikan form
$username = $_POST['username'];
$password = $_POST['password'];

//fungsi loginnya
$query = "SELECT * FROM users WHERE username ='$username' AND password  = '$password' AND blokir = 'T'";
$login = mysqli_query($conn, $query);
$ketemu = mysqli_num_rows($login);
$r = mysqli_fetch_array($login);

//jika cocok halaman page
if($ketemu > 0){
    session_start();

    //variable session
    $_SESSION['username'] = $r['username'];
    $_SESSION['passuser'] = $r['password'];
    $_SESSION['leveluser'] =  $r['level'];

    // bikin id_session yang unik dan mengupdatenya agar slalu berubah 
    // agar user biasa sulit untuk mengganti password Administrator 
    $sid_lama = session_id();
    session_regenerate_id();
    $sid_baru = session_id();
    mysqli_query("UPDATE users SET id_session= '$sid_baru' WHERE username = '$username'");
}

?>