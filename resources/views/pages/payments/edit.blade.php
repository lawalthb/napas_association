@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page" data-page-type="edit" data-page-url="{{ url()->full() }}">
    <?php
        if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3" >
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-auto back-btn-col" >
                    <a class="back-btn btn " href="{{ url()->previous() }}" >
                        <i class="material-icons">arrow_back</i>
                    </a>
                </div>
                <div class="col" >
                    <div class="">
                        <div class="h5 font-weight-bold text-primary">Edit Payment</div>
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
                <div class="col-md-12 comp-grid" >
                    <div class="card card-1 border rounded page-content" >
                        <div class="card-header p-3">
                            <h4 class="card-title">Edit Payment</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('payments.update', ['rec_id' => $record->id]) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="payment_name">Payment Name</label>
                                    <input type="text" name="payment_name" id="payment_name" value="{{ old('payment_name', $record->payment_name) }}" class="form-control" required>
                                    @error('payment_name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="amount">Amount (₦)</label>
                                    <input type="number" name="amount" id="amount" value="{{ old('amount', $record->amount) }}" class="form-control" required>
                                    @error('amount')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Applicable Levels</label>
                                    @foreach($levels as $level)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="levels[]" value="{{ $level->id }}" id="level{{ $level->id }}"
                                            {{ in_array($level->id, old('levels', isset($record->levels) ? $record->levels->pluck('id')->toArray() : [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="level{{ $level->id }}">{{ $level->name }}</label>
                                    </div>
                                    @endforeach
                                    @error('levels')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="start_date">Start Date</label>
                                        <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $record->start_date->format('Y-m-d')) }}" class="form-control" required>
                                        @error('start_date')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="end_date">End Date</label>
                                        <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $record->end_date->format('Y-m-d')) }}" class="form-control" required>
                                        @error('end_date')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="active" {{ old('status', $record->status) == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ old('status', $record->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                        <option value="pending" {{ old('status', $record->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                    </select>
                                    @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">Description (Optional)</label>
                                    <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $record->description) }}</textarea>
                                </div>
<div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary">Update Payment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
