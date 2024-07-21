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
                    <a  class="btn btn-primary btn-block" href="<?php print_link("users/add", true) ?>" >
                    <i class="material-icons">add</i>                               
                    Add New User 
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
            <div class="col comp-grid " >
                <div  class=" page-content" >
                    <div id="users-list-records">
                        <div id="page-main-content" class="table-responsive">
                            <?php Html::page_bread_crumb("/users/", $field_name, $field_value); ?>
                            <?php Html::display_page_errors($errors); ?>
                            <div class="filter-tags mb-2">
                                <?php Html::filter_tag('search', __('Search')); ?>
                            </div>
                            <table class="table table-hover table-striped table-sm text-left">
                                <thead class="table-header ">
                                    <tr>
                                        <th class="td-checkbox">
                                        <label class="form-check-label">
                                        <input class="toggle-check-all form-check-input" type="checkbox" />
                                        </label>
                                        </th>
                                        <th class="td-id" > Id</th>
                                        <th class="td-firstname" > Firstname</th>
                                        <th class="td-lastname" > Lastname</th>
                                        <th class="td-nickname" > Nickname</th>
                                        <th class="td-email" > Email</th>
                                        <th class="td-matno" > Matno</th>
                                        <th class="td-phone" > Phone</th>
                                        <th class="td-level" > Level</th>
                                        <th class="td-member_type" > Member Type</th>
                                        <th class="td-expectation_msg" > Expectation Msg</th>
                                        <th class="td-session_start" > Session Start</th>
                                        <th class="td-session_end" > Session End</th>
                                        <th class="td-created_at" > Created At</th>
                                        <th class="td-updated_at" > Updated At</th>
                                        <th class="td-is_active" > Is Active</th>
                                        <th class="td-is_ban" > Is Ban</th>
                                        <th class="td-fee_paid" > Fee Paid</th>
                                        <th class="td-role" > Role</th>
                                        <th class="td-bio" > Bio</th>
                                        <th class="td-dob" > Dob</th>
                                        <th class="td-image" > Image</th>
                                        <th class="td-facebook_link" > Facebook Link</th>
                                        <th class="td-x_link" > X Link</th>
                                        <th class="td-linkedin_link" > Linkedin Link</th>
                                        <th class="td-email_verified_at" > Email Verified At</th>
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
                                        <td class=" td-checkbox">
                                            <label class="form-check-label">
                                            <input class="optioncheck form-check-input" name="optioncheck[]" value="<?php echo $data['id'] ?>" type="checkbox" />
                                            </label>
                                        </td>
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
                                        <td class="td-nickname">
                                            <?php echo  $data['nickname'] ; ?>
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
                                        <td class="td-level">
                                            <?php echo  $data['level'] ; ?>
                                        </td>
                                        <td class="td-member_type">
                                            <?php echo  $data['member_type'] ; ?>
                                        </td>
                                        <td class="td-expectation_msg">
                                            <?php echo  $data['expectation_msg'] ; ?>
                                        </td>
                                        <td class="td-session_start">
                                            <?php echo  $data['session_start'] ; ?>
                                        </td>
                                        <td class="td-session_end">
                                            <?php echo  $data['session_end'] ; ?>
                                        </td>
                                        <td class="td-created_at">
                                            <?php echo  $data['created_at'] ; ?>
                                        </td>
                                        <td class="td-updated_at">
                                            <?php echo  $data['updated_at'] ; ?>
                                        </td>
                                        <td class="td-is_active">
                                            <?php echo  $data['is_active'] ; ?>
                                        </td>
                                        <td class="td-is_ban">
                                            <?php echo  $data['is_ban'] ; ?>
                                        </td>
                                        <td class="td-fee_paid">
                                            <?php echo  $data['fee_paid'] ; ?>
                                        </td>
                                        <td class="td-role">
                                            <?php echo  $data['role'] ; ?>
                                        </td>
                                        <td class="td-bio">
                                            <?php echo  $data['bio'] ; ?>
                                        </td>
                                        <td class="td-dob">
                                            <?php echo  $data['dob'] ; ?>
                                        </td>
                                        <td class="td-image">
                                            <?php 
                                                Html :: page_img($data['image'], '50px', '50px', "small", 1); 
                                            ?>
                                        </td>
                                        <td class="td-facebook_link">
                                            <?php echo  $data['facebook_link'] ; ?>
                                        </td>
                                        <td class="td-x_link">
                                            <?php echo  $data['x_link'] ; ?>
                                        </td>
                                        <td class="td-linkedin_link">
                                            <?php echo  $data['linkedin_link'] ; ?>
                                        </td>
                                        <td class="td-email_verified_at">
                                            <a href="<?php print_link("mailto:$data[email_verified_at]") ?>"><?php echo $data['email_verified_at']; ?></a>
                                        </td>
                                        <!--PageComponentEnd-->
                                        <td class="td-btn">
                                            <div class="dropdown" >
                                                <button data-bs-toggle="dropdown" class="dropdown-toggle btn text-primary btn-flat btn-sm">
                                                <i class="material-icons">menu</i> 
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <a class="dropdown-item "   href="<?php print_link("users/view/$rec_id"); ?>" >
                                                    <i class="material-icons">visibility</i> View
                                                </a>
                                                <a class="dropdown-item "   href="<?php print_link("users/edit/$rec_id"); ?>" >
                                                <i class="material-icons">edit</i> Edit
                                            </a>
                                            <a class="dropdown-item record-delete-btn" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal" href="<?php print_link("users/delete/$rec_id"); ?>" >
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
                        <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("users/delete/{sel_ids}"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
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
