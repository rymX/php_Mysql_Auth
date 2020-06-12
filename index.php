<?php

include('config/db_connect.php');


$errors = '' ;
if (isset($_GET['submit'])){
    $email =$_GET['email'];
    $password =$_GET['password'];

            $sql ="SELECT *  FROM user where email = '$email' and password = '$password'";
            $res = mysqli_query($connection, $sql);
            if (mysqli_num_rows($res)==1){
                header("Location:profile.php?email=$email");  
            }
            else  { 
                $errors=' email or password are incorrect ';
               
            }
            // free memory 
            mysqli_free_result($res);
            // close connection 
         mysqli_close($connection);


}

?>

<!DOCTYPE html>
 <html>
 <?php include('templates/header.php'); ?>

  <h4 class="center grey-text"> Welcome</h4>
  <div style="max-width :500px" class="container">
        <div class="card z-depth-0">
            <div class="card-content center">
              <form class="white" action="index.php" methode="GET" >

              <div class="red-text"> <?php echo $errors; ?> </div> 

                <label for="email"> e-mail </label>
                <input type="text" name="email"> 
                

                <label for="password">password</label>
                <input type="password" name="password">
               


                <div class="center">
                <input type="submit" name="submit" value="Sign Up" class="btn brand z-depth-0">
                </div> 
                <a href="add.php" class="brand-text"> Or register here</a> 
                </form>
              

            </div>
        </div>
  </div>
 

 <?php include('templates/footer.php'); ?>
  

 </html>