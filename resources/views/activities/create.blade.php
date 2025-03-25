<!DOCTYPE html>
<html>
<head>
    <title>Create Activity</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Add Activity for User</h2>
    <form method="POST" action="{{ route('activities.store') }}">
        @csrf
        <div class="form-group">
            <label for="activity_name">Activity Name</label>
            <input type="text" name="activity_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="user_id">Select User:</label>
            <select name="user_id" class="form-control" required>
                <option value="">Select User</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} (ID: {{ $user->id }})</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Activity</button>
        <a href="{{ route('leaderboard.index') }}" class="btn btn-secondary">Back to Leaderboard</a>
    </form>
</div>

</body>
</html>
