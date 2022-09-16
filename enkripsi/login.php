<?php
if (isset($_POST['masuk'])) {
    include "koneksi.php";
    $email = $_POST['email'];
    $password    = md5($_POST['password']);
    //var_dump($_POST);
    //return false;
    $cek_user = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' AND password='$password'");
    
    $row      = mysqli_num_rows($cek_user);

    if ($row == 1) {
        $_SESSION = mysqli_fetch_assoc($cek_user);
        //var_dump($fetch_pass);
        //return false;
        $cek_pass = $_SESSION['password'];
        if ($cek_pass != $password) {
            echo "<script>alert('password salah');</script>";
        } else {
            echo "<script>alert('login Berhasil');document.location.href='tampil.php';</script>";
        }
    } else {
        echo "<script>alert('user name salah/belum terdaftar');</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>

  <link rel="stylesheet" href="login.css">
  <title>blajar enkripsi</title>
</head>

<body>
  <div id="card">
    <div id="card-content">
      <div id="card-title">
        <h2>MASUK</h2>
        <div class="underline-title"></div>
      </div>

      <form action="" method="post" class="form">
        <label for="user-email" style="padding-top:13px">&nbsp;Email</label>
        <input id="user-email" class="form-content" type="email" name="email" autocomplete="on" required />
        <div class="form-border"></div>

        <label for="user-password" style="padding-top:22px">&nbsp;Password</label>
        <input id="user-password" class="form-content" type="password" name="password" required />
        <div class="form-border"></div>
        <a href="lupa.php">
          <legend id="forgot-pass">Forgot password?</legend>
        </a>
        <input id="submit-btn" type="submit" name="masuk" value="MASUK"/>
        <a href="daftar.php" id="signup">belom punya akun?</a>

      </form>
    </div>
  </div>
</body>

</html>