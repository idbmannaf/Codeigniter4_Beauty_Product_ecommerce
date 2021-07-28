<?php echo $this->extend("front/layout/main") ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-2">
        <ul>
            <li class="<?php echo basename(base_url(uri_string()))=="my-order"? 'active-nav':''?>"><a href="<?php echo base_url('/my-order')?>">My Order</a></li>
            <li class="<?php echo basename(base_url(uri_string()))=="wishlist"? 'active-nav':''?>"><a href="<?php echo base_url('/wishlist')?>">My Wishlist</a></li>
            <li class="<?php echo basename(base_url(uri_string()))=="edit-profile"? 'active-nav':''?>" ><a href="<?php echo base_url('/edit-profile')?>">Edit Profile</a></li>
        </ul>
    </div>
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="text-center">My Profile</h3></div>
            <div class="panel-body">
                <?php
                $user_id= session()->get('userid');
                $userModel= new \App\Models\UserModel();
                $user_data= $userModel->where('id',$user_id)->get()->getRow();
                $user_details_Model= new \App\Models\UserDetailsModel();
                $user_details= $user_details_Model->where('user_id',$user_id)->get()->getRow();
                ?>
                <table class="table table-striped">
                    <tr>
                        <td colspan="2" class="text-center"><p class="text-center">
                                <?php
                                if (!$user_details->image){
                                    echo '<img class="rounded-circle profile_image" src="'.base_url("uploads/profile_pic/demo.png").'"/>';
                                }else{
                                    echo '<img class="rounded-circle profile_image" src="'.base_url("uploads/profile_pic/")."/".$user_details->image.'"/>';
                                }
                                ?>
                            </p></td>
                    </tr>
                    <tr>
                        <th><b>Name:</b> </th>
                        <td><?php echo $user_data->name;?></td>
                    </tr>
                    <tr>
                        <th><b>Display Name:</b> </th>
                        <td><?php echo $user_details->display_name?? '';?></td>
                    </tr>
                    <tr>
                        <th><b>Email:</b> </th>
                        <td><?php echo $user_data->email;?></td>
                    </tr>
                    <tr>
                        <th><b>Phone:</b> </th>
                        <td><?php echo $user_details->phone?? '';?></td>
                    </tr>
                    <tr>
                        <th><b>Country:</b> </th>
                        <td>
                            <?php
                            if ($user_details->country_id){
                                $country_model= new \App\Models\CountryModel();
                                echo $country_model->where('id',$user_details->country_id)->get()->getRow()->name;
                            }else{
                                echo '';
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th><b>State:</b> </th>
                        <td>
                            <?php
                            if ($user_details->state_id){
                                $country_model= new \App\Models\StateModel();
                                echo $country_model->where('id',$user_details->state_id)->get()->getRow()->name;
                            }else{
                                echo '';
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th><b>City:</b> </th>
                        <td>
                            <?php
                            if ($user_details->city_id){
                                $country_model= new \App\Models\CityModel();
                                echo $country_model->where('id',$user_details->city_id)->get()->getRow()->name;
                            }else{
                                echo '';
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th><b>Address:</b> </th>
                        <td><?php echo $user_details->address?? '';?></td>
                    </tr>
                    <tr>
                        <th><b>About:</b> </th>
                        <td><?php echo $user_details->about?? '';?></td>
                    </tr>
                    <tr>
                        <th><b>Verify Status:</b> </th>
                        <td><?php echo $user_data->status==1 ? '<span class="text-success">Verified</span>' : '<span class="text-danger">Unverified</span>';?></td>
                    </tr>
                </table>
            </div>
            <div class="panel-footer">
                <p> <b>Account Opened</b> <?php echo \Carbon\Carbon::parse($user_data->created_at)->format('Y-m-d');?></p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>

<?= $this->endSection() ?>
