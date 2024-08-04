<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    //check if current user role is allowed access to the pages
    $can_add = $user->canAccess("finalprojects/add");
    $can_edit = $user->canAccess("finalprojects/edit");
    $can_view = $user->canAccess("finalprojects/view");
    $can_delete = $user->canAccess("finalprojects/delete");
    $field_name = request()->segment(3);
    $field_value = request()->segment(4);
    $total_records = $records->total();
    $limit = $records->perPage();
    $record_count = count($records);
    $pageTitle = "Final Projects"; //set dynamic page title
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
                        <div class="h5 font-weight-bold text-primary">Final Projects</div>
                    </div>
                </div>
                <div class="col-auto  " >
                    <?php if($can_add){ ?>
                    <a  class="btn btn-primary btn-block" href="<?php print_link("finalprojects/add", true) ?>" >
                    <i class="material-icons">add</i>                               
                    Add New Final Project 
                </a>
                <?php } ?>
            </div>
            <div class="col-md-3  " >
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
                    <div id="finalprojects-member_list-records">
                        <?php
                            if($total_records){
                        ?>
                        <div id="page-main-content">
                            <?php Html::page_bread_crumb("/finalprojects/member_list", $field_name, $field_value); ?>
                            <?php Html::display_page_errors($errors); ?>
                            <div class="filter-tags mb-2">
                                <?php Html::filter_tag('search', __('Search')); ?>
                            </div>
                            <div class="row justify-content-start g-0 page-data">
                                <!--record-->
                                <?php
                                    $counter = 0;
                                    foreach($records as $data){
                                    $rec_id = ($data['id'] ? urlencode($data['id']) : null);
                                    $counter++;
                                ?>
                                <!--PageComponentStart-->
                                <div class="col-12">
                                    <div class="bg-light mb-1 card-1 p-2 border rounded">
                                        <div class="p-2">
                                            <span class="text-muted d-inline-block mr-2 d-block">
                                            Propose Topic1
                                            </span>
                                            <?php echo  $data['topic1'] ; ?>
                                        </div>
                                        <div class="p-2">
                                            <span class="text-muted d-inline-block mr-2 d-block">
                                            Propose Topic2
                                            </span>
                                            <?php echo  $data['topic2'] ; ?>
                                        </div>
                                        <div class="p-2">
                                            <span class="text-muted d-inline-block mr-2 d-block">
                                            Propose Topic3
                                            </span>
                                            <?php echo  $data['topic3'] ; ?>
                                        </div>
                                        <div class="p-2">
                                            <span class="text-muted d-inline-block mr-2 d-block">
                                            Approve Num
                                            </span>
                                            <?php echo  $data['approve_num'] ; ?>
                                        </div>
                                        <div class="p-2">
                                            <span class="text-muted d-inline-block mr-2 d-block">
                                            Supervisor Topic
                                            </span>
                                            <?php echo  $data['supervisor_topic'] ; ?>
                                        </div>
                                        <div class="p-2">
                                            <a size="sm" class="btn btn-sm btn btn-secondary page-modal" href="<?php print_link("levels/view/$data[level_id]?subpage=1") ?>">
                                            <?php echo $data['levels_name'] ?>
                                        </a>
                                    </div>
                                    <div class="p-2">
                                        <span class="text-muted d-inline-block mr-2 d-block">
                                        Updated At
                                        </span>
                                        <?php echo  $data['updated_at'] ; ?>
                                    </div>
                                </div>
                            </div>
                            <!--PageComponentEnd-->
                            <?php 
                                }
                            ?>
                            <!--endrecord-->
                        </div>
                        <div class="row justify-content-start g-0 search-data"></div>
                        <div>
                        </div>
                    </div>
                    <?php
                        if($show_footer){
                    ?>
                    <div class=" mt-3">
                        <div class="row justify-content-between">   
                            <div class="col-md-auto d-flex">    
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
                        }
                        else{
                    ?>
                    <div class="text-muted  animated bounce p-3">
                        <h4><i class="material-icons">block</i> No record found</h4>
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
