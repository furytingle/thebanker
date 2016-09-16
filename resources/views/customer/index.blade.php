@extends("layouts.app")

@section("content")

    <div class="container">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th><a class="btn btn-link" href="?filter=amount">Amount</a></th>
                <th><a class="btn btn-link" href="?filter=customerId">Customer ID</a></th>
                <th><a class="btn btn-link" href="?filter=dateCreated">Date</a></th>
            </tr>
            </thead>
            <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->amount }}</td>
                    <td>{{ $customer->customerId }}</td>
                    <td>{{ $customer->dateCreated }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection