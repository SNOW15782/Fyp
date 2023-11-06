<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Room List</title>


    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .description {
            max-height: 100px; /* Set your desired max height */
            overflow: hidden;
        }
    </style>

</head>
<body class="bg-gray-100 font-sans flex h-screen">
    <div class="bg-gray-800 text-white w-64 p-6 mt-10 mb-10 rounded-tr-md rounded-br-md">
        <h1 class="text-2xl font-semibold mb-4">Dashboard</h1>
        <ul>
            <li class="mb-2">
                <a href="#" class="text-gray-300 hover:text-white">Dashboard</a>
            </li>
            <li class="mb-2">
                <a href="#" class="text-gray-300 hover:text-white">Rooms</a>
            </li>
            <!-- Add more menu items here -->
        </ul>
    </div>

    <div class="container mx-auto p-6">
        <div class="mb-4">
            <div class="w-full flex justify-end">
                <button id="profile-button" type="button" class="rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-200" aria-expanded="false">
                    John Doe <!-- Replace with the user's name -->
                </button>
            </div>
            <!-- Dropdown menu (initially hidden) -->
            <div id="profile-dropdown" class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                <div class="py-1" role="menuitem" aria-orientation="vertical" tabindex="-1">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" role="menuitem" tabindex="-1">
                        View Profile
                    </a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" role="menuitem" tabindex="-1">
                        Log Out
                    </a>
                </div>
            </div>
        </div>
        {{-- AlERT --}}
        @if(session()->has('success'))
            <div id="success-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white shadow-md rounded-md">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-3 px-6 text-left w-1/5 rounded-tl-md">Title</th>
                    <th class="py-3 px-6 text-left">Description</th>
                    <th class="py-3 px-6 text-left">Type</th>
                    <th class="py-3 px-6 text-left">Price</th>
                    <th class="py-3 px-6 text-left">Bedrooms</th>
                    <th class="py-3 px-6 text-left">Bathrooms</th>
                    <th class="py-3 px-6 text-left">Sqft</th>
                    <th class="py-3 px-6 text-left">Location</th>
                    <th class="py-3 px-6 text-left">Edit</th>
                    <th class="py-3 px-6 text-left rounded-tr-md">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roomlisting as $room)
                    <tr class="border-b border-gray-200 ">
                        <td class="py-3 px-6">{{ $room->title }}</td>
                        <td class="py-3 px-6">
                            <div class="description">
                                {{ $room->description }}
                            </div>
                            <button class="show-more-button text-blue-500 hover:text-blue-800" onclick="toggleDescription(this)">Show More</button>
                        </td>
                        <td class="py-3 px-6">{{ $room->type }}</td>
                        <td class="py-3 px-6">{{ $room->price }}</td>
                        <td class="py-3 px-6">{{ $room->bedrooms }}</td>
                        <td class="py-3 px-6">{{ $room->bathrooms }}</td>
                        <td class="py-3 px-6">{{ $room->area_sqft }}</td>
                        <td class="py-3 px-6">{{ $room->location }}</td>
                        <td class="py-3 px-6 text-center">
                            <a href="{{ route('admindirect.edit', ['roomlist' => $room]) }}" class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded">Edit</a>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <form method="post" action="{{ route('admindirect.destroy', ['roomlist' => $room]) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-right mt-8">
            <a href="{{ route('admindirect.create') }}" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">Add New Room</a>
        </div>
    </div>
</body>
<script>
    //ALERT BOX
    // Check if the success message exists
    const successMessage = document.getElementById('success-message');

    if (successMessage) {
        // Delay in milliseconds (e.g., 3000ms or 3 seconds)
        const delay = 3000;

        // Hide or remove the success message after the specified delay
        setTimeout(function() {
            //Hide the element by setting its display to "none"
            successMessage.style.display = 'none';
            successMessage.style.display = 'none';
        }, delay);
    }

    //PROFILE DROPDOWN
    const profileButton = document.getElementById('profile-button');
    const profileDropdown = document.getElementById('profile-dropdown');

    // Add a mouseenter event listener to show the dropdown on hover
    profileButton.addEventListener('mouseenter', () => {
        profileDropdown.style.display = 'block';
    });

    // Add a mouseleave event listener to hide the dropdown when the mouse leaves the button, but keep it open when hovering over the dropdown
    profileButton.addEventListener('mouseleave', () => {
        profileDropdown.addEventListener('mouseenter', () => {
            profileDropdown.style.display = 'block';
        });

        profileDropdown.addEventListener('mouseleave', () => {
            profileDropdown.style.display = 'none';
        });
    });

    //PROFILE HOVER
    function toggleDescription(button) {
        const description = button.previousElementSibling;
        if (description.style.maxHeight) {
            description.style.maxHeight = null;
            button.textContent = 'Show More';
        } else {
            description.style.maxHeight = 'none';
            button.textContent = 'Show Less';
        }
    }

</script>
</html>
