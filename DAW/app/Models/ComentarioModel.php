<?php namespace App\Models;

use CodeIgniter\Model;

class ComentarioModel extends Model
{
    protected $table      = 'comentario';
    protected $primaryKey = 'idComentario';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['usuario_idUsuario', 'palabraComentario', 'comentario','calificacion','fechaComentario','deleted'];

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

    public function usu_comen()
    {   
        $db = \Config\Database::connect();
        $builder = $db->table('usuario u');
        $builder->select('*');
        $builder->join('comentario c', 'c.usuario_idUsuario = u.idUsuario');
        $query = $builder->get();
        return $query->getResultArray(); 
            //echo '<pre>';
            //print_r($query->getResultArray());
        }

    public function getComentarioByNombre($buscar){
        $db = \Config\Database::connect();
        $builder = $db->table('comentario c');
        $builder->select('*');
        $builder->join('usuario u', 'c.usuario_idUsuario = u.idUsuario');
        $builder->like('usuario',$buscar,'both');
        $query = $builder->get();
        return $query->getResultArray();
        //echo '<pre>';
        //print_r($query->getResultArray());
    }

    public function getComentarioById($idComentario){
        $db = \Config\Database::connect();
        $builder = $db->table('comentario');
        $builder->select('*');
        $builder->where('idComentario',$idComentario);
        $query = $builder->get();
        return $query->getResultArray();
        //echo '<pre>';
        //print_r($query->getResultArray());
    }
}