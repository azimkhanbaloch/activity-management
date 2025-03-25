<!DOCTYPE html>
<html>
<head>
    <title>Leaderboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">🏆 Leaderboard 🏆</h2>
    <div class="mb-3">
        <a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a>
        <a href="{{ route('activities.create') }}" class="btn btn-primary"> Add Activity</a>
    </div>

    <!-- Filter & Search -->
    <form method="GET" class="my-3">
        <div class="row">
            <div class="col-md-4">
                <select name="filter" class="form-control">
                    <option {{ isset($_GET['filter']) && $_GET['filter'] === "" ? 'selected' : '' }} value="">All Time</option>
                    <option {{ isset($_GET['filter']) && $_GET['filter'] === "day" ? 'selected' : '' }} value="day">Today</option>
                    <option {{ isset($_GET['filter']) && $_GET['filter'] === "month" ? 'selected' : '' }} value="month">This Month</option>
                    <option {{ isset($_GET['filter']) && $_GET['filter'] === "year" ? 'selected' : '' }} value="year">This Year</option>
                </select>
            </div>
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Search by User ID" value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Apply</button>
                <a href="{{ route('leaderboard.recalculate') }}" class="btn btn-warning">Recalculate</a>
                <a href="{{ route('leaderboard.index') }}" class="btn btn-danger">Clear</a>
            </div>
        </div>
    </form>

    <!-- Leaderboard Table -->
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Rank</th>
                <th>User ID</th>
                <th>Name</th>
                <th>Total Points</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->rank }}</td>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->total_points }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
