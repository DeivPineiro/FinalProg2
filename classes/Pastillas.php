<?php

use Pastillas as GlobalPastillas;

    class Pastillas{

        private $id_Pastilla;
        private $marca;
        private $modelo;
        private $color;
        private $posicion;
        private static $crearValores = ['id_Pastilla', 'marca', 'modelo', 'color','posicion'];



        
        public function get_x_id(?int $id): ?Pastillas 
        {
    
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM pastillas WHERE id_Pastilla =?";
    
        $PDOConexion = $conexion->prepare($query);
        $PDOConexion->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOConexion->execute(
                [$id]
        );
    
        $result = $PDOConexion->fetch();
    
        if (!$result) {
    
            return null;
        }
    
        return $result;
    
    
        }

        
    private function createPastilla($PastillaData): GlobalPastillas
    {



        $pastilla = new self();

        foreach (self::$crearValores as $i) {

            $pastilla->{$i}= $PastillaData[$i];

        }
     

        return $pastilla;
    }


        public function cargar_catalogo(): array
        {
            $catalogo = [];
    
            $conexion = Conexion::getConexion();
            $query = "SELECT * FROM pastillas";
           
            $PDOConexion = $conexion->prepare($query);
            $PDOConexion->setFetchMode(PDO::FETCH_ASSOC);
            $PDOConexion->execute();
    
    
    
            //$catalogo = $PDOConexion->fetchAll();
    
            while ($result = $PDOConexion->fetch()) {
    
                $catalogo[] = $this->createPastilla($result);
    
            }
         /*
            echo "<pre>";
            print_r($catalogo);
            echo "</pre>";
      */
            return $catalogo;
        }
        
    public function insert(string $marca,string $modelo, string $color, string $posicion){

        $conexion = Conexion::getConexion();
        $query = "INSERT INTO `pastillas` (`id_Pastilla`,`marca`,`modelo`,`color`,`posicion`) VALUES (NULL,:marca,:modelo,:color,:posicion)"; 

        $PDOConexion = $conexion->prepare($query);
        $PDOConexion->execute([
            'marca' => $marca,
            'modelo' => $modelo,
            'color' => $color,
            'posicion'=> $posicion
                      

        ]);

    }

    public function edit(string $marca,string $modelo, string $color, string $posicion )
    {

        $conexion = Conexion::getConexion();
        $query = "UPDATE pastillas SET marca=:marca,modelo=:modelo,color=:color,posicion=:posicion WHERE id_Pastilla = :id";

        $PDOConexion = $conexion->prepare($query);
        $PDOConexion->execute([
            'id' => $this->id_Pastilla,
            'marca' => $marca,
            'modelo' => $modelo,
            'color' => $color,
            'posicion'=> $posicion
                      

        ]);
    }

    public function delete(){

        $conexion = Conexion::getConexion();
        $query = "DELETE FROM pastillas WHERE id_Pastilla = ?";

        $PDOConexion = $conexion->prepare($query);
        $PDOConexion->execute([$this->id_Pastilla]);

    }



        /**
         * Get the value of marca
         */ 
        public function getMarca()
        {
                return $this->marca;
        }

        /**
         * Get the value of id_pastilla
         */ 
        public function getId_Pastilla()
        {
                return $this->id_Pastilla;
        }

        /**
         * Get the value of modelo
         */ 
        public function getModelo()
        {
                return $this->modelo;
        }

        /**
         * Get the value of color
         */ 
        public function getColor()
        {
                return $this->color;
        }

        /**
         * Get the value of posicion
         */ 
        public function getPosicion()
        {
                return $this->posicion;
        }
    }


?>