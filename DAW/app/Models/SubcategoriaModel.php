<?php namespace App\Models;

use CodeIgniter\Model;

class SubcategoriaModel extends Model
{
    protected $table      = 'subcategoria';
    protected $primaryKey = 'idSubcategoria';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['categoria_idCategoria', 'subcategoria','deleted'];

    protected $validationRules = [
        'subcategoria' => 'trim|alpha_numeric_space'
    ];

    protected $validationMessages = [
        'subcategoria' => [
            'alpha_numeric_space' => 'Sólo se premiten letras y números.'
        ]
    ];

    protected $skipValidation = false;

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

    public function getSubByNombre($buscar){
        $db = \Config\Database::connect();
        $builder = $db->table('subcategoria');
        $builder->select('*');
        $builder->like('subcategoria',$buscar,'both');
        $query = $builder->get();
        return $query->getResultArray();
        //echo '<pre>';
        //print_r($query->getResultArray());
    }

    public function getSubById($idSubcategoria){
        $db = \Config\Database::connect();
        $builder = $db->table('subcategoria');
        $builder->select('*');
        $builder->where('idSubcategoria',$idSubcategoria);
        $query = $builder->get();
        return $query->getResultArray();
        //echo '<pre>';
        //print_r($query->getResultArray());
    }

    public function getSubCategoria(){
        $db = \Config\Database::connect();
        $builder = $db->table('subcategoria');
        $builder->select('subcategoria');
        $query = $builder->get();
        return $query->getResultArray();
        //echo '<pre>';
        //print_r($query->getResultArray());
    }
}