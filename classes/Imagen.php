<?php

class Imagen
{

    private $error;

    public function subirImagen($dir, $data_Post): string
    {

     

        if (!empty($data_Post['tmp_name'])) {

            $Original_name = (explode(".", $data_Post['name']));
            $extension = end($Original_name);
            $fileName = time() . ".$extension";

            $fileUpload = move_uploaded_file($data_Post['tmp_name'], "$dir/$fileName");

            if (!$fileUpload) {

                throw new Exception("No se subio imagen");
            } else {

                return $fileName;
            }
        }
    }


    public function borrarImagen($archivo): bool
    {

        if (file_exists(($archivo))) {

            $fileDelete = unlink($archivo);

          

            if (!$fileDelete) {

                throw new Exception("NO SE PUDO BORRAR");
            } else {

                return TRUE;
            }
        } else {

            return FALSE;
        }
    }
}
