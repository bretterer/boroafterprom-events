<div>

    <div class="px-4 sm:px-6 lg:px-8">
        <div class="mt-8 flow-root">
            <div class="pb-10">
                @livewire('attendee-stats')
            </div>
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                        <div class="flex">
                            <div class="relative flex-grow focus-within:z-10">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input type="search" wire:model="search" name="search" id="desktop-search-candidate" class="w-full rounded-t-md  border-0 py-1.5 pl-10 text-sm leading-6 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400" placeholder="Search attendees (first name, last name, or order number)">
                            </div>

                        </div>
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Phone</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Reference</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach($attendees as $attendee)
                                <tr class="cursor-pointer" @click.prevent="Livewire.emit('setCurrentAttendee', '{{ $attendee->id }}')">
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $attendee->first_name }} {{ $attendee->last_name }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $attendee->email }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $attendee->phone }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">#{{ explode('-', $attendee->ticket->uuid)[0] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <nav class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6" aria-label="Pagination">
                            <div class="hidden sm:block">
                                <p class="text-sm text-gray-700">
                                Showing
                                <span class="font-medium">{{ $attendees->firstItem() }}</span>
                                to
                                <span class="font-medium">{{ $attendees->lastItem() }}</span>
                                of
                                <span class="font-medium">{{ $attendees->total() }}</span>
                                results
                                </p>
                            </div>
                            @if ($attendees->hasPages())
                            <div class="flex flex-1 justify-between sm:justify-end">
                                @if ($attendees->onFirstPage())
                                <button disabled class="relative inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-500 ring-1 ring-inset ring-gray-300 focus-visible:outline-offset-0">{!! __('pagination.previous') !!}</button>
                                @else
                                <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev" class="relative inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus-visible:outline-offset-0">{!! __('pagination.previous') !!}</button>
                                @endif

                                @if ($attendees->hasMorePages())
                                <button wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="relative ml-3 inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus-visible:outline-offset-0">{!! __('pagination.next') !!}</button>
                                @else
                                <button disabled class="relative ml-3 inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-500 ring-1 ring-inset ring-gray-300 focus-visible:outline-offset-0">{!! __('pagination.next') !!}</button>
                                @endif
                            </div>
                            @endif
                        </nav>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @livewire('attendee-detail-modal')
</div>