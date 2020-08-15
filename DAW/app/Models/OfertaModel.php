<?php namespace App\Models;

use CodeIgniter\Model;

class OfertaModel extends Model
{
    protected $table      = 'oferta';
    protected $primaryKey = 'idOferta';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['descripcionOferta','descuento','deleted'];

    /*protected $validationRules = [
        'categoria' => 'trim|alpha_numeric_space'
    ];

    protected $validationMessages = [
        'categoria' => [
            'alpha_numeric_space' => 'Sólo se premiten letras y números.'
        ]
    ];

    protected $skipValidation = true;*/

    public function getOfertaByNombre($buscar){
        $db = \Config\Database::connect();
        $builder = $db->table('oferta');
        $builder->select('*');
        $builder->like('descuento',$buscar,'both');
        $query = $builder->get();
        return $query->getResultArray();
        //echo '<pre>';
        //print_r($query->getResultArray());
    }

    public function getOfertaById($idOferta){
        $db = \Config\Database::connect();
        $builder = $db->table('oferta');
        $builder->select('*');
        $builder->where('idOferta',$idOferta);
        $query = $builder->get();
        return $query->getResultArray();
        //echo '<pre>';
        //print_r($query->getResultArray());
    }

    public function getNombresOferta(){
        $db = \Config\Database::connect();
        $builder = $db->table('oferta');
        $builder->select('descuento');
        $query = $builder->get();
        return $query->getResultArray();
        //echo '<pre>';
        //print_r($query->getResultArray());
    }
}