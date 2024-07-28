<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Add New Web Setting"; //set dynamic page title
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
                        <div class="h5 font-weight-bold text-primary">Add New Web Setting</div>
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
                        <form id="websettings-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="{{ route('websettings.store') }}" method="post">
                            @csrf
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="top_bar">Top Bar </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-top_bar-holder" class=" ">
                                                <?php
                                                    $options = Menu::topBar();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    //check if current option is checked option
                                                    $checked = Html::get_field_checked('top_bar', $value, "");
                                                ?>
                                                <label class="form-check form-check-inline">
                                                <input class="form-check-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio"   name="top_bar" />
                                                <span class="form-check-label"><?php echo $label ?></span>
                                                </label>
                                                <?php
                                                    }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="header">Header </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-header-holder" class=" ">
                                                <?php
                                                    $options = Menu::topBar();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    //check if current option is checked option
                                                    $checked = Html::get_field_checked('header', $value, "");
                                                ?>
                                                <label class="form-check form-check-inline">
                                                <input class="form-check-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio"   name="header" />
                                                <span class="form-check-label"><?php echo $label ?></span>
                                                </label>
                                                <?php
                                                    }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="slider">Slider </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-slider-holder" class=" ">
                                                <?php
                                                    $options = Menu::topBar();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    //check if current option is checked option
                                                    $checked = Html::get_field_checked('slider', $value, "");
                                                ?>
                                                <label class="form-check form-check-inline">
                                                <input class="form-check-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio"   name="slider" />
                                                <span class="form-check-label"><?php echo $label ?></span>
                                                </label>
                                                <?php
                                                    }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="vission">Vission </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-vission-holder" class=" ">
                                                <?php
                                                    $options = Menu::topBar();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    //check if current option is checked option
                                                    $checked = Html::get_field_checked('vission', $value, "");
                                                ?>
                                                <label class="form-check form-check-inline">
                                                <input class="form-check-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio"   name="vission" />
                                                <span class="form-check-label"><?php echo $label ?></span>
                                                </label>
                                                <?php
                                                    }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="cta">Cta </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-cta-holder" class=" ">
                                                <?php
                                                    $options = Menu::topBar();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    //check if current option is checked option
                                                    $checked = Html::get_field_checked('cta', $value, "");
                                                ?>
                                                <label class="form-check form-check-inline">
                                                <input class="form-check-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio"   name="cta" />
                                                <span class="form-check-label"><?php echo $label ?></span>
                                                </label>
                                                <?php
                                                    }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="about">About </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-about-holder" class=" ">
                                                <?php
                                                    $options = Menu::topBar();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    //check if current option is checked option
                                                    $checked = Html::get_field_checked('about', $value, "");
                                                ?>
                                                <label class="form-check form-check-inline">
                                                <input class="form-check-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio"   name="about" />
                                                <span class="form-check-label"><?php echo $label ?></span>
                                                </label>
                                                <?php
                                                    }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="count">Count </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-count-holder" class=" ">
                                                <?php
                                                    $options = Menu::topBar();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    //check if current option is checked option
                                                    $checked = Html::get_field_checked('count', $value, "");
                                                ?>
                                                <label class="form-check form-check-inline">
                                                <input class="form-check-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio"   name="count" />
                                                <span class="form-check-label"><?php echo $label ?></span>
                                                </label>
                                                <?php
                                                    }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="benefit">Benefit </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-benefit-holder" class=" ">
                                                <?php
                                                    $options = Menu::topBar();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    //check if current option is checked option
                                                    $checked = Html::get_field_checked('benefit', $value, "");
                                                ?>
                                                <label class="form-check form-check-inline">
                                                <input class="form-check-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio"   name="benefit" />
                                                <span class="form-check-label"><?php echo $label ?></span>
                                                </label>
                                                <?php
                                                    }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="resources">Resources </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-resources-holder" class=" ">
                                                <?php
                                                    $options = Menu::topBar();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    //check if current option is checked option
                                                    $checked = Html::get_field_checked('resources', $value, "");
                                                ?>
                                                <label class="form-check form-check-inline">
                                                <input class="form-check-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio"   name="resources" />
                                                <span class="form-check-label"><?php echo $label ?></span>
                                                </label>
                                                <?php
                                                    }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="registration">Registration </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-registration-holder" class=" ">
                                                <?php
                                                    $options = Menu::topBar();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    //check if current option is checked option
                                                    $checked = Html::get_field_checked('registration', $value, "");
                                                ?>
                                                <label class="form-check form-check-inline">
                                                <input class="form-check-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio"   name="registration" />
                                                <span class="form-check-label"><?php echo $label ?></span>
                                                </label>
                                                <?php
                                                    }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="event">Event </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-event-holder" class=" ">
                                                <?php
                                                    $options = Menu::topBar();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    //check if current option is checked option
                                                    $checked = Html::get_field_checked('event', $value, "");
                                                ?>
                                                <label class="form-check form-check-inline">
                                                <input class="form-check-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio"   name="event" />
                                                <span class="form-check-label"><?php echo $label ?></span>
                                                </label>
                                                <?php
                                                    }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="testimonial">Testimonial </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-testimonial-holder" class=" ">
                                                <?php
                                                    $options = Menu::topBar();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    //check if current option is checked option
                                                    $checked = Html::get_field_checked('testimonial', $value, "");
                                                ?>
                                                <label class="form-check form-check-inline">
                                                <input class="form-check-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio"   name="testimonial" />
                                                <span class="form-check-label"><?php echo $label ?></span>
                                                </label>
                                                <?php
                                                    }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="excos">Excos </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-excos-holder" class=" ">
                                                <?php
                                                    $options = Menu::topBar();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    //check if current option is checked option
                                                    $checked = Html::get_field_checked('excos', $value, "");
                                                ?>
                                                <label class="form-check form-check-inline">
                                                <input class="form-check-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio"   name="excos" />
                                                <span class="form-check-label"><?php echo $label ?></span>
                                                </label>
                                                <?php
                                                    }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="gallery">Gallery </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-gallery-holder" class=" ">
                                                <?php
                                                    $options = Menu::topBar();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    //check if current option is checked option
                                                    $checked = Html::get_field_checked('gallery', $value, "");
                                                ?>
                                                <label class="form-check form-check-inline">
                                                <input class="form-check-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio"   name="gallery" />
                                                <span class="form-check-label"><?php echo $label ?></span>
                                                </label>
                                                <?php
                                                    }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="pricing">Pricing </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-pricing-holder" class=" ">
                                                <?php
                                                    $options = Menu::topBar();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    //check if current option is checked option
                                                    $checked = Html::get_field_checked('pricing', $value, "");
                                                ?>
                                                <label class="form-check form-check-inline">
                                                <input class="form-check-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio"   name="pricing" />
                                                <span class="form-check-label"><?php echo $label ?></span>
                                                </label>
                                                <?php
                                                    }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="faq">Faq </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-faq-holder" class=" ">
                                                <?php
                                                    $options = Menu::topBar();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    //check if current option is checked option
                                                    $checked = Html::get_field_checked('faq', $value, "");
                                                ?>
                                                <label class="form-check form-check-inline">
                                                <input class="form-check-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio"   name="faq" />
                                                <span class="form-check-label"><?php echo $label ?></span>
                                                </label>
                                                <?php
                                                    }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="contact">Contact </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-contact-holder" class=" ">
                                                <?php
                                                    $options = Menu::topBar();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    //check if current option is checked option
                                                    $checked = Html::get_field_checked('contact', $value, "");
                                                ?>
                                                <label class="form-check form-check-inline">
                                                <input class="form-check-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio"   name="contact" />
                                                <span class="form-check-label"><?php echo $label ?></span>
                                                </label>
                                                <?php
                                                    }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="footer">Footer </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-footer-holder" class=" ">
                                                <?php
                                                    $options = Menu::topBar();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    //check if current option is checked option
                                                    $checked = Html::get_field_checked('footer', $value, "");
                                                ?>
                                                <label class="form-check form-check-inline">
                                                <input class="form-check-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio"   name="footer" />
                                                <span class="form-check-label"><?php echo $label ?></span>
                                                </label>
                                                <?php
                                                    }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input id="ctrl-user_id" data-field="user_id"  value="{{auth()->user()->id}}" type="hidden" placeholder="Enter User Id" list="user_id_list"  required="" name="user_id"  class="form-control " />
                                <datalist id="user_id_list">
                                <?php 
                                    $options = $comp_model->updated_by_option_list() ?? [];
                                    foreach($options as $option){
                                    $value = $option->value;
                                    $label = $option->label ?? $value;
                                ?>
                                <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
                                <?php
                                    }
                                ?>
                                </datalist>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="maintenance">Maintenance </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-maintenance-holder" class=" ">
                                                <?php
                                                    $options = Menu::topBar();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    //check if current option is checked option
                                                    $checked = Html::get_field_checked('maintenance', $value, "");
                                                ?>
                                                <label class="form-check form-check-inline">
                                                <input class="form-check-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio"   name="maintenance" />
                                                <span class="form-check-label"><?php echo $label ?></span>
                                                </label>
                                                <?php
                                                    }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="maintenance_text">Maintenance Text </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-maintenance_text-holder" class=" ">
                                                <textarea placeholder="Enter Maintenance Text" id="ctrl-maintenance_text" data-field="maintenance_text"  rows="5" name="maintenance_text" class=" form-control"><?php echo get_value('maintenance_text') ?></textarea>
                                                <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                            </div>
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
