<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Edit Contest Category"; //set dynamic page title
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
                        <div class="h5 font-weight-bold text-primary">Edit Contest Category</div>
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
                        <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-horizontal needs-validation" action="<?php print_link("contestcategories/edit/$rec_id"); ?>" method="post">
                        <!--[form-content-start]-->
                        @csrf
                        <div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="academic_session_id">Academic Session </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-academic_session_id-holder" class=" ">
                                            <select  id="ctrl-academic_session_id" data-field="academic_session_id" name="academic_session_id"  placeholder="Select a value ..."    class="form-select" >
                                            <option value="">Select a value ...</option>
                                            <?php
                                                $options = $comp_model->academic_session_id_option_list() ?? [];
                                                foreach($options as $option){
                                                $value = $option->value;
                                                $label = $option->label ?? $value;
                                                $selected = ( $value == $data['academic_session_id'] ? 'selected' : null );
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
                                        <label class="control-label" for="name">Name <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-name-holder" class=" ">
                                            <input id="ctrl-name" data-field="name"  value="<?php  echo $data['name']; ?>" type="text" placeholder="Enter Name"  required="" name="name"  class="form-control " />
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
                                            <input id="ctrl-price" data-field="price"  value="<?php  echo $data['price']; ?>" type="number" placeholder="Enter Price" step="any"  name="price"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input id="ctrl-updated_by" data-field="updated_by"  value="<?php  echo $data['updated_by']; ?>" type="hidden" placeholder="Enter Updated By" list="updated_by_list"  required="" name="updated_by"  class="form-control " />
                            <datalist id="updated_by_list">
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
                                        <label class="control-label" for="positioning">Positioning <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-positioning-holder" class=" ">
                                            <input id="ctrl-positioning" data-field="positioning"  value="<?php  echo $data['positioning']; ?>" type="number" placeholder="Enter Positioning" step="any"  required="" name="positioning"  class="form-control " />
                                        </div>
                                    </div>
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
