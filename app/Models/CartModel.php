<?php
namespace App\Models;
use CodeIgniter\Model;

class CartModel extends Model{
    protected $table= 'carts';
    protected $primaryKey= "id";
    protected $allowedFields= ['generated_cart_id','product_id','quantity'];

}
