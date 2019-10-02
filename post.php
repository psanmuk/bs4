<?php
   if( $_POST["paraData"]) {

    $data = json_decode($_POST['paraData']); 
  
    echo $data->TRNNUM; 
    echo "\n"; 
    echo $data->cshpaid;  
    echo $data->ccardamt;
    echo $data->ccardno;
    echo $data->ccardname;
    echo $data->ccardexpire;
    echo $data->gvamt;
    echo $data->pointamt;
    echo $data->pointuse;

   }

   if( $_POST["name"] || $_POST["weight"] ) { 
      if (preg_match("/[^A-Za-z'-]/",$_POST['name'] )) { 
         die ("invalid name and name should be alpha"); 
      } 
      echo "Welcome ". $_POST['name']. "<br />"; 
      echo "You are ". $_POST['weight']. "kgs in weight."; 
        
      exit(); 
   } 
?> 
<html> 
   <body>    
      <form action = "<?php $_PHP_SELF ?>" method = "POST"> 
         Name: <input type = "text" name = "name" /> 
         Weight: <input type = "text" name = "weight" /> 
         <input type = "submit" /> 
      </form> 
     
   </body> 
</html> 