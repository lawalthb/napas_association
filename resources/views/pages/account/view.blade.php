<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "My Account"; //set dynamic page title
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page" data-page-type="view" data-page-url="{{ url()->full() }}">
    <div  class="" >
        <div class="container">
            <div class="row ">
                <div class="col comp-grid " >
                    <div  class=" page-content" >
                        <?php
                            if($data){
                            $rec_id = ($data['id'] ? urlencode($data['id']) : null);
                        ?>
                        <div class="bg-primary m-2 mb-4">
                            <div class="profile">
                                <div class="avatar">
                                    <?php 
                                        $user_photo = $user->UserPhoto();
                                        if($user_photo){
                                        Html::page_img($user_photo, 100, 100, "small", "large"); 
                                        }
                                    ?>
                                </div>
                                <h1 class="title mt-4"><?php echo $data['firstname']; ?></h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mx-3 mb-3">
                                    <ul class="nav nav-pills flex-column text-left">
                                        <li class="nav-item">
                                            <a data-bs-toggle="tab" href="#AccountPageView" class="nav-link active">
                                                <i class="material-icons">account_box</i> Account Detail
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a data-bs-toggle="tab" href="#AccountPageEdit" class="nav-link">
                                                <i class="material-icons">edit</i> Edit Account
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a data-bs-toggle="tab" href="#AccountPageChangePassword" class="nav-link">
                                                <i class="material-icons">lock</i> Change Password
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="mb-3">
                                    <div class="tab-content">
                                        <div class="tab-pane show active fade" id="AccountPageView" role="tabpanel">
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
                                                                    <small class="text-muted">Firstname</small>
                                                                    <div class="fw-bold">
                                                                        <?php echo  $data['firstname'] ; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="bg-light mb-1 card-1 p-2 border rounded">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <small class="text-muted">Lastname</small>
                                                                    <div class="fw-bold">
                                                                        <?php echo  $data['lastname'] ; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="bg-light mb-1 card-1 p-2 border rounded">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <small class="text-muted">Nickname</small>
                                                                    <div class="fw-bold">
                                                                        <?php echo  $data['nickname'] ; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="bg-light mb-1 card-1 p-2 border rounded">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <small class="text-muted">Email</small>
                                                                    <div class="fw-bold">
                                                                        <?php echo  $data['email'] ; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="bg-light mb-1 card-1 p-2 border rounded">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <small class="text-muted">Matno</small>
                                                                    <div class="fw-bold">
                                                                        <?php echo  $data['matno'] ; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="bg-light mb-1 card-1 p-2 border rounded">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <small class="text-muted">Phone</small>
                                                                    <div class="fw-bold">
                                                                        <?php echo  $data['phone'] ; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="bg-light mb-1 card-1 p-2 border rounded">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <small class="text-muted">Level</small>
                                                                    <div class="fw-bold">
                                                                        <?php echo  $data['level'] ; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="bg-light mb-1 card-1 p-2 border rounded">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <small class="text-muted">Member Type</small>
                                                                    <div class="fw-bold">
                                                                        <?php echo  $data['member_type'] ; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="bg-light mb-1 card-1 p-2 border rounded">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <small class="text-muted">Expectation Msg</small>
                                                                    <div class="fw-bold">
                                                                        <?php echo  $data['expectation_msg'] ; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="bg-light mb-1 card-1 p-2 border rounded">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <small class="text-muted">Session Start</small>
                                                                    <div class="fw-bold">
                                                                        <?php echo  $data['session_start'] ; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="bg-light mb-1 card-1 p-2 border rounded">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <small class="text-muted">Session End</small>
                                                                    <div class="fw-bold">
                                                                        <?php echo  $data['session_end'] ; ?>
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
                                                                    <small class="text-muted">Is Active</small>
                                                                    <div class="fw-bold">
                                                                        <?php echo  $data['is_active'] ; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="bg-light mb-1 card-1 p-2 border rounded">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <small class="text-muted">Is Ban</small>
                                                                    <div class="fw-bold">
                                                                        <?php echo  $data['is_ban'] ; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="bg-light mb-1 card-1 p-2 border rounded">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <small class="text-muted">Fee Paid</small>
                                                                    <div class="fw-bold">
                                                                        <?php echo  $data['fee_paid'] ; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="bg-light mb-1 card-1 p-2 border rounded">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <small class="text-muted">Role</small>
                                                                    <div class="fw-bold">
                                                                        <?php echo  $data['role'] ; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="bg-light mb-1 card-1 p-2 border rounded">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <small class="text-muted">Bio</small>
                                                                    <div class="fw-bold">
                                                                        <?php echo  $data['bio'] ; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="bg-light mb-1 card-1 p-2 border rounded">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <small class="text-muted">Dob</small>
                                                                    <div class="fw-bold">
                                                                        <?php echo  $data['dob'] ; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="bg-light mb-1 card-1 p-2 border rounded">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <small class="text-muted">Facebook Link</small>
                                                                    <div class="fw-bold">
                                                                        <?php echo  $data['facebook_link'] ; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="bg-light mb-1 card-1 p-2 border rounded">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <small class="text-muted">X Link</small>
                                                                    <div class="fw-bold">
                                                                        <?php echo  $data['x_link'] ; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="bg-light mb-1 card-1 p-2 border rounded">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <small class="text-muted">Linkedin Link</small>
                                                                    <div class="fw-bold">
                                                                        <?php echo  $data['linkedin_link'] ; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="bg-light mb-1 card-1 p-2 border rounded">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <small class="text-muted">Email Verified At</small>
                                                                    <div class="fw-bold">
                                                                        <?php echo  $data['email_verified_at'] ; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--PageComponentEnd-->
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="AccountPageEdit" role="tabpanel">
                                            <div class=" reset-grids">
                                                <x-sub-page url="{{ url('account/edit') }}"></x-sub-page>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="AccountPageChangePassword" role="tabpanel">
                                            <div class=" reset-grids">
                                                @include("pages.account.changepassword")
                                            </div>
                                        </div>
                                    </div>
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
<!-- Page custom js --><script><!--pageautofill--><!--custom page js--><!--pagejs--></script>
<!-- Page custom css --><style><!--custom page css--><!--pagecss--></style>
@endsection
