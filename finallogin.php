<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="des.css">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>

<header>

    <input type="checkbox" name="" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>

    <a href="index.php" class="logo">phlora<span></span></a>


    <div class="icons">
        <a href="finallogin.php" class="fas fa-user"></a>
    </div>

</header>
   
<div class="form-container">

   <form action="checklogin.php" method="post">
      <h3>Login</h3>
      <?php
      if (isset($_GET['error'])) { ?>
         <p class="error"><?php echo $_GET['error']; ?></p>
      <?php } ?>
      <input type="text" name="register_id" required placeholder="Username">
      <input type="password" name="passwordreg" required placeholder="Password">
      <input type="submit" name="Submit" value="Login now" class="form-btn">
      <p>Don't have an account? <a href="register.php" style="text-decoration: underline;">Register now</a></p>
   </form>

</div>

</body>
</html>