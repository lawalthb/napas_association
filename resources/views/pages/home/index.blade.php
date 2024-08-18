<!--
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
$pageTitle = "Home"; // set dynamic page title
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<div>
    <div class="bg-light p-3 mb-3">
        <div class="container-fluid">
            <div class="row ">
                <div class="col comp-grid ">
                    <div class="">
                        <div class="h5 font-weight-bold">Home</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-3 comp-grid ">
                    <?php $rec_count = $comp_model->getcount();  ?>
                    <a class="animated zoomIn record-count alert alert-primary" href='<?php print_link("academicsessions") ?>'>
                        <div class="row gutter-sm align-items-center">
                            <div class="col-auto" style="opacity: 1;">
                                <i class="material-icons ">access_time</i>
                            </div>
                            <div class="col">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">.</div>
                                    <small class="">Academic Sessions</small>
                                </div>
                                <h2 class="value"><?php echo $rec_count; ?></h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 comp-grid ">
                    <?php $rec_count = $comp_model->getcount_members();  ?>
                    <a class="animated zoomIn record-count alert alert-info" href='<?php print_link("users") ?>'>
                        <div class="row gutter-sm align-items-center">
                            <div class="col-auto" style="opacity: 1;">
                                <i class="material-icons ">group</i>
                            </div>
                            <div class="col">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Members</div>
                                    <small class="">Total Members</small>
                                </div>
                                <h2 class="value"><?php echo $rec_count; ?></h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 comp-grid ">
                    <?php $rec_count = $comp_model->getcount_admins();  ?>
                    <a class="animated zoomIn record-count alert alert-warning" href='<?php print_link("users") ?>'>
                        <div class="row gutter-sm align-items-center">
                            <div class="col-auto" style="opacity: 1;">
                                <i class="material-icons ">person</i>
                            </div>
                            <div class="col">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Admins</div>
                                    <small class="">Total Admins</small>
                                </div>
                                <h2 class="value"><?php echo $rec_count; ?></h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 comp-grid ">
                    <?php $rec_count = $comp_model->getcount_supervisors();  ?>
                    <a class="animated zoomIn record-count alert alert-dark" href='<?php print_link("projectsupervisors") ?>'>
                        <div class="row gutter-sm align-items-center">
                            <div class="col-auto" style="opacity: 1;">
                                <i class="material-icons ">person_pin</i>
                            </div>
                            <div class="col">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Supervisors</div>
                                    <small class="">Total Supervisors</small>
                                </div>
                                <h2 class="value"><?php echo $rec_count; ?></h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-3 comp-grid ">
                    <?php $rec_count = $comp_model->getcount_resourceitems();  ?>
                    <a class="animated zoomIn record-count card bg-light text-dark" href='<?php print_link("resourceitems") ?>'>
                        <div class="row gutter-sm align-items-center">
                            <div class="col-auto" style="opacity: 1;">
                                <i class="material-icons ">import_contacts</i>
                            </div>
                            <div class="col">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Resource Items</div>
                                    <small class="">Total Resource Items</small>
                                </div>
                                <h2 class="value"><?php echo $rec_count; ?></h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 comp-grid ">
                    <?php $rec_count = $comp_model->getcount_purchaseresources();  ?>
                    <a class="animated zoomIn record-count alert alert-secondary" href='<?php print_link("resourcespaids") ?>'>
                        <div class="row gutter-sm align-items-center">
                            <div class="col-auto" style="opacity: 1;">
                                <i class="material-icons ">add_shopping_cart</i>
                            </div>
                            <div class="col">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Purchase Resources</div>
                                    <small class="">Total Resources Paids</small>
                                </div>
                                <h2 class="value"><?php echo $rec_count; ?></h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 comp-grid ">
                    <?php $rec_count = $comp_model->getcount_electionaspirants();  ?>
                    <a class="animated zoomIn record-count card bg-secondary text-white" href='<?php print_link("electionaspirants") ?>'>
                        <div class="row gutter-sm align-items-center">
                            <div class="col-auto" style="opacity: 1;">
                                <i class="material-icons ">explicit</i>
                            </div>
                            <div class="col">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Election Aspirants</div>
                                    <small class="">Total Election Aspirants</small>
                                </div>
                                <h2 class="value"><?php echo $rec_count; ?></h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 comp-grid ">
                    <?php $rec_count = $comp_model->getcount_contestnominees();  ?>
                    <a class="animated zoomIn record-count alert alert-danger" href='<?php print_link("contestnominees") ?>'>
                        <div class="row gutter-sm align-items-center">
                            <div class="col-auto" style="opacity: 1;">
                                <i class="material-icons ">wc</i>
                            </div>
                            <div class="col">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Contest Nominees</div>
                                    <small class="">Total Contest Nominees</small>
                                </div>
                                <h2 class="value"><?php echo $rec_count; ?></h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <div class="container-fluid">
            <div class="row ">
            </div>
        </div>
    </div>
    <div class="mb-3">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-6 comp-grid ">
                    <div class=" ">
                        <?php
                        $params = ['show_header' => false, 'show_footer' => false, 'show_pagination' => false, 'limit' => 10]; //new query param
                        $query = array_merge(request()->query(), $params);
                        $queryParams = http_build_query($query);
                        $url = url("users/home_list?$queryParams");
                        ?>
                        <div class="ajax-inline-page" data-url="{{ $url }}">
                            <div class="ajax-page-load-indicator">
                                <div class="text-center d-flex justify-content-center load-indicator">
                                    <span class="loader mr-3"></span>
                                    <span class="fw-bold">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 comp-grid ">
                    <div class=" ">
                        <?php
                        $params = ['show_header' => false, 'show_footer' => false, 'show_pagination' => false, 'limit' => 10]; //new query param
                        $query = array_merge(request()->query(), $params);
                        $queryParams = http_build_query($query);
                        $url = url("transactions/home_list?$queryParams");
                        ?>
                        <div class="ajax-inline-page" data-url="{{ $url }}">
                            <div class="ajax-page-load-indicator">
                                <div class="text-center d-flex justify-content-center load-indicator">
                                    <span class="loader mr-3"></span>
                                    <span class="fw-bold">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- Page custom css -->
@section('pagecss')
<style>
</style>
@endsection
<!-- Page custom js -->
@section('pagejs')
<script>
    $(document).ready(function() {
        // custom javascript | jquery codes
    });
</script>
@endsection