<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use CodeIgniter\Model;

class SubCategory extends BaseController
{
    protected $category;
    protected $sub_category;
    public function __construct()
    {
        helper(['cookie','url','form']);
    $this->category= new CategoryModel();
    $this->sub_category= new SubCategoryModel();

    }

    public function index(){
        $data=[
            'category'=>$this->category->findAll(),
            'sub_categories'=> $this->sub_category->orderBy('id','DESC')->paginate(10,"group1"),
            'pager'=> $this->sub_category->pager
        ];
        return view('admin/subcategory/index',$data);
    }
    public function add(){
        $data= [
            'category'=>$this->category->findAll()
        ];
        return view('admin/subcategory/add',$data);
    }
    public function save(){
        $data= [
            'adde_by'=>session()->get('userid'),
            'name'=>$this->request->getPost('name'),
            'cat_id'=>$this->request->getPost('category'),
            'details'=>$this->request->getPost('details'),
        ];
        $status= $this->sub_category->save($data);
        if (!$status){
            return redirect()->back()->with('fail',"Something Wrong");
        }else{
            return redirect()->to('/sub-category')->with('success','subcategory successfully updated');
        }

    }



//    public function ajaxrequest(){
//        $id= $this->request->getPost('id');
//        $data= $this->sub_category->where('cat_id',$id)->findAll();
//        $output= '<select name="cat_id" id="cat_id" class="form-control"><option value="">Select Subcategory</option>';
//        foreach ($data as $cat){
//            $output .='<option value="'.$cat['id'].'">'.$cat['name'].'</option>';
//        }
//        $output .='</option>';
//        return $output;
////        die;
////        $data= [
////            'subcat'=> $this->sub_category->find($id)
////        ];
////       return $this->response->setJSON($data);
//    }
}