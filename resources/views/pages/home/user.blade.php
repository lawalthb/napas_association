<!--
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
$pageTitle = "Member Dasbaord"; // set dynamic page title
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
                        <div class="h5 font-weight-bold">Member dashboard</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="">
    <div class="container">
        <div class="row ">
            <div class="col-md-9 comp-grid ">
                <div class="card card-1 border rounded page-content">
                    <?php
                    Html::page_img($president['image'], '250px', '300px', "", 1);
                    ?>
                    <p>I am <b>{{$president->name}}</b></p>
                    {{$about->text}}<br />
                    <P>
                        {!!$about->body!!}
                    </P>
                    Your Supervisor is {{ isset($supervisor->supervisors->name) ? $supervisor->supervisors->name : 'No supervisor name found' }}
                    <br />
                    Email: {{ isset($supervisor->supervisors->email) ? $supervisor->supervisors->email : 'No supervisor email found ' }}
                    <br />
                    Phone: {{ isset($supervisor->supervisors->phone) ? $supervisor->supervisors->phone : 'No supervisor phone found' }}

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