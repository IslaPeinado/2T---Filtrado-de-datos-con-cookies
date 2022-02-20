<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Northwind</title>
  </head>
  <body>
      <h2>Tabla precios</h2>
      <form action="" method="get">
      <label>Introduzca el precio a comparar</label>
      <input type="number" step="0.01" name="precio" placeholder="precio">
      <input type="submit">
      </form>
      <form action="buscar.php" method="get">
      <input type='submit' value = 'Rechazar cookies' name = 'rechazar'>
    </form>     
      <table class="table">
        <thead>
            <th>ProductID</th>
            <th>ProductName</th>
            <th>SupplierID </th>
            <th>CategoryID </th>
            <th>QuantityPerUnit</th>
            <th>UnitPrice</th>
            <th>UnitsInStock</th>
            <th>UnitsOnOrder</th>
            <th>UnitsOnOrder</th>
            <th>Discontinued</th>
        </thead>
      <tbody>
    <?php
            $precio = $_GET['precio'];
            
            if (isset($precio)){
            setcookie('galleta',$precio);

            $conexion = mysqli_connect('localhost','root','','northwind');
            $consulta = "select * from products where UnitPrice < ".$precio." order by UnitPrice asc";
            $cursor = mysqli_query($conexion,$consulta);
        
            while($row = $cursor-> fetch_row()){
                echo "<tr>";
                echo "<td>".$row[0]."</td>";
                echo "<td>".$row[1]."</td>";
                echo "<td>".$row[2]."</td>";
                echo "<td>".$row[3]."</td>";
                echo "<td>".$row[4]."</td>";
                echo "<td>".$row[5]."</td>";
                echo "<td>".$row[6]."</td>";
                echo "<td>".$row[7]."</td>";
                echo "<td>".$row[8]."</td>";
                echo "<td>".$row[9]."</td>";
                echo "</tr>";
            }
        }else{
            $conexion = mysqli_connect('localhost','root','','northwind');
            $consulta = "select * from products";
            $cursor = mysqli_query($conexion,$consulta);
        
            while($row = $cursor-> fetch_row()){
                echo "<tr>";
                echo "<td>".$row[0]."</td>";
                echo "<td>".$row[1]."</td>";
                echo "<td>".$row[2]."</td>";
                echo "<td>".$row[3]."</td>";
                echo "<td>".$row[4]."</td>";
                echo "<td>".$row[5]."</td>";
                echo "<td>".$row[6]."</td>";
                echo "<td>".$row[7]."</td>";
                echo "<td>".$row[8]."</td>";
                echo "<td>".$row[9]."</td>";
                echo "</tr>";
            }

        }

    
    ?>
        </tbody>
        </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>