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
                        <div class="h5 font-weight-bold text-primary">Payment Details</div>
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
                    <div class="card card-1 border rounded page-content" >
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="page-data">
                                        <div class="border-top td-payment_name p-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="text-muted">Payment Name</div>
                                                    <div class="font-weight-bold">{{ $record->payment_name }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-top td-amount p-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="text-muted">Amount</div>
                                                    <div class="font-weight-bold">₦{{ number_format($record->amount, 2) }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-top td-levels p-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="text-muted">Applicable Levels</div>
                                                    <div class="font-weight-bold">
                                                        @if(isset($record->levels) && $record->levels->count() > 0)
                                                            {{ $record->levels->pluck('name')->implode(', ') }}
                                                        @else
                                                            No levels assigned
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-top td-dates p-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="text-muted">Duration</div>
                                                    <div class="font-weight-bold">
                                                        {{ $record->start_date->format('d/m/Y') }} to {{ $record->end_date->format('d/m/Y') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-top td-status p-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="text-muted">Status</div>
                                                    <div class="font-weight-bold">
                                                        <span class="badge {{ $record->status == 'active' ? 'bg-success' : ($record->status == 'inactive' ? 'bg-danger' : 'bg-warning') }}">
                                                            {{ ucfirst($record->status) }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-top td-description p-2">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <div class="text-muted">Description</div>
                                                    <div class="font-weight-bold">{{ $record->description ?? 'No description provided' }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-top td-created p-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="text-muted">Created</div>
                                                    <div class="font-weight-bold">{{ $record->created_at->format('d/m/Y H:i') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex gap-2 mt-3">
                                <a class="btn btn-sm btn-success" href="{{ route('payments.edit', ['rec_id' => $record->id]) }}">
                                    <i class="material-icons">edit</i> Edit
                                </a>
                                <a class="btn btn-sm btn-danger record-delete-btn" href="{{ url('payments/delete/' . $record->id) }}" data-prompt-msg="Are you sure you want to delete this payment?" data-display-style="modal">
                                    <i class="material-icons">delete_sweep</i> Delete
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
