<html>
    <head>
        <meta charset="utf-8"/>
        <title>Discount Management System</title>
        <link href="/css/indexView.css" rel="stylesheet"/>
    </head>
    <body>
        @include('nav')
        <h1 class="mainTitle">List of Discounts</h1>
        <div class="buttonContainer">
            <a href="{{ route('discounts.create') }}"><button class="button-field add" role="button">Add Discount</button></a>
        </div>
        <div class="searchContainer">
            <form action="{{ route('discounts.index') }}" method="GET">
                <input type="text" name="search" placeholder="Search by plan or email..." value="{{ request()->query('search') }}">
                <button type="submit" class="button-field action search">Search</button>
            </form>
        </div>
        <table class="mainTable">
            <tr>
                <th>No.</th>
                <th>ID</th>
                <th>User Email</th>
                <th>Old Plan</th>
                <th>Discounted Amount</th>
                <th>Subscription ID</th>
                <th>Actions</th>
            </tr>
            @foreach($discounts as $discount)
                <tr>
                    <td>{{'('.$loop->iteration + ($discounts->currentPage() - 1) * $discounts->perPage().')'}}</td>
                    <td>{{$discount->id}}</td>
                    <td>{{ $discount->subscription->user->email }}</td>
                    <td>{{ $discount->plan }}</td>
                    <td>{{ $discount->discount_price }}</td>
                    <td>{{ $discount->subscription->id }}</td>
                    <td class="actions">
                        <a href="{{route('discounts.show', $discount->id)}}"><button class="button-field action" role="button">View</button></a>
                        <a href="{{route('discounts.edit', $discount->id)}}"><button class="button-field action" role="button">Edit</button></a>
                        <form action="{{ route('discounts.destroy', $discount->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" role="button" class="button-field delete" onclick="return confirm('Are you sure you want to delete this discount?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="pagination">
            {{ $discounts->links() }}
        </div>
        @include('footer')
    </body>
</html>