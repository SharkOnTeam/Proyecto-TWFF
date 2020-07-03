<?php namespace App\Models;

use CodeIgniter\Model;

class DetOfeProModel extends Model
{
    protected $table      = 'detalleproductooferta';
    protected $primaryKey = 'idDetalleproductooferta';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

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

}