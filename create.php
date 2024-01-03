<?php  
$servername = "localhost";   
$username = "root";   
$password = "";   
$database = "sistema_informacion";  
 
//Crear conexion 
$connection = new mysqli($servername, $username, $password, $database); 
 
 
$Nombre = "";  
$Apellido = "";  
$Cedula = "";  
$Departamento = "";  
  
$errorMessage = "";  
$successMessage = "";  
  
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){  
    $Nombre = $_POST["Nombre"];  
    $Apellido = $_POST["Apellido"];  
    $Cedula = $_POST["Cedula"];  
    $Departamento = $_POST["Departamento"];  
  
    if ( empty($Nombre) || empty($Apellido) || empty($Cedula) || empty($Departamento) ) {  
        $errorMessage = "Todos los campos son necesarios";  
    } else {
        // add new client to database  
        $sql = "INSERT INTO clientes (Nombre, Apellido, Cedula, Departamento)" . 
                "VALUES ('$Nombre', '$Apellido', '$Cedula', '$Departamento')"; 
        $result = $connection->query($sql); 
 
        if (!$result) { 
            $errorMessage = "Invalid query: " . $connection->error; 
        } else {
            $Nombre = "";  
            $Apellido = "";  
            $Cedula = "";  
            $Departamento = "";  
  
            $successMessage = "Visitante agregado exitosamente";  
 
            header("location: /sist_informacion/index.php"); 
            exit; 
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