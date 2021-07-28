<?php
namespace App\Models;
use CodeIgniter\Model;

class ProductModel extends Model{
    protected $table= 'products';
    protected $primaryKey= "id";
    protected $allowedFields= ['cat_id','sub_cat_id','title','details','price','quantity','image','added_by'];

}
