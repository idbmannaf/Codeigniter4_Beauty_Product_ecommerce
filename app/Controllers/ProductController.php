<?php
namespace App\Controllers;
use App\Models\UserModel;
use App\Libraries\Hash;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use App\Models\ThumbnailModel;
class ProductController extends BaseController
{
   protected $productModel;
   protected $category;
   protected $subcategory;
   protected $thumbnail;
    public function __construct()
    {
        $this->productModel= new ProductModel();
        $this->category= new CategoryModel();
        $this->subcategory= new SubCategoryModel();
        $this->thumbnail= new ThumbnailModel();
        helper(['form','url','cookie']);
    }

    public function index(){
        $data= [
            'products'=>$this->productModel->orderBy('id','DESC')->paginate(10,'group1'),
            'pager'=>$this->productModel->pager,
            'page_title'=>"Products Page"
        ];
        return view('admin/products/index',$data);
    }
    public function view($id){
       $data=[
           'single_products'=>$this->productModel->find($id),
           'page_title'=>"View Product"
       ];
        return view('admin/products/view',$data);
    }

    public function add(){
        $data=[
            'categories'=>$this->category->findAll()
        ];
        return view('admin/products/add',$data);
    }
    public function loadSubcatAjax(){
        $id= $this->request->getPost('id');
        $data= $this->subcategory->where('cat_id',$id)->findAll();
        $output= '<option value="">Select subcategory </option>';
        foreach ($data as $cat){
            $output .='<option value="'.$cat['id'].'">'.$cat['name'].'</option>';
        }
        return $output;
//        die;
//        $data= [
//            'subcat'=> $this->sub_category->find($id)
//        ];
//       return $this->response->setJSON($data);
    }

