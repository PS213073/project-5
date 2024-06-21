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
                var calendarEl = document.getElementById('calendar');
                var events = @json($events);
                // console.log(events);
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
                            <div class="group hover:text-black">
                                <div>${startTime} - ${endTime}</div>
                                <div>${arg.event.title}</div>
                                <div class="gap-10 mt-2 hidden group-hover:flex">
                                      <a href="/admin/shifts/${arg.event.id}/edit" title="Edit">
                                        <svg class="h-5 w-5 text-green-500" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"/>
                                            <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3"/>
                                            <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3"/>
                                            <line x1="16" y1="5" x2="19" y2="8"/>
                                        </svg>
                                    </a>

                                     <form action="{{ route('admin.shifts.destroy', '') }}/${arg.event.id}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" title="Delete" onclick="return confirm('Are you sure you want to delete this event?');">
                                            <svg class="h-5 w-5 text-red-500" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z"/>
                                                <line x1="18" y1="6" x2="6" y2="18"/>
                                                <line x1="6" y1="6" x2="18" y2="18"/>
                                            </svg>
                                        </button>
                                        </form>
                                </div>
                        </div>

                    `;
                        return {
                            html: html
                        };
                    },
                });
                calendar.render();
            });
        </script>
    @endpush
</x-app-layout>
