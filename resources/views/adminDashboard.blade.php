<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Admin Dashboard</title>
        <link href="/css/admin.css" rel="stylesheet"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    @include('nav')
    <body>
        <h1 class="dashboard-title">Admin Dashboard</h1>
        <table class="dashboard-container">
        <tr><td><button class="dashboard-button green" onclick="window.location.href='{{ route('users.index') }}'">
            <h1>User Dashboard</h1><br>
            <p>View, edit or delete users here.</p>
        </button></td>
        <td><button class="dashboard-button red" onclick="window.location.href='{{ route('subscriptions.index') }}'">
            <h1>Subscriptions Dashboard</h1><br>
            <p>Cancel, modify or add subscriptions here!</p>
        </button></td></tr>
        <tr><td><button class="dashboard-button blue" onclick="window.location.href='{{ route('payments.index') }}'">
            <h1>Payment Dashboard</h1><br>
            <p>Add, modify or delete payments here!</p>
        </button></td>
        <td><button class="dashboard-button orange" onclick="window.location.href='{{ route('discounts.index') }}'">
            <h1>Discounts Dashboard</h1><br>
            <p>Give, modify or delete discounts here!</p>
        </button></td></tr>
        </table>
    </body>
    @include('footer')
</html>