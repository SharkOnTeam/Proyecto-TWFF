<?php namespace App\Models;

use CodeIgniter\Model;

class PedidoModel extends Model
{
    protected $table      = 'pedido';
    protected $primaryKey = 'idPedido';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['usuario_idUsuario', 'fechaPedido','deleted'];

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


        public function getPedidoByNombre($buscar){
            $db = \Config\Database::connect();
            $builder = $db->table('pedido p');
            $builder->select('*');
            $builder->join('usuario u', 'p.usuario_idUsuario = u.idUsuario');
            $builder->like('usuario',$buscar,'both');
            $query = $builder->get();
            return $query->getResultArray();
            //echo '<pre>';
            //print_r($query->getResultArray());
        }

        public function ped_usu(){
            $db = \Config\Database::connect();
            $builder = $db->table('pedido p');
            $builder->select('*');
            $builder->join('usuario u', 'p.usuario_idUsuario = u.idUsuario');
            $query = $builder->get();
            return $query->getResultArray();
            //echo '<pre>';
            //print_r($query->getResultArray());
        }
}