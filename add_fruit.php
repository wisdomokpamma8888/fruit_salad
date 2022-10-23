<?php 
   include_once 'config/db.php';

    $username = $email = $title =$ingredient = " ";
   $error = [
       'username'=> '',
       'email'=> '',
       'title'=> '',
       'ingredient'=> '',
       'form' => ''
      
   ];

  if(isset($_POST['submit'])){
     $username = htmlspecialchars($_POST['username']);
     $email = htmlspecialchars($_POST['email']);
     $title = htmlspecialchars($_POST['title']);
     $ingredient = htmlspecialchars($_POST['ingredient']);

     //check for usernane
     if(empty($username = htmlspecialchars($_POST['username']))){
          $error['username'] = "Username field must not be empty!";
     }else{
        //  $username = htmlspecialchars($_POST['username']);
         if(!preg_match("/^[a-zA-Z\s]{5,}+$/", $username)){
              $error['username'] = 'Your Username must be aleast 5 letters words with space!';
         }
         
     }
      //check for email
      if(empty( $email = htmlspecialchars($_POST['email']))){
            $error['email']= 'Email field must not be empty!';
      }else{
          if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
               $error['email'] = 'Incorrect Email address!';
          }
      }
      //check for tittle
      if(empty( $title = htmlspecialchars($_POST['title']))){
           $error['title'] = 'Title field must not be empty!';
      }else{
          if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
               $error['title'] = 'Invalid Title!';

          }
      }
      //check for ingredient
      if(empty( $ingredient = htmlspecialchars($_POST['ingredient']))){
        $error['ingredient'] = 'Ingredient field must not be empty!';
      }else{
       if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $title)){
           $error['ingredient'] = 'Ingredient must be atleast one with comma seperated words!';

       }
     }

      //Filtering the $error that is in an array
     if(array_filter($error)){
        $error['form'] = "successful!!!";
     }else{
         $username = mysqli_escape_string($connection, $_POST['username']);
         $email = mysqli_escape_string($connection, $_POST['email']);
         $title = mysqli_escape_string($connection, $_POST['title']);
         $ingredient = mysqli_escape_string($connection, $_POST['ingredient']);

         $query = "INSERT INTO fruits(username, email, title, ingredient)
          VALUES('$username', '$email', '$title', '$ingredient') ";

          if(!mysqli_query($connection, $query)){
              echo 'query error!'.mysqli_error($connection);

          }else{
            header('location:index.php');

          }

         

     }
     

      
      
  }

    


?>


<!DOCTYPE html>
<html lang="en">
   <link rel="stylesheet" href="includes/header.css">
   <link rel="stylesheet" href="includes/footer.css">
   <link rel="stylesheet" href="add_fruit.css">
   <?php  include 'includes/header.php' ?>

      <div class="container">
          <div class="form">
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                  <div class="form-control">
                      <label for="Username">Username:</label> 
                      <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>">
                      <div class="error-mesg"><?php echo $error['username'];?></div>
                      
                  </div>

                  <div class="form-control">
                      <label for="Email">Email:</label> 
                      <input type="text" placeholder="Email" name="email" value="<?php echo $email; ?>">
                      <div class="error-mesg"><?php echo $error['email'];?></div>
                  </div>

                  <div class="form-control">
                      <label for="Email">Title:</label>
                      <input type="text" placeholder="Title" name="title" value="<?php  echo $title;?>">
                      <div class="error-mesg"><?php echo $error['title'];?></div>
                  </div>
                  <div class="form-control">
                      <label for="Ingredient">Ingredient:</label>
                      <input type="text" placeholder="Ingredient" name="ingredient" value="<?php echo $ingredient;?>">
                      <div class="error-mesg"><?php echo $error['ingredient'];?></div>
                  </div>

                  <div class="form-control">
                    
                      <input type="submit" name="submit" value="Submit">
                      
                      
                  </div>
              </form>
          </div>
      </div>

          
          <!-- <script src="index.js"></script> -->


   <?php include 'includes/footer.php' ?>

</html>