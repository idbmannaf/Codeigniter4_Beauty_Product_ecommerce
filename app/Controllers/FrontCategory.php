<?php

namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\UserModel;
use App\Models\SubCategoryModel;
use App\Models\CategoryModel;
use App\Models\ThumbnailModel;
use CodeIgniter\Model;

class FrontCategory extends BaseController
{
    protected $category;
    protected $subcategory;
    protected $products;
    protected $thumbnail;
    public function __construct()
    {
        helper(['cookie']);
        $this->category= new CategoryModel();
        $this->subcategory= new SubCategoryModel();
        $this->products= new ProductModel();
        $this->thumbnail= new ThumbnailModel();
    }

    public function index()
    {
        echo 'Catalog Controller';
    }
    public function singlecat($id){
//        $cat= $this->category->where('id',$id)->findAll();
//        var_dump($cat);
//        die;
        $data=[
          'category'=>$this->category->find($id),
            'catWaiseProduct'=> $this->products->where('cat_id',$id)->paginate(4,'category'),
            'catWaise_grid_Product'=> $this->products->where('cat_id',$id)->orderBy('id','DESC')->paginate(9,'category'),
            "pager"=> $this->products->pager
        ];
        return view('front/singlecategory',$data);
    }
}
