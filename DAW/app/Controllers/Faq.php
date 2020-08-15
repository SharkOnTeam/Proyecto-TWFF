<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\FaqModel;

class Faq extends Controller
{
	private $faq_model;
    private $session = null;

    public function __construct()
    {
        $this->faq_model = new FaqModel();
        $this->session = \Config\Services::session();
    }
    
	public function index()
	{
        $texto = $this->request->getPost('buscador');

        if($texto == null){
            $data = array(
                'titulo'=>'Faqs',
                'faqs' => $this->faq_model->findAll()
            );

            return view('back_end/template/b_header',$data).view('back_end/template/b_sidebar').view('back_end/faqs/listar_faqs',$data).view('back_end/template/b_footer');
        }else{
            $data = array(
                'titulo'=>'Faqs',
                'faqs' => $this->faq_model->getFaqByNombre($texto)
            );

            return view('back_end/template/b_header',$data).view('back_end/template/b_sidebar').view('back_end/faqs/listar_faqs',$data).view('back_end/template/b_footer'); 
        }
    }
    

    public function guardar_faq()
    {   
        
        $pregunta = $this->request->getPost('pregunta');
        $respuesta = $this->request->getPost('respuesta');
        $deleted = $this->request->getPost('deleted');
        $bd_faqs = $this->faq_model->getNombresFaq();
        $i=0;

        foreach($bd_faqs as $bd_cat){
            if($bd_cat['pregunta'] == $pregunta){
                $i = $i +1;
            }
        }

       $data = [
           "usuario_idUsuario" => $this->session->get('idUsuario'),
            "pregunta" => trim($pregunta),
            "respuesta" => trim($respuesta),
            "deleted" => $deleted
        ];

        if($i > 0){

            $this->session->setFlashdata('alerta_categoria', 'Ya existe esa pregunta');
            return redirect()->to(base_url('TWFF/public/agregar_faq'));

        }else{

            $this->faq_model->insert($data);
            $this->session->setFlashdata('alerta_exitosa', 'Registro exitoso.');
            return redirect()->to(base_url('TWFF/public/faq'));

        }
    }

    public function modificar_faq()
    {
        $idFaq = $this->request->getPost('idFaq');
        $pregunta = $this->request->getPost('pregunta');
        $respuesta = $this->request->getPost('respuesta');
        $deleted = $this->request->getPost('deleted');

        $bd_faqs = $this->faq_model->getNombresFaqs();
        $i=0;
        $faq2 = $this->faq_model->getFaqById($idFaq);
        
        if($faq2[0]['pregunta'] == $pregunta){
            
            $data = [
                "pregunta" => trim($pregunta),
                "respuesta" =>  trim($respuesta),
                "deleted" => $deleted
            ];

            $this->faq_model->update($idFaq,$data);
            $this->session->setFlashdata('alerta_exitosa', 'FAQ se modificó correctamente.');
            return redirect()->to(base_url('TWFF/public/faq'));
        }else{
            foreach($bd_faqs as $bd_cat){
                if($bd_cat['pregunta'] == $pregunta){
                    $i = $i +1;
                }
            }
            if($i > 0){
                $this->session->setFlashdata('alerta_categoria', 'Ya existe esa pregunta');
                return redirect()->to(base_url('TWFF/public/faq'));
            }else{
                
                $data = [
                    "pregunta" => trim($pregunta),
                    "respuesta" =>  trim($respuesta),
                    "deleted" => $deleted
                ];

                $this->faq_model->update($idFaq,$data);

                $this->session->setFlashdata('alerta_exitosa', 'FAQ se modificó correctamente.');
                return redirect()->to(base_url('TWFF/public/faq')); 
                
            }
        }
    }

    public function eliminar_faq(){
        $idFaq = $this->request->getPost('idFaq');
        $this->faq_model->delete($idFaq);
        return redirect()->to(base_url('TWFF/public/faq'));
    }

}