<?php
session_start();
include "koneksi.php";

if (isset($_POST['DAFTAR'])){
    mysqli_query($koneksi,"insert into user set
    username = '$_POST[username]',
    email    = '$_POST[email]',
    password = md5($_POST[password])");


    if ($_POST['DAFTAR']){
      echo "<script>alert('Daftar Berhasil');window.location='login.php'</script>";
      }
    

}
?>
<!DOCTYPE html>
<html>

<head>

  <link rel="stylesheet" href="daftar.css">
</head>

<body>
  <div id="card">
    <div id="card-content">
      <div id="card-title">
        <h2>DAFTAR</h2>
        <div class="underline-title"></div>
      </div>
        <form method="post" class="form">
            <label for="user-username" style="padding-top:13px">&nbsp;username</label>
          <input id="user-username" class="form-content" type="username" name="username" autocomplete="on" required />
          <div class="form-border"></div>

        
            <label for="user-email" style="padding-top:13px">&nbsp;Email</label>
          <input id="user-email" class="form-content" type="email" name="email" autocomplete="on" required />
          <div class="form-border"></div>

        <label for="user-password" style="padding-top:22px">&nbsp;Password</label>
        <input id="user-password" class="form-content" type="password" name="password" required />
        <div class="form-border"></div>
        <input id="submit-btn" type="submit" name="DAFTAR" value="DAFTAR" />
      </form>
    </div>
  </div>
</body>

</html>