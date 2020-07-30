<?php namespace App\Models;

use CodeIgniter\Model;

class DetOfeProModel extends Model
{
    protected $table      = 'detalleproductooferta';
    protected $primaryKey = 'idDetalleproductooferta';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['producto_idProducto', 'oferta_idOferta', 'precioDescuento'];

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
    
    public function detalle_producto_oferta()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('detalleproductooferta d');
        $builder->select('*');
        $builder->join('producto p', 'd.producto_idProducto = p.idProducto');
        $builder->join('oferta o', 'd.oferta_idOferta = o.idOferta');
        $builder->where('descuento != 0');
        $query = $builder->get();
        return $query->getResultArray();
    }
}