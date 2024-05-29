@props(['route'])


    <form method="GET" action="{{ $route }}" class="flex items-center">
        <input type="text" name="search" placeholder="Search" class="border rounded-md p-2 mr-2">
        <button type="submit" class="bg-blue-500 text-white rounded-md p-2">Search</button>
    </form>

