<?php namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table      = 'producto';
    protected $primaryKey = 'idProducto';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['subcategoria_idSubcategoria','producto','precioMenudeo','precioMayoreo', 'descripcionProducto','stock','imagenProducto','imagenProducto2','deleted'];

    protected $validationRules = [
        'producto' => 'alpha_numeric_space',
        'precioMenudeo' => 'numeric',
        'precioMayoreo' => 'numeric',
        'stock' => 'interger'
    ];

    protected $validationMessages = [
        'producto' => [
            'alpha_numeric_space' => 'El nombre del producto sólo puede tener letras y números'
        ],
        'precioMenudeo' => [
            'numeric' => 'Debes de ingresar un número.'
        ],
        'precioMayoreo' => [
            'numeric' => 'Debes de ingresar un número.'
        ],
        'precioMayoreo' => [
            'interger' => 'Debes de ingresar un número entero.'
        ]
    ];

    protected $skipValidation = false;

    public function productos_nuevos()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('producto');
        $builder->select('*');
        $builder->orderBy('idProducto','DESC');
        $builder->limit(4);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function detalle_producto($idProducto)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('producto');
        $builder->select('*');
        $builder->where('idProducto',$idProducto);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function filtrar_producto($filtro)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('producto p');
        $builder->select('*');
        $builder->join('subcategoria s', 'p.subcategoria_idSubcategoria = s.idSubcategoria');
        $builder->join('categoria c', 's.categoria_idCategoria = c.idCategoria');
        $builder->where('categoria',$filtro);
        $builder->orWhere('subcategoria',$filtro);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function producto_subcategoria()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('producto p');
        $builder->select('*');
        $builder->join('subcategoria s', 'p.subcategoria_idSubcategoria = s.idSubcategoria');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getProductoByNombre($buscar){
        $db = \Config\Database::connect();
        $builder = $db->table('producto');
        $builder->select('*');
        $builder->like('producto',$buscar,'both');
        $query = $builder->get();
        return $query->getResultArray();
        //echo '<pre>';
        //print_r($query->getResultArray());
    }

    public function getProductoById($idProducto){
        $db = \Config\Database::connect();
        $builder = $db->table('producto');
        $builder->select('*');
        $builder->where('idProducto',$idProducto);
        $query = $builder->get();
        return $query->getResultArray();
        //echo '<pre>';
        //print_r($query->getResultArray());
    }

    public function getNombresProducto(){
        $db = \Config\Database::connect();
        $builder = $db->table('producto');
        $builder->select('producto');
        $query = $builder->get();
        return $query->getResultArray();
        //echo '<pre>';
        //print_r($query->getResultArray());
    }
    
}