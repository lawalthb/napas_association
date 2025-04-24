@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page" data-page-type="list" data-page-url="{{ url()->full() }}">
    <?php
        if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3" >
        <div class="container-fluid">
            <div class="row justify-content-between align-items-center">
                <div class="col-auto  back-btn-col" >
                    <a class="back-btn btn " href="{{ url()->previous() }}" >
                        <i class="material-icons">arrow_back</i>
                    </a>
                </div>
                <div class="col  " >
                    <div class="">
                        <div class="h5 font-weight-bold text-primary">Payments</div>
                    </div>
                </div>
                <div class="col-auto  " >
                    <a  class="btn btn-primary btn-block" href="{{ route('payments.add') }}" >
                    <i class="material-icons">add</i>
                    Add New Payment
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
    <div  class="" >
        <div class="container-fluid">
            <div class="row ">
                <div class="col comp-grid " >
                    <div class="card card-1 border rounded page-content" >
                        <div class="card-body">
                            <div class="page-header">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="record-title">Payments</h4>
                                    </div>
                                    <div class="col-sm-3">
                                        <form class="search" action="{{ route('payments.index') }}">
                                            <div class="input-group">
                                                <input value="{{ request()->get('search') }}" class="form-control" type="text" name="search" placeholder="Search" />
                                                <button class="btn btn-primary"><i class="material-icons">search</i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-sm text-left">
                                  <thead class="table-header ">
                                        <tr>
                                            <th class="td-id">ID</th>
                                            <th class="td-payment_name">Payment Name</th>
                                            <th class="td-amount">Amount (₦)</th>
                                            <th class="td-start_date">Start Date</th>
                                            <th class="td-end_date">End Date</th>
                                            <th class="td-status">Status</th>
                                            <th class="td-created_at">Created</th>
                                            <th class="td-btn"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="page-data">
                                        @foreach($records as $record)
                                        <tr>
                                            <td class="td-id">{{ $record->id }}</td>
                                            <td class="td-payment_name">{{ $record->payment_name }}</td>
                                            <td class="td-amount">₦{{ number_format($record->amount, 2) }}</td>
                                            <td class="td-start_date">{{ $record->start_date->format('d/m/Y') }}</td>
                                            <td class="td-end_date">{{ $record->end_date->format('d/m/Y') }}</td>
                                            <td class="td-status">
                                                <span class="badge {{ $record->status == 'active' ? 'bg-success' : ($record->status == 'inactive' ? 'bg-danger' : 'bg-warning') }}">
                                                    {{ ucfirst($record->status) }}
                                                </span>
                                            </td>
                                            <td class="td-created_at">{{ $record->created_at->format('d/m/Y H:i') }}</td>
                                            <td class="td-btn">
                                                <div class="d-flex gap-2">
                                                    <a class="btn btn-sm btn-info" href="{{ route('payments.view', ['rec_id' => $record->id]) }}" title="View">
                                                        <i class="material-icons">visibility</i>
                                                    </a>
                                                    <a class="btn btn-sm btn-primary" href="{{ route('payments.edit', ['rec_id' => $record->id]) }}" title="Edit">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                    <a class="btn btn-sm btn-danger record-delete-btn" href="{{ url('admin/payments/delete/' . $record->id) }}" data-prompt-msg="Are you sure you want to delete this payment?" data-display-style="modal" title="Delete">
                                                        <i class="material-icons">delete_sweep</i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="p-3">
                                {{ $records->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
