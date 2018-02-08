<?php
session_start();
$remember=false;
if(isset($_POST['ok'])){
    if(($_POST['username'] == '')&&($_POST['password'] == '')) {
    echo "Ban khong nhap vao Username va Password " ."<br>";
      }
			else if($_POST['username'] == NULL){
       echo " Ban chua nhap Username " ."<br>";
      } else if($_POST['password'] == NULL){
              echo " Ban chua nhap Password" ."<br>";
      if (isset($_POST['remember'])) {
                               setcookie('NhapTen', $_SESSION['username'], time()+120, "/");
                   $_COOKIE['NhapTen'];
                               setcookie('NhapMK', $_SESSION['passwork'], time()+120, "/");
                   $_COOKIE['NhapMK'];
                     }

                      }
											else {
                      $u=$_POST['username'];
       $p=$_POST['password'];
       $conn=mysql_connect("127.0.0.1","root","") or die("can't connect this database");
       mysql_select_db("login",$conn);
       $sql="select * from user where username='".$u."' and password='".$p."'";
       $query=mysql_query($sql);
       if(mysql_num_rows($query)==0) {
           echo " Ban nhap username va password khong dung " ."<br>";
        } else {
                    $row=mysql_fetch_array($query);
               $_SESSION['username'] = $row["username"];
               $_SESSION['id'] = $row["ID"];
               $_SESSION['password'] = $row["password"];
             if (isset($_POST['remember'])) {
            $_SESSION['remember']=true;
            setcookie("remember", $_SESSION['remember'],time()+120);
            $_COOKIE["remember"];
                              setcookie("NhapTen", $_SESSION['username'], time()+120, "/");
            $_COOKIE["NhapTen"];
            setcookie("NhapMK", $_SESSION['password'], time()+120, "/");
           $_COOKIE["NhapMK"];
          }
          header("location:../index.html"); // kiem tra dung, khong check
          exit;
        }
    }
} else if(isset($_COOKIE["remember"])) {
  header("location:../index.html");
  }

?>
  <html>

  <head>
    <title>Login Page</title>
    <meta charset="utf-8">
  </head>

  <body>
    <form method="POST" action="login.php">
      <fieldset>
        <legend>Login</legend>
        <table>
          <tr>
            <td>Username</td>
            <td><input type="text" name="username" size="30"></td>
          </tr>
          <tr>
            <td>Password</td>
            <td><input type="password" name="password" size="30"></td>
          </tr>
          <tr>
            <td> <input type="checkbox" name="remember">Remember me </td>
          </tr>
          <tr>
            <td> <input type="submit" name="ok" value="Login"></td>
            <td> <a href="register.php"> Register </a> </td>
          </tr>
          <tr>

          </tr>
        </table>
      </fieldset>
    </form>
  </body>

  </html>
