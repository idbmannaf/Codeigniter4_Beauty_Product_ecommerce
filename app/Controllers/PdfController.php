<?php
namespace App\Controllers;
use App\Models\CityModel;
use App\Models\CountryModel;
use App\Models\StateModel;
use CodeIgniter\Controller;
use App\Models\OrderModel;
use App\Models\OrderDetails;
use App\Models\OrderBillingDetails;

class PdfController extends Controller
{
    protected $order;
    protected $order_details;
    protected $billing;
    protected $country_model;
    protected $state_model;
    protected $city_model;
    public function __construct()
    {
        $this->order= new OrderModel();
        $this->order_details = new OrderDetails();
        $this->billing = new OrderBillingDetails();
        $this->country_model= new CountryModel();
        $this->state_model = new StateModel();
        $this->city_model = new CityModel();
    }

    public function index()
    {
        $id= $this->request->getPost('id');
        $view = \Config\Services::renderer();
        $billing_details= $this->billing->where('order_id',$id)->get()->getRow();
        $data['orders'] = $this->order->where('id',$id)->get()->getRow();
        $data['order_details'] = $this->order_details->where('order_id',$id)->findAll();
        $data['billing_details']= $this->billing->where('order_id',$id)->get()->getRow();
        $data['country'] = $this->country_model->where('id',$billing_details->country_id)->get()->getRow()->name;
        $data['state']  = $this->state_model->where('id',$billing_details->state_id)->get()->getRow()->name;
        $data['city'] = $this->city_model->where('id',$billing_details->city_id)->get()->getRow()->name;

        $str =  $view->setVar('orders', $data['orders'])
            ->setVar('order_details', $data['order_details'])
            ->setVar('billing_details',$data['billing_details'])
            ->setVar('country',$data['country'])
            ->setVar('state',$data['state'])
            ->setVar('city',$data['city'])
            ->render("invoice");
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($str);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream($id.".pdf");
    }
    public function createInvoice(){
        $id= $this->request->getPost('id');
        $generate_invoice_id= $id.'-'.uniqid();
        $data=[
            'invoice_id'=>$generate_invoice_id
        ];
        $this->order->update($id,$data);
        echo "Order Id Generated";
    }


}