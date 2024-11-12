<html>
    <head>
        <meta charset="utf-8"/>
        <title>User Management System</title>
        <link href="/css/indexView.css" rel="stylesheet"/>
    </head>
    <body>
        @include('nav')
        <h1 class="mainTitle">List of Users</h1>
        <div class="buttonContainer">
            <a href="{{ route('users.create') }}"><button class="button-field add" role="button">Add User</button></a>
        </div>
        <table class="mainTable">
            <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Email</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{'('.$loop->iteration + ($users->currentPage() - 1) * $users->perPage().')'}}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->status }}</td>
                    <td class="actions">
                        <a href="{{route('users.show', $user->id)}}"><button class="button-field action" role="button">View</button></a>
                        <a href="{{route('users.edit', $user->id)}}"><button class="button-field action" role="button">Edit</button></a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" role="button" class="button-field delete" onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="pagination">
            {{ $users->links() }}
        </div>
        @include('footer')
    </body>
</html>