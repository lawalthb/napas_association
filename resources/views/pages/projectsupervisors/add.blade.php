<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Add New Project Supervisor"; //set dynamic page title
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
                        <div class="h5 font-weight-bold text-primary">Add New Project Supervisor</div>
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
                        <form id="projectsupervisors-add-form"  novalidate role="form" enctype="multipart/form-data" class="form multi-form page-form" action="{{ route('projectsupervisors.store') }}" method="post" >
                            @csrf
                            <div>
                                <table class="table table-striped table-sm" data-maxrow="10" data-minrow="1">
                                    <thead>
                                        <tr>
                                            <th class="bg-light"><label for="name">Name</label></th>
                                            <th class="bg-light"><label for="phone">Phone</label></th>
                                            <th class="bg-light"><label for="email">Email</label></th>
                                            <th class="bg-light"><label for="other">Other</label></th>
                                            <th class="bg-light"><label for="is_active">Is Active</label></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="100" class="text-right">
                                        <?php $template_id = "table-row-" . random_str(); ?>
                                        <button type="button" data-template="#<?php echo $template_id ?>" class="btn btn-sm btn-success btn-add-table-row"><i class="material-icons">add</i></button>
                                        </th>
                                    </tr>
                                    </tfoot>
                                </table>
                                <!--[table row template]-->
                                <template id="<?php echo $template_id ?>">
                                <?php $row = "CURRENTROW"; // will be replaced with current row index. ?>
                                <tr data-row="<?php echo $row ?>" class="input-row">
                                <td>
                                    <div id="ctrl-name-row<?php echo $row; ?>-holder" class=" ">
                                    <input id="ctrl-name-row<?php echo $row; ?>" data-field="name"  value="<?php echo get_value('name') ?>" type="text" placeholder="Enter Name"  required="" name="row[<?php echo $row ?>][name]"  class="form-control " />
                                </div>
                            </td>
                            <td>
                                <div id="ctrl-phone-row<?php echo $row; ?>-holder" class=" ">
                                <input id="ctrl-phone-row<?php echo $row; ?>" data-field="phone"  value="<?php echo get_value('phone') ?>" type="text" placeholder="Enter Phone"  required="" name="row[<?php echo $row ?>][phone]"  class="form-control " />
                            </div>
                        </td>
                        <td>
                            <div id="ctrl-email-row<?php echo $row; ?>-holder" class=" ">
                            <input id="ctrl-email-row<?php echo $row; ?>" data-field="email"  value="<?php echo get_value('email') ?>" type="email" placeholder="Enter Email"  name="row[<?php echo $row ?>][email]"  class="form-control " />
                        </div>
                    </td>
                    <td>
                        <div id="ctrl-other-row<?php echo $row; ?>-holder" class=" ">
                        <input id="ctrl-other-row<?php echo $row; ?>" data-field="other"  value="<?php echo get_value('other') ?>" type="text" placeholder="Enter Other"  name="row[<?php echo $row ?>][other]"  class="form-control " />
                    </div>
                </td>
                <td>
                    <div id="ctrl-is_active-row<?php echo $row; ?>-holder" class=" ">
                    <?php
                        $options = Menu::isActive();
                        if(!empty($options)){
                        foreach($options as $option){
                        $value = $option['value'];
                        $label = $option['label'];
                        //check if current option is checked option
                        $checked = Html::get_field_checked('is_active', $value, "Yes");
                    ?>
                    <label class="form-check form-check-inline">
                    <input class="form-check-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio" required=""   name="row[<?php echo $row ?>][is_active]" />
                    <span class="form-check-label"><?php echo $label ?></span>
                    </label>
                    <?php
                        }
                        }
                    ?>
                </div>
            </td>
            <th class="text-center">
            <button type="button" class="btn-close btn-remove-table-row"></button>
            </th>
        </tr>
    </template>
    <!--[/table row template]-->
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
