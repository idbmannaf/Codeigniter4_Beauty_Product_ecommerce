<?php

namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\UserModel;
use App\Models\SubCategoryModel;
use App\Models\CategoryModel;
use App\Models\ThumbnailModel;
use CodeIgniter\Model;

class FrontSubcategory extends BaseController
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

    public function index($id)
    {
        $cat_id = $this->subcategory->where('id',$id)->get()->getRow()->cat_id;
        $data=[
            'cat_id'=>$cat_id,
            'subcategory'=>$this->subcategory->find($id),
            'category'=>$this->category->find($cat_id),
            'subcat_post'=> $this->products->where('sub_cat_id',$id )->paginate(4,'category'),
            "pager"=> $this->products->pager
        ];
        return view('front/single-subcategory',$data);
    }

}
