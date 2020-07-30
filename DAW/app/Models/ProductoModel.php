<?php namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table      = 'producto';
    protected $primaryKey = 'idProducto';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['subcategoria_idSubcategoria', 'producto', 'descripcionProducto','precio','stock','imagenProducto'];

    /*protected $validationRules = [
            'user' => 'required|min_length(5)|is_unique',
            'pass' => 'required|min_length(8)'
        ];

    protected $validationMessages = [
        'user' => [
                    'required' => 'El usuario es obligatorio',
                    'is_unique' => 'Ya existe un usuario con ese nombre'
                ]
        ];*/

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
    
}