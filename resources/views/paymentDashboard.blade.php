<html>
    <head>
        <meta charset="utf-8"/>
        <title>Payment Management System</title>
        <link href="/css/indexView.css" rel="stylesheet"/>
    </head>
    <body>
        @include('nav')
        <h1 class="mainTitle">List of Payments</h1>
        <div class="buttonContainer">
            <a href="{{ route('payments.create') }}"><button class="button-field add" role="button">Add Payment</button></a>
        </div>
        <div class="searchContainer">
            <form action="{{ route('payments.index') }}" method="GET">
                <input type="text" name="search" placeholder="Search by email..." value="{{ request()->query('search') }}">
                <button type="submit" class="button-field action search">Search</button>
            </form>
        </div>
        <table class="mainTable">
            <tr>
                <th>No.</th>
                <th>ID</th>
                <th>User Email</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            @foreach($payments as $payment)
                <tr>
                    <td>{{'('.$loop->iteration + ($payments->currentPage() - 1) * $payments->perPage().')'}}</td>
                    <td>{{$payment->id}}</td>
                    <td>{{ $payment->user->email }}</td>
                    <td>{{ $payment->amount }}</td>
                    <td>{{ $payment->payment_date }}</td>
                    <td>{{ $payment->status }}</td>
                    <td class="actions">
                        <a href="{{route('payments.show', $payment->id)}}"><button class="button-field action" role="button">View</button></a>
                        <a href="{{route('payments.edit', $payment->id)}}"><button class="button-field action" role="button">Edit</button></a>
                        <form action="{{ route('payments.destroy', $payment->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" role="button" class="button-field delete" onclick="return confirm('Are you sure you want to delete this payment?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="pagination">
            {{ $payments->links() }}
        </div>
        @include('footer')
    </body>
</html>