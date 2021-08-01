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
class CartController extends BaseController
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
        helper(['form','file','url','cookie','text','session']);
        $this->category    = new CategoryModel();
        $this->subcategory = new SubCategoryModel();
        $this->products    = new ProductModel();
        $this->thumbnail   = new ThumbnailModel();
        $this->cart        = new CartModel();
        $this->coupons     = new CouponsModel();
        $this->session = \Config\Services::session();
        $this->userModel= new UserModel();
        $this->countryModel= new  CountryModel();
        $this->state = new StateModel();
        $this->city = new CityModel();
        $this->order = new OrderModel();
        $this->order_billing_details = new OrderBillingDetails();
        $this->order_details= new OrderDetails();
    }
    public function addtocart(){

        setcookie("TestCookie", "nothing", time()+3600);
        //Cookie Not working
       if (get_cookie('generated_cart_id')){
           $generated_cart_id= get_cookie('generated_cart_id');
       }else{

           $generated_cart_id=random_string('alnum', 16);
           session()->set('generated_cart_id',$generated_cart_id);
           set_cookie([
               'name' => 'generated_cart_id',
               'value' =>$generated_cart_id,
               'expire' => 432000,
               'httponly' => false
           ]);
       }
        //Cookie Not working
       if ($this->cart->where('generated_cart_id',$generated_cart_id)->where('product_id',$this->request->getPost('product_id'))->findAll()){
          $r= $this->cart->Where('product_id',$this->request->getPost('product_id'))->findAll();
        foreach ($r as $z){
            $quantity= $z['quantity']+$this->request->getPost('quantity') ;
            $id= $z['id'];
        }
        $data=[
            'quantity'=>$quantity
        ];

        $this->cart->update($id,$data);
           return redirect()->back()->with('success','Your product added to cart successfully!');

       }else{
           $data=[
               'generated_cart_id'=>$generated_cart_id,
               'product_id'=>$this->request->getPost('product_id'),
               'quantity'=> $this->request->getPost('quantity')
           ];
           $this->cart->save($data);
           return redirect()->back()->with('success','Your product added to cart successfully!');

       }

    }
    public function cartPage($coupons = " "){
       $hase_any_item_in_cart=  $this->cart->where('generated_cart_id',get_cookie('generated_cart_id'))->findAll();
    if (!$hase_any_item_in_cart){
        return redirect()->to('/');
    }
//        $discount=0;
        if ($coupons == " "){
            $discount=0;
        }else{
            $query = $this->coupons->where('coupons',$coupons)->get()->getRow();
            if ($query){
                if (Carbon::now()->format('Y-m-d') > $query->validity){
                    $this->session ->setFlashdata('invalid',"Coupons Date Expired!!");
                }else {
                    $this->session ->setFlashdata('added',"Coupons added Successfully!!");
                    $discount = $query->discount;


                }
            }
            else{
                $this->session ->setFlashdata('error',"There Are no Coupons That you entered");
            }
        }
            $data=[
                'cart_items'       =>  $this->cart->where('generated_cart_id',get_cookie('generated_cart_id'))->findAll(),
                'discount_amount'  =>   $discount,
                'coupone_name'     =>   $coupons
                ];
        return view('front/cartpage',$data);
    }

    public function cartDeleteAjax(){
        $id= $this->request->getPost('id');
        $this->cart->where('id',$id)->delete();
        return "done";
    }

    public function updateCart(){
//    dd($this->request->getPost('quantity[]'));
        foreach ($this->request->getPost('quantity[]') as $cart_id => $quantity ){
            $this->cart->update($cart_id,['quantity'=>$quantity]);
        }
        return redirect()->back()->with('success','Cart Quantity Updated Successfully');
    }
    public function checkout(){
        if (session()->has('userid')){
               $user= $this->userModel->find(session()->get('userid'));
               if ($user['role'] == 1){
                   return redirect()->to('/cart')->with('fail','You are Not Customar');
               }else{

                   $data= [
                       'userinfo'=>$this->userModel->find(session()->get('userid')),
                       'countries'=> $this->countryModel->findAll(),
                   ];
                   return view('front/checkout',$data);
               }

        }else{
            return redirect()->to('/auth');
        }

    }
    public function country_to_state(){
     $country_id =   $this->request->getPost('country_id');

        $query = $this->state->where('country_id',$country_id)->findAll();
        $output= '<option value="">Select State</option>>';
        if ($query){
            $output= '<option value="">Select State</option>>';
            foreach ($query as $state){
                $output .='<option value="'.$state['id'].'">'.$state['name'].'</option>>';
            }
            return $output;
        }

    }
    public function state_to_city(){
        $state_id= $this->request->getPost('state_id');
        $cities= $this->city->where('state_id',$state_id)->findAll();
        if ($cities){
            $output= '<option value="">Select City</option>';
            foreach ($cities as $city){
                $output .=  '<option value="'.$city['id'].'">'.$city['name'].'</option>';
            }
            return $output;
        }
    }
    public function order(){
       $payment_status= $this->request->getPost('payment_method');
       $validation= $this->validate([
          'name'=>"required",
           'email'=>'required|valid_email',
           'phone'=>'integer',
           'country_id'=>'required',
           'state_id'=>'required',
           'city_id'=>'required',
           'address'=>'required',
           'postcode'=>'required',
           'payment_method'=>'required',

       ]);
       if (!$validation){
           $chechoutData= [
               'countries'=> $this->countryModel->findAll(),
               'validation'=>$this->validator
           ];
           return view('front/checkout',$chechoutData);
       }
       else{
           if ($payment_status == 2 || $payment_status == 1){
               $data= [
                   'total' => $this->session->get('total'),
                   'discount' => $this->session->get('discount'),
                   'subtotal' => $this->session->get('subtotal'),
                   'order_status' => 1,
                   'payment_status' => $payment_status,
                   'user_id'=>session()->get('userid')

               ];
               $this->order->insert($data);
               $last_inserted_id= $this->order->getInsertID();
               $order_details_data=[
                   'order_id'=>$last_inserted_id,
                   'name'=>$this->request->getPost('name'),
                   'email'=>$this->request->getPost('email'),
                   'phone'=>$this->request->getPost('phone'),
                   'company'=>$this->request->getPost('company'),
                   'country_id'=>$this->request->getPost('country_id'),
                   'state_id'=>$this->request->getPost('state_id'),
                   'city_id'=>$this->request->getPost('city_id'),
                   'address'=>$this->request->getPost('address'),
                   'postcode'=>$this->request->getPost('postcode'),
                   'massage'=>$this->request->getPost('massage'),
               ];
               $this->order_billing_details->insert($order_details_data);
               $cart_items= $this->cart->where('generated_cart_id',get_cookie('generated_cart_id'))->findAll();
               foreach ($cart_items as $cart_item){
                   $product= $this->products->find($cart_item['product_id']);
                   $order_details= [
                       'order_id'=>$last_inserted_id,
                       'product_id'=>$cart_item['product_id'],
                       'product_name'=>$product['title'],
                       'product_price'=>$product['price'],
                       'product_quantity'=>$cart_item['quantity'],
                       'product_image'=>$product['image']
                   ];
                   $this->order_details->insert($order_details);
               }
               $this->cart->where('generated_cart_id',get_cookie('generated_cart_id'))->delete();
               return redirect()->to('/')->with('success','Order Placed');
           }else{
               echo "This payment Type Not Available";
           }
       }

    }

}