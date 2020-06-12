
<?php
include('config/db_connect.php');
if (isset($_POST['delete'])){
echo 'test';
}
if(isset($_GET['email'])){

$email= $_GET['email'] ;

$sql ="SELECT name, lastname, email  FROM user where email = '$email'";
$res = mysqli_query($connection, $sql);

$user= mysqli_fetch_assoc($res);

mysqli_free_result($res);
mysqli_close($connection);
}

?>

<html>
 <?php include('templates/header.php') ?>

            <h4 class="center grey-text"> Welcome</h4>
            <div style="max-width :500px" class="container">
         <div class="card z-depth-0">
         <div class="card-content center">
                            
           <h4>
            <?php echo htmlspecialchars($user['name']); ?>
            <hr>
            <?php echo htmlspecialchars($user['lastname']); ?>
            
            </h4>
            <div> <?php echo htmlspecialchars($user['email']); ?> </div>
            </div>
            <div class="card-action right-align ">
            <a href="index.php" class="brand-text"> sign out</a>
            <form action="profile.php" methode="POST">
            <input type="hidden" name="nothing" value="<?php echo $email?>">
            <input class="btn danger  z-depth-0 " type="submit" name="delete" value="DELETE ACCOUNT">
            </form>


                            </div>
                        </div>
                </div>


               <?php include('templates/footer.php') ?>
               
               </html>
               
                

            