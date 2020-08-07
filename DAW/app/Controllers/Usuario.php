<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;

class Usuario extends Controller
{
    private $usuario_model;
    private $session = null;
    
    public function __construct()
    {
        $this->usuario_model = new UsuarioModel();
        $this->session = \Config\Services::session();
    }
    
	public function index()
	{   
        $texto = $this->request->getPost('buscador');

        if($texto == null){
            $data = array(
                'titulo'=>'Usuario',
                'usuarios' => $this->usuario_model->findAll()
            );

            return view('back_end/template/b_header',$data).view('back_end/template/b_sidebar').view('back_end/usuarios/listar_usuarios',$data).view('back_end/template/b_footer');
        }else{
            $data = array(
                'titulo'=>'Categorías',
                'usuarios' => $this->categoria_model->getCategoriaByNombre($texto)
            );

            return view('back_end/template/b_header',$data).view('back_end/template/b_sidebar').view('back_end/usuarios/listar_usuarios',$data).view('back_end/template/b_footer'); 
        }
    }
    
    public function registrar_usuario(){
        $usuario = $this->request->getPost('usuario_r');
        $email = $this->request->getPost('email_r');
        $password = $this->request->getPost('password_r');
        $bd_usuarios = $this->usuario_model->getNombresUsuario();
        $bd_emails = $this->usuario_model->getEmailsUsuario();
        $i_u = 0;
        $i_e = 0; 

        foreach($bd_usuarios as $bd_usu){
            if($bd_usu['usuario'] == $usuario){
                $i_u = $i_u +1;
            }
        }

        foreach($bd_emails as $bd_ema){
            if($bd_ema['email'] == $email){
                $i_e = $i_e +1;
            }
        }

        $data = [
            'usuario' => trim($usuario),
            'email' => trim($email),
            'password' => sha1($password)
        ];
        //echo '<pre>';
        //print_r($data);

        if($i_u > 0){
            $this->session->setFlashdata('alerta_usuario', 'El nombre de usuario ya existe. Intenta con otro.');
            return redirect()->to(base_url('TWFF/public/login'));

        }else{

            if($i_e > 0){
                $this->session->setFlashdata('alerta_email', 'El correo electrónico ya está registrado. Intenta con otro.');
                return redirect()->to(base_url('TWFF/public/login'));
            }else{

                if($this->usuario_model->insert($data)==false){
                    $errors = $this->usuario_model->errors();
                    foreach($errors as $error){
                        $error;
                    }
                    $this->session->setFlashdata('alerta_error', $error);
                    return redirect()->to(base_url('TWFF/public/login'));

                }else{
                    $this->session->setFlashdata('alerta_exitoso','Registro exitoso');
                    return redirect()->to(base_url('TWFF/public/login'));
                }
    
            }

        }
        //$this->usuario_model->insert($data);
    }

    public function iniciar_sesion(){

        $usuario = $this->request->getPost('usuario');
        $password = $this->request->getPost('password');

        $bd_login = $this->usuario_model->login($usuario,sha1($password));

        if($bd_login != null){
            
            $newdata = [
                'idUsuario' => $bd_login[0]['idUsuario'],
                'usuario' => $bd_login[0]['usuario'],
                'privilegios' => $bd_login[0]['privilegios'],
                'mi_carrito' => null
            ];

            //echo '<pre>';
            //print_r($newdata);

            $this->session->set($newdata);

            if($this->session->get('privilegios') == 1){
                return redirect()->to(base_url('TWFF/public/inicio'));
            }else{
                return redirect()->to(base_url('TWFF/public/b_inicio'));
            }
        }else{
            $this->session->setFlashdata('alerta_login', 'Datos incorrectos.');
            return redirect()->to(base_url('TWFF/public/login'));
        }
        
    }

    public function cerrar_sesion(){
        $this->session->remove('mi_carrito');
        $this->session->destroy();
        return redirect()->to(base_url('TWFF/public/login'));
    }

    public function eliminar_usuario(){
        $idUsuario = $this->request->getPost('idUsuario');
        $this->usuario_model->delete($idUsuario);
        return redirect()->to(base_url('TWFF/public/usuario'));
    }
}