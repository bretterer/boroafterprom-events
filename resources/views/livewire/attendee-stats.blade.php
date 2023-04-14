<div>
    <div>
        <dl class="grid grid-cols-1 gap-5 sm:grid-cols-3">
            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
            <dt class="truncate text-sm font-medium text-gray-500">Total Attendees</dt>
            <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ $this->totalAttendees() }}</dd>
            </div>

            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
            <dt class="truncate text-sm font-medium text-gray-500">Checked In</dt>
            <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ $this->checkedIn() }}</dd>
            </div>

            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
            <dt class="truncate text-sm font-medium text-gray-500">Checked Out</dt>
            <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ $this->checkedOut() }}</dd>
            </div>
        </dl>
    </div>

</div>
