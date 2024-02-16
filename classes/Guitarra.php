<?PHP

class Guitarra
{

    private $id;
    private $nombre;
    private $marca;
    private $serie;
    private $modelo;
    private $color;
    private $img;
    private $precio;
    private $caracteristica;
    private static $crearValores = ['id', 'nombre', 'marca', 'serie', 'modelo', 'color', 'img', 'precio', 'id_caracteristica'];

/*INSERT DELETE UPDATE INSTRUMENTO*/ 

public function listar_nombre(): array
{
    $conexion = Conexion::getConexion();
    $query = "SELECT DISTINCT instrumentos.nombre FROM instrumentos;";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
    $PDOStatement->execute();

    $lista = $PDOStatement->fetchAll();

    return $lista;
}
public function listar_modelo(string $tipo_instrumento): array
{
    $conexion = Conexion::getConexion();
    $query = "SELECT DISTINCT instrumentos.modelo FROM instrumentos WHERE instrumentos.nombre = ?;";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
    $PDOStatement->execute([$tipo_instrumento]);

    $lista = $PDOStatement->fetchAll();

    return $lista;
}

    public function insert(string $marca, string $nombre, string $modelo, string $serie, int $id_caracteristica, string $color, string $img, float $precio)
    {

        $conexion = Conexion::getConexion();
        $query = "INSERT INTO `instrumentos` (`id`,`marca`,`nombre`,`modelo`,`serie`,`id_caracteristica`,`color`,`img`,`precio`) VALUES (NULL,:marca,:nombre,:modelo,:serie,:id_caracteristica,:color,:img,:precio)";

        $PDOConexion = $conexion->prepare($query);
        $PDOConexion->execute([
            'marca' => $marca,
            'nombre' => $nombre,
            'modelo' => $modelo,
            'serie' => $serie,
            'id_caracteristica' => $id_caracteristica,
            'color' => $color,
            'img' => $img,
            'precio' => $precio


        ]);
    }
    public function edit(string $marca, string $nombre, string $modelo, string $serie, int $id_caracteristica, string $color, float $precio, string $imagen)
    {

        $conexion = Conexion::getConexion();
        $query = "UPDATE instrumentos SET marca=:marca,nombre=:nombre,modelo=:modelo,serie=:serie,id_caracteristica=:id_caracteristica,color=:color,precio=:precio,img=:imagen WHERE id = :id";

        $PDOConexion = $conexion->prepare($query);
        $PDOConexion->execute([
            'id' => $this->id,
            'marca' => $marca,
            'nombre' => $nombre,
            'modelo' => $modelo,
            'serie' => $serie,
            'id_caracteristica' => $id_caracteristica,
            'color' => $color,
            'precio' => $precio,
            'imagen' => $imagen



        ]);
    }

    public function delete(){

        $conexion = Conexion::getConexion();
        $query = "DELETE FROM instrumentos WHERE id = ?";

        $PDOConexion = $conexion->prepare($query);
        $PDOConexion->execute([$this->id]);

    }





    /**
     * Carga catalogo completo
     */
    public function cargar_catalogo(): array
    {
        $catalogo = [];

        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM instrumentos";
       
        $PDOConexion = $conexion->prepare($query);
        $PDOConexion->setFetchMode(PDO::FETCH_ASSOC);
        $PDOConexion->execute();



        //$catalogo = $PDOConexion->fetchAll();

        while ($result = $PDOConexion->fetch()) {

            $catalogo[] = $this->createInstrumento($result);
        }
      
        // echo "<pre>";
        // echo print_r($catalogo);
        // echo "</pre>";
       
        return $catalogo;
    }
    /**
     * Devuelve el catalogo filtrado por modelo
     * @param string instrumento a buscar
     * 
     * @return Guitarra[] array con los instrumentos elejidos
     */
    public function catalogo_por_instrumento(string $nombre_instrumento): array
    {

        $catalogo = [];

        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM instrumentos WHERE instrumentos.nombre = ? ";

        $PDOConexion = $conexion->prepare($query);
        $PDOConexion->setFetchMode(PDO::FETCH_ASSOC);
        $PDOConexion->execute([$nombre_instrumento]);



        //$catalogo = $PDOConexion->fetchAll();

        while ($result = $PDOConexion->fetch()) {

            $catalogo[] = $this->createInstrumento($result);
        }

         
        return $catalogo;
    }


    private function createInstrumento($instrumentoData): ?Guitarra
    {



        $guitarra = new self();

        foreach (self::$crearValores as $i) {

            $guitarra->{$i}= $instrumentoData[$i];

        }



        $guitarra->caracteristica = (new Caracteristicas())->get_x_id($instrumentoData['id_caracteristica']);
/*
        echo "<pre>";
        echo print_r($guitarra);
        echo "</pre>";
*/
        return $guitarra;
    }

    /**
     * Devuelve los datos de un producto en particular
     * @param int $idProducto El ID único del producto a mostrar 
     */
    public function instrumento_x_id(int $idModelo): ?Guitarra
    {
        
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM instrumentos WHERE id = ? ";

        $PDOConexion = $conexion->prepare($query);
        $PDOConexion->setFetchMode(PDO::FETCH_ASSOC);
        $PDOConexion->execute([$idModelo]);



        $catalogo = $this->createInstrumento($PDOConexion->fetch());

/*
        echo "<pre>";
        echo print_r($catalogo);
        echo "</pre>"; 
  */
        return $catalogo;
    }

    /**
     * Devuelve el catalogo filtrado por modelo
     * @param string modelo a buscar
     * 
     * @return  Guitarra[] con los modelos elejidos
     */
    function catalogo_por_modelo(string $modelo): array
    {

        $resultado = [];
        $catalogo = $this->cargar_catalogo();

        foreach ($catalogo as $i) {
            if ($i->modelo == $modelo) {
                $resultado[] = $i;
            }
        }

        return $resultado;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
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
     * Get the value of mastil
     */
    public function getMastil()
    { 
        return $this->caracteristica->getM_Mastil();
    }
    
    public function getPastillas()
    {

        
        return $this->caracteristica->getPastillas();
    }

    /**
     * Get the value of perfilMastil
     */
    public function getPerfilMastil()
    {
        return $this->caracteristica->getT_Mastil();
    }

    /**
     * Get the value of cantTrastes
     */
    public function getCantTrastes()
    {
        return $this->caracteristica->getN_Trastes();
    }

    /**
     * Get the value of img
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Get the value of precio
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Get the value of id
     */
    public function getid()
    {
        return $this->id;
    }

    /**
     * Get the value of id_caracteristica
     */
    public function getId_caracteristica()
    {
        return $this->caracteristica->getId_caracteristica();
    }

    /**
     * Get the value of marca
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Get the value of serie
     */
    public function getSerie()
    {
        return $this->serie;
    }
    /**
     * Get the value of n_clavijas
     */
    public function getClavijas()
    {
        return $this->caracteristica->getN_Clavijas();
    }
    public function getCuerpo()
    {
        return $this->caracteristica->getM_Cuerpos();
    }
}
