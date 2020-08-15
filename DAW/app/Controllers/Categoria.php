<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CategoriaModel;

class Categoria extends Controller
{
    private $categoria_model;
    private $session = null;

    public function __construct()
    {
        $this->categoria_model = new CategoriaModel();
        $this->session = \Config\Services::session();
	}
	
	public function index()
	{
        $texto = $this->request->getPost('buscador');

        if($texto == null){
            $data = array(
                'titulo'=>'Categorías',
                'categorias' => $this->categoria_model->findAll()
            );

            return view('back_end/template/b_header',$data).view('back_end/template/b_sidebar').view('back_end/categorias/listar_categorias',$data).view('back_end/template/b_footer');
        }else{
            $data = array(
                'titulo'=>'Categorías',
                'categorias' => $this->categoria_model->getCategoriaByNombre($texto)
            );

            return view('back_end/template/b_header',$data).view('back_end/template/b_sidebar').view('back_end/categorias/listar_categorias',$data).view('back_end/template/b_footer'); 
        }
    }
    
    public function cancelar()
    {
        return redirect()->to(base_url('TWFF/public/categoria'));
    }

    public function guardar_categoria()
    {   
        
        $ruta = $this->request->getFile('imagenCategoria');
        $categoria = $this->request->getPost('categoria');
        $deleted = $this->request->getPost('deleted');
        $bd_categorias = $this->categoria_model->getNombresCategoria();
        $i=0;

        foreach($bd_categorias as $bd_cat){
            if($bd_cat['categoria'] == $categoria){
                $i = $i +1;
            }
        }

        if(!$ruta->hasMoved()){
            $ruta->move(ROOTPATH . 'vendor/uploads');
        }

       $data = [
            "categoria" => trim($categoria),
            "imagenCategoria" => $ruta->getName(),
            "deleted" => $deleted
        ];

        if($i > 0){

            unlink(ROOTPATH . 'vendor/uploads/' . $ruta->getName());
            $this->session->setFlashdata('alerta_categoria', 'Ya existe una categoría con ese nombre.');
            return redirect()->to(base_url('TWFF/public/agregar_categoria'));

        }else{

            if($this->categoria_model->insert($data)==false){
                unlink(ROOTPATH . 'vendor/uploads/' . $ruta->getName());
                $errors = $this->categoria_model->errors();
                foreach($errors as $error){
                    $error;
                }
                $this->session->setFlashdata('alerta_categoria',$error);
                return redirect()->to(base_url('TWFF/public/agregar_categoria'));
            }else{
                $this->session->setFlashdata('alerta_exitosa', 'Registro exitoso.');
                return redirect()->to(base_url('TWFF/public/categoria'));
            }

        }
    }

    public function modificar_categoria()
    {
        $idCategoria = $this->request->getPost('idCategoria');
        $ruta = $this->request->getFile('imagenCategoria');
        $imagenCategoria2 = $this->request->getPost('imagenCategoria2');
        $categoria = $this->request->getPost('categoria');
        $deleted = $this->request->getPost('deleted');

        $bd_categorias = $this->categoria_model->getNombresCategoria();
        $i=0;
        $categoria2 = $this->categoria_model->getCategoriaById($idCategoria);
        
        if($categoria2[0]['categoria'] == $categoria){

            if($ruta->getName() != ""){
                if(!$ruta->hasMoved()){
                    $ruta->move(ROOTPATH . 'vendor/uploads');
                }
                unlink(ROOTPATH . 'vendor/uploads/' . $imagenCategoria2);
                $imagenCategoria = $ruta->getName();
            }else{
                $imagenCategoria = $imagenCategoria2;   
            }
            
            $data = [
                "categoria" => trim($categoria),
                "imagenCategoria" => $imagenCategoria,
                "deleted" => $deleted
            ];

            $this->categoria_model->update($idCategoria,$data);
            $this->session->setFlashdata('alerta_exitosa', 'La categoría se modificó correctamente.');
            return redirect()->to(base_url('TWFF/public/categoria'));
        }else{
            foreach($bd_categorias as $bd_cat){
                if($bd_cat['categoria'] == $categoria){
                    $i = $i +1;
                }
            }
            if($i > 0){
                $this->session->setFlashdata('alerta_categoria', 'Ya existe una categoría con ese nombre.');
                return redirect()->to(base_url('TWFF/public/categoria'));
            }else{

                if($ruta->getName() != ""){
                    if(!$ruta->hasMoved()){
                        $ruta->move(ROOTPATH . 'vendor/uploads');
                    }
                    $imagenCategoria = $ruta->getName();
                }else{
                    $imagenCategoria = $imagenCategoria2;   
                }
                
                $data = [
                    "categoria" => trim($categoria),
                    "imagenCategoria" => $imagenCategoria,
                    "deleted" => $deleted
                ];

                if($this->categoria_model->update($idCategoria,$data)==false){
                    if($imagenCategoria = $imagenCategoria2){
                        $errors = $this->categoria_model->errors();
                        foreach($errors as $error){
                            $error;
                        }
                        $this->session->setFlashdata('alerta_categoria', $error);
                        return redirect()->to(base_url('TWFF/public/categoria'));
                    }else{
                                               
                        unlink(ROOTPATH . 'vendor/uploads/' . $ruta->getName());
                        $errors = $this->categoria_model->errors();
                        foreach($errors as $error){
                            $error;
                        }
                        $this->session->setFlashdata('alerta_categoria', $error);
                        return redirect()->to(base_url('TWFF/public/categoria'));
                    }                  
                    
                }else{
                    if($imagenCategoria = $imagenCategoria2){
                        
                        $this->session->setFlashdata('alerta_exitosa', 'La categoría se modificó correctamente.');
                        return redirect()->to(base_url('TWFF/public/categoria'));
                    }else{
                        unlink(ROOTPATH . 'vendor/uploads/' . $ruta->getName());
                        $this->session->setFlashdata('alerta_exitosa', 'La categoría se modificó correctamente.');
                        return redirect()->to(base_url('TWFF/public/categoria'));
                    } 
                }
            }
        }
    }

    public function eliminar_categoria(){
        $idCategoria = $this->request->getPost('idCategoria');
        $imagenCategoria = $this->request->getPost('imagenCategoria');
        $this->categoria_model->delete($idCategoria);
        unlink(ROOTPATH . 'vendor/uploads/' . $imagenCategoria);
        return redirect()->to(base_url('TWFF/public/categoria'));
    }

}