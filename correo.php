<?php
$nombre = $_POST["nombre"];
$company = $_POST["company"];
$email = $_POST["email"];
$area = $_POST["areas"];
$mensaje = $_POST["mensaje"];
$para = "info@adeosoluciones.com";
$titulo = "Contacto Página Web";
$header = "From:" . $email;
$msjCorreo = "Nombre: $nombre\n Compañia: $company \n E-Mail: $email \n Area: $area\n Mensaje:\n $mensaje";

if ($_POST["submit"]) {
if (mail($para, $titulo, $msjCorreo, $header)) {
echo '<script  language="javascript">
alert("Mensaje enviado, muchas gracias.");
window.location.href = "http://adeosoluciones.com";
</script>';
} else {
echo 'Falló el envio';
}
}
?>
