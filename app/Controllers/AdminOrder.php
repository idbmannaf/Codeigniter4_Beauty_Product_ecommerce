<?php

namespace App\Controllers;
use App\Models\CartModel;
use App\Models\CountryModel;
use App\Models\StateModel;
use App\Models\CityModel;
use App\Models\ProductModel;
use App\Models\UserModel;
use App\Models\SubCategoryModel;
use App\Models\CategoryModel;
use App\Models\ThumbnailModel;
use App\Models\CouponsModel;
use App\Models\OrderModel;
use App\Models\OrderBillingDetails;
use App\Models\OrderDetails;
use CodeIgniter\Model;
use Carbon\Carbon;
use PhpParser\Node\Stmt\Echo_;
use CodeIgniter\Session\Session;
class AdminOrder extends BaseController
{
    protected $category;
    protected $subcategory;
    protected $products;
    protected $thumbnail;
    protected $cart;
    protected $coupons;
    protected $session;
    protected $userModel;
    protected $countryModel;
    protected $state;
    protected $city;
    protected $order;
    protected $order_billing_details;
    protected $order_details;

    public function __construct()
    {
        helper(['form', 'file', 'url', 'cookie', 'text']);
        $this->category              = new CategoryModel();
        $this->subcategory           = new SubCategoryModel();
        $this->products              = new ProductModel();
        $this->thumbnail             = new ThumbnailModel();
        $this->cart                  = new CartModel();
        $this->coupons               = new CouponsModel();
        $this->session               = \Config\Services::session();
        $this->userModel             = new UserModel();
        $this->countryModel          = new  CountryModel();
        $this->state                 = new StateModel();
        $this->city                  = new CityModel();
        $this->order                 = new OrderModel();
        $this->order_billing_details = new OrderBillingDetails();
        $this->order_details         = new OrderDetails();
    }
    public function index(){
        if ($this->request->getPost('order_status')){
            $order_id= $this->request->getPost('order_id');
            $this->order->update($order_id,[ 'order_status'=> $this->request->getPost('order_status')]);
            return redirect()->to('/all-order')->with('success','Order Status Updated');
        }
        $data= [
            'orders'=> $this->order->paginate(10,'group1'),
            'pager'=> $this->order->pager
        ];

        return view('admin/order/index',$data);
    }

}