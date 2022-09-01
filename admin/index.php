<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <link rel="stylesheet" href="adminlogin.css">

</head>
<body>

<div id="bg"></div>

<form action="adminlogin.php" method="POST" enctype="multipart/form-data">
  <div class="form-field">
    <input type="email" placeholder="Email / Username" name="uemail" required/>
  </div>
  
  <div class="form-field">
    <input type="password" placeholder="Password" name="upass" required/>                         </div>
  
    <div class="form-field">
    <input type="submit" name="submit" class="btn" value="Sign In">
  </div>

</form>

  
</body>
</html>
