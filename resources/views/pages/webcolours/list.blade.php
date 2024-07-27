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
    $pageTitle = "Web Colours"; //set dynamic page title
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
                <div class="col-md-4 comp-grid " >
                    <div class="">
                        <div class="h5 font-weight-bold">Edit Website</div>
                    </div>
                </div>
                <div class="col-md-3  " >
                    <a  class="btn btn-primary btn-block" href="<?php print_link("webcolours/index") ?>" >
                    <i class="material-icons ">refresh</i>                              
                    Refresh 
                </a>
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
            <div class="col-md-3 comp-grid " >
                <?php $menu_id = "menu-" . random_str(); ?>
                <div class="card mb-3 p-3 " >
                    <nav class="navbar navbar-expand-lg navbar-light">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $menu_id ?>" aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    </nav>  
                    <div class="collapse collapse-lg" id="<?php echo $menu_id ?>">
                    <ul class="nav nav-tabs flex-column">
                        <li class="nav-item"><a class="nav-link" href="<?php print_link("webcolours/index") ?>"><i class="material-icons ">playlist_add_check</i> Website Colour </a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php print_link("webtopbars/edit/1") ?>"><i class="material-icons ">playlist_add_check</i> Website Topbar </a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php print_link("webheaders/edit/1") ?>"><i class="material-icons ">playlist_add_check</i> Website Header </a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php print_link("websliders/index") ?>"><i class="material-icons ">playlist_add_check</i> Website Slider </a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php print_link("webvissions/index") ?>"><i class="material-icons ">playlist_add_check</i> Mission & Vission </a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php print_link("webctas/edit/1") ?>"><i class="material-icons ">playlist_add_check</i> Call to Action </a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php print_link("webabouts/edit/1") ?>"><i class="material-icons ">playlist_add_check</i> About Us </a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php print_link("webcounters/index") ?>"><i class="material-icons ">playlist_add_check</i> Counter </a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php print_link("webbenefits/index") ?>"><i class="material-icons ">playlist_add_check</i> Benefit </a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php print_link("webresources/index") ?>"><i class="material-icons ">playlist_add_check</i> Website Resources </a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php print_link("webregistrations/edit/1") ?>"><i class="material-icons ">playlist_add_check</i> Registration Instruction </a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php print_link("webevents/index") ?>"><i class="material-icons ">playlist_add_check</i> Website Event </a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php print_link("webtestimonials/index") ?>"><i class="material-icons ">playlist_add_check</i> Testimonials </a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php print_link("webexcos/index") ?>"><i class="material-icons ">playlist_add_check</i> Executive Pictures </a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php print_link("webgalleries/index") ?>"><i class="material-icons ">playlist_add_check</i> Gallery </a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php print_link("webcontacts/edit/1") ?>"><i class="material-icons ">playlist_add_check</i> Contact Section </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col comp-grid " >
            <div  class=" page-content" >
                <div id="webcolours-list-records">
                    <div id="page-main-content" class="table-responsive">
                        <?php Html::page_bread_crumb("/webcolours/", $field_name, $field_value); ?>
                        <?php Html::display_page_errors($errors); ?>
                        <div class="filter-tags mb-2">
                            <?php Html::filter_tag('search', __('Search')); ?>
                        </div>
                        <table class="table table-hover table-striped table-sm text-left">
                            <thead class="table-header ">
                                <tr>
                                    <th class="td-name" > Name</th>
                                    <th class="td-colour" > Colour</th>
                                    <th class="td-updated_at" > Last Update</th>
                                    <th class="td-updated_by" > Updated By</th>
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
                                    <td class="td-name">
                                        <?php echo  $data['name'] ; ?>
                                    </td>
                                    <td class="td-colour"><input type="color" value="<?php echo $data['colour']; ?>" /></td>
                                    <td class="td-updated_at">
                                        <?php echo  $data['updated_at'] ; ?>
                                    </td>
                                    <td class="td-updated_by">
                                        <a size="sm" class="btn btn-sm btn btn-secondary page-modal" href="<?php print_link("users/view/$data[updated_by]?subpage=1") ?>">
                                        <?php echo $data['users_lastname'] ?>
                                    </a>
                                </td>
                                <!--PageComponentEnd-->
                                <td class="td-btn">
                                    <a class="btn btn-sm btn-success has-tooltip page-modal"    href="<?php print_link("webcolours/edit/$rec_id"); ?>" >
                                    <i class="material-icons">edit</i> Edit
                                </a>
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
                        <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("webcolours/delete/{sel_ids}"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
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
