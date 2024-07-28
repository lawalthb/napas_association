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
                        <div class="h5 font-weight-bold text-primary">Add New User</div>
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
                        <form id="users-add-form"  novalidate role="form" enctype="multipart/form-data" class="form multi-form page-form" action="{{ route('users.store') }}" method="post" >
                            @csrf
                            <div>
                                <table class="table table-striped table-sm" data-maxrow="10" data-minrow="1">
                                    <thead>
                                        <tr>
                                            <th class="bg-light"><label for="firstname">Firstname</label></th>
                                            <th class="bg-light"><label for="email">Email</label></th>
                                            <th class="bg-light"><label for="password">Password</label></th>
                                            <th class="bg-light"><label for="phone">Phone</label></th>
                                            <th class="bg-light"><label for="image">Image</label></th>
                                            <th class="bg-light"><label for="level_id">Level Id</label></th>
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
                                    <div id="ctrl-firstname-row<?php echo $row; ?>-holder" class=" ">
                                    <input id="ctrl-firstname-row<?php echo $row; ?>" data-field="firstname"  value="<?php echo get_value('firstname') ?>" type="text" placeholder="Enter Firstname"  required="" name="row[<?php echo $row ?>][firstname]"  data-url="componentsdata/users_firstname_value_exist/" data-loading-msg="Checking availability ..." data-available-msg="Available" data-unavailable-msg="Not available" class="form-control  ctrl-check-duplicate" />
                                    <div class="check-status"></div> 
                                </div>
                            </td>
                            <td>
                                <div id="ctrl-email-row<?php echo $row; ?>-holder" class=" ">
                                <input id="ctrl-email-row<?php echo $row; ?>" data-field="email"  value="<?php echo get_value('email') ?>" type="email" placeholder="Enter Email"  required="" name="row[<?php echo $row ?>][email]"  data-url="componentsdata/users_email_value_exist/" data-loading-msg="Checking availability ..." data-available-msg="Available" data-unavailable-msg="Not available" class="form-control  ctrl-check-duplicate" />
                                <div class="check-status"></div> 
                            </div>
                        </td>
                        <td>
                            <div id="ctrl-password-row<?php echo $row; ?>-holder" class="input-group ">
                            <input id="ctrl-password-row<?php echo $row; ?>" data-field="password"  value="<?php echo get_value('password') ?>" type="password" placeholder="Enter Password"  required="" name="row[<?php echo $row ?>][password]"  class="form-control  password password-strength" />
                            <button type="button" class="btn btn-outline-secondary btn-toggle-password">
                            <i class="material-icons">visibility</i>
                            </button>
                        </div>
                    </td>
                    <td>
                        <div id="ctrl-confirm_password-row<?php echo $row; ?>-holder" class="input-group ">
                        <input id="ctrl-password-row<?php echo $row; ?>-confirm" data-match="#ctrl-password-row<?php echo $row; ?>"  class="form-control password-confirm " type="password" name="confirm_password" required placeholder="Confirm Password" />
                        <button type="button" class="btn btn-outline-secondary btn-toggle-password">
                        <i class="material-icons">visibility</i>
                        </button>
                        <div class="invalid-feedback">
                            Password does not match
                        </div>
                    </div>
                </td>
                <td>
                    <div id="ctrl-phone-row<?php echo $row; ?>-holder" class=" ">
                    <input id="ctrl-phone-row<?php echo $row; ?>" data-field="phone"  value="<?php echo get_value('phone') ?>" type="text" placeholder="Enter Phone"  required="" name="row[<?php echo $row ?>][phone]"  class="form-control " />
                </div>
            </td>
            <td>
                <div id="ctrl-image-row<?php echo $row; ?>-holder" class=" ">
                <div class="dropzone " input="#ctrl-image-row<?php echo $row; ?>" fieldname="image" uploadurl="{{ url('fileuploader/upload/image') }}"    data-multiple="false" dropmsg="Choose files or drop files here"    btntext="Browse" extensions=".jpg,.png,.gif,.jpeg" filesize="3" maximum="1">
                <input name="row[<?php echo $row ?>][image]" id="ctrl-image-row<?php echo $row; ?>" data-field="image" class="dropzone-input form-control" value="<?php echo get_value('image') ?>" type="text"  />
                <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
            </div>
        </div>
    </td>
    <td>
        <div id="ctrl-level_id-row<?php echo $row; ?>-holder" class=" ">
        <select  id="ctrl-level_id-row<?php echo $row; ?>" data-field="level_id" name="row[<?php echo $row ?>][level_id]"  placeholder="Select a value ..."    class="form-select" >
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
