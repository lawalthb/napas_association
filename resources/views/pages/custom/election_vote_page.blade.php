<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php 
    $pageTitle = "election_vote_page"; // set dynamic page title
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<div>
    <div  class="bg-light p-3 mb-3" >
        <div class="container-fluid">
            <div class="row ">
                <div class="col comp-grid " >
                    <div class="">
                        <div class="h5 font-weight-bold">election_vote_page</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div  class="mb-3" >
        <div class="container-fluid">
            <div class="row ">
                <div class="col comp-grid " >
                    <div class=" ">
                        <?php
                            $params = ['show_header' => false, 'show_footer' => false, 'show_pagination' => false, 'limit' => 100]; //new query param
                            $query = array_merge(request()->query(), $params);
                            $queryParams = http_build_query($query);
                            $url = url("electionaspirants/member_list?$queryParams");
                        ?>
                        <div class="ajax-inline-page" data-url="{{ $url }}" >
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
    $(document).ready(function(){
    // custom javascript | jquery codes
    });
</script>
@endsection
