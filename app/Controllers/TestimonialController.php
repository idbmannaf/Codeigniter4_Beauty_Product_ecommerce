<?php
namespace App\Controllers;
use App\Controllers\BaseController;

use App\Models\Testimonial;
use CodeIgniter\Model;

class TestimonialController extends BaseController
{
    protected $testimonial;

    public function __construct()
    {
        $this->testimonial  = new \App\Models\Testimonial();
    }
    public function index(){
        $data=[
            'testimonial_data'=>$this->testimonial->paginate(5,'group1'),
            'pager'=>$this->testimonial->pager
        ];
      return view('admin/testimonial/index',$data);
    }
}