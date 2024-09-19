<!--
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
$pageTitle = "election_vote_page"; // set dynamic page title
?>

@section('title', $pageTitle)
<script src="https://cdn.tailwindcss.com"></script>


<div>
  <div class="bg-light p-3 mb-3">
    <div class="container-fluid">
      <div class="row ">
        <div class="col comp-grid ">
          <div class="">
            <div class="h5 font-weight-bold">Start Voting</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="mb-3">
    <div class="container-fluid">
      <div class="row ">
        <div class="col comp-grid ">

          @if ($election_status =='On')


          <!-- //start position here -->
          @foreach($positions as $position)
          @php $count = 0; @endphp
          <h3 class="font-bold text-xl md:text-3xl mb-5">{{ $position->name }}</h3>
          <form class="vote-form" method="POST" action="{{ route('election.vote') }}">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">
              <!-- start one cand    -->

              <input type="hidden" name="position_id" value="{{ $position->id }}">
              @foreach($position->candidates as $candidate)
              @php


              $candidate->id;
              $user_id = Auth()->user()->id;
              $position->id;
              $candidate->user_id;
              $checkVote = \App\Models\ElectionVotes::where('user_id', $user_id)->where('position_id', $position->id)->where('aspirant_id', $candidate->id)->first();
              //dd($checkVote);
              $candidate_details = App\Models\Users::where('id', $candidate->user_id)->first();


              @endphp
              <div
                class="border border-[#ebedf2] dark:border-[#191e3a] rounded-md bg-white dark:bg-[#0e1726] p-5 shadow-[0px_0px_2px_0px_rgba(145,158,171,0.20),_0px_12px_24px_-4px_rgba(145,158,171,0.12)]">
                <div
                  class="rounded-md overflow-hidden mb-5 shadow-[0_6px_10px_0_rgba(0,0,0,0.14),_0_1px_18px_0_rgba(0,0,0,0.12),_0_3px_5px_-1px_rgba(0,0,0,0.20)]">
                  <img src="{{asset($candidate_details->image)}}" alt="..." height="100px" width="80px" />
                </div>
                <h5 class="text-xl mb-1"> {{ $candidate->name }}
                  @php

                  if($checkVote){
                  if( $candidate->id == $checkVote->aspirant_id ){ $count = 1; echo '(Voted)';}
                  } else{
                  echo '';}

                  @endphp</h5>
                <div class="flex">
                  <div class="rounded-full overflow-hidden ltr:mr-4 rtl:ml-4">
                    <input type="radio" name="candidate_id" value="{{ $candidate->id }}">
                  </div>
                  <div class="flex-1">
                    <h4>as {{ $position->name }}</h4>

                  </div>
                </div>
              </div>


              <!-- end one canditate -->

              @endforeach
              @if ($count == 0)
              <button class="btn vote-btn" type="submit" style="border: solid #3b82f6 2px; height:50px;  ">Vote</button>

              @endif
          </form>



        </div>

        @php $count =0 ; @endphp
      </div>

      <hr />
      @endforeach
    </div>
    @else
    Election is over for this Academic Session
    @endif
  </div>
</div>
</div>
</div>

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

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var voteForms = document.querySelectorAll('.vote-form');
    voteForms.forEach(function(form) {
      form.addEventListener('submit', function(event) {
        event.preventDefault();
        var submitButton = form.querySelector('.vote-btn');
        submitButton.disabled = true;
        fetch(form.action, {
          method: 'POST',
          body: new FormData(form)
        }).then(function(response) {
          // Handle response
          if (response.ok) {
            // Optional: Show success message or redirect to another page
          } else {
            // Optional: Show error message or handle error scenario
          }
        }).catch(function(error) {
          // Handle error scenario
        }).finally(function() {
          submitButton.style.display = 'none'; // Hide the button after submission
        });
      });
    });
  });
</script>

@endsection