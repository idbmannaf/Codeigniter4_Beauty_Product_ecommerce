<?php
namespace App\Controllers;
use App\Models\UserModel;
use App\Models\UserDetailsModel;
//use App\Libraries\Hash;
class FronendController extends BaseController
{
    protected $user_details_model;
    public function __construct()
    {
        $this->user_details_model = new UserDetailsModel();
        helper(['cookie','form','file']);
    }

    public function index(){
        $userModel= new UserModel();
        $user_id= session()->get('userid');
        $user_info=$userModel->find($user_id);
        $data= [
          'title'=>"Home Page",
          'user_info'=>$user_info
        ];
        return view('frontend/index',$data);
    }
    public function logout(){
        if (session()->has('userid')){
            session()->remove('userid');
            return redirect()->to('auth?access=out')->with('fail','you are Logged out');
        }
    }
    //User Profile
    public function profile(){
        return view('front/profile/userprofile');
    }
    public function editProfile(){
        if ($this->request->getPost('current_user_id')){
//            $file= $this->request->getFile('image');
            $oldImage= $this->user_details_model->where('user_id',$this->request->getPost('current_user_id'))->get()->getRow()->image;

            $file= $this->request->getFile('image');
            $newImage= '';
            if ($file->getName()){
                $newImage='';
                if (file_exists('uploads/profile_pic/'.$oldImage)){
                    unlink('uploads/profile_pic/'.$oldImage);
                    $newImage=  $file->getRandomName();
                    $file->move('uploads/profile_pic/',$newImage);
                }else{ echo "Not Found in Database"; die;}
            }else{
                $newImage = $oldImage;

            }
            $user_details=[
              'display_name'=>$this->request->getPost('display_name'),
                'phone'=>$this->request->getPost('phone'),
                'country_id'=>$this->request->getPost('country_id'),
                'state_id'=>$this->request->getPost('state_id'),
                'city_id'=> $this->request->getPost('city_id'),
                'address'=> $this->request->getPost('address'),
                'about'=> $this->request->getPost('about'),
                'image'=>$newImage
            ];
$current_user_id= $this->request->getPost('current_user_id');
$user_details_id=$this->user_details_model->where('user_id',$current_user_id)->get()->getRow()->id;
            $this->user_details_model->update($user_details_id, $user_details);
            return redirect()->to('/profile')->with('success','Profile Updated Successfully');
        }else {
            return view('front/profile/edit_profile');
        }
    }
    
}