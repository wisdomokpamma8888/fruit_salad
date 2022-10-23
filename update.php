<?php
    include_once 'config/db.php';


    if(isset($_GET['id'])){
        $id_url = mysqli_escape_string($connection, $_GET['id']);

        echo $id_url;
        // $query ="SELECT * FROM fruits WHERE id = $id_url";
 
        // $result = mysqli_query($connection, $query);
        // $row = mysqli_fetch_assoc($result);
          
     }
 
          
        
   
    





?>