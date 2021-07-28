<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\CategoryModel;
//use App\Libraries\Hash;
use CodeIgniter\Model;

class Category extends BaseController
{
    protected $CategoryModel;
    public function __construct()
    {
        $this->CategoryModel=new CategoryModel();
        helper(['url','form']);
    }

    public function index(){
        $categories= $this->CategoryModel->orderBy('id',"DESC")->findAll();
        $data= [
            'categories'=>$categories
        ];
        return view('admin/category/index',$data);
    }
    public function add(){
        return view('admin/category/add');
    }
    public  function save(){
       $validation=$this->validate([
          'name'=>[
              'rules'=>'required|is_unique[categories.name]',
              'errors'=>[
                  'is_unique'=> "This Category already exist in our server"
              ],
//              'image'=>[
//                  'rules'=>'mime_in[field_name,image/png,image/jpg]',
//                  'errors'=>[
//                      'mine_in'=>''
//                  ]
//              ]
          ],
       ]);
       if (!$validation){
           return view('admin/category/add',['validation'=>$this->validator]);
       }else{
           $name= $this->request->getPost('name');
           $details= $this->request->getPost('details');
           $user_id= session()->get('userid');
           $file= $this->request->getFile('image');

           $imageName='';
           if ($file->isValid() && !$file->hasMoved()){
               $imageName= $file->getRandomName();
               $file->move('uploads/category/',$imageName);
           }

           $data=[
               'name'=>$this->request->getPost('name'),
               'details'=>$this->request->getPost('details'),
               'adde_by'=>session()->get('userid'),
               'image'=>$imageName

           ];
          $result= $this->CategoryModel->insert($data);
          if (!$result){
              return redirect()->to('category/add')->with('fail','Something Wrong');
          }else{
              return redirect()->to('/category')->with('success','Category Succesfully Added');
          }
       }
    }
    public function edit($id){
        $data=[
            'single_cat'=>$this->CategoryModel->find($id)
        ];
        return view('admin/category/edit',$data);
    }
    public  function update(){
        $id= $this->request->getPost('id');
        $product_item= $this->CategoryModel->find($id);
        $file= $this->request->getFile('image');
        $imageName='';
        if ($file->isValid() && !$file->hasMoved()){
            $old_image= $product_item['image'];
            if (file_exists('uploads/category/'.$old_image)){
                unlink('uploads/category/'.$old_image);

            }
            $imageName= $file->getRandomName();
            $file->move('uploads/category/',$imageName);
        }

        $data=[
            'name'=>$this->request->getPost('name'),
            'details'=>$this->request->getPost('details'),
            'adde_by'=>session()->get('userid'),
            'image'=>$imageName

        ];
        $result= $this->CategoryModel->update($id,$data);
        if (!$result){
            return redirect()->back()->with('fail','Something Wrong');
        }else{
            return redirect()->to('/category')->with('success','Category Successfully Updated');
        }

    }
    function delete($id){
        $this->CategoryModel->delete( array('id' => $id));
        return redirect()->to('/category')->with('success',"Category Successfully Deleted");
    }
}