<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $field_name = request()->segment(3);
    $field_value = request()->segment(4);
    $total_records = $records->total();
    $limit = $records->perPage();
    $record_count = count($records);
    $academic_session_id_option_list_2 = $comp_model->academic_session_id_option_list_2();
    $pageTitle = "Election Positions"; //set dynamic page title
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page" data-page-type="list" data-page-url="{{ url()->full() }}">
    <?php
        if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3" >
        <div class="container-fluid">
            <div class="row justify-content-between align-items-center gap-3">
                <div class="col  " >
                    <div class="">
                        <div class="h5 font-weight-bold text-primary">Election Positions</div>
                    </div>
                </div>
                <div class="col-auto  " >
                    <a  class="btn btn-primary btn-block" href="<?php print_link("electionpositions/add", true) ?>" >
                    <i class="material-icons">add</i>                               
                    Add New Election Position 
                </a>
            </div>
            <div class="col-md-3  " >
                <!-- Page drop down search component -->
                <form  class="search" action="{{ url()->current() }}" method="get">
                    <input type="hidden" name="page" value="1" />
                    <div class="input-group">
                        <input value="<?php echo get_value('search'); ?>" class="form-control page-search" type="text" name="search"  placeholder="Search" />
                        <button class="btn btn-primary"><i class="material-icons">search</i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    }
