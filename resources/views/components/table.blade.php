

@props(['tableId', 'thead', 'tbody'])

<div class="w-full overflow-x-auto mb-3">
    <table class="min-w-full divide-y divide-black border border-gray-200" id="{{ $tableId }}">
        <thead class="bg-primary uppercase text-white text-left text-nowrap ">
            {{ $thead }}
        </thead>
        <tbody>
            {{ $tbody }}
        </tbody>
    </table>
</div>
