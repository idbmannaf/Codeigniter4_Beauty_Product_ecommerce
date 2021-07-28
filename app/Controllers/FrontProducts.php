<?php

namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\UserModel;
use App\Models\SubCategoryModel;
use App\Models\CategoryModel;
use App\Models\ThumbnailModel;
use App\Models\WishlistModel;
use App\Models\OrderModel;
use App\Models\OrderDetails;
use App\Models\OrderBillingDetails;
use CodeIgniter\Model;

class FrontProducts extends BaseController
{
    protected $category;
    protected $subcategory;
    protected $products;
    protected $thumbnail;
    protected $wishlist;
    protected $order;
    protected $order_details;
    protected $order_billing_details;
    public function __construct()
    {
        helper(['cookie','form','url','session']);
        $this->category= new CategoryModel();
        $this->subcategory= new SubCategoryModel();
        $this->products= new ProductModel();
        $this->thumbnail= new ThumbnailModel();
        $this->wishlist = new WishlistModel();
        $this->order = new OrderModel();
        $this->order_details = new OrderDetails();
        $this->order_billing_details = new OrderBillingDetails();
    }

    public function index($id)
    {
    $p= $this->products->find($id);
    $c= $this->category->find($p['cat_id']);
    $sc= $this->subcategory->find($p['sub_cat_id']);

    $data= [
        'single_product'=>$p,
        'single_cat'=> $c['name'],
        'single_cat_id'=>$c['id'],
        'single_subcat'=>$sc['name'],
        'product_thumbnail'=>$this->thumbnail->where('product_id',$id)->findAll(),
        'related_product'=>$this->products->whereNotIn('cat_id',[$p['cat_id']])->findAll(5),
    ];
        return view('front/single-product',$data);
    }
    public function wishlist()
    {

        return view('front/wishlist');
    }
    public function addWishlist($id){
        $wislist_product_id= $this->wishlist->where('product_id',$id)->get()->getRow();
        if ($wislist_product_id !=null && $wislist_product_id->product_id == $id){
            return redirect()->back()->with('fail',"Product already added in Wishlist");
        }else{
       $wislist_itmes=[
           'user_id'=>session()->get('userid'),
           'product_id'=>$id,
       ];
       $this->wishlist->insert($wislist_itmes);
       return redirect()->back()->with('success',"Product added in Wishlist");
        }
    }
    public function deleteWishlist(){
        $id= $this->request->getPost('id');
        $this->wishlist->delete($id);
        echo "This Product Removed From Wishlist";
    }
    public function myOrder(){
        return view('front/profile/myorder');
    }
    public function deleteOrder(){
        $order_id= $this->request->getPost('id');
        $this->order->delete($order_id);
        $this->order_details->where('order_id',$order_id)->delete();
        $this->order_billing_details->where('order_id',$order_id)->delete();
        echo 'This Order canceled';
    }

}
