<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Add New User"; //set dynamic page title
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page" data-page-type="add" data-page-url="{{ url()->full() }}">
    <?php
        if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3 mb-3" >
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-auto  back-btn-col" >
                    <a class="back-btn btn " href="{{ url()->previous() }}" >
                        <i class="material-icons">arrow_back</i>                                
                    </a>
                </div>
                <div class="col  " >
                    <div class="">
                        <div class="h5 font-weight-bold text-primary">Member registration</div>
                    </div>
                </div>
                <div class="col-md-auto comp-grid " >
                    <div class=" ">
                        Already have an account?  <a class="btn btn-primary" href="<?php print_link('') ?>"> Login</a>
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
                        <form id="users-userregister-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-vertical needs-validation" action="{{ route('auth.register_store') }}" method="post">
                            <!--[form-content-start]-->
                            @csrf
                            <div>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="firstname">Firstname <span class="text-danger">*</span></label>
                                        <div id="ctrl-firstname-holder" class=" "> 
                                            <input id="ctrl-firstname" data-field="firstname"  value="<?php echo get_value('firstname') ?>" type="text" placeholder="Enter Firstname"  required="" name="firstname"  class="form-control " />
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="lastname">Lastname </label>
                                        <div id="ctrl-lastname-holder" class=" "> 
                                            <input id="ctrl-lastname" data-field="lastname"  value="<?php echo get_value('lastname') ?>" type="text" placeholder="Enter Lastname"  name="lastname"  class="form-control " />
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="phone">Phone <span class="text-danger">*</span></label>
                                        <div id="ctrl-phone-holder" class=" "> 
                                            <input id="ctrl-phone" data-field="phone"  value="<?php echo get_value('phone') ?>" type="text" placeholder="Enter Phone"  required="" name="phone"  data-url="componentsdata/users_phone_value_exist/" data-loading-msg="Checking availability ..." data-available-msg="Available" data-unavailable-msg="Not available" class="form-control  ctrl-check-duplicate" />
                                            <div class="check-status"></div> 
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="email">Email <span class="text-danger">*</span></label>
                                        <div id="ctrl-email-holder" class=" "> 
                                            <input id="ctrl-email" data-field="email"  value="<?php echo get_value('email') ?>" type="email" placeholder="Enter Email"  required="" name="email"  data-url="componentsdata/users_email_value_exist/" data-loading-msg="Checking availability ..." data-available-msg="Available" data-unavailable-msg="Not available" class="form-control  ctrl-check-duplicate" />
                                            <div class="check-status"></div> 
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="password">Password <span class="text-danger">*</span></label>
                                        <div id="ctrl-password-holder" class="input-group "> 
                                            <input id="ctrl-password" data-field="password"  value="<?php echo get_value('password') ?>" type="password" placeholder="Enter Password"  required="" name="password"  class="form-control  password" />
                                            <button type="button" class="btn btn-outline-secondary btn-toggle-password">
                                            <i class="material-icons">visibility</i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="level_id">Level </label>
                                        <div id="ctrl-level_id-holder" class=" "> 
                                            <select  id="ctrl-level_id" data-field="level_id" name="level_id"  placeholder="Select a value ..."    class="form-select" >
                                            <option value="">Select a value ...</option>
                                            <?php 
                                                $options = $comp_model->level_id_option_list() ?? [];
                                                foreach($options as $option){
                                                $value = $option->value;
                                                $label = $option->label ?? $value;
                                                $selected = Html::get_field_selected('level_id', $value, "");
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
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="matno">Matno </label>
                                        <div id="ctrl-matno-holder" class=" "> 
                                            <input id="ctrl-matno" data-field="matno"  value="<?php echo get_value('matno') ?>" type="text" placeholder="Enter Matno"  name="matno"  class="form-control " />
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="member_type">Member Type <span class="text-danger">*</span></label>
                                        <div id="ctrl-member_type-holder" class=" "> 
                                            <select required=""  id="ctrl-member_type" data-field="member_type" name="member_type"  placeholder="Select a value ..."    class="form-select" >
                                            <option value="">Select a value ...</option>
                                            <?php
                                                $options = Menu::memberType();
                                                if(!empty($options)){
                                                foreach($options as $option){
                                                $value = $option['value'];
                                                $label = $option['label'];
                                                $selected = Html::get_field_selected('member_type', $value, "");
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
                                </div>
                                <div class="form-group ">
                                    <label class="control-label" for="expectation_msg">Expectation Msg </label>
                                    <div id="ctrl-expectation_msg-holder" class=" "> 
                                        <textarea placeholder="Enter Expectation Msg" id="ctrl-expectation_msg" data-field="expectation_msg"  rows="3" name="expectation_msg" class=" form-control"><?php echo get_value('expectation_msg') ?></textarea>
                                        <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                    </div>
                                </div>
                            </div>
                            <div class="form-ajax-status"></div>
                            <!--[form-content-end]-->
                            <!--[form-button-start]-->
                            <div class="form-group form-submit-btn-holder text-center mt-3">
                                <button class="btn btn-primary" type="submit">
                                Submit
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
<!-- Page custom js --><script><!--pageautofill--><!--custom page js--><!--pagejs--></script>
<!-- Page custom css --><style><!--custom page css--><!--pagecss--></style>
@endsection
