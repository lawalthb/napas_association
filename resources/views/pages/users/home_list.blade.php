<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    //check if current user role is allowed access to the pages
    $can_add = $user->canAccess("users/add");
    $can_edit = $user->canAccess("users/edit");
    $can_view = $user->canAccess("users/view");
    $can_delete = $user->canAccess("users/delete");
    $field_name = request()->segment(3);
    $field_value = request()->segment(4);
    $total_records = $records->total();
    $limit = $records->perPage();
    $record_count = count($records);
    $pageTitle = "Users"; //set dynamic page title
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
                        <div class="h5 font-weight-bold text-primary">Users</div>
                    </div>
                </div>
                <div class="col-auto  " >
                    <?php if($can_add){ ?>
                    <a  class="btn btn-primary btn-block" href="<?php print_link("users/add", true) ?>" >
                    <i class="material-icons">add</i>                               
                    Add New User 
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
                    <div id="users-home_list-records">
                        <div id="page-main-content" class="table-responsive">
                            <?php Html::page_bread_crumb("/users/home_list", $field_name, $field_value); ?>
                            <?php Html::display_page_errors($errors); ?>
                            <div class="filter-tags mb-2">
                                <?php Html::filter_tag('search', __('Search')); ?>
                            </div>
                            <table class="table table-hover table-striped table-sm text-left">
                                <thead class="table-header ">
                                    <tr>
                                        <th class="td-id" > Id</th>
                                        <th class="td-firstname" > Firstname</th>
                                        <th class="td-lastname" > Lastname</th>
                                        <th class="td-email" > Email</th>
                                        <th class="td-matno" > Matno</th>
                                        <th class="td-phone" > Phone</th>
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
                                            <a href="<?php print_link("/users/view/$data[id]") ?>"><?php echo $data['id']; ?></a>
                                        </td>
                                        <td class="td-firstname">
                                            <?php echo  $data['firstname'] ; ?>
                                        </td>
                                        <td class="td-lastname">
                                            <?php echo  $data['lastname'] ; ?>
                                        </td>
                                        <td class="td-email">
                                            <a href="<?php print_link("mailto:$data[email]") ?>"><?php echo $data['email']; ?></a>
                                        </td>
                                        <td class="td-matno">
                                            <?php echo  $data['matno'] ; ?>
                                        </td>
                                        <td class="td-phone">
                                            <a href="<?php print_link("tel:$data[phone]") ?>"><?php echo $data['phone']; ?></a>
                                        </td>
                                        <!--PageComponentEnd-->
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
