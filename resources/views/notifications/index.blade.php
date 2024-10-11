<x-app-layout>
    @push('css')
        <style>
            @media screen and (max-width: 768px) {
                input.gridjs-input {
                    width: 80%;
                }
            }

            @media only screen and (max-width: 1080px) {
                input.gridjs-input {
                    width: 80%;
                }
            }

            input.gridjs-checkbox {
                border: 1px solid #ccc;
                padding: 1px 1px 1px;
                border-radius: 5px;
                text-align: right;
            }
        </style>
    @endpush

    <div class="mt-8" style="margin-left: 8%; margin-right: 8%;">
        <div class="border-b border-gray-200">
            <nav class="flex space-x-4" aria-label="Tabs">
                <button id="inbox-tab" class="tab active text-red-500 text-xl font-medium text-center py-4 px-4"
                    onclick="showTab('inbox')">
                    Inbox
                    <span class="font-semibold text-lg">
                        ({{ count($unreadedNotifications) }})
                    </span>
                </button>
                {{-- <button id="read-tab" class="tab text-gray-700 text-xl font-medium text-center py-4 px-4"
                    onclick="showTab('read')">
                    Leídas
                    <span class="font-semibold text-lg">
                        ({{ count($readedNotifications) }})
                    </span>
                </button> --}}
            </nav>
        </div>
        <div id="inbox" class="tab-content mt-8">
            <button
                class="mark-as-read-button border border-gray-300 rounded-md text-gray-700 bg-white hover:bg-gray-50 py-2 px-2 ml-8 mt-2 flex items-center hidden"
                onclick="markAsRead(event, ids)">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                <div>
                    <span class="font-semibold text-lg">Marcar como leido</span>
                    <span class="checkbox-selected-counter font-semibold text-lg"></span>
                </div>
            </button>

            <div id="inbox-wrapper" class="mt-4 mb-4"></div>
        </div>
        <div id="read" class="tab-content mt-8 hidden">
            <div id="read-wrapper"></div>
        </div>

    </div>

    @push('scripts')
        <script src="https://unpkg.com/gridjs/plugins/selection/dist/selection.umd.js"></script>
        <script type="text/javascript">
            let readedNotifications = @json($readedNotifications);
            let unreadedNotifications = @json($unreadedNotifications);
            let grid;
            let csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            unreadedNotifications.forEach(notification => {
                notification.message = gridjs.h('span', {
                    class: 'rounded-md px-2 py-1 text-sm font-semibold text-red-700 ring-1 ring-inset ring-red-600/10'
                }, notification.data.message);

                /*notification.actions = gridjs.h('span', {}, gridjs.h('a', {
                    class: 'text-md font-semibold underline decoration-dashed',
                    href: massiveQuantityUpdateUrl,
                    style: 'text-decoration-style: dotted;',
                    target: 'blank',
                }, 'Ver mas'));*/
            });

            function renderGrid(wrapperId, data) {
                let columns = [
                    @php echo "'" . implode("','", __('notifications/grid.columns')) . "'"; @endphp
                ];

                grid = new gridjs.Grid({
                    columns: columns,
                    data: data,
                    pagination: {
                        limit: 10,
                        summary: true
                    },
                    language: {
                        'pagination': {
                            'previous': '⬅️',
                            'next': '➡️',
                        }
                    },
                }).render(document.getElementById(wrapperId));
            }
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                renderGrid('inbox-wrapper', unreadedNotifications);
                renderGrid('read-wrapper', readedNotifications, false);
            });
        </script>
    @endpush
</x-app-layout>
