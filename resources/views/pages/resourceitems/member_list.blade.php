<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    //check if current user role is allowed access to the pages
    $can_add = $user->canAccess("resourceitems/add");
    $can_edit = $user->canAccess("resourceitems/edit");
    $can_view = $user->canAccess("resourceitems/view");
    $can_delete = $user->canAccess("resourceitems/delete");
    $field_name = request()->segment(3);
    $field_value = request()->segment(4);
    $total_records = $records->total();
    $limit = $records->perPage();
    $record_count = count($records);
    $name_option_list = $comp_model->name_option_list();
    $pageTitle = "Resource Items"; //set dynamic page title
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
                        <div class="h5 font-weight-bold text-primary">Resources</div>
                    </div>
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
                <div class="col-md-2 comp-grid " >
                    <form method="get" action="" class="form">
                        <div class="card mb-3 p-3 ">
                            <div class="">
                                <div class="fw-bold">Category</div>
                            </div>
                            <select   name="name" class="form-select custom " >
                            <option value="">Select a value ...</option>
                            <?php 
                                $options = $name_option_list ?? [];
                                foreach($options as $option){
                                $value = $option->value;
                                $label = $option->label ?? $value;
                                $selected = Html::get_field_selected('name', $value);
                            ?>
                            <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                            <?php echo $label; ?>
                            </option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                        <div class="card mb-3 p-3 ">
                            <div class="">
                                <div class="fw-bold">Type</div>
                            </div>
                            <div class="">
                                <?php
                                    $options = Menu::fileType2();
                                    if(!empty($options)){
                                    foreach($options as $option){
                                    $value = $option['value'];
                                    $label = $option['label'];
                                    //check if current option is checked option
                                    $checked = Html::get_field_checked('file_type', $value);
                                ?>
                                <label class="form-check">
                                <input class="form-check-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio" name="file_type"  />
                                <span class="form-check-label"><?php echo $label ?></span>
                                </label>
                                <?php
                                    }
                                    }
                                ?>
                            </div>
                        </div>
                        <hr />
                        <div class="form-group text-center">
                            <button class="btn btn-primary">Filter</button>
                        </div>
                    </form>
                </div>
                <div class="col comp-grid " >
                    <div  class=" page-content" >
                        <div id="resourceitems-member_list-records">
                            <div id="page-main-content" class="table-responsive">
                                <?php Html::page_bread_crumb("/resourceitems/member_list", $field_name, $field_value); ?>
                                <?php Html::display_page_errors($errors); ?>
                                <div class="filter-tags mb-2">
                                    <?php Html::filter_tag('search', __('Search')); ?>
                                    <?php
                                        Html::filter_tag('name', 'Name', $name_option_list);
                                    ?>
                                    <?php
                                        Html::filter_tag('file_type', 'File Type', Menu::fileType2());
                                    ?>
                                </div>
                                <table class="table table-hover table-striped table-sm text-left">
                                    <thead class="table-header ">
                                        <tr>
                                            <th class="td-id" > Id</th>
                                            <th class="td-title" > Title</th>
                                            <th class="td-description" > Description</th>
                                            <th class="td-price" > Price</th>
                                            <th class="td-published" > Published</th>
                                            <th class="td-name" > Categories</th>
                                            <th class="td-file_type" > File Type</th>
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
                                                <a href="<?php print_link("/resourceitems/view/$data[id]") ?>"><?php echo $data['id']; ?></a>
                                            </td>
                                            <td class="td-title">
                                                <?php echo  $data['title'] ; ?>
                                            </td>
                                            <td class="td-description">
                                                <?php echo  $data['description'] ; ?>
                                            </td>
                                            <td class="td-price">
                                                <?php echo  $data['price'] ; ?>
                                            </td>
                                            <td class="td-published">
                                                <?php echo  $data['published'] ; ?>
                                            </td>
                                            <td class="td-resourcecategories_name">
                                                <?php echo  $data['resourcecategories_name'] ; ?>
                                            </td>
                                            <td class="td-file_type">
                                                <?php echo  $data['file_type'] ; ?>
                                            </td>
                                            <!--PageComponentEnd-->
                                            <td class="td-btn">
                                                <?php if($can_view){ ?>
                                                <a class="btn btn-sm btn-primary has-tooltip "    href="<?php print_link("resourceitems/view/$rec_id"); ?>" >
                                                <i class="material-icons">visibility</i> View
                                            </a>
                                            <?php } ?>
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
                                    <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("resourceitems/delete/{sel_ids}"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
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