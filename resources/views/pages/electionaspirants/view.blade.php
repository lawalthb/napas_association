<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    //check if current user role is allowed access to the pages
    $can_add = $user->canAccess("electionaspirants/add");
    $can_edit = $user->canAccess("electionaspirants/edit");
    $can_view = $user->canAccess("electionaspirants/view");
    $can_delete = $user->canAccess("electionaspirants/delete");
    $pageTitle = "Election Aspirant Details"; //set dynamic page title
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page" data-page-type="view" data-page-url="{{ url()->full() }}">
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
                        <div class="h5 font-weight-bold text-primary">Election Aspirant Details</div>
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
                <div class="col comp-grid " >
                    <div  class=" page-content" >
                        <?php
                            if($data){
                            $rec_id = ($data['id'] ? urlencode($data['id']) : null);
                        ?>
                        <div id="page-main-content" class=" px-3 mb-3">
                            <div class="page-data">
                                <!--PageComponentStart-->
                                <div class="mb-3 row row justify-content-start g-0">
                                    <div class="col-12">
                                        <div class="bg-light mb-1 card-1 p-2 border rounded">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <small class="text-muted">Id</small>
                                                    <div class="fw-bold">
                                                        <?php echo  $data['id'] ; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="bg-light mb-1 card-1 p-2 border rounded">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <small class="text-muted">Member name</small>
                                                    <div class="fw-bold">
                                                        <a size="sm" class="btn btn-sm btn btn-secondary page-modal" href="<?php print_link("users/view/$data[user_id]?subpage=1") ?>">
                                                        <?php echo $data['users_lastname'] ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="bg-light mb-1 card-1 p-2 border rounded">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <small class="text-muted">NickName</small>
                                                <div class="fw-bold">
                                                    <?php echo  $data['name'] ; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="bg-light mb-1 card-1 p-2 border rounded">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <small class="text-muted">Position Id</small>
                                                <div class="fw-bold">
                                                    <a size="sm" class="btn btn-sm btn btn-secondary page-modal" href="<?php print_link("electionpositions/view/$data[position_id]?subpage=1") ?>">
                                                    <?php echo $data['electionpositions_name'] ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="bg-light mb-1 card-1 p-2 border rounded">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <small class="text-muted">Academic Session</small>
                                            <div class="fw-bold">
                                                <a size="sm" class="btn btn-sm btn btn-secondary page-modal" href="<?php print_link("academicsessions/view/$data[academic_session]?subpage=1") ?>">
                                                <?php echo $data['academicsessions_session_name'] ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="bg-light mb-1 card-1 p-2 border rounded">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <small class="text-muted">Votes</small>
                                        <div class="fw-bold">
                                            <?php echo  $data['votes'] ; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="bg-light mb-1 card-1 p-2 border rounded">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <small class="text-muted">Created At</small>
                                        <div class="fw-bold">
                                            <?php echo  $data['created_at'] ; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="bg-light mb-1 card-1 p-2 border rounded">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <small class="text-muted">Updated At</small>
                                        <div class="fw-bold">
                                            <?php echo  $data['updated_at'] ; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="bg-light mb-1 card-1 p-2 border rounded">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <small class="text-muted">Payment Status</small>
                                        <div class="fw-bold">
                                            <?php echo  $data['payment_status'] ; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--PageComponentEnd-->
                    <div class="d-flex align-items-center gap-2">
                        <?php if($can_edit){ ?>
                        <a class="btn btn-sm btn-success has-tooltip "   title="Edit" href="<?php print_link("electionaspirants/edit/$rec_id"); ?>" >
                        <i class="material-icons">edit</i> Edit
                    </a>
                    <?php } ?>
                    <?php if($can_delete){ ?>
                    <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal" title="Delete" href="<?php print_link("electionaspirants/delete/$rec_id?redirect=electionaspirants"); ?>" >
                    <i class="material-icons">delete_sweep</i> Delete
                </a>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php
        }
        else{
    ?>
    <!-- Empty Record Message -->
    <div class="text-muted p-3">
        <i class="material-icons">block</i> No Record Found
    </div>
    <?php
        }
    ?>
</div>
</div>
</div>
</div>
</div>
</section>


@endsection
