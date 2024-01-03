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
        <h2>Lista de visitantes</h2>  
        <a class="btn btn-primary" href="/sist_informacion/create.php" role="button">Crear nuevo visitante</a>  
        <br>  
        <table class="table">  
            <thead>  
                <tr>  
                    <th>ID</th>  
                    <th>Nombre</th>  
                    <th>Apellido</th>  
                    <th>Cedula</th>  
                    <th>Departamento</th>  
                    <th>Fecha</th>  
                    <th>Accion</th>  
                </tr>  
            </thead>  
            <tbody>  
                <?php  
                $servername = "localhost";  
                $username = "root";  
                $password = "";  
                $database = "sistema_informacion";  
  
                //create connection  
                $connection = new mysqli($servername, $username, $password, $database);  
  
                // check connection  
                if ($connection->connect_error){  
                    die("Error de conexion: " . $connection->connect_error);  
                }  
                  
                // read all row from database table  
                $sql = "SELECT * FROM clientes";  
                $result = $connection->query($sql);  
  
                if (!$result) {  
                    die("Invalid query: " . $connection->error);  
                }  
  
                //read data of each row  
                while($row = $result->fetch_assoc()) {  
                    echo "  
                    <tr>  
                        <td>$row[id]</td>  
                        <td>$row[Nombre]</td>  
                        <td>$row[Apellido]</td>  
                        <td>$row[Cedula]</td>  
                        <td>$row[Departamento]</td>  
                        <td>$row[Fecha]</td>  
                        <td>  
                            <a class='btn btn-primary btn-sm' href='/sist_informacion/edit.php?id=$row[id]'>Editar</a>  
                            <a class='btn btn-danger btn-sm' href='/sist_informacion/delete.php?id=$row[id]'>Borrar</a> 
                        </td>  
                    </tr>  
                    ";  
                }  
                ?>  
  
                  
            </tbody>  
        </table>  
    </div>  

    <!-- Agregamos el script de Bootstrap al final del body -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  
</body>  
</html>