<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Add New Member"; //set dynamic page title
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page" data-page-type="add" data-page-url="{{ url()->full() }}">
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
                        <div class="h5 font-weight-bold text-primary">Add New Member</div>
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
                        <form id="users-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-vertical needs-validation" action="{{ route('users.store') }}" method="post">
                            @csrf
                            <div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label" for="firstname">Firstname <span class="text-danger">*</span></label>
                                        <div id="ctrl-firstname-holder" class=" "> 
                                            <input id="ctrl-firstname" data-field="firstname"  value="<?php echo get_value('firstname') ?>" type="text" placeholder="Enter Firstname"  required="" name="firstname"  class="form-control " />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label" for="lastname">Lastname <span class="text-danger">*</span></label>
                                        <div id="ctrl-lastname-holder" class=" "> 
                                            <input id="ctrl-lastname" data-field="lastname"  value="<?php echo get_value('lastname') ?>" type="text" placeholder="Enter Lastname"  required="" name="lastname"  class="form-control " />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label" for="nickname">Nickname </label>
                                        <div id="ctrl-nickname-holder" class=" "> 
                                            <input id="ctrl-nickname" data-field="nickname"  value="<?php echo get_value('nickname') ?>" type="text" placeholder="Enter Nickname"  name="nickname"  class="form-control " />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label" for="email">Email <span class="text-danger">*</span></label>
                                        <div id="ctrl-email-holder" class=" "> 
                                            <input id="ctrl-email" data-field="email"  value="<?php echo get_value('email') ?>" type="email" placeholder="Enter Email"  required="" name="email"  data-url="componentsdata/users_email_value_exist/" data-loading-msg="Checking availability ..." data-available-msg="Available" data-unavailable-msg="Not available" class="form-control  ctrl-check-duplicate" />
                                            <div class="check-status"></div> 
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label" for="password">Password <span class="text-danger">*</span></label>
                                        <div id="ctrl-password-holder" class="input-group "> 
                                            <input id="ctrl-password" data-field="password"  value="<?php echo get_value('password') ?>" type="password" placeholder="Enter Password"  required="" name="password"  class="form-control  password" />
                                            <button type="button" class="btn btn-outline-secondary btn-toggle-password">
                                            <i class="material-icons">visibility</i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label" for="confirm_password">Confirm Password <span class="text-danger">*</span></label>
                                        <div id="ctrl-confirm_password-holder" class="input-group "> 
                                            <input id="ctrl-password-confirm" data-match="#ctrl-password"  class="form-control password-confirm " type="password" name="confirm_password" required placeholder="Confirm Password" />
                                            <button type="button" class="btn btn-outline-secondary btn-toggle-password">
                                            <i class="material-icons">visibility</i>
                                            </button>
                                            <div class="invalid-feedback">
                                                Password does not match
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label" for="matno">Matno </label>
                                        <div id="ctrl-matno-holder" class=" "> 
                                            <input id="ctrl-matno" data-field="matno"  value="<?php echo get_value('matno') ?>" type="text" placeholder="Enter Matno"  name="matno"  class="form-control " />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label" for="phone">Phone <span class="text-danger">*</span></label>
                                        <div id="ctrl-phone-holder" class=" "> 
                                            <input id="ctrl-phone" data-field="phone"  value="<?php echo get_value('phone') ?>" type="text" placeholder="Enter Phone"  required="" name="phone"  data-url="componentsdata/users_phone_value_exist/" data-loading-msg="Checking availability ..." data-available-msg="Available" data-unavailable-msg="Not available" class="form-control  ctrl-check-duplicate" />
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
                                    <div class="form-group col-md-6">
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
                                                $selected = Html::get_field_selected('member_type', $value, "Regular");
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
                                            <input id="ctrl-session_start" data-field="session_start" class="form-control datepicker  datepicker"  value="<?php echo get_value('session_start') ?>" type="datetime" name="session_start" placeholder="Enter Session Start" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                            <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label" for="session_end">Session End </label>
                                        <div id="ctrl-session_end-holder" class="input-group "> 
                                            <input id="ctrl-session_end" data-field="session_end" class="form-control datepicker  datepicker"  value="<?php echo get_value('session_end') ?>" type="datetime" name="session_end" placeholder="Enter Session End" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                            <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ajax-status"></div>
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


@endsection
