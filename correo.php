<?php
   function form_mail($sPara, $sAsunto, $sTexto, $sDe){

      $bHayFicheros = 0;
      $sCabeceraTexto = "";
      $sAdjuntos = "";

      if ($sDe)$sCabeceras = "From:".$sDe."\n"; else $sCabeceras = "";
      $sCabeceras .= "MIME-version: 1.0\n charset=UTF-8' \n";

      foreach ($_POST as $sNombre => $sValor)
             $sTexto = $sTexto."\n".$sNombre." = ".$sValor;

      foreach ($_FILES as $vAdjunto){

             if ($bHayFicheros == 0){

                $bHayFicheros = 1;

                $sCabeceras .= "Content-type: multipart/mixed;";
               $sCabeceras .= "boundary=\"--_Separador-de-mensajes_--\"\n";

               $sCabeceraTexto = "----_Separador-de-mensajes_--\n";
               $sCabeceraTexto .= "Content-type: text/plain;charset=utf-8\n";
               $sCabeceraTexto .= "Content-transfer-encoding: 7BIT\n";

               $sTexto = $sCabeceraTexto.$sTexto;

             }

             if ($vAdjunto["size"] > 0){

                $sAdjuntos .= "\n\n----_Separador-de-mensajes_--\n";
                $sAdjuntos .= "Content-type: ".$vAdjunto["type"].";name=\"".$vAdjunto["name"]."\"\n";;
               $sAdjuntos .= "Content-Transfer-Encoding: BASE64\n";
               $sAdjuntos .= "Content-disposition: attachment;filename=\"".$vAdjunto["name"]."\"\n\n";

                $oFichero = fopen($vAdjunto["tmp_name"], 'r');
               $sContenido = fread($oFichero, filesize($vAdjunto["tmp_name"]));
               $sAdjuntos .= chunk_split(base64_encode($sContenido));
               fclose($oFichero);
             }

      }

      if ($bHayFicheros)
         $sTexto .= $sAdjuntos."\n\n----_Separador-de-mensajes_----\n";

      return(mail($sPara, $sAsunto, $sTexto, $sCabeceras));
   }

   //Ejemplo de como usar:
   if (form_mail("info@adeosoluciones.com",
              "Contacto de Página Web",
              "Los datos introducidos en el formulario son:\n\n",
              Contacto
             )
      )
      echo '<script  language="javascript">
            alert("Mensaje enviado, muchas gracias.");
            window.location.href = "http://adeosoluciones.com";
            </script>';
    // header("Location: index.html"); /* Redirect browser */
    exit();
      // echo "Su formulario ha sido enviado con exito";

?>
