<!--
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->

<?php
    $pageTitle = "Add New Final Project"; //set dynamic page title
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page" data-page-type="add" data-page-url="{{ url()->full() }}">
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
                        <div class="h5 font-weight-bold text-primary">Renew Domain name and Hosting2</div>
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
                <div class="col-md-12 comp-grid " >
                    <div  class="card card-1 border rounded page-content" >
                        <div class="card-header">
                            <form>
                          <label for="payment_purpose">Select Server payment</label>
<select class="form-control" name="payment_purpose" id="payment_purpose">
    <option>ogitechnabams.com (12 Months)- ₦30,000</option>
     <option>Hosting (12 Month ) - ₦20,000</option>
</select>
                        </div>

<div class="form-group form-submit-btn-holder text-center mt-3">
    <button class="btn btn-primary" type="submit">
    Submit
    <i class="material-icons">send</i>
    </button>
</div>
                    </div>
                </div>

</form>

</div>
</div>
</div>
</section>


@endsection
