<?php
namespace App\Models;
use CodeIgniter\Model;

class OrderBillingDetails extends Model{
    protected $table= 'order_billing_details';
    protected $primaryKey= "id";
    protected $allowedFields= ['order_id','name','email','phone','company','country_id','state_id','city_id','address','postcode','massage'];

}
