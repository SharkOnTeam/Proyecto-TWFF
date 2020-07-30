<?php namespace App\Models;

use CodeIgniter\Model;

class SubcategoriaModel extends Model
{
    protected $table      = 'subcategoria';
    protected $primaryKey = 'idSubategoria';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['categoria_idCategoria', 'subcategoria'];

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
    
    public function cat_subcat()
    {   
        $db = \Config\Database::connect();
        $builder = $db->table('categoria c');
        $builder->select('*');
        $builder->join('subcategoria s', 's.categoria_idCategoria = c.idCategoria');
        $query = $builder->get();
        return $query->getResultArray(); 
            //echo '<pre>';
            //print_r($query->getResultArray());
    }
}