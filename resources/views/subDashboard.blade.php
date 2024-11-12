<html>
    <head>
        <meta charset="utf-8"/>
        <title>Manage Subscriptions</title>
        <link href="/css/indexView.css" rel="stylesheet"/>
    </head>
    <body>
        @include('nav')
        <h1 class="mainTitle">List of Subscriptions</h1>
        <div class="buttonContainer">
            <a href="{{ route('subscriptions.create') }}"><button class="button-field add" role="button">Add Subscription</button></a>
        </div>
        <div class="searchContainer">
            <form action="{{ route('subscriptions.index') }}" method="GET">
                <input type="text" name="search" placeholder="Search by email or plan name..." value="{{ request()->query('search') }}">
                <button type="submit" class="button-field action search">Search</button>
            </form>
        </div>
        <table class="mainTable">
            <tr>
                <th>No.</th>
                <th>User Email</th>
                <th>Plan</th>
                <th>Start Date</th>
                <th>Duration</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            @foreach($subscriptions as $subscription)
                <tr>
                    <td>{{'('.$loop->iteration + ($subscriptions->currentPage() - 1) * $subscriptions->perPage().')'}}</td>
                    <td>{{$subscription->user->email}}</td>
                    <td>{{ $subscription->plan }}</td>
                    <td>{{ $subscription->start_date->format('Y/m/d')  }}</td>
                    <td>{{ $subscription->duration }}</td>
                    <td>{{ $subscription->status }}</td>
                    <td class="actions">
                        <a href="{{route('subscriptions.show', $subscription->id)}}"><button class="button-field action" role="button">View</button></a>
                        <a href="{{route('subscriptions.edit', $subscription->id)}}"><button class="button-field action" role="button">Edit</button></a>
                        <form action="{{ route('subscriptions.destroy', $subscription->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" role="button" class="button-field delete" onclick="return confirm('Are you sure you want to delete this subscription?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="pagination">
            {{ $subscriptions->links() }}
        </div>
        @include('footer')
    </body>
</html>