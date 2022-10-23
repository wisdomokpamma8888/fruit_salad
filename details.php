<?php 
   include_once 'config/db.php';



    if(isset($_GET['id'])){
       $id_url = mysqli_escape_string($connection, $_GET['id']);
       $query ="SELECT * FROM fruits WHERE id = $id_url";

       $result = mysqli_query($connection, $query);
       $row = mysqli_fetch_assoc($result);
         
    }

    //UPDATE FROM DATABASE DATA FROM DATABASE>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

    if(isset($_POST['submit'])){
    
         $id_url = mysqli_escape_string($connection, $_POST['id_from_url']);
         $username = mysqli_escape_string($connection, $_POST['username']);
         $email = mysqli_escape_string($connection, $_POST['email']);
         $title = mysqli_escape_string($connection, $_POST['title']);
         $ingredient = mysqli_escape_string($connection, $_POST['ingredient']);

         $query = "DELETE FROM fruits WHERE id = $id_url";
         

       

         if(!mysqli_query($connection, $query)){
             echo 'Query error'.mysqli_error($connection);
        }else{
             header('location:index.php');
        }   

    }



?>


<!DOCTYPE html>
<html lang="en">
   <link rel="stylesheet" href="includes/header.css">
   <link rel="stylesheet" href="includes/footer.css">
   <link rel="stylesheet" href="details.css">
   <?php  include 'includes/header.php' ?>

      <div class="container">
          <div class="form">
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                  <div class="form-control">
                      <label for="Username">Username:</label> 
                      <input type="text" placeholder="Username" name="username" value=<?php echo $row['username'];?>>
                      
                  </div>

                  <div class="form-control">
                      <label for="Email">Email:</label> 
                      <input type="text" placeholder="Email" name="email" value="<?php echo $row['email'];?>">
                    
                  </div>

                  <div class="form-control">
                      <label for="Email">Title:</label>
                      <input type="text" placeholder="Title" name="title" value="<?php echo $row['title'];?>">
                     
                  </div>
                  <div class="form-control">
                      <label for="Ingredient">Ingredient:</label>
                      <input type="text" placeholder="Ingredient" name="ingredient" value="<?php echo $row['ingredient']; ?>">
                      
                  </div>

                  <div class="form-control">
                      <label for="Ingredient">Created_at:</label>
                      <input type="text" placeholder="Created_at" name="created_at" value="<?php echo $row['created_at']; ?>">
                      
                  </div>

                  <div class="form-control">
                       <input type="hidden" name = "id_from_url" value="<?php echo $row['id']; ?>">
                       <input type="submit" name="submit" value="Delete">
                       <a href="update.php?<?php echo $row['id'];?>">update</a>
                  </div>
              </form>
          </div>
      </div>

          
          <!-- <script src="index.js"></script> -->


   <?php include 'includes/footer.php' ?>

</html>