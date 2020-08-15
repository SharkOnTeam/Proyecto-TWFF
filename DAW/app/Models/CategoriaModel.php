<?php namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends Model
{
    protected $table      = 'categoria';
    protected $primaryKey = 'idCategoria';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['categoria','imagenCategoria','deleted'];

    protected $validationRules = [
        'categoria' => 'trim|alpha_numeric_space'
    ];

    protected $validationMessages = [
        'categoria' => [
            'alpha_numeric_space' => 'Sólo se premiten letras y números.'
        ]
    ];

    protected $skipValidation = false;

    public function getCategoriaByNombre($buscar){
        $db = \Config\Database::connect();
        $builder = $db->table('categoria c');
        $builder->select('*');
        $builder->like('categoria',$buscar,'both');
        $query = $builder->get();
        return $query->getResultArray();
        //echo '<pre>';
        //print_r($query->getResultArray());
    }

    public function getCategoriaById($idCategoria){
        $db = \Config\Database::connect();
        $builder = $db->table('categoria');
        $builder->select('*');
        $builder->where('idCategoria',$idCategoria);
        $query = $builder->get();
        return $query->getResultArray();
        //echo '<pre>';
        //print_r($query->getResultArray());
    }

    public function getNombresCategoria(){
        $db = \Config\Database::connect();
        $builder = $db->table('categoria');
        $builder->select('categoria');
        $query = $builder->get();
        return $query->getResultArray();
        //echo '<pre>';
        //print_r($query->getResultArray());
    }
}