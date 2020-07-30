<?php namespace App\Models;

use CodeIgniter\Model;

class FaqModel extends Model
{
    protected $table      = 'faq';
    protected $primaryKey = 'idFaq';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['usuario_idUsuario', 'pregunta', 'respuesta'];

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