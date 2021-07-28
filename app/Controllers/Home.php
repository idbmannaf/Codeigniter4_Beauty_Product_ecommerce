<?php

namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\UserModel;
use App\Models\SubCategoryModel;
use App\Models\CategoryModel;
use App\Models\ThumbnailModel;
use App\Models\Testimonial;
class Home extends BaseController
{
    protected $category;
    protected $subcategory;
    protected $products;
    protected $thumbnail;
    protected $tesimonial;
    public function __construct()
    {
        helper(['cookie']);
     $this->category= new CategoryModel();
     $this->subcategory= new SubCategoryModel();
     $this->products= new ProductModel();
     $this->thumbnail= new ThumbnailModel();
     $this->tesimonial= new Testimonial();
    }

    public function index()
	{
	    $data= [
            'categories'=> $this->category->findAll(),
            'products'=>$this->products->orderBy('id','DESC')->findAll(),
            'testimonials'=>$this->tesimonial->findAll(),
        ];
		return view('front/index',$data);
	}
	public function shop(){
        $data=[
            'categories'=>$this->category->findAll()
        ];
      return view('front/shop',$data);
    }
    public function singleCatPost($id){
        $data=[
            'all_products'=>$this->products->where('cat_id',$id)->paginate(9,'cat'),
            'categories'=>$this->category->findAll()
        ];
        return view('front/cat',$data);
    }

}
