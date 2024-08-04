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
                        <form id="finalprojects-member_add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="{{ route('finalprojects.member_add_store') }}" method="post">
                            @csrf
                            <div>
                                <input id="ctrl-user_id" data-field="user_id"  value="{{auth()->user()->id}}" type="hidden" placeholder="Enter User Id" list="user_id_list"  name="user_id"  data-url="componentsdata/finalprojects_user_id_value_exist/" data-loading-msg="Checking availability ..." data-available-msg="Available" data-unavailable-msg="Not available" class="form-control  ctrl-check-duplicate" />
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
                                <div class="check-status"></div>
                                <input id="ctrl-level_id" data-field="level_id"  value="{{auth()->user()->id}}" type="hidden" placeholder="Enter Level Id" list="level_id_list"  name="level_id"  class="form-control " />
                                <datalist id="level_id_list">
                                <?php 
                                    $options = $comp_model->level_id_option_list() ?? [];
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
                                            <label class="control-label" for="topic1">Propose Topic1 <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-topic1-holder" class=" ">
                                                <input id="ctrl-topic1" data-field="topic1"  value="<?php echo get_value('topic1') ?>" type="text" placeholder="Enter Propose Topic1"  required="" name="topic1"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="topic2">Propose Topic2 </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-topic2-holder" class=" ">
                                                <input id="ctrl-topic2" data-field="topic2"  value="<?php echo get_value('topic2') ?>" type="text" placeholder="Enter Propose Topic2"  name="topic2"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="topic3">Propose Topic3 </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-topic3-holder" class=" ">
                                                <input id="ctrl-topic3" data-field="topic3"  value="<?php echo get_value('topic3') ?>" type="text" placeholder="Enter Propose Topic3"  name="topic3"  class="form-control " />
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
