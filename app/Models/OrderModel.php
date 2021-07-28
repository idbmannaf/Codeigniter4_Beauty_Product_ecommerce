<?php
namespace App\Models;
use CodeIgniter\Model;

class OrderModel extends Model{
    protected $table= 'orders';
    protected $primaryKey= "id";
    protected $allowedFields= ['total','discount','subtotal','order_status','payment_status','user_id','invoice_id'];

}