?>
<div  class="" >
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-2 col-12 comp-grid " >
                <form method="get" action="" class="form">
                    <div class="card mb-3 p-3 ">
                        <div class="">
                            <div class="fw-bold">Filter by Academic Session</div>
                        </div>
                        <select   name="academic_session_id" class="form-select custom " >
                        <option value="">Select a value ...</option>
                        <?php 
                            $options = $academic_session_id_option_list_2 ?? [];
                            foreach($options as $option){
                            $value = $option->value;
                            $label = $option->label ?? $value;
                            $selected = Html::get_field_selected('academic_session_id', $value);
                        ?>
                        <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                        <?php echo $label; ?>
                        </option>
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                    <hr />
                    <div class="form-group text-center">
                        <button class="btn btn-primary">Filter</button>
                    </div>
                </form>
            </div>
            <div class="col comp-grid " >
                <div  class=" page-content" >
                    <div id="electionpositions-list-records">
                        <div id="page-main-content" class="table-responsive">
                            <?php Html::page_bread_crumb("/electionpositions/", $field_name, $field_value); ?>
                            <?php Html::display_page_errors($errors); ?>
                            <div class="filter-tags mb-2">
                                <?php Html::filter_tag('search', __('Search')); ?>
                                <?php
                                    Html::filter_tag('academic_session_id', 'Academic Session', $academic_session_id_option_list_2);
                                ?>
                            </div>
                            <table class="table table-hover table-striped table-sm text-left">
                                <thead class="table-header ">
                                    <tr>
                                        <th class="td-id" > Id</th>
                                        <th class="td-name" > Name</th>
                                        <th class="td-form_amt" > Form Amt</th>
                                        <th class="td-updated_at" > Updated At</th>
                                        <th class="td-positioning" > Positioning</th>
                                        <th class="td-admin_id" > updateBy</th>
                                        <th class="td-academic_session_id" > Academic Session</th>
                                        <th class="td-btn"></th>
                                    </tr>
                                </thead>
                                <?php
                                    if($total_records){
                                ?>
                                <tbody class="page-data">
                                    <!--record-->
                                    <?php
                                        $counter = 0;
                                        foreach($records as $data){
                                        $rec_id = ($data['id'] ? urlencode($data['id']) : null);
                                        $counter++;
                                    ?>
                                    <tr>
                                        <!--PageComponentStart-->
                                        <td class="td-id">
                                            <a href="<?php print_link("/electionpositions/view/$data[id]") ?>"><?php echo $data['id']; ?></a>
                                        </td>
                                        <td class="td-name">
                                            <span  data-source='<?php print_link('componentsdata/value_option_list'); ?>' 
                                            data-value="<?php echo $data['name']; ?>" 
                                            data-pk="<?php echo $data['id'] ?>" 
                                            data-url="<?php print_link("electionpositions/edit/" . urlencode($data['id'])); ?>" 
                                            data-name="name" 
                                            data-title="Enter Name" 
                                            data-placement="left" 
                                            data-toggle="click" 
                                            data-type="text" 
                                            data-mode="popover" 
                                            data-showbuttons="left" 
                                            class="is-editable" >
                                            <?php echo  $data['name'] ; ?>
                                            </span>
                                        </td>
                                        <td class="td-form_amt">
                                            <span  data-step="any" 
                                            data-source='<?php print_link('componentsdata/value_option_list'); ?>' 
                                            data-value="<?php echo $data['form_amt']; ?>" 
                                            data-pk="<?php echo $data['id'] ?>" 
                                            data-url="<?php print_link("electionpositions/edit/" . urlencode($data['id'])); ?>" 
                                            data-name="form_amt" 
                                            data-title="Enter Form Amt" 
                                            data-placement="left" 
                                            data-toggle="click" 
                                            data-type="number" 
                                            data-mode="popover" 
                                            data-showbuttons="left" 
                                            class="is-editable" >
                                            <?php echo  $data['form_amt'] ; ?>
                                            </span>
                                        </td>
                                        <td class="td-updated_at">
                                            <span title="<?php echo human_datetime($data['updated_at']); ?>" class="has-tooltip">
                                            <?php echo relative_date($data['updated_at']); ?>
                                            </span>
                                        </td>
                                        <td class="td-positioning">
                                            <span  data-step="any" 
                                            data-source='<?php print_link('componentsdata/value_option_list'); ?>' 
                                            data-value="<?php echo $data['positioning']; ?>" 
                                            data-pk="<?php echo $data['id'] ?>" 
                                            data-url="<?php print_link("electionpositions/edit/" . urlencode($data['id'])); ?>" 
                                            data-name="positioning" 
                                            data-title="Enter Positioning" 
                                            data-placement="left" 
                                            data-toggle="click" 
                                            data-type="number" 
                                            data-mode="popover" 
                                            data-showbuttons="left" 
                                            class="is-editable" >
                                            <?php echo  $data['positioning'] ; ?>
                                            </span>
                                        </td>
                                        <td class="td-admin_id">
                                            <a size="sm" class="btn btn-sm btn btn-secondary page-modal" href="<?php print_link("users/view/$data[admin_id]?subpage=1") ?>">
                                            <?php echo $data['users_lastname'] ?>
                                        </a>
                                    </td>
                                    <td class="td-academic_session_id">
                                        <a size="sm" class="btn btn-sm btn btn-secondary page-modal" href="<?php print_link("academicsessions/view/$data[academic_session_id]?subpage=1") ?>">
                                        <?php echo $data['academicsessions_session_name'] ?>
                                    </a>
                                </td>
                                <!--PageComponentEnd-->
                                <td class="td-btn">
                                    <div class="dropdown" >
                                        <button data-bs-toggle="dropdown" class="dropdown-toggle btn text-primary btn-flat btn-sm">
                                        <i class="material-icons">menu</i> 
                                        </button>
                                        <ul class="dropdown-menu">
                                            <a class="dropdown-item "   href="<?php print_link("electionpositions/view/$rec_id"); ?>" >
                                            <i class="material-icons">visibility</i> View
                                        </a>
                                        <a class="dropdown-item "   href="<?php print_link("electionpositions/edit/$rec_id"); ?>" >
                                        <i class="material-icons">edit</i> Edit
                                    </a>
                                    <a class="dropdown-item record-delete-btn" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal" href="<?php print_link("electionpositions/delete/$rec_id"); ?>" >
                                    <i class="material-icons">delete_sweep</i> Delete
                                </a>
                            </ul>
                        </div>
                    </td>
                </tr>
                <?php 
                    }
                ?>
                <!--endrecord-->
            </tbody>
            <tbody class="search-data"></tbody>
            <?php
                }
                else{
            ?>
            <tbody class="page-data">
                <tr>
                    <td class="bg-light text-center text-muted animated bounce p-3" colspan="1000">
                        <i class="material-icons">block</i> No record found
                    </td>
                </tr>
            </tbody>
            <?php
                }
            ?>
        </table>
    </div>
    <?php
        if($show_footer){
    ?>
    <div class=" mt-3">
        <div class="row align-items-center justify-content-between">    
            <div class="col-md-auto d-flex">    
                <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("electionpositions/delete/{sel_ids}"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
                <i class="material-icons">delete_sweep</i> Delete Selected
                </button>
            </div>
            <div class="col">   
                <?php
                    if($show_pagination == true){
                    $pager = new Pagination($total_records, $record_count);
                    $pager->show_page_count = false;
                    $pager->show_record_count = true;
                    $pager->show_page_limit =false;
                    $pager->limit = $limit;
                    $pager->show_page_number_list = true;
                    $pager->pager_link_range=5;
                    $pager->render();
                    }
                ?>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
</div>
</div>
</div>
</div>
</div>
</div>
</section>


@endsection
