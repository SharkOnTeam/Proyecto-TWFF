<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ComentarioModel;

class Comentario extends Controller
{

    private $comentario_model;
    private $session = null;

    public function __construct()
    {
        $this->comentario_model = new ComentarioModel();
        $this->session = \Config\Services::session();
	}
	
	public function index()
	{
        $texto = $this->request->getPost('buscador');

        if($texto == null){
            $data = array(
                'titulo'=>'Comentarios',
                'comentarios' => $this->comentario_model->usu_comen()
            );

            return view('back_end/template/b_header',$data).view('back_end/template/b_sidebar').view('back_end/comentarios/listar_comentarios',$data).view('back_end/template/b_footer');
        }else{
            $data = array(
                'titulo'=>'Comentarios',
                'comentarios' => $this->comentario_model->getComentarioByNombre($texto)
            );

            return view('back_end/template/b_header',$data).view('back_end/template/b_sidebar').view('back_end/comentarios/listar_comentarios',$data).view('back_end/template/b_footer'); 
        }
    }

    public function modificar_comentario()
    {
        $idComentario = $this->request->getPost('idComentario');
        $deleted = $this->request->getPost('deleted');
        
        $data = [
            "deleted" => $deleted
        ];

        $this->comentario_model->update($idComentario,$data);
        $this->session->setFlashdata('alerta_exitosa', 'El comentario se modificó correctamente.');
        return redirect()->to(base_url('TWFF/public/comentario'));
            
    }
    
    public function eliminar_comententario(){
        $idComentario = $this->request->getPost('idComentario');
        $this->comentario_model->delete($idComentario);
        return redirect()->to(base_url('TWFF/public/comentario'));
    }

}