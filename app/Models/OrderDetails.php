<?php
namespace App\Models;
use CodeIgniter\Model;

class OrderDetails extends Model{
    protected $table= 'order_details';
    protected $primaryKey= "id";
    protected $allowedFields= ['order_id','product_id','product_name','product_price','product_quantity','product_image'];

}
