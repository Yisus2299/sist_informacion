<?php 
$servername = "localhost";    
$username = "root";    
$password = "";    
$database = "sistema_informacion";   
  
//Crear conexion  
$connection = new mysqli($servername, $username, $password, $database); 
 
 
$id = "";   
$Nombre = "";   
$Apellido = "";   
$Cedula = "";   
$Departamento = "";   
   
$errorMessage = "";   
$successMessage = "";   
 
if ( $_SERVER['REQUEST_METHOD'] == 'GET' ){   
 
    if (!isset($_GET["id"]) ){ 
        header("location: /sist_informacion/index.php"); 
        exit; 
    } 
    $id = $_GET["id"]; 
    // lee la columna de la tabla clientes seleccionada de la base de datos 
    $sql = "SELECT * FROM clientes WHERE id=$id"; 
    $result = $connection->query($sql); 
    $row = $result->fetch_assoc(); 
 
    if (!$row){ 
        header("location: /sist_informacion/index.php"); 
        exit; 
    } 
 
    $id = $row["id"];  
    $Nombre = $row["Nombre"];   
    $Apellido = $row["Apellido"];   
    $Cedula = $row["Cedula"];   
    $Departamento = $row["Departamento"]; 
} 
else if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    // POST method: actualiza la informacion de los visitantes 
 
    $id = $_POST["id"];   
    $Nombre = $_POST["Nombre"];   
    $Apellido = $_POST["Apellido"];   
    $Cedula = $_POST["Cedula"];   
    $Departamento = $_POST["Departamento"]; 
 
    if ( empty($id) || empty($Nombre) || empty($Apellido) || empty($Cedula) || empty($Departamento) ) {   
        $errorMessage = "Todos los campos son necesarios";   
    } else {
        $sql = "UPDATE clientes SET Nombre = '$Nombre', Apellido ='$Apellido', Cedula = '$Cedula', Departamento = '$Departamento' WHERE id = $id"; 
 
        $result = $connection->query($sql); 
 
        if (!$result) { 
            $errorMessage = "Invalid query: " . $connection->error; 
        } else {
            $successMessage = "Visitante actualizado correctamente"; 
        }
    }
}  
?>


<!DOCTYPE html>   
<html lang="en">   
<head>   
    <meta charset="UTF-8">   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <title>Sistemas de Informacion</title>   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">    
</head>   
<body>   
    <div class="container my-5">   
        <h2>Nuevo visitante</h2>   
   
        <?php   
           
        if (!empty($errorMessage)) {   
            echo"   
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>   
                <strong>$errorMessage</strong>   
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>   
            </div>   
            ";   
        }   
   
        ?>   
   
        <form method="post">   
            <input type="hidden" name="id" value="<?php echo $id; ?>"> 
            <div class="row mb-3">   
                <label class="col-sm-3 col-form-label">Nombre</label>   
                <div class="col-sm-6">   
                    <input type="text" class="form-control" name="Nombre" value="<?php echo $Nombre; ?>">   
                </div>   
            </div>   
            <div class="row mb-3">   
                <label class="col-sm-3 col-form-label">Apellido</label>   
                <div class="col-sm-6">   
                    <input type="text" class="form-control" name="Apellido" value="<?php echo $Apellido; ?>">   
                </div>   
            </div>   
            <div class="row mb-3">   
                <label class="col-sm-3 col-form-label">Cedula</label>   
                <div class="col-sm-6">   
                    <input type="text" class="form-control" name="Cedula" value="<?php echo $Cedula; ?>">   
                </div>   
            </div>   
            <div class="row mb-3">   
                <label class="col-sm-3 col-form-label">Departamento</label>   
                <div class="col-sm-6">   
                    <input type="text" class="form-control" name="Departamento" value="<?php echo $Departamento; ?>">   
                </div>   
            </div>   
   
   
            <?php   
            if( !empty($successMessage)){   
               echo"   
               <div class='row mb-3'>   
                    <div class='offset-sm-3 col-sm-6'>   
                        <div class='alert alert-success alert-dismissible 
fade show' role='alert'>   
                            <strong>$successMessage</strong>   
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>   
                        </div>   
                    </div>   
                </div>   
               ";  
            }  
            ?>  
   
            <div class="row mb-3">  
                <div class="offset-sm-3 col-sm-3 d-grid">  
                    <button type="submit" class="btn btn-primary">Submit</button>  
                </div>  
                <div class="col-sm-3 d-grid">  
                    <a class="btn btn-outline-primary"  href="/sist_informacion/index.php" role="button">Cancel</a>  
                </div>  
            </div>  
        </form>  
    </div>  
 
    <!-- Agregamos el script de Bootstrap al final del body --> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> 
   
</body>   
</html> 