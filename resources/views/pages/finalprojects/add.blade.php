<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Add New Final Project"; //set dynamic page title
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
                        <div class="h5 font-weight-bold text-primary">Add New Final Project</div>
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
                        <form id="finalprojects-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="{{ route('finalprojects.store') }}" method="post">
                            @csrf
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="user_id">User Id <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-user_id-holder" class=" ">
                                                <input id="ctrl-user_id" data-field="user_id"  value="<?php echo get_value('user_id') ?>" type="number" placeholder="Enter User Id" step="any"  required="" name="user_id"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="level_id">Level Id <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
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
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="topic1">Topic1 </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-topic1-holder" class=" ">
                                                <input id="ctrl-topic1" data-field="topic1"  value="<?php echo get_value('topic1') ?>" type="text" placeholder="Enter Topic1"  name="topic1"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="topic2">Topic2 </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-topic2-holder" class=" ">
                                                <input id="ctrl-topic2" data-field="topic2"  value="<?php echo get_value('topic2') ?>" type="text" placeholder="Enter Topic2"  name="topic2"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="topic3">Topic3 </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-topic3-holder" class=" ">
                                                <input id="ctrl-topic3" data-field="topic3"  value="<?php echo get_value('topic3') ?>" type="text" placeholder="Enter Topic3"  name="topic3"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="approve_num">Approve Num <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-approve_num-holder" class=" ">
                                                <input id="ctrl-approve_num" data-field="approve_num"  value="<?php echo get_value('approve_num', "0") ?>" type="number" placeholder="Enter Approve Num" step="any"  required="" name="approve_num"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="supervisor_topic">Supervisor Topic </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-supervisor_topic-holder" class=" ">
                                                <input id="ctrl-supervisor_topic" data-field="supervisor_topic"  value="<?php echo get_value('supervisor_topic') ?>" type="text" placeholder="Enter Supervisor Topic"  name="supervisor_topic"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="has_submit">Has Submit <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-has_submit-holder" class=" ">
                                                <select required=""  id="ctrl-has_submit" data-field="has_submit" name="has_submit"  placeholder="Select a value ..."    class="form-select" >
                                                <option value="">Select a value ...</option>
                                                <?php
                                                    $options = Menu::isActive();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    $selected = Html::get_field_selected('has_submit', $value, "");
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
