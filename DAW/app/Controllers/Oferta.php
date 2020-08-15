<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\OfertaModel;

class Oferta extends Controller
{
	private $oferta_model;
    private $session = null;

    public function __construct()
    {
        $this->oferta_model = new OfertaModel();
        $this->session = \Config\Services::session();
    }
    
	public function index()
	{
        $texto = $this->request->getPost('buscador');

        if($texto == null){
            $data = array(
                'titulo'=>'Ofertas',
                'ofertas' => $this->oferta_model->findAll()
            );

            return view('back_end/template/b_header',$data).view('back_end/template/b_sidebar').view('back_end/ofertas/listar_ofertas',$data).view('back_end/template/b_footer');
        }else{
            $data = array(
                'titulo'=>'Ofertas',
                'ofertas' => $this->oferta_model->getOfertaByNombre($texto)
            );

            return view('back_end/template/b_header',$data).view('back_end/template/b_sidebar').view('back_end/ofertas/listar_ofertas',$data).view('back_end/template/b_footer'); 
        }
    }

    public function guardar_oferta()
    {   
        
        $descripcionOferta = $this->request->getPost('descripcionOferta');
        $descuento = $this->request->getPost('descuento');
        $deleted = $this->request->getPost('deleted');
        $bd_ofertas = $this->oferta_model->getNombresOferta();
        $i=0;

        foreach($bd_ofertas as $bd_cat){
            if($bd_cat['descuento'] == $descuento){
                $i = $i +1;
            }
        }

       $data = [
            "descripcionOferta" => trim($descripcionOferta),
            "descuento" => trim($descuento),
            "deleted" => $deleted
        ];

        if($i > 0){

            $this->session->setFlashdata('alerta_categoria', 'Ya existe esa oferta');
            return redirect()->to(base_url('TWFF/public/agregar_oferta'));

        }else{

            $this->oferta_model->insert($data);
            $this->session->setFlashdata('alerta_exitosa', 'Registro exitoso.');
            return redirect()->to(base_url('TWFF/public/oferta'));

        }
    }

    public function modificar_oferta()
    {
        $idOferta = $this->request->getPost('idOferta');
        $descripcionOferta = $this->request->getPost('descripcionOferta');
        $descuento = $this->request->getPost('descuento');
        $deleted = $this->request->getPost('deleted');

        $bd_ofertas = $this->oferta_model->getNombresOferta();
        $i=0;
        $oferta2 = $this->oferta_model->getOfertaById($idOferta);
        
        if($oferta2[0]['descuento'] == $descuento){
            
            $data = [
                "descripcionOferta" => trim($descripcionOferta),
                "descuento" => trim($descuento),
                "deleted" => $deleted
            ];

            $this->oferta_model->update($idOferta,$data);
            $this->session->setFlashdata('alerta_exitosa', 'La oferta se modificó correctamente.');
            return redirect()->to(base_url('TWFF/public/oferta'));
        }else{
            foreach($bd_ofertas as $bd_cat){
                if($bd_cat['descuento'] == $descuento){
                    $i = $i +1;
                }
            }
            if($i > 0){
                $this->session->setFlashdata('alerta_categoria', 'Ya existe ese descuento');
                return redirect()->to(base_url('TWFF/public/oferta'));
            }else{
                
                $data = [
                    "descripcionOferta" => trim($descripcionOferta),
                    "descuento" => trim($descuento),
                    "deleted" => $deleted
                ];

                $this->oferta_model->update($idOferta,$data);

                $this->session->setFlashdata('alerta_exitosa', 'La oferta se modificó correctamente.');
                return redirect()->to(base_url('TWFF/public/oferta')); 
                
            }
        }
    }

    public function eliminar_oferta(){
        $idOferta = $this->request->getPost('idOferta');
        $this->oferta_model->delete($idOferta);
        return redirect()->to(base_url('TWFF/public/oferta'));
    }

}