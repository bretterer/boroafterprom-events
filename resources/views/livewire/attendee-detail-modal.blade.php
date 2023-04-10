<div x-data="{show: false}"
    x-init="
        Livewire.on('currentAttendeeSet', () => {
            show = true
        })

        Livewire.on('closeModal', () => {
            show = false
        })
        ">


    <div  x-show="show" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            x-show="show"
            ></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-0 items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-xl sm:p-6"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-show="show">
                    <div>







                        <section aria-labelledby="applicant-information-title">
                            <div class="bg-white shadow sm:rounded-lg">
                                <div class="flex items-center">
                                    <div class="flex-1 px-4 py-5 sm:px-6">
                                        <h2 id="attendee-name"
                                            class="text-lg font-medium leading-6 text-gray-900">{{ $attendee->first_name }} {{ $attendee->last_name }}</h2>
                                        <p class="mt-1 max-w-2xl text-sm text-gray-500">{{ $attendee->email }}</p>
                                    </div>
                                    <div class="mr-4">
                                        <button @click="show=false" class="bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded-full">
                                            Close
                                        </button>
                                    </div>
                                </div>
                                <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                                    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">Checked In</dt>
                                            <dd class="mt-1 text-sm text-gray-900 flex flex-col">
                                                <span>{{ $attendee->dateCheckedIn }}</span>
                                                <button
                                                    wire:click.prevent="checkIn"
                                                    class="bg-boro-500 hover:bg-boro-700 text-white font-bold py-2 px-4 rounded">
                                                    Check In
                                                </button>
                                            </dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">Checked Out</dt>
                                            <dd class="mt-1 text-sm text-gray-900 flex flex-col">
                                                <span>{{ $attendee->dateCheckedOut }}</span>
                                                <button
                                                    wire:click.prevent="checkOut"
                                                    class="bg-boro-500 hover:bg-boro-700 text-white font-bold py-2 px-4 rounded">
                                                    Check Out
                                                </button>
                                            </dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">Ticket Purchased</dt>
                                            <dd class="mt-1 text-sm text-gray-900 flex flex-col">
                                                <span>{{ $attendee->ticket->datePaid }}</span>
                                                @if($attendee->ticket->paid_on == null)
                                                <button
                                                    wire:click.prevent="markPaid"
                                                    class="bg-boro-500 hover:bg-boro-700 text-white font-bold py-2 px-4 rounded">
                                                    Mark Paid
                                                </button>
                                                @else
                                                @if($attendee->ticket->payment_type=="cash")
                                                <button
                                                    wire:click.prevent="markUnpaid"
                                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                                    Mark Unpaid
                                                </button>
                                                @else
                                                <button disabled
                                                    class="bg-green-500 text-white font-bold py-2 px-4 rounded">
                                                    Paid
                                                </button>
                                                @endif
                                                @endif
                                            </dd>
                                        </div>
                                        @if($attendee->guest)
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">Guest</dt>
                                            <dd class="mt-1 text-sm text-gray-900 flex flex-col">
                                                <span>{{ $attendee->guestName }}</span>
                                                <button
                                                    @click.prevent="Livewire.emit('setCurrentAttendee', '{{ $attendee->guest->id }}')"
                                                    class="bg-boro-500 hover:bg-boro-700 text-white font-bold py-2 px-4 rounded">
                                                    View Guest
                                                </button>
                                            </dd>
                                        </div>
                                        @endif
                                        @if($attendee->isGuest())
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">Primary Attendee</dt>
                                            <dd class="mt-1 text-sm text-gray-900 flex flex-col">
                                                <span>{{ $attendee->primary->first_name }} {{ $attendee->primary->last_name }}</span>
                                                <button
                                                    @click.prevent="Livewire.emit('setCurrentAttendee', '{{ $attendee->primary->id }}')"
                                                    class="bg-boro-500 hover:bg-boro-700 text-white font-bold py-2 px-4 rounded">
                                                    View Primary Attendee
                                                </button>
                                            </dd>
                                        </div>
                                        @endif

                                        <div class="sm:col-span-2 space-y-2">
                                            <dt class="text-sm font-medium text-gray-500">Utilities</dt>
                                            <dd class="mt-1 text-sm text-gray-900 flex flex-col">
                                                <span></span>
                                                <div class="flex space-x-2 align-middle">
                                                    <div class="flex rounded-md shadow-sm  align-middle">
                                                        <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 px-3 text-gray-500 sm:text-sm">Quantity:</span>
                                                        <input type="text" wire:model="labelQty" class="block w-full min-w-0 flex-1 rounded-none rounded-r-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" >
                                                    </div>
                                                    <button
                                                        @click="printLabels"
                                                        class="flex-1 bg-boro-500 hover:bg-boro-700 text-white font-bold py-2 px-4 rounded">
                                                        Print Labels
                                                    </button>
                                                </div>
                                            </dd>
                                            <dd class="mt-1 text-sm text-gray-900 flex flex-col">
                                                <span></span>
                                                <button
                                                    wire:click.prevent="resendTicket"
                                                    class="bg-boro-500 hover:bg-boro-700 text-white font-bold py-2 px-4 rounded">
                                                    Resend Ticket
                                                </button>
                                            </dd>

                                            <dd class="mt-1 text-sm text-gray-900 flex flex-col">
                                                <span></span>
                                                <button
                                                    wire:click.prevent="deleteAttendee"
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                    Delete Attendee
                                                </button>
                                            </dd>

                                        </div>


                                        <div class="sm:col-span-2">
                                            <h3 class="text-lg font-medium leading-6 text-gray-900">Payment method</h3>

                                            @if($attendee->ticket->payment_type != "cash" && $attendee->ticket->payment_type != null && $paymentInfo != null)
                                            <div class="mt-5">
                                                <div class="rounded-md bg-gray-50 px-6 py-5 sm:flex sm:items-start sm:justify-between">
                                                    <div class="sm:flex sm:items-start">

                                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800 uppercase"> {{$paymentInfo['brand']}} </span>
                                                        <div class="mt-3 sm:mt-0 sm:ml-4">
                                                            <div class="text-sm font-medium text-gray-900">Ending with {{$paymentInfo['last4']}}</div>
                                                            <div class="mt-1 text-sm text-gray-600 sm:flex sm:items-center">
                                                                <div>Expires {{$paymentInfo['exp_month']}}/{{$paymentInfo['exp_year']}}</div>
                                                                <span class="hidden sm:mx-2 sm:inline" aria-hidden="true"> · </span>
                                                                <div class="mt-1 sm:mt-0">Paid on {{$attendee->ticket->paid_on->format('M d, Y')}}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-4 sm:mt-0 sm:ml-6 sm:flex-shrink-0">
                                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-green-100 text-green-800"> PAID </span>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @if($attendee->ticket->payment_type == "cash")
                                            <div class="mt-5">
                                                <div class="rounded-md bg-gray-50 px-6 py-5 sm:flex sm:items-start sm:justify-between">
                                                    <div class="sm:flex sm:items-start">

                                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800 uppercase"> CASH </span>
                                                        <div class="mt-3 sm:mt-0 sm:ml-4">
                                                            <div class="text-sm font-medium text-gray-900">Cash Payment</div>
                                                            <div class="mt-1 text-sm text-gray-600 sm:flex sm:items-center">
                                                                @if($attendee->ticket->paid_on != null)
                                                                <div class="mt-1 sm:mt-0">Paid on {{$attendee->ticket->paid_on->format('M d, Y')}}</div>
                                                                @else
                                                                <div class="mt-1 sm:mt-0">Pending Payment</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-4 sm:mt-0 sm:ml-6 sm:flex-shrink-0">
                                                        @if($attendee->ticket->paid_on != null)
                                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-green-100 text-green-800"> PAID </span>
                                                        @else
                                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-red-100 text-red-800"> PENDING PAYMENT </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>

                                        <div class="sm:col-span-2">
                                            <h3 class="text-lg font-medium leading-6 text-gray-900">Event Log</h3>

                                            <ul role="list" class="-mb-8 mt-4">
                                                @foreach($attendee->activityLog as $log)

                                                <li>
                                                    <div class="relative pb-8">
                                                        @if(!$loop->last)
                                                        <span
                                                            class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"
                                                            aria-hidden="true"></span>
                                                        @endif
                                                        <div class="relative flex space-x-3">
                                                            <div>
                                                                {!!$log->getIcon($log->icon)!!}
                                                            </div>
                                                            <div
                                                                class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                                                <div>
                                                                    <p class="text-sm text-gray-500">{{$log->message}}</p>
                                                                </div>
                                                                <div
                                                                    class="whitespace-nowrap text-right text-sm text-gray-500">
                                                                    <time datetime="2020-09-20">{{$log->created_at->format('M d')}}</time>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                                <!-- <li>
                                                    <div class="relative pb-8">
                                                        <span
                                                            class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"
                                                            aria-hidden="true"></span>
                                                        <div class="relative flex space-x-3">
                                                            <div>
                                                                <span
                                                                    class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center ring-8 ring-white">
                                                                    <svg class="h-5 w-5 text-white" viewBox="0 0 20 20"
                                                                        fill="currentColor" aria-hidden="true">
                                                                        <path
                                                                            d="M1 8.25a1.25 1.25 0 112.5 0v7.5a1.25 1.25 0 11-2.5 0v-7.5zM11 3V1.7c0-.268.14-.526.395-.607A2 2 0 0114 3c0 .995-.182 1.948-.514 2.826-.204.54.166 1.174.744 1.174h2.52c1.243 0 2.261 1.01 2.146 2.247a23.864 23.864 0 01-1.341 5.974C17.153 16.323 16.072 17 14.9 17h-3.192a3 3 0 01-1.341-.317l-2.734-1.366A3 3 0 006.292 15H5V8h.963c.685 0 1.258-.483 1.612-1.068a4.011 4.011 0 012.166-1.73c.432-.143.853-.386 1.011-.814.16-.432.248-.9.248-1.388z" />
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                            <div
                                                                class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                                                <div>
                                                                    <p class="text-sm text-gray-500">Checked In</p>
                                                                </div>
                                                                <div
                                                                    class="whitespace-nowrap text-right text-sm text-gray-500">
                                                                    <time datetime="2020-09-22">Sep 22</time>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="relative pb-8">
                                                        <span
                                                            class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"
                                                            aria-hidden="true"></span>
                                                        <div class="relative flex space-x-3">
                                                            <div>
                                                                <span
                                                                    class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center ring-8 ring-white">
                                                                    <svg class="h-5 w-5 text-white"
                                                                        viewBox="0 0 20 20" fill="currentColor"
                                                                        aria-hidden="true">
                                                                        <path fill-rule="evenodd"
                                                                            d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                                            clip-rule="evenodd" />
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                            <div
                                                                class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                                                <div>
                                                                    <p class="text-sm text-gray-500">Event Reminder
                                                                        Email</p>
                                                                </div>
                                                                <div
                                                                    class="whitespace-nowrap text-right text-sm text-gray-500">
                                                                    <time datetime="2020-09-28">Sep 28</time>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="relative pb-8">
                                                        <span
                                                            class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"
                                                            aria-hidden="true"></span>
                                                        <div class="relative flex space-x-3">
                                                            <div>
                                                                <span
                                                                    class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center ring-8 ring-white">
                                                                    <svg class="h-5 w-5 text-white"
                                                                        viewBox="0 0 20 20" fill="currentColor"
                                                                        aria-hidden="true">
                                                                        <path
                                                                            d="M1 8.25a1.25 1.25 0 112.5 0v7.5a1.25 1.25 0 11-2.5 0v-7.5zM11 3V1.7c0-.268.14-.526.395-.607A2 2 0 0114 3c0 .995-.182 1.948-.514 2.826-.204.54.166 1.174.744 1.174h2.52c1.243 0 2.261 1.01 2.146 2.247a23.864 23.864 0 01-1.341 5.974C17.153 16.323 16.072 17 14.9 17h-3.192a3 3 0 01-1.341-.317l-2.734-1.366A3 3 0 006.292 15H5V8h.963c.685 0 1.258-.483 1.612-1.068a4.011 4.011 0 012.166-1.73c.432-.143.853-.386 1.011-.814.16-.432.248-.9.248-1.388z" />
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                            <div
                                                                class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                                                <div>
                                                                    <p class="text-sm text-gray-500">Ticket
                                                                        Confirmation Emailed</p>
                                                                </div>
                                                                <div
                                                                    class="whitespace-nowrap text-right text-sm text-gray-500">
                                                                    <time datetime="2020-09-30">Sep 30</time>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="relative pb-8">
                                                        <div class="relative flex space-x-3">
                                                            <div>
                                                                <span
                                                                    class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center ring-8 ring-white">
                                                                    <svg class="h-5 w-5 text-white"
                                                                        viewBox="0 0 20 20" fill="currentColor"
                                                                        aria-hidden="true">
                                                                        <path fill-rule="evenodd"
                                                                            d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                                            clip-rule="evenodd" />
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                            <div
                                                                class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                                                <div>
                                                                    <p class="text-sm text-gray-500">Ticket
                                                                        Purchsed</a></p>
                                                                </div>
                                                                <div
                                                                    class="whitespace-nowrap text-right text-sm text-gray-500">
                                                                    <time datetime="2020-10-04">Oct 4</time>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li> -->
                                            </ul>
                                        </div>



                                    </dl>
                                </div>
                            </div>
                        </section>








                    </div>
                </div>
            </div>
        </div>

        <script src="{{ Vite::asset('resources/js/dymo.js') }}"></script>
        <script>
            function printLabels() {
                var attendee = document.getElementById('attendee-name').innerText;
                var labelXml = '<?xml version="1.0" encoding="utf-8"?>\
<DieCutLabel Version="8.0" Units="twips" MediaType="Default">\
  <PaperOrientation>Portrait</PaperOrientation>\
  <Id>Small30333</Id>\
  <PaperName>30333 1/2 in x 1 in (2 up)</PaperName>\
  <DrawCommands>\
    <Path>\
      <RoundRectangle X="0" Y="0" Width="720" Height="1440" Rx="180" Ry="180"/>\
      <RoundRectangle X="720" Y="0" Width="720" Height="1440" Rx="180" Ry="180"/>\
    </Path>\
  </DrawCommands>\
  <ObjectInfo>\
    <TextObject>\
      <Name>NAME</Name>\
      <ForeColor Alpha="255" Red="0" Green="0" Blue="0"/>\
      <BackColor Alpha="0" Red="255" Green="255" Blue="255"/>\
      <LinkedObjectName></LinkedObjectName>\
      <Rotation>Rotation90</Rotation>\
      <IsMirrored>False</IsMirrored>\
      <IsVariable>True</IsVariable>\
      <HorizontalAlignment>Left</HorizontalAlignment>\
      <VerticalAlignment>Middle</VerticalAlignment>\
      <TextFitMode>AlwaysFit</TextFitMode>\
      <UseFullFontHeight>True</UseFullFontHeight>\
      <Verticalized>False</Verticalized>\
      <StyledText>\
        <Element>\
          <String>ATTENDEE</String>\
          <Attributes>\
            <Font Family="Helvetica" Size="13" Bold="False" Italic="False" Underline="False" Strikeout="False"/>\
            <ForeColor Alpha="255" Red="0" Green="0" Blue="0"/>\
          </Attributes>\
        </Element>\
      </StyledText>\
    </TextObject>\
    <Bounds X="806.4" Y="134.4" Width="576" Height="1219.2"/>\
  </ObjectInfo>\
  <ObjectInfo>\
    <TextObject>\
      <Name>NAME2</Name>\
      <ForeColor Alpha="255" Red="0" Green="0" Blue="0"/>\
      <BackColor Alpha="0" Red="255" Green="255" Blue="255"/>\
      <LinkedObjectName></LinkedObjectName>\
      <Rotation>Rotation90</Rotation>\
      <IsMirrored>False</IsMirrored>\
      <IsVariable>True</IsVariable>\
      <HorizontalAlignment>Left</HorizontalAlignment>\
      <VerticalAlignment>Middle</VerticalAlignment>\
      <TextFitMode>AlwaysFit</TextFitMode>\
      <UseFullFontHeight>True</UseFullFontHeight>\
      <Verticalized>False</Verticalized>\
      <StyledText>\
        <Element>\
          <String>ATTENDEE</String>\
          <Attributes>\
            <Font Family="Helvetica" Size="13" Bold="False" Italic="False" Underline="False" Strikeout="False"/>\
            <ForeColor Alpha="255" Red="0" Green="0" Blue="0"/>\
          </Attributes>\
        </Element>\
      </StyledText>\
    </TextObject>\
    <Bounds X="81.6" Y="134.4" Width="576" Height="1219.2"/>\
  </ObjectInfo>\
</DieCutLabel>';

                label = dymo.label.framework.openLabelXml(labelXml);
                label.setObjectText("NAME", attendee);
                label.setObjectText("NAME2", attendee);

                var printers = dymo.label.framework.getPrinters();
                if (printers.length == 0)
                    throw "No DYMO printers are installed. Install DYMO printers.";

                var printerName = "";
                for (var i = 0; i < printers.length; ++i)
                {
                    var printer = printers[i];
                    if (printer.printerType == "LabelWriterPrinter")
                    {
                        printerName = printer.name;
                        break;
                    }
                }

                if (printerName == "")
                    throw "No LabelWriter printers found. Install LabelWriter printer";

                label.print(printerName, dymo.label.framework.createLabelWriterPrintParamsXml({copies: Math.round(@this.labelQty/2), printQuality: "Text"}));

            }
        </script>
    </div>
