<?php namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends Model
{
    protected $table      = 'categoria';
    protected $primaryKey = 'idCategoria';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['categoria'];

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