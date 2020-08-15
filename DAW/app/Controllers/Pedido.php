<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PedidoModel;

class Pedido extends Controller
{
	private $pedido_model;
    private $session = null;

    public function __construct()
    {
        $this->pedido_model = new PedidoModel();
        $this->session = \Config\Services::session();
    }

	public function index()
	{
        $texto = $this->request->getPost('buscador');

        if($texto == null){
            $data = array(
                'titulo'=>'Pedidos',
                'pedidos' => $this->pedido_model->findAll(),
                'usuario' => $this->pedido_model->ped_usu()
            );

            return view('back_end/template/b_header',$data).view('back_end/template/b_sidebar').view('back_end/pedidos/listar_pedidos',$data).view('back_end/template/b_footer');
        }else{
            $data = array(
                'titulo'=>'Pedidos',
                'pedidos' => $this->pedido_model->getPedidoByNombre($texto),
                'usuario' => $this->pedido_model->ped_usu()
            );

            return view('back_end/template/b_header',$data).view('back_end/template/b_sidebar').view('back_end/pedidos/listar_pedidos',$data).view('back_end/template/b_footer'); 
        }
    }

    public function modificar_pedido()
    {
        $idPedido = $this->request->getPost('idPedido');
        $deleted = $this->request->getPost('deleted');
        
        $data = [
            "deleted" => $deleted
        ];
        
        $this->pedido_model->update($idPedido,$data);
        $this->session->setFlashdata('alerta_exitosa', 'El pedido se modificó correctamente.');
        return redirect()->to(base_url('TWFF/public/pedido'));
            
    }

    public function eliminar_pedido(){
        $idPedido = $this->request->getPost('idPedido');
        $this->pedido_model->delete($idPedido);
        return redirect()->to(base_url('TWFF/public/pedido'));
    }

}