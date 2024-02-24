<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

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

<form action="checkr.php" method="post">
      <h3>register now</h3>

      <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>      

      <?php if (isset($_GET['success'])) {
         $successMessage = $_GET['success'];
         $color = isset($_GET['color']) ? $_GET['color'] : 'black';
         echo '<p style="color: ' . $color . '">' . $successMessage . '</p>';
      } ?>

      <input type="text" name="name" required placeholder="Name">
      <input type="text" name="register_id" required placeholder="Username">
      <input type="text" name="age" required placeholder="Age">
      <select name="gender">
         <option value="" disabled selected hidden>Choose gender</option>
         <option value="M">Male</option>
         <option value="F">Female</option>
         <!-- <option value="Prefer not to say">Prefer not to say</option> -->
      </select>
      <input type="text" name="address" required placeholder="Address">
      <input type="date" name="birth_date" required placeholder="Birthday">
      <input type="text" name="contact_number" required placeholder="Contact Number">
      <input type="text" name="email" required placeholder="Email">
      <input type="password" name="passwordreg" required placeholder="Password">
      <input type="password" name="cpassword" required placeholder="Confirm your password">
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>Already have an account? <a href="finallogin.php" style="text-decoration: underline;">Login now</a></p>
   </form>

</div>

</body>
</html>