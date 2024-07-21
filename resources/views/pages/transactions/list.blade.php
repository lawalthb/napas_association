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
    $pageTitle = "Transactions"; //set dynamic page title
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
                        <div class="h5 font-weight-bold text-primary">Transactions</div>
                    </div>
                </div>
                <div class="col-auto  " >
                    <a  class="btn btn-primary btn-block" href="<?php print_link("transactions/add", true) ?>" >
                    <i class="material-icons">add</i>                               
                    Add New Transaction 
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
                    <div id="transactions-list-records">
                        <div id="page-main-content" class="table-responsive">
                            <?php Html::page_bread_crumb("/transactions/", $field_name, $field_value); ?>
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
                                        <th class="td-user_id" > User Id</th>
                                        <th class="td-price_settings_id" > Price Settings Id</th>
                                        <th class="td-email" > Email</th>
                                        <th class="td-amount" > Amount</th>
                                        <th class="td-fullname" > Fullname</th>
                                        <th class="td-phone_number" > Phone Number</th>
                                        <th class="td-reference" > Reference</th>
                                        <th class="td-created_at" > Created At</th>
                                        <th class="td-status" > Status</th>
                                        <th class="td-updated_at" > Updated At</th>
                                        <th class="td-authorization_url" > Authorization Url</th>
                                        <th class="td-callback_url" > Callback Url</th>
                                        <th class="td-gateway_response" > Gateway Response</th>
                                        <th class="td-paid_at" > Paid At</th>
                                        <th class="td-channel" > Channel</th>
                                        <th class="td-message" > Message</th>
                                        <th class="td-orderid" > Orderid</th>
                                        <th class="td-other_info" > Other Info</th>
                                        <th class="td-purpose_name" > Purpose Name</th>
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
                                            <a href="<?php print_link("/transactions/view/$data[id]") ?>"><?php echo $data['id']; ?></a>
                                        </td>
                                        <td class="td-user_id">
                                            <a size="sm" class="btn btn-sm btn btn-secondary page-modal" href="<?php print_link("users/view/$data[user_id]?subpage=1") ?>">
                                            <i class="material-icons">visibility</i> <?php echo "Users" ?>
                                        </a>
                                    </td>
                                    <td class="td-price_settings_id">
                                        <a size="sm" class="btn btn-sm btn btn-secondary page-modal" href="<?php print_link("pricesettings/view/$data[price_settings_id]?subpage=1") ?>">
                                        <i class="material-icons">visibility</i> <?php echo "Price Settings" ?>
                                    </a>
                                </td>
                                <td class="td-email">
                                    <a href="<?php print_link("mailto:$data[email]") ?>"><?php echo $data['email']; ?></a>
                                </td>
                                <td class="td-amount">
                                    <?php echo  $data['amount'] ; ?>
                                </td>
                                <td class="td-fullname">
                                    <?php echo  $data['fullname'] ; ?>
                                </td>
                                <td class="td-phone_number">
                                    <a href="<?php print_link("tel:$data[phone_number]") ?>"><?php echo $data['phone_number']; ?></a>
                                </td>
                                <td class="td-reference">
                                    <?php echo  $data['reference'] ; ?>
                                </td>
                                <td class="td-created_at">
                                    <?php echo  $data['created_at'] ; ?>
                                </td>
                                <td class="td-status">
                                    <?php echo  $data['status'] ; ?>
                                </td>
                                <td class="td-updated_at">
                                    <?php echo  $data['updated_at'] ; ?>
                                </td>
                                <td class="td-authorization_url">
                                    <?php echo  $data['authorization_url'] ; ?>
                                </td>
                                <td class="td-callback_url">
                                    <?php echo  $data['callback_url'] ; ?>
                                </td>
                                <td class="td-gateway_response">
                                    <?php echo  $data['gateway_response'] ; ?>
                                </td>
                                <td class="td-paid_at">
                                    <?php echo  $data['paid_at'] ; ?>
                                </td>
                                <td class="td-channel">
                                    <?php echo  $data['channel'] ; ?>
                                </td>
                                <td class="td-message">
                                    <?php echo  $data['message'] ; ?>
                                </td>
                                <td class="td-orderid">
                                    <?php echo  $data['orderid'] ; ?>
                                </td>
                                <td class="td-other_info">
                                    <?php echo  $data['other_info'] ; ?>
                                </td>
                                <td class="td-purpose_name">
                                    <?php echo  $data['purpose_name'] ; ?>
                                </td>
                                <!--PageComponentEnd-->
                                <td class="td-btn">
                                    <div class="dropdown" >
                                        <button data-bs-toggle="dropdown" class="dropdown-toggle btn text-primary btn-flat btn-sm">
                                        <i class="material-icons">menu</i> 
                                        </button>
                                        <ul class="dropdown-menu">
                                            <a class="dropdown-item "   href="<?php print_link("transactions/view/$rec_id"); ?>" >
                                            <i class="material-icons">visibility</i> View
                                        </a>
                                        <a class="dropdown-item "   href="<?php print_link("transactions/edit/$rec_id"); ?>" >
                                        <i class="material-icons">edit</i> Edit
                                    </a>
                                    <a class="dropdown-item record-delete-btn" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal" href="<?php print_link("transactions/delete/$rec_id"); ?>" >
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
                <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("transactions/delete/{sel_ids}"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
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
