<?php namespace App\Models;

use CodeIgniter\Model;

class FaqModel extends Model
{
    protected $table      = 'faq';
    protected $primaryKey = 'idFaq';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['usuario_idUsuario', 'pregunta', 'respuesta','deleted'];

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


        public function getFaqByNombre($buscar){
            $db = \Config\Database::connect();
            $builder = $db->table('faq');
            $builder->select('*');
            $builder->like('pregunta',$buscar,'both');
            $query = $builder->get();
            return $query->getResultArray();
            //echo '<pre>';
            //print_r($query->getResultArray());
        }
    
        public function getFaqById($idFaq){
            $db = \Config\Database::connect();
            $builder = $db->table('faq');
            $builder->select('*');
            $builder->where('idFaq',$idFaq);
            $query = $builder->get();
            return $query->getResultArray();
            //echo '<pre>';
            //print_r($query->getResultArray());
        }

        public function getNombresFaqs(){
            $db = \Config\Database::connect();
            $builder = $db->table('faq');
            $builder->select('pregunta');
            $query = $builder->get();
            return $query->getResultArray();
            //echo '<pre>';
            //print_r($query->getResultArray());
        }
}