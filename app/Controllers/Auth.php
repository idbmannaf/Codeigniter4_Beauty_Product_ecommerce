<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\UserDetailsModel;
use App\Libraries\Hash;
class Auth extends BaseController
{
    protected $user_details_model;
    public function __construct()
    {
        helper(['url','form']);
        $this->user_details_model= new UserDetailsModel();
    }

    public function index()
    {
        if (session()->has('userid')){
            if (session()->has('admin_logged')){
                return redirect()->to('/dashboard');
            }else{
                return redirect()->to('/');
            }
        }else{
            return view('auth/login');
        }

//        echo base_url('assets/css/bootstrap.min.css');
    }
    public function register(){
        return view('auth/register');
    }
    public function save(){
       //let's Validation Request
//        $validation= $this->validate([
//            'name'=> 'required',
//            'email'=>'required|valid_email|is_unique[users.email]',
//            'password'=> 'required|min_length[5]|max_length[12]',
//            'cpassword'=> 'required|min_length[5]|max_length[12]|matches[password]',
//        ]);
        /**
         * Custom Validation
         */
        $validation= $this->validate([
            'name'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Your full name is required'
                ]
            ],
            'email'=>[
                'rules'=>'required|valid_email|is_unique[users.email]',
                'errors'=>[
                    'required'=>'Your email is required',
                    'valid_email'=>"You must enter a valid email",
                    'is_unique'=> 'Email already taken'
                ]

            ],
            'password'=>[
                'rules'=>'required|min_length[5]|max_length[12]',
                'errors'=>[
                    'required'=>'Password is Required',
                    'min_length'=>"Password must have atlases 5 character is length",
                    'max_length'=>"Password must not have character more then 5 length"
                ]
            ],
            'cpassword'=>[
                'rules'=>'required|min_length[5]|max_length[12]|matches[password]',
                'errors'=>[
                    'required'=>'Confirmation Password is Required',
                    'matches'=>"Password Dose Not Match",
                    'min_length'=>"confirmation password must have atlases 5 character is length",
                    'max_length'=>"confirmation password must not have character more then 5 length"
                ]
            ]
        ]);


        if (!$validation){
            return view('auth/register',['validation'=>$this->validator]);
        }else{
           $name= $this->request->getPost('name');
           $email= $this->request->getPost('email');
           $password= $this->request->getPost('password');
           $values= [
               'name'=>$name,
               'email'=>$email,
//               'password'=>$password,
                'password'=>Hash::make($password)
           ];
           $userModel= new UserModel();
           $query= $userModel->insert($values);
           $this->user_details_model->insert(['user_id'=>$userModel->getInsertID()]);
           if (!$query){
               return redirect()->back()->with('fail','Something went wrong');
//               return redirect()->to('register')->with('fail','Something went wrong');
           }else{
               return redirect()->to('auth/register')->with('success','you are now registered successfully');
//          $last_id= $userModel->getInsertID();
//          session()->set('LoggedUser',$last_id);
//          return redirect()->to('/dashboard')->with('success','you are now registered successfully');
           }
        }
    }
    function check(){
        //Validation start
        $validation=$this->validate([
           'email'=>[
               'rules'=>'required|valid_email|is_not_unique[users.email]',
               'errors'=>[
                   'required'=>"Email is required",
                   'valid_email'=>'Email dose not Valid',
                   'is_not_unique'=>"Email not registered on our service"
               ]
           ],
            'password'=>[
                'rules'=>'required|min_length[5]|max_length[12]',
                'errors'=>[
                    'required'=>'Password is Required',
                    'min_length'=>"Password must have atlases 5 character is length",
                    'max_length'=>"Password must not have character more then 5 length"
                ]
            ]
        ]);
        if (!$validation) {
            return view('auth/login',['validation'=>$this->validator]);
        }else{
           $email= $this->request->getPost('email');
           $password= $this->request->getPost('password');
           $userModel= new UserModel();
           $user_info= $userModel->where('email',$email)->first();
           $check_password= Hash::check($password,$user_info['password']);
           if (!$check_password){
               session()->setFlashdata('fail','Password Incorrect');
               return  redirect()->to('/auth')->withInput();
           }else{

               $user_id= $user_info['id'];
               $role= $user_info['role'];
               session()->set('userid',$user_id);
               if ($role== 0){
                   session()->set('user_logged',true);
               return redirect()->to('/')->with('loginsuccess',"Successfully Logged");
               }elseif ($role== 1){
                   session()->set('admin_logged',true);
                   return redirect()->to('dashboard')->with('loginsuccess',"Successfully Logged");
               }
           }
        }
    }
    public function logout(){
        session()->destroy();
        return redirect()->to('/auth');
    }
}