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
</div>
<div class="">
    <div class="container">
        <div class="row ">
            <div class="col-md-9 comp-grid ">
                <div class="card card-1 border rounded page-content">
                    Welcome to the National Association of Business Administration and Management Students (NABAMS)!<br />
                    <P>NABAMS is established with the vision of fostering excellence in the field of business administration and management, NABAMS is a dynamic organization dedicated to empowering students pursuing these disciplines. At NABAMS, we believe in providing a platform for students to network, learn, and grow professionally. Through a wide range of initiatives, including seminars, workshops, competitions, and networking events, we aim to equip our members with the knowledge, skills, and connections necessary to excel in the ever-evolving world of business. Our association is driven by a passionate team of students, educators, and industry professionals who are committed to supporting the academic and professional development of our members. Whether you're a seasoned business student or just starting your journey in the field, NABAMS offers valuable resources, opportunities, and support to help you succeed.

                    </P>
                    Your Supervisor is Mr...
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