<?php namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends Model
{
    protected $table      = 'categoria';
    protected $primaryKey = 'idCategoria';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['categoria','imagenCategoria','deleted'];

    /*protected $validationRules = [
            'categoria' => 'required|is_unique'
        ];

    protected $validationMessages = [
        'categoria' => [
            'required' => 'El nombre de la categoria es obligatorio',
            'is_unique' => 'Ya existe una categoria con ese nombre'
        ]
        ];*/

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