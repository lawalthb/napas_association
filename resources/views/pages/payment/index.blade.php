<!--
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Make Payment"; //set dynamic page title
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
                <div class="col" >
                    <div class="">
                        <div class="h5 font-weight-bold text-primary">Make Payment</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
    <div class="" >
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid " >
                    <div class="card card-1 border rounded page-content" >
                        <div class="card-header p-3">
                            <h4 class="card-title">Select Payment</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('payments.process') }}" class="needs-validation" novalidate>
                                @csrf

                                @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                                @endif

                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif

                                <div class="form-group mb-3">
                                    <label for="payment_id" class="form-label">Select Payment Option</label>
                                    <select class="form-select" name="payment_id" id="payment_id" required>
                                        <option value="">-- Select Payment --</option>
                                        @foreach($availablePayments as $payment)
                                            <option value="{{ $payment->id }}">
                                                {{ $payment->payment_name }} - ₦{{ number_format($payment->amount, 2) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Please select a payment option</div>
                                </div>

                                <div class="payment-details mt-4 mb-4 d-none" id="payment-details">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Payment Details</h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p><strong>Name:</strong> <span id="payment-name"></span></p>
                                                    <p><strong>Amount:</strong> <span id="payment-amount"></span></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><strong>Valid Until:</strong> <span id="payment-end-date"></span></p>
                                                    <p><strong>Description:</strong> <span id="payment-description"></span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group text-center">
                                    <button class="btn btn-primary" type="submit">
                                        Proceed to Payment
                                        <i class="material-icons">send</i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment History Section -->
            <div class="row mt-4">
                <div class="col-md-12 comp-grid">
                    <div class="card card-1 border rounded">
                        <div class="card-header p-3">
                            <h4 class="card-title">Payment History</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-sm">
                                    <thead class="table-header">
                                        <tr>
                                            <th>Date</th>
                                            <th>Reference</th>
                                            <th>Purpose</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($paymentHistory) && count($paymentHistory) > 0)
                                            @foreach($paymentHistory as $transaction)
                                                <tr>
                                                    <td>{{ date('d/m/Y H:i', strtotime($transaction->created_at)) }}</td>
                                                    <td>{{ $transaction->reference }}</td>
                                                 <td>
    @if($transaction->payment)
        {{ $transaction->payment->payment_name }}
    @else
        {{ $transaction->purpose_name }}
    @endif
</td>
                                                    <td>₦{{ number_format($transaction->amount, 2) }}</td>
                                                    <td>
                                                        <span class="badge {{ $transaction->status == 'Success' ? 'bg-success' : ($transaction->status == 'Failed' ? 'bg-danger' : 'bg-warning') }}">
                                                            {{ $transaction->status }}
                                                        </span>
                                                    </td>
                                                <td>
    {{-- <a href="{{ route('transactions.member_view', ['rec_id' => $transaction->id]) }}" class="btn btn-sm btn-info">
        <i class="material-icons">visibility</i> View
    </a> --}}
    @if($transaction->status == 'Success')
    <a href="{{ route('transactions.download_receipt', ['id' => $transaction->id]) }}" class="btn btn-sm btn-success">
        <i class="material-icons">download</i> Receipt
    </a>
    @endif
</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="6" class="text-center">No payment history found</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                            @if(isset($paymentHistory) && $paymentHistory instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                <div class="mt-3">
                                    {{ $paymentHistory->links() }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const paymentSelect = document.getElementById('payment_id');
    const paymentDetails = document.getElementById('payment-details');
    const paymentName = document.getElementById('payment-name');
    const paymentAmount = document.getElementById('payment-amount');
    const paymentEndDate = document.getElementById('payment-end-date');
    const paymentDescription = document.getElementById('payment-description');

    // Payment data from the server
    const payments = @json($availablePayments);

    paymentSelect.addEventListener('change', function() {
        const selectedId = this.value;

        if (selectedId) {
            const selectedPayment = payments.find(p => p.id == selectedId);

            if (selectedPayment) {
                paymentName.textContent = selectedPayment.payment_name;
                paymentAmount.textContent = '₦' + parseFloat(selectedPayment.amount).toLocaleString('en-NG', {minimumFractionDigits: 2, maximumFractionDigits: 2});
                paymentEndDate.textContent = new Date(selectedPayment.end_date).toLocaleDateString('en-NG');
                paymentDescription.textContent = selectedPayment.description || 'No description available';

                paymentDetails.classList.remove('d-none');
            }
        } else {
            paymentDetails.classList.add('d-none');
        }
    });

    // Form validation
    const form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }

        form.classList.add('was-validated');
    });
});
</script>
@endsection
