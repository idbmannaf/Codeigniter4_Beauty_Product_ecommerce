<?php

namespace App\Controllers;

use App\Libraries\Hash;
use App\Models\UserModel;
use App\Models\CommentsModel;
use App\Models\BlogModel;
use CodeIgniter\Model;

class BlogController extends BaseController
{
    protected $blog;
    protected $comment_model;
    public function __construct()
    {
        $this->blog = new BlogModel();
        $this->comment_model= new CommentsModel();
        helper(['url', 'form','cookie','session']);
    }
    public function index(){
        $blog_data=[
            'blogs'=>$this->blog->findAll()
        ];
        return view('front/blog/index',$blog_data);
    }
    public function addBlog(){
    return view('admin/blog/add');
    }
    public function save(){
        $content= htmlentities($this->request->getPost('content'));
        $file= $this->request->getFile('image');
        $imageName= '';
        if ($file->isValid() && !$file->hasMoved()){
            $imageName= $file->getRandomName();
            $file->move('uploads/blog/',$imageName);
        }
        $data= [
            'content'=>$content,
            'title'=>$this->request->getPost('title'),
            'image'=>$imageName,
            'excerpt'=>$this->request->getPost('excerpt'),
            'user_id'=> session()->get('userid')
        ];
        $this->blog->insert($data);
        return redirect()->back()->with('success','Blog Added');
    }
    public function view(){
        $data= [
            'all_blog'=> $this->blog->findAll()
        ];
        return view('admin/blog/index',$data);
    }
    public function singlePost($id){
        $data=[
            'single_post'=>$this->blog->where('id',$id)->get()->getRow(),
            'comment_list'=>$this->comment_model->where("post_id",$id)->findAll(),
            'reletade_posts'=>$this->blog->whereNotIn('id',[$id])->findAll(),
        ];
        return view('front/blog/single-blog',$data);
    }
}