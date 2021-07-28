<?php
namespace App\Models;
use CodeIgniter\Model;

class UserDetailsModel extends Model{
    protected $table= 'user_details';
    protected $primaryKey= "id";
    protected $allowedFields= ['user_id','display_name','phone','country_id','state_id','address','about','image','city_id'];

}
