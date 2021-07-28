<?php

namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\UserModel;
use App\Models\SubCategoryModel;
use App\Models\CategoryModel;
use App\Models\ThumbnailModel;
use CodeIgniter\Model;

class SearchController extends BaseController
{
    protected $category;
    protected $subcategory;
    protected $products;
    protected $thumbnail;

    public function __construct()
    {
        helper(['cookie','url','input']);
        $this->category    = new CategoryModel();
        $this->subcategory = new SubCategoryModel();
        $this->products    = new ProductModel();
        $this->thumbnail   = new ThumbnailModel();
    }
    public function index($s){

        if ($this->request->getGet('q')){
            $q= $this->request->getGet('q');
            $data= $this->products->like('title',$q,"both")->orLike('details',$q,'both')->orLike('price',$q,'both')->findAll();
            if ($data){
                $search_data= [
                    'search_data'=>$this->products->like('title',$q,"both")->orLike('details',$q,'both')->orLike('price',$q,'both')->paginate(9,'se'),
                    'pager' => $this->products->pager,
                    'value'=>$q
                ];
                return view('front/search',$search_data);
            }else{
                return redirect()->back()->with('fail','No Data Found in => '.$q);
            }


        }else{
           echo "Nai";
        }
    }
}