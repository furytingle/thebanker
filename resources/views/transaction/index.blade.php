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
                @foreach($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->amount }}</td>
                        <td>{{ $transaction->customerId }}</td>
                        <td>{{ $transaction->dateCreated }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $transactions->links() }}
    </div>
@endsection