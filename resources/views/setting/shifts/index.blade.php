<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-2">

                <div class="text-right">
                    <a href="{{ route('admin.shifts.create') }}"
                        class="bg-[#3E6553] text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-[#1e3129] transition-colors ">Nieuwe
                        ploegdienst</a>
                </div>


                <div class="bg-white shadow-md rounded my-6">
                    <div class="p-3" id="calendar"></div>
                </div>
            </div>
        </main>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // console.log(@json($events));
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridWeek',
                    selectable: true,
                    events: @json($events),
                    eventContent: function(arg) {
                        var startTime = new Date(arg.event.start).toLocaleTimeString([], {
                            hour: '2-digit',
                            minute: '2-digit'
                        });
                        var endTime = new Date(arg.event.end).toLocaleTimeString([], {
                            hour: '2-digit',
                            minute: '2-digit'
                        });
                        var html = `
                    <div>
                        <div>${startTime} - ${endTime}</div>
                        <div>${arg.event.title}</div>
                    </div>
                `;
                        return {
                            html: html
                        };
                    },
                    eventClick: function(info) {
                        var startTime = new Date(info.event.start).toLocaleTimeString([], {
                            hour: '2-digit',
                            minute: '2-digit'
                        });
                        var endTime = new Date(info.event.end).toLocaleTimeString([], {
                            hour: '2-digit',
                            minute: '2-digit'
                        });
                        alert('Event: ' + info.event.title + '\n' +
                            'Start time: ' + startTime + '\n' +
                            'End time: ' + endTime);
                    }
                });
                calendar.render();
            });
        </script>
    @endpush

</x-app-layout>
