<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container mx-auto mt-4">
        <h1 class="text-2xl">Admin Dashboard</h1>

        <form method="post" action="{{ route('admindirect.update', ['roomlist' => $roomlist]) }}">
            @csrf
            @method('put')

            <div class="flex flex-wrap -mx-4"> <!-- Create a flex container -->
                <div class="w-full md:w-1/2 px-4"> <!-- First column, full width on mobile, half on medium screens and wider -->
                    <div class="mt-4">
                        <label for="rentalName" class="block">Rental Name</label>
                        <input type="text" class="form-input w-full border border-gray-300 rounded py-2 px-3" id="rentalName" name="title" value="{{ $roomlist->title }}">
                    </div>
                    <div class="mt-4">
                        <label for="type" class="block">Type</label>
                        <select class="form-select w-full border border-gray-300 rounded py-2 px-3" id="type" name="type" required>
                            <option value="Apartment"{{ $roomlist->type === 'Apartment' ? ' selected' : '' }}>Apartment</option>
                            <option value="House"{{ $roomlist->type === 'House' ? ' selected' : '' }}>House</option>
                            <option value="Condo"{{ $roomlist->type === 'Condo' ? ' selected' : '' }}>Condo</option>
                            <option value="Villa"{{ $roomlist->type === 'Villa' ? ' selected' : '' }}>Villa</option>
                            <option value="Other"{{ $roomlist->type === 'Other' ? ' selected' : '' }}>Other</option>
                        </select>
                    </div>
                    <div class="mt-4">
                        <label for="description" class="block">Description</label>
                        <textarea class="form-textarea w-full border border-gray-300 rounded py-2 px-3" id="description" name="description" rows="4">{{ $roomlist->description }}</textarea>
                    </div>
                    <div class="mt-4">
                        <label for="area_sqft" class="block">Area (sqft)</label>
                        <input type="number" class="form-input w-full border border-gray-300 rounded py-2 px-3" id="area_sqft" name="area_sqft" value="{{ $roomlist->area_sqft }}">
                    </div>
                </div>

                <div class="w-full md:w-1/2 px-4"> <!-- Second column, full width on mobile, half on medium screens and wider -->
                    <!-- Additional fields specific to your table -->
                    <div class="mt-4">
                        <label for="bedrooms" class="block">Bedrooms</label>
                        <input type="number" class="form-input w-full border border-gray-300 rounded py-2 px-3" id="bedrooms" name="bedrooms" value="{{ $roomlist->bedrooms }}">
                    </div>
                    <div class="mt-4">
                        <label for="bathrooms" class="block">Bathrooms</label>
                        <input type="number" class="form-input w-full border border-gray-300 rounded py-2 px-3" id="bathrooms" name="bathrooms" value="{{ $roomlist->bathrooms }}">
                    </div>
                    <div class="mt-4">
                        <label for="price" class="block">Price</label>
                        <input type="number" class="form-input w-full border border-gray-300 rounded py-2 px-3" id="price" name="price" value="{{ $roomlist->price }}">
                    </div>
                    <div class="mt-4">
                        <label for="isAvailable" class="flex items-center">
                            <input type="checkbox" class="form-checkbox border border-gray-300 rounded" id="isAvailable" name="is_available" value="1"{{ $roomlist->is_available ? ' checked' : '' }}>
                            <span class="ml-2">Is Available</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap -mx-4">
                <div class="w-full md:w-1/2 px-4"> <!-- Third column, full width on mobile, half on medium screens and wider -->
                    <div class="mt-4">
                        <label for="location" class="block">Location</label>
                        <input type="text" class="form-input w-full border border-gray-300 rounded py-2 px-3" id="location" name="location" value="{{ $roomlist->location }}">
                    </div>
                </div>
                <div class="w-full md:w-1/2 px-4"> <!-- Fourth column, full width on mobile, half on medium screens and wider -->
                    <div class="mt-4">
                        <label for="imagePath" class="block">Image Path</label>
                        <input type="file" class="form-input w-full border border-gray-300 rounded py-2 px-3" id="imagePath" name="image_path">
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Save Update</button>
            </div>
        </form>
    </div>
</body>
</html>
