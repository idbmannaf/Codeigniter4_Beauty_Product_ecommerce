<?php
namespace App\Models;
use CodeIgniter\Model;

class Testimonial extends Model{
    protected $table= 'testimonial';
    protected $primaryKey= "id";
    protected $allowedFields= ['name','title','image','details'];

}
