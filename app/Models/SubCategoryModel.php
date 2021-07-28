<?php
namespace App\Models;
use CodeIgniter\Model;

class SubCategoryModel extends Model{
    protected $table= 'sub_categories';
    protected $primaryKey= "id";
    protected $allowedFields= ['name','adde_by','cat_id','details'];

}
