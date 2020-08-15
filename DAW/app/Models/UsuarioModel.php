<?php namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table      = 'usuario';
    protected $primaryKey = 'idUsuario';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['usuario','nombreUsuario','apellido','email','password','privilegios','deleted'];

    protected $validationRules = [
        'usuario' => 'alpha_numeric',
        'email' => 'valid_email',
        'password' => 'alpha_numeric'
    ];

    protected $validationMessages = [
        'usuario' => [
            'alpha_numeric' => 'El nombre de usuario sólo debe tener letras y números, sin espacios.'
        ],
        'email' => [
            'valid_email' => 'Porfavor ingrese un correo electrónico válido.'
        ],
        'password' => [
            'alpha_numeric' => 'La contraseña sólo debe tener números y letras, sin espacios.'
        ]
    ];
    
    protected $skipValidation = false;

    public function getUsuarioByNombre($buscar){
        $db = \Config\Database::connect();
        $builder = $db->table('usuario');
        $builder->select('*');
        $builder->like('usuario',$buscar,'both');
        $query = $builder->get();
        return $query->getResultArray();
        //echo '<pre>';
        //print_r($query->getResultArray());
    }

    public function getUsuarioById($idUsuario){
        $db = \Config\Database::connect();
        $builder = $db->table('usuario');
        $builder->select('*');
        $builder->where('idUsuario',$idUsuario);
        $query = $builder->get();
        return $query->getResultArray();
        //echo '<pre>';
        //print_r($query->getResultArray());
    }

    public function getNombresUsuario(){
        $db = \Config\Database::connect();
        $builder = $db->table('usuario');
        $builder->select('usuario');
        $query = $builder->get();
        return $query->getResultArray();
        //echo '<pre>';
        //print_r($query->getResultArray());
    }

    public function getEmailsUsuario(){
        $db = \Config\Database::connect();
        $builder = $db->table('usuario');
        $builder->select('email');
        $query = $builder->get();
        return $query->getResultArray();
        //echo '<pre>';
        //print_r($query->getResultArray());
    }

    public function login($usuario,$password){
        $where = "usuario = '$usuario' AND password = '$password'" ;
        $where2 = "email = '$usuario' AND password = '$password'" ;
        echo '<pre>';
        print_r($where);

        $db = \Config\Database::connect();
        $builder = $db->table('usuario');
        $builder->select('idUsuario,usuario,privilegios');
        $builder->where($where);
        $builder->orWhere($where2);
        $query = $builder->get();
        return $query->getResultArray();
        /*echo '<pre>';
        print_r($query->getResultArray());*/
    }

}