<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Room List</title>

    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Room List</h1>
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Bedrooms</th>
                    <th>Bathrooms</th>
                    <th>Sqft</th>
                    <th>Location</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roomlisting as $room)
                    <tr>
                        <td>{{ $room->title }}</td>
                        <td>{{ $room->description }}</td>
                        <td>{{ $room->type }}</td>
                        <td>{{ $room->price }}</td>
                        <td>{{ $room->bedrooms }}</td>
                        <td>{{ $room->bathrooms }}</td>
                        <td>{{ $room->area_sqft }}</td>
                        <td>{{ $room->location }}</td>
                        <td>
                            <a href="{{ route('admindirect.edit', ['roomlist' => $room]) }}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form method="post" action="{{ route('admindirect.destroy', ['roomlist' => $room]) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            <a href="{{ route('admindirect.create') }}" class="btn btn-primary">Add New Room</a>
        </div>
    </div>

    <!-- Add Bootstrap JS (Optional) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
