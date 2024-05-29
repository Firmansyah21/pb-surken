@extends('layouts.main')

@section('content')

<section class="container w-full min-h-screen d-inline-flex py-10">

       <div class="flex lg:flex-row flex-col-reverse md justify-center gap-3">

        <div class="lg:w-[70%] w-full mx-auto ">
        <div class=" w-full" id="calendar"></div>
        </div>
        <div id="eventDetails" class="hidden" >
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Detail Event
                    </h3>
                    <button id="closeDetails" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="border-t border-gray-200 px-4 py-5">
                            <table class="table-auto w-full">
                                <tbody>
                                    <tr class="bg-white">
                                        <td class="px-4 py-2 font-medium text-gray-500">Judul</td>
                                        <td>:</td>
                                        <td class="px-4 py-2 text-gray-900" id="eventTitle"></td>
                                    </tr>
                                    <tr class="bg-gray-50">
                                        <td class="px-4 py-2 font-medium text-gray-500">Waktu</td>
                                        <td>:</td>
                                        <td class="px-4 py-2 text-gray-900" id="eventJam"></td>
                                    </tr>
                                    <tr class="bg-white">
                                        <td class="px-4 py-2 font-medium text-gray-500">Lokasi</td>
                                        <td>:</td>
                                        <td class="px-4 py-2 text-gray-900" id="eventLocation"></td>

                                    </tr>
                                    <tr class="bg-gray-50">
                                        <td class="px-4 py-2 font-medium text-gray-500">Deskripsi</td>
                                        <td>:</td>
                                        <td class="px-4 py-2 text-gray-900" id="eventDescription"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
       </div>

</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: '/api/agenda',
        locale: 'id',

        eventClick: function(info) {
            // Mengisi detail event
            document.getElementById('eventTitle').innerText = info.event.title;
            document.getElementById('eventJam').innerText = info.event.extendedProps.jam;
            document.getElementById('eventDescription').innerText = info.event.extendedProps.description;
            document.getElementById('eventLocation').innerText = info.event.extendedProps.location;

            // Menampilkan detail event
            document.getElementById('eventDetails').style.display = 'block';
        },

        eventDidMount: function(info) {
            // Menambahkan gaya pointer untuk acara
            info.el.style.cursor = 'pointer';
        }
    });
    calendar.render();

    // Menambahkan event listener untuk tombol close
    document.getElementById('closeDetails').addEventListener('click', function() {
        document.getElementById('eventDetails').style.display = 'none';
    });
});



</script>

@endpush


