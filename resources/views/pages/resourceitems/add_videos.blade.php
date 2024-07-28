<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Add New Resource Item"; //set dynamic page title
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
                        <div class="h5 font-weight-bold text-primary">Add New Resource Item</div>
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
                        <form id="resourceitems-add_videos-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="{{ route('resourceitems.add_videos_store') }}" method="post">
                            @csrf
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="category_id">Category <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-category_id-holder" class=" ">
                                                <select required=""  id="ctrl-category_id" data-field="category_id" name="category_id"  placeholder="Select a value ..."    class="form-select" >
                                                <option value="">Select a value ...</option>
                                                <?php 
                                                    $options = $comp_model->resourceitems_category_id_option_list() ?? [];
                                                    foreach($options as $option){
                                                    $value = $option->value;
                                                    $label = $option->label ?? $value;
                                                    $selected = Html::get_field_selected('category_id', $value, "");
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
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="title">Title <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-title-holder" class=" ">
                                                <input id="ctrl-title" data-field="title"  value="<?php echo get_value('title') ?>" type="text" placeholder="Enter Title"  required="" name="title"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="description">Description </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-description-holder" class=" ">
                                                <textarea placeholder="Enter Description" id="ctrl-description" data-field="description"  rows="5" name="description" class=" form-control"><?php echo get_value('description') ?></textarea>
                                                <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="file_path">Video </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-file_path-holder" class=" ">
                                                <div class="dropzone " input="#ctrl-file_path" fieldname="file_path" uploadurl="{{ url('fileuploader/upload/file_path') }}"    data-multiple="false" dropmsg="Choose files or drop files here"    btntext="Browse" extensions=".mp3,.mp4,.webm,.wav,.avi,.mpg,.mpeg" filesize="50" maximum="1">
                                                    <input name="file_path" id="ctrl-file_path" data-field="file_path" class="dropzone-input form-control" value="<?php echo get_value('file_path') ?>" type="text"  />
                                                    <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                    <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="price">Price </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-price-holder" class=" ">
                                                <input id="ctrl-price" data-field="price"  value="<?php echo get_value('price') ?>" type="number" placeholder="Enter Price" step="any"  name="price"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="published">Published <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-published-holder" class=" ">
                                                <?php
                                                    $options = Menu::isActive();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    //check if current option is checked option
                                                    $checked = Html::get_field_checked('published', $value, "Yes");
                                                ?>
                                                <label class="form-check form-check-inline">
                                                <input class="form-check-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio" required=""   name="published" />
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
                                <input id="ctrl-file_type" data-field="file_type"  value="<?php echo get_value('file_type', "videos") ?>" type="hidden" placeholder="Enter File Type" list="file_type_list"  name="file_type"  class="form-control " />
                                <datalist id="file_type_list">
                                <?php
                                    $options = Menu::fileType();
                                    if(!empty($options)){
                                    foreach($options as $option){
                                    $value = $option['value'];
                                    $label = $option['label'];
                                    $selected = Html::get_field_selected('file_type', $value, "videos");
                                ?>
                                <option <?php echo $selected ?> value="<?php echo $value ?>">
                                <?php echo $label ?>
                                </option>
                                <?php
                                    }
                                    }
                                ?>
                                </datalist>
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
