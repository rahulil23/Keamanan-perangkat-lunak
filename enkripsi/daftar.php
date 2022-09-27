<?php
session_start();
include "koneksi.php";
$sql = 'SELECT * FROM agama';
		
$query = mysqli_query($koneksi, $sql);

if (isset($_POST['DAFTAR'])){
    $email_user= $_POST['email'];
    $cek_user = mysqli_query($koneksi, "SELECT * FROM user WHERE email ='$email_user'");
	  $row      = mysqli_num_rows($cek_user);
    if($row>1){
      echo "<script type='text/javascript'>alert('Register Gagal Email Anda Buat Telah Terpakai'); 
  		window.location='daftar.php'; </script>";
    }else{
      mysqli_query($koneksi,"insert into user set
      username = '$_POST[username]',
      email    = '$email_user',
      nomer    = '$_POST[nomer]',
      agama    = '$_POST[agama]',
      tanggal_lahir    = '$_POST[date]',
      password = md5($_POST[password])");
      echo "<script>alert('Daftar Berhasil');window.location='login.php'</script>";
    }

    

}
?>
<!DOCTYPE html>
<html>

<head>

  <link rel="stylesheet" href="daftar.css">
  <link rel="stylesheet" href="asset/bootstrap-3.3.7/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="asset/select2-4.0.6-rc.1/dist/css/select2.min.css">
  <script src="asset/jquery/jquery-3.3.1.min.js"></script>
  <script src="asset/select2-4.0.6-rc.1/dist/js/select2.min.js"></script>   
  <script src="asset/select2-4.0.6-rc.1/dist/js/i18n/id.js"></script> 
  <script src="asset/js/app.js"></script>
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

          <label  style="padding-top:13px">&nbsp;Nomer</label>
          <input id="nomer" class="form-content" type="texs" name="nomer" autocomplete="on" onkeypress="return cek_input(event)" required />
          <div class="form-border"></div>

          <label  style="padding-top:22px">&nbsp;Agama</label>
          <select id="Agama" class="form-content" type="text" name="agama" required>
            <option selected>Pilih Agama</option>
            <?php
            while ($data = mysqli_fetch_array($query)) {
            ?>
            <option><?php echo $data['nama_agama'] ?></option>
            <?php } ?>
          </select> 
          <div class="form-border"></div>

          <label  style="padding-top:13px">&nbsp;Tanggal Lahir</label>
          <input id="date" class="form-content" type="date" name="date" autocomplete="off"  required />
          <div class="form-border"></div>

          <label for="user-password" style="padding-top:22px">&nbsp;Password</label>
          <input id="user-password" class="form-content" type="password" name="password" required />
          <div class="form-border"></div>
       
          <input id="submit-btn" type="submit" name="DAFTAR" value="DAFTAR" onclick="kirim()"/>
      </form>
    </div>
  </div>
  <script>
			function cek_input(evt) {
			evt = (evt) ? evt : window.event;
			var charCode = (evt.which) ? evt.which : evt.keyCode;
			if (charCode > 31 && (charCode < 48 || charCode > 57)) {
				alert("input hanya boleh di isi angka!");
				return false;
			}
		}	
	</script> 
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<!-- <script>
			$(document).ready(function(){
			var date_input=$('input[name="date"]');
			date_input.datepicker({
			format: 'yyyy/mm/dd',
			})

		})
</script> -->
</body>

</html>