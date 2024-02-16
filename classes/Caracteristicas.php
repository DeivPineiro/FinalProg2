<?php

class Caracteristicas
{

    private $id;
    private $m_Mastil;
    private $m_Cuerpos;
    private $n_Clavijas;
    private $n_Trastes;
    private $pastillas;
    private $t_Mastil;
    private static $crearValores = ['id', 'm_Mastil', 'm_Cuerpos', 'n_Clavijas', 'n_Trastes', 'n_Trastes', 't_Mastil'];


    /*INSERT DELETE UPDATE CARACTERISTICA*/



    /**
     * Carga catalogo completo
     */
    public function cargar_catalogo(): array
    {
        $catalogo = [];

        $conexion = Conexion::getConexion();
        $query = "SELECT caracteristicas.*, GROUP_CONCAT(caracteristicas_x_pastillas.id_pastillas) AS pastillas
        FROM `caracteristicas`
        LEFT JOIN caracteristicas_x_pastillas ON caracteristicas.id = caracteristicas_x_pastillas.id_caracteristicas
        GROUP BY caracteristicas.id;";

        $PDOConexion = $conexion->prepare($query);
        $PDOConexion->setFetchMode(PDO::FETCH_ASSOC);
        $PDOConexion->execute();



       

        while ($result = $PDOConexion->fetch()) {

            $catalogo[] = $this->createCaracteristica($result);
        }

        

        return $catalogo;
    }


    private function createCaracteristica($CaracteristicaData): Caracteristicas
    {



        $caracteristica = new self();



        foreach (self::$crearValores as $i) {

            $caracteristica->{$i} = $CaracteristicaData[$i];
        }


        $pastillasIds = !empty($CaracteristicaData['pastillas']) ? explode(",", $CaracteristicaData['pastillas']) : [];


        $pastillas = [];
        if (!empty($pastillasIds[0])) {
            foreach ($pastillasIds as $pastId) {

                $pastillas[] = (new Pastillas())->get_x_id(intval($pastId));
            }
        }


        $caracteristica->pastillas = $pastillas;

        return $caracteristica;
    }


    public function get_x_id(int $id): Caracteristicas
    {

        $conexion = Conexion::getConexion();
        $query = "SELECT caracteristicas.*, GROUP_CONCAT(caracteristicas_x_pastillas.id_pastillas)
        AS pastillas 
        FROM caracteristicas 
        LEFT JOIN caracteristicas_x_pastillas
        ON caracteristicas_x_pastillas.id_caracteristicas = caracteristicas.id
        WHERE caracteristicas.id = ?;";

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



    public function insert(string $m_Mastil, string $m_Cuerpos, int $n_Clavijas, int $n_Trastes, string $t_Mastil)
    {

        $conexion = Conexion::getConexion();
        $query = "INSERT INTO `caracteristicas` (`id`,`m_Mastil`,`m_Cuerpos`,`n_Clavijas`,`n_Trastes`,`t_Mastil`) VALUES (NULL,:m_Mastil,:m_Cuerpos,:n_Clavijas,:n_Trastes,:t_Mastil)";

        $PDOConexion = $conexion->prepare($query);
        $PDOConexion->execute([
            'm_Mastil' => $m_Mastil,
            'm_Cuerpos' => $m_Cuerpos,
            'n_Clavijas' => $n_Clavijas,
            'n_Trastes' => $n_Trastes,
            't_Mastil' => $t_Mastil


        ]);

        return $conexion->lastInsertId();
    }

    public function edit(string $m_Mastil, string $m_Cuerpos, int $n_Clavijas, int $n_Trastes, string $t_Mastil)
    {

        $conexion = Conexion::getConexion();
        $query = "UPDATE caracteristicas SET m_Mastil=:m_Mastil,m_Cuerpos=:m_Cuerpos,n_Clavijas=:n_Clavijas,n_Trastes=:n_Trastes,t_Mastil=:t_Mastil WHERE id = :id";

        $PDOConexion = $conexion->prepare($query);
        $PDOConexion->execute([
            'id' => $this->id,
            'm_Mastil' => $m_Mastil,
            'm_Cuerpos' => $m_Cuerpos,
            'n_Clavijas' => $n_Clavijas,
            'n_Trastes' => $n_Trastes,
            't_Mastil' => $t_Mastil

        ]);
    }

    public function delete()
    {

        $conexion = Conexion::getConexion();
        $query = "DELETE FROM caracteristicas WHERE id = ?";

        $PDOConexion = $conexion->prepare($query);
        $PDOConexion->execute([$this->id]);
    }

    public function add_pastillas(int $caracteristica_id, int $pastilla_id)
    {

        $conexion = Conexion::getConexion();
        $query = "INSERT INTO caracteristicas_x_pastillas VALUES (NULL, :caracteristica_id, :pastilla_id)";


        $PDOConexion = $conexion->prepare($query);
        $PDOConexion->execute(
            [
                'caracteristica_id' => $caracteristica_id,
                'pastilla_id' => $pastilla_id
            ]
        );
    }

    public function clear_pastilla()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM caracteristicas_x_pastillas WHERE id_caracteristicas = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'id' => $this->id
            ]
        );
    }

     /**
     * Get the value of id_caracteristicas
     */
    public function getModelo_Ins(int $id)
    {

         $conexion = Conexion::getConexion();
        $query = "SELECT instrumentos.modelo FROM instrumentos WHERE instrumentos.id_caracteristica = :id";

        $PDOConexion = $conexion->prepare($query);
        $PDOConexion->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOConexion->execute(
            ['id' => $id]
        );

        $result = $PDOConexion->fetch();

        if (!$result) {

            return "";
        }else{return $result;}
        
        
    }
    /**
     * Get the value of id_caracteristicas
     */
    public function getId_caracteristica()
    {
        return $this->id;
    }

    /**
     * Get the value of m_Mastil
     */
    public function getM_Mastil()
    {
        return $this->m_Mastil;
    }

    /**
     * Get the value of m_Cuerpos
     */
    public function getM_Cuerpos()
    {
        return $this->m_Cuerpos;
    }

    /**
     * Get the value of n_Clavijas
     */
    public function getN_Clavijas()
    {
        return $this->n_Clavijas;
    }

    /**
     * Get the value of n_Trastes
     */
    public function getN_Trastes()
    {
        return $this->n_Trastes;
    }

    /**
     * Get the value of Pastilla_Central
     */

    /**
     * Get the value of t_Mastil
     */
    public function getT_Mastil()
    {
        return $this->t_Mastil;
    }




    /**
     * Get the value of pastillas
     */
    public function getPastillasObj(?string $string)
    {

        $pastillasIds = explode(",", $string);


        $pastillas = [];
        if (!empty($pastillasIds[0])) {
            foreach ($pastillasIds as $pastId) {

                $pastillas[] = (new Pastillas())->get_x_id(intval($pastId));
            }
        }

        return $pastillas;
    }

    /**
     * Get the value of pastillas
     */
    public function getPastillas()
    {
        return $this->pastillas;
    }
    public function getPastillas_ids(): array
    {
        $result = [];

        $ids =explode(",", $this->pastillas);

        foreach ($ids as $value) {
           
            $result[] = intval($value);
        }
       
        return $result;
    }
}
