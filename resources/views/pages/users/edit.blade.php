<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Edit User"; //set dynamic page title
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page" data-page-type="edit" data-page-url="{{ url()->full() }}">
    <?php
        if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3" >
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-auto  back-btn-col" >
                    <a class="back-btn btn " href="{{ url()->previous() }}" >
                        <i class="material-icons">arrow_back</i>                                
                    </a>
                </div>
                <div class="col  " >
                    <div class="">
                        <div class="h5 font-weight-bold text-primary">Edit Member</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
    <div  class="" >
        <div class="container">
            <div class="row ">
                <div class="col-md-9 comp-grid " >
                    <div  class="card card-1 border rounded page-content" >
                        <!--[form-start]-->
                        <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-vertical needs-validation" action="<?php print_link("users/edit/$rec_id"); ?>" method="post">
                        <!--[form-content-start]-->
                        @csrf
                        <div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="firstname">Firstname <span class="text-danger">*</span></label>
                                    <div id="ctrl-firstname-holder" class=" "> 
                                        <input id="ctrl-firstname" data-field="firstname"  value="<?php  echo $data['firstname']; ?>" type="text" placeholder="Enter Firstname"  required="" name="firstname"  class="form-control " />
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="lastname">Lastname <span class="text-danger">*</span></label>
                                    <div id="ctrl-lastname-holder" class=" "> 
                                        <input id="ctrl-lastname" data-field="lastname"  value="<?php  echo $data['lastname']; ?>" type="text" placeholder="Enter Lastname"  required="" name="lastname"  class="form-control " />
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="nickname">Nickname </label>
                                    <div id="ctrl-nickname-holder" class=" "> 
                                        <input id="ctrl-nickname" data-field="nickname"  value="<?php  echo $data['nickname']; ?>" type="text" placeholder="Enter Nickname"  name="nickname"  class="form-control " />
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="matno">Matno </label>
                                    <div id="ctrl-matno-holder" class=" "> 
                                        <input id="ctrl-matno" data-field="matno"  value="<?php  echo $data['matno']; ?>" type="text" placeholder="Enter Matno"  name="matno"  class="form-control " />
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="phone">Phone <span class="text-danger">*</span></label>
                                    <div id="ctrl-phone-holder" class=" "> 
                                        <input id="ctrl-phone" data-field="phone"  value="<?php  echo $data['phone']; ?>" type="text" placeholder="Enter Phone"  required="" name="phone"  data-url="componentsdata/users_phone_value_exist/" data-loading-msg="Checking availability ..." data-available-msg="Available" data-unavailable-msg="Not available" class="form-control  ctrl-check-duplicate" />
                                        <div class="check-status"></div> 
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="level_id">Level <span class="text-danger">*</span></label>
                                    <div id="ctrl-level_id-holder" class=" "> 
                                        <select required=""  id="ctrl-level_id" data-field="level_id" name="level_id"  placeholder="Select a value ..."    class="form-select" >
                                        <option value="">Select a value ...</option>
                                        <?php
                                            $options = $comp_model->level_id_option_list() ?? [];
                                            foreach($options as $option){
                                            $value = $option->value;
                                            $label = $option->label ?? $value;
                                            $selected = ( $value == $data['level_id'] ? 'selected' : null );
                                        ?>
                                        <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                        <?php echo $label; ?>
                                        </option>
                                        <?php
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="member_type">Member Type <span class="text-danger">*</span></label>
                                    <div id="ctrl-member_type-holder" class=" "> 
                                        <select required=""  id="ctrl-member_type" data-field="member_type" name="member_type"  placeholder="Select a value ..."    class="form-select" >
                                        <option value="">Select a value ...</option>
                                        <?php
                                            $options = Menu::memberType();
                                            $field_value = $data['member_type'];
                                            if(!empty($options)){
                                            foreach($options as $option){
                                            $value = $option['value'];
                                            $label = $option['label'];
                                            $selected = Html::get_record_selected($field_value, $value);
                                        ?>
                                        <option <?php echo $selected ?> value="<?php echo $value ?>">
                                        <?php echo $label ?>
                                        </option>                                   
                                        <?php
                                            }
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="is_active">Is Active <span class="text-danger">*</span></label>
                                    <div id="ctrl-is_active-holder" class=" "> 
                                        <select required=""  id="ctrl-is_active" data-field="is_active" name="is_active"  placeholder="Select a value ..."    class="form-select" >
                                        <option value="">Select a value ...</option>
                                        <?php
                                            $options = Menu::isActive();
                                            $field_value = $data['is_active'];
                                            if(!empty($options)){
                                            foreach($options as $option){
                                            $value = $option['value'];
                                            $label = $option['label'];
                                            $selected = Html::get_record_selected($field_value, $value);
                                        ?>
                                        <option <?php echo $selected ?> value="<?php echo $value ?>">
                                        <?php echo $label ?>
                                        </option>                                   
                                        <?php
                                            }
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="session_start">Session Start </label>
                                    <div id="ctrl-session_start-holder" class="input-group "> 
                                        <input id="ctrl-session_start" data-field="session_start" class="form-control datepicker  datepicker"  value="<?php  echo $data['session_start']; ?>" type="datetime" name="session_start" placeholder="Enter Session Start" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                        <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="session_end">Session End </label>
                                    <div id="ctrl-session_end-holder" class="input-group "> 
                                        <input id="ctrl-session_end" data-field="session_end" class="form-control datepicker  datepicker"  value="<?php  echo $data['session_end']; ?>" type="datetime" name="session_end" placeholder="Enter Session End" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                        <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label" for="expectation_msg">Expectation Msg </label>
                                <div id="ctrl-expectation_msg-holder" class=" "> 
                                    <textarea placeholder="Enter Expectation Msg" id="ctrl-expectation_msg" data-field="expectation_msg"  rows="3" name="expectation_msg" class=" form-control"><?php  echo $data['expectation_msg']; ?></textarea>
                                    <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="is_ban">Is Ban <span class="text-danger">*</span></label>
                                    <div id="ctrl-is_ban-holder" class=" "> 
                                        <select required=""  id="ctrl-is_ban" data-field="is_ban" name="is_ban"  placeholder="Select a value ..."    class="form-select" >
                                        <option value="">Select a value ...</option>
                                        <?php
                                            $options = Menu::isActive();
                                            $field_value = $data['is_ban'];
                                            if(!empty($options)){
                                            foreach($options as $option){
                                            $value = $option['value'];
                                            $label = $option['label'];
                                            $selected = Html::get_record_selected($field_value, $value);
                                        ?>
                                        <option <?php echo $selected ?> value="<?php echo $value ?>">
                                        <?php echo $label ?>
                                        </option>                                   
                                        <?php
                                            }
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="fee_paid">Fee Paid <span class="text-danger">*</span></label>
                                    <div id="ctrl-fee_paid-holder" class=" "> 
                                        <select required=""  id="ctrl-fee_paid" data-field="fee_paid" name="fee_paid"  placeholder="Select a value ..."    class="form-select" >
                                        <option value="">Select a value ...</option>
                                        <?php
                                            $options = Menu::isActive();
                                            $field_value = $data['fee_paid'];
                                            if(!empty($options)){
                                            foreach($options as $option){
                                            $value = $option['value'];
                                            $label = $option['label'];
                                            $selected = Html::get_record_selected($field_value, $value);
                                        ?>
                                        <option <?php echo $selected ?> value="<?php echo $value ?>">
                                        <?php echo $label ?>
                                        </option>                                   
                                        <?php
                                            }
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="role">Role <span class="text-danger">*</span></label>
                                    <div id="ctrl-role-holder" class=" "> 
                                        <select required=""  id="ctrl-role" data-field="role" name="role"  placeholder="Select a value ..."    class="form-select" >
                                        <option value="">Select a value ...</option>
                                        <?php
                                            $options = Menu::role();
                                            $field_value = $data['role'];
                                            if(!empty($options)){
                                            foreach($options as $option){
                                            $value = $option['value'];
                                            $label = $option['label'];
                                            $selected = Html::get_record_selected($field_value, $value);
                                        ?>
                                        <option <?php echo $selected ?> value="<?php echo $value ?>">
                                        <?php echo $label ?>
                                        </option>                                   
                                        <?php
                                            }
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="dob">Dob </label>
                                    <div id="ctrl-dob-holder" class="input-group "> 
                                        <input id="ctrl-dob" data-field="dob" class="form-control datepicker  datepicker"  value="<?php  echo $data['dob']; ?>" type="datetime" name="dob" placeholder="Enter Dob" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                        <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label" for="bio">Bio </label>
                                <div id="ctrl-bio-holder" class=" "> 
                                    <textarea placeholder="Enter Bio" id="ctrl-bio" data-field="bio"  rows="3" name="bio" class=" form-control"><?php  echo $data['bio']; ?></textarea>
                                    <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label" for="image">Image </label>
                                <div id="ctrl-image-holder" class=" "> 
                                    <div class="dropzone " input="#ctrl-image" fieldname="image" uploadurl="{{ url('fileuploader/upload/image') }}"    data-multiple="false" dropmsg="Choose files or drop files here"    btntext="Browse" extensions=".jpg,.png,.gif,.jpeg" filesize="3" maximum="1">
                                        <input name="image" id="ctrl-image" data-field="image" class="dropzone-input form-control" value="<?php  echo $data['image']; ?>" type="text"  />
                                        <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                        <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                    </div>
                                </div>
                                <?php Html :: uploaded_files_list($data['image'], '#ctrl-image'); ?>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="control-label" for="facebook_link">Facebook Link </label>
                                    <div id="ctrl-facebook_link-holder" class=" "> 
                                        <input id="ctrl-facebook_link" data-field="facebook_link"  value="<?php  echo $data['facebook_link']; ?>" type="text" placeholder="Enter Facebook Link"  name="facebook_link"  class="form-control " />
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label" for="x_link">X Link </label>
                                    <div id="ctrl-x_link-holder" class=" "> 
                                        <input id="ctrl-x_link" data-field="x_link"  value="<?php  echo $data['x_link']; ?>" type="text" placeholder="Enter X Link"  name="x_link"  class="form-control " />
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label" for="linkedin_link">Linkedin Link </label>
                                    <div id="ctrl-linkedin_link-holder" class=" "> 
                                        <input id="ctrl-linkedin_link" data-field="linkedin_link"  value="<?php  echo $data['linkedin_link']; ?>" type="text" placeholder="Enter Linkedin Link"  name="linkedin_link"  class="form-control " />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label" for="user_role_id">User Role Id </label>
                                <div id="ctrl-user_role_id-holder" class=" "> 
                                    <select  id="ctrl-user_role_id" data-field="user_role_id" name="user_role_id"  placeholder="Select a value ..."    class="form-select" >
                                    <option value="">Select a value ...</option>
                                    <?php
                                        $options = $comp_model->role_id_option_list() ?? [];
                                        foreach($options as $option){
                                        $value = $option->value;
                                        $label = $option->label ?? $value;
                                        $selected = ( $value == $data['user_role_id'] ? 'selected' : null );
                                    ?>
                                    <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                    <?php echo $label; ?>
                                    </option>
                                    <?php
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-ajax-status"></div>
                        <!--[form-content-end]-->
                        <!--[form-button-start]-->
                        <div class="form-group text-center">
                            <button class="btn btn-primary" type="submit">
                            Update
                            <i class="material-icons">send</i>
                            </button>
                        </div>
                        <!--[form-button-end]-->
                    </form>
                    <!--[form-end]-->
                </div>
            </div>
        </div>
    </div>
</div>
</section>


@endsection
