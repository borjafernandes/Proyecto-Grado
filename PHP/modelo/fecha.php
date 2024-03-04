<?php
function date2string ($anio)
{

   $fechaFormateada = date("d-m-Y", strtotime($anio));
   return ($fechaFormateada);
   
}
?>