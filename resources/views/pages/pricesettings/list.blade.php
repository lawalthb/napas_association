<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    //check if current user role is allowed access to the pages
    $can_add = $user->canAccess("pricesettings/add");
    $can_edit = $user->canAccess("pricesettings/edit");
    $can_view = $user->canAccess("pricesettings/view");
    $can_delete = $user->canAccess("pricesettings/delete");
    $field_name = request()->segment(3);
    $field_value = request()->segment(4);
    $total_records = $records->total();
    $limit = $records->perPage();
    $record_count = count($records);
    $pageTitle = "Price Settings"; //set dynamic page title
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
                        <div class="h5 font-weight-bold text-primary">Price Settings</div>
                    </div>
                </div>
                <div class="col-auto  " >
                    <?php if($can_add){ ?>
                    <a  class="btn btn-primary btn-block" href="<?php print_link("pricesettings/add", true) ?>" >
                    <i class="material-icons">add</i>                               
                    Add New Price Setting 
                </a>
                <?php } ?>
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
            <div class="col comp-grid " >
                <div  class=" page-content" >
                    <div id="pricesettings-list-records">
                        <div id="page-main-content" class="table-responsive">
                            <?php Html::page_bread_crumb("/pricesettings/", $field_name, $field_value); ?>
                            <?php Html::display_page_errors($errors); ?>
                            <div class="filter-tags mb-2">
                                <?php Html::filter_tag('search', __('Search')); ?>
                            </div>
                            <table class="table table-hover table-striped table-sm text-left">
                                <thead class="table-header ">
                                    <tr>
                                        <?php if($can_delete){ ?>
                                        <th class="td-checkbox">
                                        <label class="form-check-label">
                                        <input class="toggle-check-all form-check-input" type="checkbox" />
                                        </label>
                                        </th>
                                        <?php } ?>
                                        <th class="td-id" > Id</th>
                                        <th class="td-accademic_session_id" > Accademic Session</th>
                                        <th class="td-level_id" > Level</th>
                                        <th class="td-name" > Name</th>
                                        <th class="td-amount" > Amount</th>
                                        <th class="td-updated_at" > Updated@</th>
                                        <th class="td-updated_by" > UpdatedBy</th>
                                        <th class="td-is_active" > IsActive</th>
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
                                        <?php if($can_delete){ ?>
                                        <td class=" td-checkbox">
                                            <label class="form-check-label">
                                            <input class="optioncheck form-check-input" name="optioncheck[]" value="<?php echo $data['id'] ?>" type="checkbox" />
                                            </label>
                                        </td>
                                        <?php } ?>
                                        <!--PageComponentStart-->
                                        <td class="td-id">
                                            <a href="<?php print_link("/pricesettings/view/$data[id]") ?>"><?php echo $data['id']; ?></a>
                                        </td>
                                        <td class="td-accademic_session_id">
                                            <a size="sm" class="btn btn-sm btn btn-secondary page-modal" href="<?php print_link("academicsessions/view/$data[accademic_session_id]?subpage=1") ?>">
                                            <?php echo $data['academicsessions_session_name'] ?>
                                        </a>
                                    </td>
                                    <td class="td-level_id">
                                        <a size="sm" class="btn btn-sm btn btn-secondary page-modal" href="<?php print_link("levels/view/$data[level_id]?subpage=1") ?>">
                                        <?php echo $data['levels_name'] ?>
                                    </a>
                                </td>
                                <td class="td-name">
                                    <?php echo  $data['name'] ; ?>
                                </td>
                                <td class="td-amount">
                                    <?php echo  $data['amount'] ; ?>
                                </td>
                                <td class="td-updated_at">
                                    <span title="<?php echo human_datetime($data['updated_at']); ?>" class="has-tooltip">
                                    <?php echo relative_date($data['updated_at']); ?>
                                    </span>
                                </td>
                                <td class="td-updated_by">
                                    <a size="sm" class="btn btn-sm btn btn-secondary page-modal" href="<?php print_link("users/view/$data[updated_by]?subpage=1") ?>">
                                    <?php echo $data['users_lastname'] ?>
                                </a>
                            </td>
                            <td class="td-is_active">
                                <?php echo  $data['is_active'] ; ?>
                            </td>
                            <!--PageComponentEnd-->
                            <td class="td-btn">
                                <div class="dropdown" >
                                    <button data-bs-toggle="dropdown" class="dropdown-toggle btn text-primary btn-flat btn-sm">
                                    <i class="material-icons">menu</i> 
                                    </button>
                                    <ul class="dropdown-menu">
                                        <?php if($can_view){ ?>
                                        <a class="dropdown-item "   href="<?php print_link("pricesettings/view/$rec_id"); ?>" >
                                        <i class="material-icons">visibility</i> View
                                    </a>
                                    <?php } ?>
                                    <?php if($can_edit){ ?>
                                    <a class="dropdown-item "   href="<?php print_link("pricesettings/edit/$rec_id"); ?>" >
                                    <i class="material-icons">edit</i> Edit
                                </a>
                                <?php } ?>
                                <?php if($can_delete){ ?>
                                <a class="dropdown-item record-delete-btn" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal" href="<?php print_link("pricesettings/delete/$rec_id"); ?>" >
                                <i class="material-icons">delete_sweep</i> Delete
                            </a>
                            <?php } ?>
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
            <?php if($can_delete){ ?>
            <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("pricesettings/delete/{sel_ids}"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
            <i class="material-icons">delete_sweep</i> Delete Selected
            </button>
            <?php } ?>
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
