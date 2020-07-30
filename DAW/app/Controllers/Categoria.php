<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CategoriaModel;

class Categoria extends Controller
{
    private $categoria_model;

    public function __construct()
    {
        $this->categoria_model = new CategoriaModel();
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

        //print_r($i);

        if($i > 0){
           
            echo "<script>alert('ERROR: La categoría ya existe');</script>";
            //return redirect()->to(base_url('TWFF/public/agregar_categoria'),'refresh');
            //return redirect(base_url('TWFF/public/agregar_categoria'),'refresh');
            return redirect()->to(base_url('TWFF/public/agregar_categoria'));


        }else{

            if(!$ruta->hasMoved()){
                $ruta->move('C:/xampp/htdocs/TWFF/vendor/uploads');
            }

            $imagenCategoria = base_url('TWFF/vendor/uploads')."/".$ruta->getName();

            $data = [
                "categoria" => $categoria,
                "imagenCategoria" => $imagenCategoria,
                "deleted" => $deleted
            ];

            //echo '<pre>';
            //print_r($data);

            $this->categoria_model->insert($data);
            return redirect()->to(base_url('TWFF/public/categoria'));

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

        //print_r($categoria2[0]['categoria']);
        
        if($categoria2[0]['categoria'] == $categoria){
            if($ruta->getName() != ""){
                if(!$ruta->hasMoved()){
                    $ruta->move('C:/xampp/htdocs/TWFF/vendor/uploads');
                }
                $imagenCategoria = base_url('TWFF/vendor/uploads')."/".$ruta->getName();
            }else{
                $imagenCategoria = $imagenCategoria2;   
            }
            
    
            $data = [
                "categoria" => $categoria,
                "imagenCategoria" => $imagenCategoria,
                "deleted" => $deleted
            ];
    
            //echo '<pre>';
            //print_r($data);
    
            $this->categoria_model->update($idCategoria,$data);
            return redirect()->to(base_url('TWFF/public/categoria'));
        }else{
            foreach($bd_categorias as $bd_cat){
                if($bd_cat['categoria'] == $categoria){
                    $i = $i +1;
                }
            }

            //print_r($i);

            if($i > 0){
            
                echo "<script>alert('ERROR: La categoría ya existe');</script>";
                //return redirect()->to(base_url('TWFF/public/agregar_categoria'),'refresh');
                //return redirect(base_url('TWFF/public/agregar_categoria'),'refresh');
                return redirect()->to(base_url('TWFF/public/agregar_categoria'));


            }else{

                if($ruta->getName() != ""){
                    if(!$ruta->hasMoved()){
                        $ruta->move('C:/xampp/htdocs/TWFF/vendor/uploads');
                    }
                    $imagenCategoria = base_url('TWFF/vendor/uploads')."/".$ruta->getName();
                }else{
                    $imagenCategoria = $imagenCategoria2;   
                }
                
        
                $data = [
                    "categoria" => $categoria,
                    "imagenCategoria" => $imagenCategoria,
                    "deleted" => $deleted
                ];
        
                //echo '<pre>';
                //print_r($data);
        
                $this->categoria_model->update($idCategoria,$data);
                return redirect()->to(base_url('TWFF/public/categoria'));

            }
        }


        
  
    }

    public function eliminar_categoria(){
        $idCategoria = $this->request->getPost('idCategoria');
        $this->categoria_model->delete($idCategoria);
        return redirect()->to(base_url('TWFF/public/categoria'));
    }

}