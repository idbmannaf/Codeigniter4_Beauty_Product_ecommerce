<?php
namespace App\Models;
use CodeIgniter\Model;

class ThumbnailModel extends Model{
    protected $table= 'thumbnail';
    protected $primaryKey= "id";
    protected $allowedFields= ['image','product_id'];

}
