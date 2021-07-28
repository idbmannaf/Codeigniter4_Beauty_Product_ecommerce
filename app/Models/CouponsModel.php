<?php
namespace App\Models;
use CodeIgniter\Model;

class CouponsModel extends Model{
    protected $table= 'coupons';
    protected $primaryKey= "id";
    protected $allowedFields= ['coupons','discount','validity'];

}
