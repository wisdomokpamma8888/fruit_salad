<?php
  include_once 'config/db.php';
  $query = "SELECT * FROM fruits ORDER BY ingredient DESC  ";

  $result = mysqli_query($connection, $query);
  
  $resultCheck = mysqli_num_rows($result);
  
  





?>



<!DOCTYPE html>
<html lang="en">
   <link rel="stylesheet" href="includes/header.css">
   <link rel="stylesheet" href="includes/footer.css">
   <link rel="stylesheet" href="index.css">
   <?php  include 'includes/header.php' ?>

    <?php if($resultCheck != 0):?>
      <?php while($row =mysqli_fetch_assoc($result)): ?>
      <div class="container">
        <div class="content">
            <div class="boxes">
               <h2><?php echo $row['title'];?></h2>
               <ul>
                  <?php foreach(explode(',', $row['ingredient']) as $ing):?>
                     <li><?php echo $ing;?></li>
                  <?php  endforeach; ?>
               </ul>
               <div class="link"><a href="details.php?id=<?php echo $row['id']; ?>">MORE INFO</a></div>
            </div>
        </div>
        

     </div>
      <?php endwhile;?>
      
      <?php else:?>
           <p>No fruit salad avaliable now!!!</p>
    <?php endif;?>

   <?php include 'includes/footer.php' ?>

</html>