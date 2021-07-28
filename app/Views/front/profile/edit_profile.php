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
    <?php
    $user_detail_model= new \App\Models\UserDetailsModel();
    $user_details_row= $user_detail_model->where('user_id',session()->get('userid'))->get()->getRow();
    ?>
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="text-center">Update Profile</h3></div>
            <div class="panel-body">
                <form action="<?php echo base_url('/update-profile')?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field()?>
                    <input type="hidden" name="current_user_id" value="<?php echo session()->get('userid')?>">
                    <div class="row">
                        <div class="col-md-12 mb">
                            <label for="display_name">Display Name</label>
                            <input type="text" class="form-control" name="display_name" id="display_name" value="<?php echo $user_details_row->display_name??'';?>">
                        </div>
                        <div class="col-md-6 mb">
                            <label for="phone">Phone No</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $user_details_row->phone??'';?>">
                        </div>
                        <div class="col-md-6 col-12 mb">
                            <label for="country_id">Country</label>
                            <select name="country_id" id="country" class="form-control">
                                <option value="">Select Country</option>
                                <?php
                                $county_model= new \App\Models\CountryModel();
                                $countries = $county_model->findAll();
                                ?>
                                <?php if ($countries):foreach ($countries as $country): ?>
                                    <option <?php  echo $user_details_row->phone==$country['id']?'selected':'' ?> value="<?php echo $country['id']?>"><?php echo $country['name']?></option>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'country_id'):'' ?></span>
                        </div>
                        <div class="col-md-6 col-12 mb">
                            <label for="state_id">State</label>
                            <select class="form-control" name="state_id" id="state"></select>
                        </div>
                        <div class="col-md-6 col-12 mb">
                            <label for="city_id">City</label>
                            <select class="form-control" name="city_id" id="city"></select>
                        </div>
                        <div class="col-md-12 mb">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" id="address" value="<?php echo $user_details_row->address??'';?>">
                        </div>
                        <div class="col-md-12 mb">
                            <label for="about">About</label>
                            <textarea name="about" id="about"  class="form-control" ><?php echo $user_details_row->about??'';?></textarea>
                        </div>
                        <div class="col-md-12 mb">
                            <label for="image">Profile Image</label>
                            <input type="file" name="image">
                            <?php
                            if ($user_details_row->image){
                                echo '<img  width="60px" height="60px" src="'.base_url('uploads/profile_pic/'.$user_details_row->image).'" alt="">';
                            }
                            ?>
                        </div>
                        <div class="col-md-12 mb">
                            <input type="submit" value="Update" class="btn btn-info form-control">
                        </div>

                    </div>
                </form>
            </div>
            <div class="panel-footer">
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
    $(document).ready(function (){
        $("#country").on('change',function (){
            var country= $(this).val();
            $.ajax({
                type:'POST',
                url:'/cuontry-to-state',
                data:{'country_id':country},
                success:function (response){
                    // location.reload();
                    // console.log(response);
                    $("select#state").html(response);

                }
            });
        });

        $('#state').on('change',function (){
            var state_id= $(this).val();
            $.ajax({
                type:'POST',
                url:'/state-to-city',
                data:{'state_id':state_id},
                success:function (response){
                    // location.reload();
                    console.log(response);
                    $("select#city").html(response);

                }
            });
        });
    });
</script>
<?= $this->endSection() ?>
