<?php

class Carrito{

public function agregarInstrumento(int $id_instrumento, int $cantidad)
{

    $instrumento = (new Guitarra)->instrumento_x_id($id_instrumento);
    if($instrumento){

        $_SESSION['carrito'][$id_instrumento] = [
            'serie' => $instrumento->getSerie(),
            'nombre'=> $instrumento->getNombre(),
            'img' => $instrumento->getImg(),
            'precio' => $instrumento->getPrecio(),
            'cantidad'=>$cantidad
        ];

    }

}

public function get_carrito(): array
    {
        if (!empty($_SESSION['carrito'])) {
            return $_SESSION['carrito'];
        } else {
            return [];
        }
    }


    public function clear_instrumentos()
    {
        $_SESSION['carrito'] = [];
    }

    public function remove_instrumento(int $IdInstrumento)
    {
        if (isset($_SESSION['carrito'][$IdInstrumento])) {
            unset($_SESSION['carrito'][$IdInstrumento]);
        }
    }
    public function modificar_cantidad(array $cantidad)
    {
        foreach ($cantidad as $i => $valor) {
            if (isset($_SESSION['carrito'][$i])) {
                $_SESSION['carrito'][$i]['cantidad'] = $valor;
            }
        }
    }

    public function total() : float
    {
        $total = 0;
        if (!empty($_SESSION['carrito'])) {
            foreach ($_SESSION['carrito'] as $item) {
                $total += $item['precio'] * $item['cantidad'];
            }
        }
        return $total;
    }
    
    public function insert_compra(array $dataCompra, array $detalle) 
    {
        
      
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO compras VALUES (NULL, :id_usuario, :fecha, :importe)";

        $PDOConexion = $conexion->prepare($query);
        $PDOConexion->execute([
            
            
            "id_usuario" => $dataCompra['id_usuario'],
            "fecha" => $dataCompra['fecha'],
            "importe" => $dataCompra['importe']
        
        
        
        ]);

        $isertedID = $conexion->lastInsertId();

        foreach ($detalle as $key => $i){

            $query = "INSERT INTO instrumentos_x_compras VALUES (NULL, :compra_id, :instrumento_id, :cantidad)";

            $PDOConexion = $conexion->prepare($query);
            $PDOConexion->execute([
                
                
                "compra_id" => $isertedID,
                "instrumento_id" => $key,
                "cantidad" => $i
            
            
            ]);


        }

    }



}