    public function save(){
//       echo $title= $this->request->getFile('image');
       $validation= $this->validate([
          'title' =>'required',
           'price' =>[
               'rules' =>'required|numeric',
               'errors'=>[
                   'numeric'=>"Only Numeric Value Allow!!"
               ]
           ],
           'quantity' =>[
               'rules' =>'required|numeric',
               'errors'=>[
                   'numeric'=>"Only Numeric Value Allow!!"
               ]
           ],
           'cat_id' =>'required',
           'sub_cat_id' =>'required',
           'details' =>'required',
       'image'=>[
           'rules'=>'uploaded[image]|mime_in[image,image/jpg,image/jpeg,image/gif,image/png]|max_size[image,4096]',
           "errors"=>[
               'mime_in'=>"Invalid Image File!!. Only jpg, jpeg, gif or png allowed!",
               'uploaded'=>"Image is required"
           ]
       ],
           'thumbnail' => [
            'uploaded[thumbnail]',
            'mime_in[thumbnail,image/jpg,image/jpeg,image/gif,image/png]',
            'max_size[image,4096]',
            'errors' => [
                'uploaded[thumbnail]' => 'Please select an image.'
            ]
        ],

       ]);
       if (!$validation){
           $validationWithData= [
               'categories'=>$this->category->findAll(),
               'validation'=>$this->validator,

           ];
           return view('admin/products/add',$validationWithData);
       }else {
           $file= $this->request->getFile('image');
           $imageName= '';
           if ($file->isValid() && !$file->hasMoved()){
               $imageName= $file->getRandomName();
               $file->move('uploads/products/',$imageName);
           }

           $data= [
               'title'=>$this->request->getPost('title'),
               'price'=>$this->request->getPost('price'),
               'quantity'=>$this->request->getPost('quantity'),
               'cat_id'=>$this->request->getPost('cat_id'),
               'sub_cat_id'=>$this->request->getPost('sub_cat_id'),
               'details'=>$this->request->getPost('details'),
               'added_by'=>session()->get('userid'),
               'image'=>$imageName,
           ];
           $result = $this->productModel->insert($data);
           $thumbnail = $this->request->getFileMultiple('thumbnail');
           $inserted_id= $this->productModel->getInsertID();
           if ($thumbnail) {
               foreach ($thumbnail as $tumb) {
                   $thumbnailName=  $tumb->getRandomName();
                   $tumb->move('uploads/products/thumbnail/',$thumbnailName);
                   $data2= [
                       'image'=>$thumbnailName,
                       'product_id'=>$inserted_id
                   ];

                   $this->thumbnail->save($data2);
               }
           }
           if ($result){
               return redirect()->to("/product")->with('success','Product Successfully Added');
           }
       }

    }
    public function edit($id){
        echo $id;
    }
    public function delete($id){
        $this->productModel->delete(array('id'=>$id));
        $allid=[];
        $ids= $this->thumbnail->where("product_id",$id)->findAll();
        foreach ($ids as $idd){
            $allid[]= $idd['id'];
            if (file_exists('uploads/products/thumbnail/'.$idd['image'])){
                unlink('uploads/products/thumbnail/'.$idd['image']);
            }
        }
        $this->thumbnail->whereIn('id',$allid)->delete();
        return redirect()->to('/product')->with('success','Product Deleted Successfully');
    }
    public function editDeleteThumb($id){

        $data=[
            'categories'  =>$this->category->findAll(),
            'productDetails'=>$this->productModel->find($id),
            'thumbnail'=>$this->thumbnail->where('product_id',$id)->findAll(),
        ];
       return view('admin/products/editdeletethumb',$data);
    }
    function update(){
       $id= $this->request->getPost('id');
       $databaseImage= $this->productModel->find($id);
       $oldImage= $databaseImage['image'];
       $newImage= '';
       $file= $this->request->getFile('image');
       if ($file->getName()){ $newImage='';
           if (file_exists('uploads/products/'.$oldImage)){
               unlink('uploads/products/'.$oldImage);
               $newImage=  $file->getRandomName();
               $file->move('uploads/products/',$newImage);
           }else{ echo "Not Found in Database";}
       }else{
           $newImage = $oldImage;
       }
       $data2=[
           'title'=>$this->request->getPost('title'),
           'price'=>$this->request->getPost('price'),
           'quantity'=>$this->request->getPost('quantity'),
           'cat_id'=>$this->request->getPost('cat_id'),
           'sub_cat_id'=>$this->request->getPost('sub_cat_id'),
           'details'=>$this->request->getPost('details'),
           'added_by'=>session()->get('userid'),
           'image'=>$newImage,
       ];
       $result= $this->productModel->update($id,$data2);
       if ($result){
           return redirect()->to('/product')->with('success','Product Successfully Updated');
       }
    }
    public function uploadProductThumbnail(){
        $id= $this->request->getPost('id');
        $validation= $this->validate([
            'thumbnail' => [
                'uploaded[thumbnail]',
                'mime_in[thumbnail,image/jpg,image/jpeg,image/gif,image/png]',
                'errors' => [
                    'uploaded[thumbnail]' => 'Please select an image.'
                ]
            ],

        ]);
        if (!$validation){
            $data=[
                'categories'  =>$this->category->findAll(),
                'productDetails'=>$this->productModel->find($id),
                'validation'=>$this->validator,
                'thumbnail'=>$this->thumbnail->where('product_id',$id)->findAll(),
            ];
            return view('admin/products/editdeletethumb',$data);
        }
        $thumbnail= $this->request->getFileMultiple('thumbnail');
        if ($thumbnail) {
            foreach ($thumbnail as $tumb) {
                $thumbnailName=  $tumb->getRandomName();
                $tumb->move('uploads/products/thumbnail/',$thumbnailName);
                $data2= [
                    'image'=>$thumbnailName,
                    'product_id'=>$id
                ];

                $this->thumbnail->save($data2);
            }
            $data=[
                'categories'  =>$this->category->findAll(),
                'validation'=>$this->validator,
                'thumbnail'=>$this->thumbnail->where('product_id',$id)->findAll(),

            ];

            return redirect()->to('/product')->with('success','Thumbnail Successfully Updated');
        }
    }
    public function productDeleteThumbnail(){
        $id= $this->request->getPost('id');
        $query = $this->thumbnail->find($id);
        $filename= $query['image'];
        if (file_exists('uploads/products/thumbnail/'.$filename)){
            unlink('uploads/products/thumbnail/'.$filename);
        }

        $this->thumbnail->delete(['id'=>$id]);
        return 'done';
    }
}