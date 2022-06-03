<?php
include '../conexion.php';
include '../encabezado.php';
include 'phpqrcode/qrlib.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta general</title>
</head>
<body>
  <?php

  if (isset($_GET['proceso'])) {
      $dato = $_GET['proceso'];
      try {
          $consultar = "SELECT * /* foto_usuario,cedula_usuario,nombre_usuario,direccion_usuario,telefono_usuario, nombre_finca, ubicacion_finca, altitud_finca, foto_finca,
          nombre_variedad,descripcion_var, foto_variedad, nombre_proceso,tipo_fer,fragancia_proceso,sabor_proceso,acidez_proceso,cuerpo_proceso,foto_proceso */ FROM usuario  INNER JOIN  finca on usuario.cedula_usuario = finca.id_usua INNER JOIN variedad on variedad.id_fin = id_finca INNER JOIN proceso on proceso.id_variedad = variedad.id_variedad WHERE id_proceso = $dato";
          $informacion = $cadena->prepare($consultar);
          $informacion-> execute(array());
          $contador = $informacion -> rowCount();
          if ($contador >= 1) {
            while ($respuesta = $informacion -> fetch (PDO:: FETCH_ASSOC)) {
              ?>
              <table>
                <tr>
                    <td class="box2"><img src="../fotografiaUsuario/<?=$respuesta['foto_usuario']?>" title="<?=$respuesta['foto_usuario']?>" width="100" height="100"></td>  
                    <td class="box2"> <?php echo $respuesta['cedula_usuario'];?></td>
                    <td class="box2"> <?php echo $respuesta['nombre_usuario'];?></td>
                    <td class="box2"> <?php echo $respuesta['direccion_usuario'];?></td>
                    <td class="box2"> <?php echo $respuesta['telefono_usuario'];?></td>
                    <td class="box2"> <?php echo $respuesta['nombre_finca'];?></td>
                    <td class="box2"> <?php echo $respuesta['ubicacion_finca'];?></td>
                    <td class="box2"> <?php echo $respuesta['altitud_finca'];?></td>
                    <td class="box2"><img src="../fotografiaFinca/<?=$respuesta['foto_finca']?>" title="<?=$respuesta['foto_finca']?>" width="100" height="100"></td> 
                    <td><?php echo $respuesta['nombre_variedad']?></td> 
                    <td><?php echo $respuesta['descripcion_var']?></td> 
                    <td><img src="../fotografiaVariedad/<?=$respuesta['foto_variedad']?>" title="<?=$respuesta['foto_variedad']?>" width="100" height="100"></td>   
                    <td><?php echo $respuesta['nombre_proceso']?></td>
                    <td><?php echo $respuesta['tipo_fer']?></td>
                    <td><?php echo $respuesta['fragancia_proceso']?></td>
                    <td><?php echo $respuesta['sabor_proceso']?></td>
                    <td><?php echo $respuesta['acidez_proceso']?></td>
                    <td><?php echo $respuesta['cuerpo_proceso']?></td>
                    <td><img src="../fotografiaProceso/<?=$respuesta['foto_proceso']?>" title="<?=$respuesta['foto_proceso']?>" width="100" height="100"></td> 
                </tr> 
              </table>
              <?php
            }
        }else{
          ?>
            <script type="text/javascript">window.alert("No se encontraron datos que concuerden con la busqueda, por verifique la informacion...."); window.location="consulta_qr.php" </script>
          <?php
        }
      }catch (Exception $e) {
        die ('ALERTA!!! Error al ejecutar la busqueda.... ' . $e-> getMessage () );
      }
  }else{
  }
?>
</body>
</html>