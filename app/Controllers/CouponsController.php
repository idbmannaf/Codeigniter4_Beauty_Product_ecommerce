<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\CouponsModel;
use CodeIgniter\Model;
use Carbon\Carbon;

class CouponsController extends BaseController
{

    protected $coupons;

    public function __construct()
    {
        helper(['form', 'file', 'url', 'cookie', 'text','time']);

        $this->coupons        = new CouponsModel();
    }
    public function index(){
        $data= [
          'coupons_list'=> $this->coupons->findAll()
        ];
        return view('admin/coupons/index',$data);
    }
    public function add(){
        return view('admin/coupons/add');
    }
    public function save(){
        $validation= $this->validate([
           'coupons' =>'required',
            'validity' =>'required',
            'discount'=>[
                'rules'=>'integer',
                'errors'=>[
                  'integer' => ' Value Must be integer'
                ],
            ]
        ]);
        if (!$validation){
            return view('admin/coupons/add',['validation'=>$this->validator]);
        }else{
            $data= [
                'coupons'  => $this->request->getPost('coupons'),
                'discount'  => $this->request->getPost('discount'),
                'validity'  => $this->request->getPost('validity'),
            ];
            $this->coupons->insert($data);
            return redirect()->to('coupons/add')->with('success','Coupons Added Successfully');
        }

    }
    public function delete($id){
        echo $id;
    }



}