<?php namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table      = 'producto';
    protected $primaryKey = 'idProducto';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

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

}