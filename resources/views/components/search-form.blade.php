@props(['route'])

<div class="mb-3 ">

    <form method="GET" action="{{route($route)  }}" class="flex items-center">
        <input type="text" name="search" placeholder="Cari Nama Disini..." class="border rounded-md p-2 mr-2">
        <button type="submit" class="bg-blue-500 text-white rounded-md p-2">Cari</button>
    </form>

</div>
