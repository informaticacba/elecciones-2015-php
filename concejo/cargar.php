<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<?php

if($_FILES['atlantico']['name'] || $_FILES['bolivar']['name'] || $_FILES['cesar']['name'] || $_FILES['cordoba']['name'] || $_FILES['sucre']['name'] || $_FILES['magdalena']['name'] || $_FILES['la_guajira']['name'] || $_FILES['sanandres']['type'])
{
//datos del arhivo 
   $nombre_atlantico =$_FILES['atlantico']['name']; 
   $nombre_bolivar =$_FILES['bolivar']['name']; 
   $nombre_cesar =$_FILES['cesar']['name'];
   $nombre_cordoba =$_FILES['cordoba']['name'];
   $nombre_sucre =$_FILES['sucre']['name']; 
   $nombre_magdalena =$_FILES['magdalena']['name']; 
   $nombre_la_guajira =$_FILES['la_guajira']['name']; 
   $nombre_sanandres =$_FILES['sanandres']['name'];

   $tipo_atlantico =$_FILES['atlantico']['type']; 
   $tipo_bolivar =$_FILES['bolivar']['type']; 
   $tipo_cesar =$_FILES['cesar']['type'];
   $tipo_cordoba =$_FILES['cordoba']['type']; 
   $tipo_sucre =$_FILES['sucre']['type']; 
   $tipo_magdalena =$_FILES['magdalena']['type']; 
   $tipo_la_guajira =$_FILES['la_guajira']['type']; 
   $tipo_sanandres =$_FILES['sanandres']['type'];
   
   $tamano_atlantico =$_FILES['atlantico']['size'];
   $tamano_bolivar =$_FILES['bolivar']['size'];
   $tamano_cesar =$_FILES['cesar']['size'];
   $tamano_cordoba =$_FILES['cordoba']['size'];
   $tamano_sucre =$_FILES['sucre']['size'];
   $tamano_magdalena =$_FILES['magdalena']['size'];
   $tamano_la_guajira =$_FILES['la_guajira']['size'];
   $tamano_sanandres =$_FILES['sanandres']['size'];


/*-----------------------------------------------------------*  Atlantico  *-------------------------------------------------------------------*/
if (!((strpos($tipo_atlantico, "xml") || strpos($tipo_atlantico, "xml")) && ($tamano_atlantico < 90000000))) { 
      echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .xml<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>"; 
}else{ 
   $fichero='cargar/atlantico/';
   $fichero=scandir($fichero, 1);
   $fichero="cargar/atlantico/".$fichero[0];
   @unlink($fichero);

echo"<body><div class='text' id='formulario'>";
      if (move_uploaded_file($_FILES['atlantico']['tmp_name'], "cargar/atlantico/".$nombre_atlantico)){ 
         echo "<h1 align='center'>El XML de Atlantico ha sido cargado correctamente</h1><br>"; 
     
         echo"<h1 align='center'><a href='javascript:history.back(1)''>Volver Atrás</a></h1>";
         echo"<br>";
         ?>
         <script>
         $.ajax({
            url:"ajax.php",
            success:function(res){
               //$("body").html(res);
            }
         });
         </script>
         <?php
      }else{ 
         echo "\nOcurrió algún error al subir el XML de Atlantico"; 
      } 
} 
/*-----------------------------------------------------------*  bolivar  *-------------------------------------------------------------------*/
if (!((strpos($tipo_bolivar, "xml") || strpos($tipo_bolivar, "xml")) && ($tamano_bolivar < 90000000))) { 
      echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .xml<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>"; 
}else{ 
   $fichero='cargar/bolivar/';
   $fichero=scandir($fichero, 1);
   $fichero="cargar/bolivar/".$fichero[0];
   @unlink($fichero);

echo"<body><div class='text' id='formulario'>";
      if (move_uploaded_file($_FILES['bolivar']['tmp_name'], "cargar/bolivar/".$nombre_bolivar)){ 
         echo "<h1 align='center'>El XML de bolivar ha sido cargado correctamente</h1><br>"; 
     
         echo"<h1 align='center'><a href='javascript:history.back(1)''>Volver Atrás</a></h1>";
         echo"<br>";
         ?>
         <script>
         $.ajax({
            url:"ajax.php",
            success:function(res){
               //$("body").html(res);
            }
         });
         </script>
         <?php
      }else{ 
         echo "\nOcurrió algún error al subir el XML de bolivar."; 
      } 
} 
/*-----------------------------------------------------------*  cesar  *-------------------------------------------------------------------*/
if (!((strpos($tipo_cesar, "xml") || strpos($tipo_cesar, "xml")) && ($tamano_cesar < 90000000))) { 
      echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .xml<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>"; 
}else{ 
   $fichero='cargar/cesar/';
   $fichero=scandir($fichero, 1);
   $fichero="cargar/cesar/".$fichero[0];
   @unlink($fichero);

echo"<body><div class='text' id='formulario'>";
      if (move_uploaded_file($_FILES['cesar']['tmp_name'], "cargar/cesar/".$nombre_cesar)){ 
         echo "<h1 align='center'>El XML de cesar ha sido cargado correctamente</h1><br>"; 
     
         echo"<h1 align='center'><a href='javascript:history.back(1)''>Volver Atrás</a></h1>";
         echo"<br>";
         ?>
         <script>
         $.ajax({
            url:"ajax.php",
            success:function(res){
               //$("body").html(res);
            }
         });
         </script>
         <?php
      }else{ 
         echo "\nOcurrió algún error al subir el XML de cesar."; 
      } 
} 
/*-----------------------------------------------------------*  cordoba  *-------------------------------------------------------------------*/
if (!((strpos($tipo_cordoba, "xml") || strpos($tipo_cordoba, "xml")) && ($tamano_cordoba < 90000000))) { 
      echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .xml<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>"; 
}else{ 
   $fichero='cargar/cordoba/';
   $fichero=scandir($fichero, 1);
   $fichero="cargar/cordoba/".$fichero[0];
   @unlink($fichero);

echo"<body><div class='text' id='formulario'>";
      if (move_uploaded_file($_FILES['cordoba']['tmp_name'], "cargar/cordoba/".$nombre_cordoba)){ 
         echo "<h1 align='center'>El XML de cordoba ha sido cargado correctamente</h1><br>"; 
     
         echo"<h1 align='center'><a href='javascript:history.back(1)''>Volver Atrás</a></h1>";
         echo"<br>";
         ?>
         <script>
         $.ajax({
            url:"ajax.php",
            success:function(res){
               //$("body").html(res);
            }
         });
         </script>
         <?php
      }else{ 
         echo "\nOcurrió algún error al subir el XML de cordoba."; 
      } 
} 
/*-----------------------------------------------------------*  sucre  *-------------------------------------------------------------------*/
if (!((strpos($tipo_sucre, "xml") || strpos($tipo_sucre, "xml")) && ($tamano_sucre < 90000000))) { 
      echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .xml<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>"; 
}else{ 
   $fichero='cargar/sucre/';
   $fichero=scandir($fichero, 1);
   $fichero="cargar/sucre/".$fichero[0];
   @unlink($fichero);

echo"<body><div class='text' id='formulario'>";
      if (move_uploaded_file($_FILES['sucre']['tmp_name'], "cargar/sucre/".$nombre_sucre)){ 
         echo "<h1 align='center'>El XML de sucre ha sido cargado correctamente</h1><br>"; 
     
         echo"<h1 align='center'><a href='javascript:history.back(1)''>Volver Atrás</a></h1>";
         echo"<br>";
         ?>
         <script>
         $.ajax({
            url:"ajax.php",
            success:function(res){
               //$("body").html(res);
            }
         });
         </script>
         <?php
      }else{ 
         echo "\nOcurrió algún error al subir el XML de sucre."; 
      } 
} 
/*-----------------------------------------------------------*  magdalena  *-------------------------------------------------------------------*/
if (!((strpos($tipo_magdalena, "xml") || strpos($tipo_magdalena, "xml")) && ($tamano_magdalena < 90000000))) { 
      echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .xml<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>"; 
}else{ 
   $fichero='cargar/magdalena/';
   $fichero=scandir($fichero, 1);
   $fichero="cargar/magdalena/".$fichero[0];
   @unlink($fichero);

echo"<body><div class='text' id='formulario'>";
      if (move_uploaded_file($_FILES['magdalena']['tmp_name'], "cargar/magdalena/".$nombre_magdalena)){ 
         echo "<h1 align='center'>El XML de magdalena ha sido cargado correctamente</h1><br>"; 
     
         echo"<h1 align='center'><a href='javascript:history.back(1)''>Volver Atrás</a></h1>";
         echo"<br>";
         ?>
         <script>
         $.ajax({
            url:"ajax.php",
            success:function(res){
               //$("body").html(res);
            }
         });
         </script>
         <?php
      }else{ 
         echo "\nOcurrió algún error al subir el XML de magdalena."; 
      } 
} 
/*-----------------------------------------------------------*  guajira  *-------------------------------------------------------------------*/
if (!((strpos($tipo_la_guajira, "xml") || strpos($tipo_la_guajira, "xml")) && ($tamano_la_guajira < 90000000))) { 
      echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .xml<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>"; 
}else{ 
   $fichero='cargar/la_guajira/';
   $fichero=scandir($fichero, 1);
   $fichero="cargar/la_guajira/".$fichero[0];
   @unlink($fichero);

echo"<body><div class='text' id='formulario'>";
      if (move_uploaded_file($_FILES['la_guajira']['tmp_name'], "cargar/la_guajira/".$nombre_la_guajira)){ 
         echo "<h1 align='center'>El XML de la_guajira ha sido cargado correctamente</h1><br>"; 
     
         echo"<h1 align='center'><a href='javascript:history.back(1)''>Volver Atrás</a></h1>";
         echo"<br>";
         ?>
         <script>
         $.ajax({
            url:"ajax.php",
            success:function(res){
               //$("body").html(res);
            }
         });
         </script>
         <?php
      }else{ 
         echo "\nOcurrió algún error al subir el XML de la_guajira."; 
      } 
} 
/*-----------------------------------------------------------*  san andres  *-------------------------------------------------------------------*/
if (!((strpos($tipo_sanandres, "xml") || strpos($tipo_sanandres, "xml")) && ($tamano_sanandres < 90000000))) { 
      echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .xml<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>"; 
}else{ 
   $fichero='cargar/sanandres/';
   $fichero=scandir($fichero, 1);
   $fichero="cargar/sanandres/".$fichero[0];
   @unlink($fichero);

echo"<body><div class='text' id='formulario'>";
      if (move_uploaded_file($_FILES['sanandres']['tmp_name'], "cargar/sanandres/".$nombre_sanandres)){ 
         echo "<h1 align='center'>El XML de sanandres ha sido cargado correctamente</h1><br>"; 
     
         echo"<h1 align='center'><a href='javascript:history.back(1)''>Volver Atrás</a></h1>";
         echo"<br>";
         ?>
         <script>
         $.ajax({
            url:"ajax.php",
            success:function(res){
               //$("body").html(res);
            }
         });
         </script>
         <?php
      }else{ 
         echo "\nOcurrió algún error al subir el XML de sanandres."; 
      } 
} 
/*---------------------------------------------------------------------------------------------------------------------------------------------*/
}
else
{
  echo"no se ha cargado ningun XML";
}
echo"</div></body>";
?>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
