<?php
namespace App\Models;
use CodeIgniter\Model;

class WishlistModel extends Model{
    protected $table= 'wishlist';
    protected $primaryKey= "id";
    protected $allowedFields= ['user_id','product_id'];

}
