<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SubcategoriaModel;

class Subcategoria extends Controller
{
    private $subcategoria_model;
    private $session = null;

    public function __construct()
    {
        $this->subcategoria_model = new SubcategoriaModel();
        $this->session = \Config\Services::session();
    }
    
	public function index()
	{
        $texto = $this->request->getPost('buscador');

        if($texto == null){
            $data = array(
                'titulo'=>'Subcategorías',
                'subcategorias' => $this->subcategoria_model->findAll(),
                'sub_cat' => $this->subcategoria_model->cat_subcat()
            );

            return view('back_end/template/b_header',$data).view('back_end/template/b_sidebar').view('back_end/subcategorias/listar_subcategorias',$data).view('back_end/template/b_footer');
        }else{
            $data = array(
                'titulo'=>'Subcategorías',
                'subcategorias' => $this->subcategoria_model->getSubByNombre($texto),
                'sub_cat' => $this->subcategoria_model->cat_subcat()
            );

            return view('back_end/template/b_header',$data).view('back_end/template/b_sidebar').view('back_end/subcategorias/listar_subcategorias',$data).view('back_end/template/b_footer'); 
        }
    }
    
    public function cancelar()
    {
        return redirect()->to(base_url('TWFF/public/subcategoria'));
    }

    public function guardar_subcategoria(){   
        $subcategoria = $this->request->getPost('subcategoria');
        $categoria_idCategoria = $this->request->getPost('categoria_idCategoria');
        $deleted = $this->request->getPost('deleted');
        $bd_subcategorias = $this->subcategoria_model->getSubCategoria();
        $i=0;

        foreach($bd_subcategorias as $bd_cat){
            if($bd_cat['subcategoria'] == $subcategoria){
                $i = $i +1;
            }
        }

       $data = [
            "subcategoria" => trim($subcategoria),
            "categoria_idCategoria" => $categoria_idCategoria,
            "deleted" => $deleted
        ];

        if($i > 0){
            $this->session->setFlashdata('alerta_subcategoria', 'Ya existe una subcategoría con ese nombre.');
            return redirect()->to(base_url('TWFF/public/agregar_subcategoria'));

        }else{

            if($this->subcategoria_model->insert($data)==false){
                $errors = $this->subcategoria_model->errors();
                foreach($errors as $error){
                    $error;
                }
                $this->session->setFlashdata('alerta_subcategoria',$error);
                return redirect()->to(base_url('TWFF/public/agregar_subcategoria'));
            }else{
                $this->session->setFlashdata('alerta_exitosa', 'Registro exitoso.');
                return redirect()->to(base_url('TWFF/public/subcategoria'));
            }

        }
    }

    public function modificar_subcategoria(){
        $idSubcategoria = $this->request->getPost('idSubcategoria');
        $subcategoria = $this->request->getPost('subcategoria');
        $categoria_idCategoria = $this->request->getPost('categoria_idCategoria');
        $deleted = $this->request->getPost('deleted');
        //echo $idSubcategoria;
        $bd_subcategorias = $this->subcategoria_model->getSubCategoria();
        $i=0;
        $subcategoria2 = $this->subcategoria_model->getSubById($idSubcategoria);
        
        //var_dump($subcategoria2);

        if($subcategoria2[0]['subcategoria'] == $subcategoria){
            
            $data = [
                "subcategoria" => trim($subcategoria),
                "categoria_idCategoria" => $categoria_idCategoria,
                "deleted" => $deleted
            ];

            $this->subcategoria_model->update($idSubcategoria,$data);
            $this->session->setFlashdata('alerta_exitosa', 'La subcategoría se modificó correctamente.');
            return redirect()->to(base_url('TWFF/public/subcategoria'));
        }else{
            foreach($bd_subcategorias as $bd_cat){
                if($bd_cat['subcategoria'] == $subcategoria){
                    $i = $i +1;
                }
            }
            if($i > 0){
                $this->session->setFlashdata('alerta_subcategoria', 'Ya existe una subcategoría con ese nombre.');
                return redirect()->to(base_url('TWFF/public/subcategoria'));
            }else{
                
                $data = [
                    "subcategoria" => trim($subcategoria),
                    "categoria_idCategoria" => $categoria_idCategoria,
                    "deleted" => $deleted
                ];

                if($this->subcategoria_model->update($idSubcategoria,$data)==false){
                    //$i = 0;
                    $errors = $this->subcategoria_model->errors();
                    foreach($errors as $error){
                        $error;
                    }
                    //var_dump($error);
                    $this->session->setFlashdata('alerta_subcategoria', $error);
                    return redirect()->to(base_url('TWFF/public/subcategoria'));   
                }else{
                        $this->session->setFlashdata('alerta_exitosa', 'La categoría se modificó correctamente.');
                        return redirect()->to(base_url('TWFF/public/subcategoria')); 
                }
            }
        }
    }

    public function eliminar_subcategoria(){
        $idSubcategoria = $this->request->getPost('idSubcategoria');
        //echo $idSubcategoria;
        $this->subcategoria_model->delete($idSubcategoria);
        return redirect()->to(base_url('TWFF/public/subcategoria'));
    }

}