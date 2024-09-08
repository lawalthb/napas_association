
@extends('layouts.report')
@section('content')
<div id="report-title"><h1>Official Receipt</h1></div>
<table class="table table-sm table-striped">
    <tbody>
        <tr>
            <th>Receipt No</th>
            <td>{{ $record->id }}</td>
        </tr>
        <tr>
            <th>Reference</th>
            <td>{{ $record->reference }}</td>
        </tr>
        <tr>
            <th>Fullname</th>
            <td>{{ $record->fullname }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $record->email }}</td>
        </tr>
        <tr>
            <th>Price Settings</th>
            <td>{{ $record->price_settings_id }}</td>
        </tr>
        <tr>
            <th>Amount</th>
            <td>{{ $record->amount }}</td>
        </tr>
        <tr>
            <th>Phone Number</th>
            <td>{{ $record->phone_number }}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{ $record->created_at }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $record->status }}</td>
        </tr>
        <tr>
            <th>Payment Link</th>
            <td>{{ $record->authorization_url }}</td>
        </tr>
    </tbody>
</table>
@endsection
