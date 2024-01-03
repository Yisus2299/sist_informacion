<?php 
if (isset($_GET["id"])) { 
    $id = $_GET["id"]; 
 
    $servername = "localhost";    
    $username = "root";    
    $password = "";    
    $database = "sistema_informacion";   
  
    //Crear conexion  
    $connection = new mysqli($servername, $username, $password, $database); 
 
    $sql = "DELETE FROM clientes WHERE id=$id"; 
    $connection->query($sql); 
 
} 
 
header("location: /sist_informacion/index.php"); 
exit; 
?>