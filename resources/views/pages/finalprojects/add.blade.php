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
                        <form id="finalprojects-add-form"  novalidate role="form" enctype="multipart/form-data" class="form multi-form page-form" action="{{ route('finalprojects.store') }}" method="post" >
                            @csrf
                            <div>
                                <table class="table table-striped table-sm" data-maxrow="10" data-minrow="1">
                                    <thead>
                                        <tr>
                                            <th class="bg-light"><label for="user_id">User Id</label></th>
                                            <th class="bg-light"><label for="level_id">Level Id</label></th>
                                            <th class="bg-light"><label for="topic1">Topic1</label></th>
                                            <th class="bg-light"><label for="topic2">Topic2</label></th>
                                            <th class="bg-light"><label for="topic3">Topic3</label></th>
                                            <th class="bg-light"><label for="approve_num">Approve Num</label></th>
                                            <th class="bg-light"><label for="supervisor_topic">Supervisor Topic</label></th>
                                            <th class="bg-light"><label for="has_submit">Has Submit</label></th>
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
                                    <div id="ctrl-user_id-row<?php echo $row; ?>-holder" class=" ">
                                    <input id="ctrl-user_id-row<?php echo $row; ?>" data-field="user_id"  value="<?php echo get_value('user_id') ?>" type="number" placeholder="Enter User Id" step="any"  required="" name="row[<?php echo $row ?>][user_id]"  class="form-control " />
                                </div>
                            </td>
                            <td>
                                <div id="ctrl-level_id-row<?php echo $row; ?>-holder" class=" ">
                                <select required=""  id="ctrl-level_id-row<?php echo $row; ?>" data-field="level_id" name="row[<?php echo $row ?>][level_id]"  placeholder="Select a value ..."    class="form-select" >
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
                        <td>
                            <div id="ctrl-topic1-row<?php echo $row; ?>-holder" class=" ">
                            <input id="ctrl-topic1-row<?php echo $row; ?>" data-field="topic1"  value="<?php echo get_value('topic1') ?>" type="text" placeholder="Enter Topic1"  name="row[<?php echo $row ?>][topic1]"  class="form-control " />
                        </div>
                    </td>
                    <td>
                        <div id="ctrl-topic2-row<?php echo $row; ?>-holder" class=" ">
                        <input id="ctrl-topic2-row<?php echo $row; ?>" data-field="topic2"  value="<?php echo get_value('topic2') ?>" type="text" placeholder="Enter Topic2"  name="row[<?php echo $row ?>][topic2]"  class="form-control " />
                    </div>
                </td>
                <td>
                    <div id="ctrl-topic3-row<?php echo $row; ?>-holder" class=" ">
                    <input id="ctrl-topic3-row<?php echo $row; ?>" data-field="topic3"  value="<?php echo get_value('topic3') ?>" type="text" placeholder="Enter Topic3"  name="row[<?php echo $row ?>][topic3]"  class="form-control " />
                </div>
            </td>
            <td>
                <div id="ctrl-approve_num-row<?php echo $row; ?>-holder" class=" ">
                <input id="ctrl-approve_num-row<?php echo $row; ?>" data-field="approve_num"  value="<?php echo get_value('approve_num', "0") ?>" type="number" placeholder="Enter Approve Num" step="any"  required="" name="row[<?php echo $row ?>][approve_num]"  class="form-control " />
            </div>
        </td>
        <td>
            <div id="ctrl-supervisor_topic-row<?php echo $row; ?>-holder" class=" ">
            <input id="ctrl-supervisor_topic-row<?php echo $row; ?>" data-field="supervisor_topic"  value="<?php echo get_value('supervisor_topic') ?>" type="text" placeholder="Enter Supervisor Topic"  name="row[<?php echo $row ?>][supervisor_topic]"  class="form-control " />
        </div>
    </td>
    <td>
        <div id="ctrl-has_submit-row<?php echo $row; ?>-holder" class=" ">
        <select required=""  id="ctrl-has_submit-row<?php echo $row; ?>" data-field="has_submit" name="row[<?php echo $row ?>][has_submit]"  placeholder="Select a value ..."    class="form-select" >
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
