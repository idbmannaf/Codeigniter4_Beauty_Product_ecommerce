<?php

namespace App\Controllers;

use App\Libraries\Hash;
use App\Models\UserModel;
use CodeIgniter\Model;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;

//use App\Libraries\Hash;
class Dashboard extends BaseController
{
    private $UserModel;
    protected $Category;
    protected $Products;
    protected $SubCategory;
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->Category= new CategoryModel();
        $this->Products= new ProductModel();
        $this->SubCategory= new SubCategoryModel();
        helper(['url', 'form']);
    }

    public function index()
    {
        $userModel = new UserModel();
        $user_id = session()->get('userid');
        $user_info = $userModel->find($user_id);
        session()->set('username', $user_info['name']);
        $user= $this->UserModel->countAllResults();
        $data = [
            'title' => "Dashboard",
            'user_info' => $user_info,
            'user_logged' => session()->get('userid'),
            'userCount'=>$this->UserModel->countAllResults(),
            'totalSubCat'=>$this->SubCategory->countAllResults(),
            'totalProduct'=>$this->Products->countAllResults(),
            'totalCat'=>$this->Category->countAllResults(),

        ];
        //        $current_user= session()->set('current_user',$data);
        return view('dashboard/index', $data);
    }
    /**
     * ALl Users Control
     */
    public function users()
    {
        $users = $this->UserModel->orderBy('id', 'DESC')->paginate(10, "group1");
        //        $users= $this->UserModel->paginate(1);
        $data = [
            'users' => $users,
            'pager' => $this->UserModel->pager,
        ];
        return view('admin/users', $data);
    }


    public function view($id)
    {
        //        echo $id;
        $user = $this->UserModel->find($id);
        $data = [
            'user' => $user
        ];
        return view('admin/view', $data);
    }


    public function add()
    {

        return view('admin/add');
    }


    public function save()
    {
        /**
         * Custom Validation
         */
        $validation = $this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your full name is required'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'Your email is required',
                    'valid_email' => "You must enter a valid email",
                    'is_unique' => 'Email already taken'
                ]

            ],
            'password' => [
                'rules' => 'required|min_length[5]|max_length[12]',
                'errors' => [
                    'required' => 'Password is Required',
                    'min_length' => "Password must have atlases 5 character is length",
                    'max_length' => "Password must not have character more then 5 length"
                ]
            ],
            'cpassword' => [
                'rules' => 'required|min_length[5]|max_length[12]|matches[password]',
                'errors' => [
                    'required' => 'Confirmation Password is Required',
                    'matches' => "Password Dose Not Match",
                    'min_length' => "confirmation password must have atlases 5 character is length",
                    'max_length' => "confirmation password must not have character more then 5 length"
                ]
            ],
            'role' => 'required'
        ]);


        if (!$validation) {
            return view('admin/add', ['validation' => $this->validator]);
        } else {
            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $role = $this->request->getPost('role');
            $values = [
                'name' => $name,
                'email' => $email,
                //               'password'=>$password,
                'password' => Hash::make($password),
                'role' => $role
            ];
            $userModel = new UserModel();
            $query = $userModel->insert($values);
            if (!$query) {
                return redirect()->back()->with('fail', 'Something went wrong');
            } else {
                return redirect()->to('/users')->with('success', 'User successfully added');
            }
        }
    }
    public function edit($id)
    {
        $single_user = $this->UserModel->find($id);
        $data = [
            'single_user' => $single_user
        ];
        return view('admin/update', $data);
    }
    public function update()
    {
        $id = $this->request->getPost('id');
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $role = $this->request->getPost('role');

        $data = [
            'name' =>  $name,
            'email' =>  $email,
            'role' => $role
        ];
        $success = $this->UserModel->update($id, $data);
        if (!$success) {
            return redirect()->back()->with('fail', "Something Wrong");
        } else {
            return redirect()->to('/users')->with('success', "User Updated Successfully");
        }


        //        $validation= $this->validate([
        //            'name'=>[
        //                'rules'=>'required',
        //                'errors'=>[
        //                    'required'=>'Your full name is required'
        //                ]
        //            ],
        //            'email'=>[
        //                'rules'=>'required|valid_email|is_unique[users.email]',
        //                'errors'=>[
        //                    'required'=>'Your email is required',
        ////                    'valid_email'=>"You must enter a valid email",
        ////                    'is_unique'=> 'Email already taken'
        //                ]
        //
        //            ],
        //            'role'=>'required'
        //        ]);
        //        if (!$validation){
        //            return view('admin/update',['validation'=>$this->validator]);
        //        }else{
        //            $id= $this->request->getPost('id');
        //            $name= $this->request->getPost('name');
        //            $email= $this->request->getPost('email');
        //            $role= $this->request->getPost('role');
        //            $data=[
        //              'name'=>  $name,
        //              'email'=>  $email,
        //               'role'=>$role
        //            ];
        //            $success= $this->UserModel->update($id,$data);
        //            if (!$success){
        //                return redirect()->back()->with('fail',"Something Wrong");
        //            }else{
        //                return redirect()->to('/users')->with('success',"User Updated Successfully");
        //            }
        //        }

    }
    public function delete($id)
    {
        $this->UserModel->delete(array('id' => $id));
        return redirect()->to('/users')->with('success', "User Deleted Successfully");
    }
}
