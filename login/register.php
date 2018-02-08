<?php require_once("connection.php"); ?>
<?php
// global $conn;
  if (isset($_POST["btn_submit"])) {
    //lấy thông tin từ các form bằng phương thức POST
    $username = $_POST["username"];
    $password = $_POST["pass"];
    //Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
    if ($username == "" || $password == "") {
      echo "bạn vui lòng nhập đầy đủ thông tin";
    }else{
      //thực hiện việc lưu trữ dữ liệu vào db
      $sql = "INSERT INTO user(username, password ) VALUES ( '$username', '$password')";
    // thực thi câu $sql với biến conn lấy từ file connection.php
    mysqli_query($conn,$sql);
    echo "chúc mừng bạn đã đăng ký thành công";
    // sleep(1);
    // header ('Location: login.php');
    }
  }
?>
	<form action="register.php" method="post">
		<fieldset>
			<tr>
				<legend colspan="2">Register Form</legend>
			</tr>
			<tr>
				<td>Username :</td>
				<td><input type="text" id="username" name="username"></td>
			</tr> <br> <br>
			<tr>
				<td>Password :</td>
				<td><input type="password" id="pass" name="pass"></td>
			</tr> <br> <br>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="btn_submit" value="Register"></td>
			</tr>

		</fieldset>

	</form>
