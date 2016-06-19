
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Check In</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div class="wrapper">
      <form class="form-signin" method="post" action="login_check_in.php" enctype="multipart/form-data">
        <h2 class="form-signin-heading">Attendance- Check in</h2>
        <input type="text" class="form-control" name="username" placeholder="User Name" required="" autofocus="" />
        <input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
        <label class="checkbox">
          <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe">Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" name='submit' type="submit">Login</button>
        </br>
        <a href="register.php"><button class="btn btn-lg btn-success btn-block" type="submit">Register</button></a>
      </form>
    </div>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>