<?php

namespace App\Controllers;

use App\Libraries\Hash;
use App\Models\UserModel;
use App\Models\BlogModel;
use App\Models\CommentsModel;
use CodeIgniter\Model;

class CommentController extends BaseController
{
    protected $blog;
    protected $comment_model;
    public function __construct()
    {
        $this->blog = new BlogModel();
        $this->comment_model= new CommentsModel();
        helper(['url', 'form', 'cookie', 'session']);
    }
    public function addComment(){
        $data= [
            'name'=>$this->request->getPost('name'),
            'email'=>$this->request->getPost('email'),
            'massage'=>$this->request->getPost('massage'),
            'post_id'=>$this->request->getPost('post_id'),
            'user_id'=>session()->get('userid'),
        ];
        $this->comment_model->insert($data);
        return redirect()->back()->with('success',"Comment Added Successfully");
    }
}