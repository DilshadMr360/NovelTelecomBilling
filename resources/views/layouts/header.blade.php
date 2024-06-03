<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Bar</title>
    <style>
        /* Styles for the dropdown menu */
        .dropdown-content {
            position: absolute;
            z-index: 10;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 140px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .dropdown-content-service{
            position: absolute;
            z-index: 10;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 120px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }


        .dropdown-content-account {
            position: absolute;
            z-index: 10;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 200px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .dropdown-content-account-details{
            position: absolute;
            z-index: 10;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 200px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .dropdown-item {
            display: block;
            padding: 8px 16px;
            color: #333;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .dropdown-item:hover {
            background-color: #f3f4f6;
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body>


    <nav class="mx-6 flex  items-center justify-between p-6 lg:px-8  bg-slate-50 " aria-label="Global">
        <form action="{{ url('/home') }}" method="GET">
            <button type="submit">
                <img src="{{ asset('Images/note3.jpg') }}" alt="Login Image" class="w-16 h-full opacity-100">
            </button>
        </form>


        {{-- home icon  --}}
                <div class="relative  w-10 " >
                    <button type="button" class="flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900"
                        aria-expanded="false" onclick="toggleDropdown('fileDropdown')">
                        File
                        {{-- <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                clip-rule="evenodd" />
                        </svg> --}}
                    </button>
                    <div id="fileDropdown" class="dropdown-content hidden ">
                        <!-- Dropdown content for File -->
                        <ul>
                            <li><a href="#" class="dropdown-item">New</a></li>
                            <li><a href="#" class="dropdown-item">Open</a></li>
                            <li><a href="#" class="dropdown-item">Save</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Repeat the same pattern for other dropdowns with unique IDs -->
                <div class="relative w-10">
                    <button type="button"
                        class="flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900"
                        aria-expanded="false" onclick="toggleDropdown('accountDropdown')">
                        Account
                        {{-- <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                clip-rule="evenodd" />
                        </svg> --}}
                    </button>
                    <div id="accountDropdown" class="dropdown-content-account hidden">
                        <!-- Dropdown content for Account -->
                        <ul class=" ">
                            <li class="">
                                <div class="relative  b">
                                    <button type="button"
                                        class="flex items-center gap-x-1 text-sm  leading-6 text-gray-900 dropdown-item  text-start w-[200px]"
                                        aria-expanded="false" onclick="toggleSubDropdown('findaccount')">
                                        Find account
                                    </button>

                                </div>
                            </li>
                            <li>
                                <div class="relative  ">
                                    <button type="button"
                                        class="flex items-center gap-x-1 text-sm  leading-6 text-gray-900 dropdown-item text-start w-[200px]"
                                        aria-expanded="false" onclick="toggleSubDropdown('accountdetails')">
                                        Account details
                                        <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <div id="accountdetails" class="dropdown-content-account-details hidden absolute left-full top-0 ">
                                        <!-- Sub-dropdown content for Profile -->
                                        <ul class=" w-[200px] ">
                                            <li><a href="#" class="dropdown-item ">General</a></li>
                                            <li><a href="#" class="dropdown-item">Address</a></li>
                                            <li><a href="#" class="dropdown-item">Phone Numbers</a></li>
                                            <li><a href="#" class="dropdown-item">Contacts</a></li>
                                            <li><a href="#" class="dropdown-item">Contact History</a></li>
                                            <li><a href="#" class="dropdown-item">Email Address</a></li>
                                            <li><a href="#" class="dropdown-item">Additional Details</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="relative ">
                                    <button type="button"
                                        class="flex items-center gap-x-1 text-sm  leading-6 text-gray-900 dropdown-item text-start w-[200px]"
                                        aria-expanded="false" onclick="toggleSubDropdown('billingdetails')">
                                        Billing
                                        <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <div id="billingdetails" class="dropdown-content hidden absolute left-full top-0">
                                        <!-- Sub-dropdown content for Profile -->
                                        <ul class=" w-[150px]">
                                            <li><a href="#" class="dropdown-item ">Billing Profile 1</a></li>
                                            <li><a href="#" class="dropdown-item">Billing Profile 2</a></li>
                                            <li><a href="#" class="dropdown-item">Billing Profile 3</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="">
                                <div class="relative">
                                  <button type="button"
                                          class="flex items-center gap-x-1 text-sm leading-6 text-gray-900 dropdown-item text-start w-52"
                                          aria-expanded="false"
                                          onclick="opennote()">
                                    Notes
                                  </button>
                                </div>
                            </li>

                              <div id="noteModale"
                                   class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50"
                                   onclick="closeModale(event)">
                                <div class="bg-white p-5 rounded-lg w-1/3" onclick="event.stopPropagation()">
                                  <!-- Prevent click inside from closing modal -->
                                  <div class="flex justify-between items-center">
                                    <h2 class="text-lg mb-4">Note History</h2>
                                    <button type="button" onclick="closeModale()"
                                            class="text-gray-500 hover:text-gray-800">
                                      <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12" />
                                      </svg>
                                    </button>
                                  </div>
                                  <!-- Form inside the modal -->
                                  <table class="min-w-full bg-white">
                                    <thead>
                                      <tr>
                                        <th class="py-2">Date Time</th>
                                        <th class="py-2">Details</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td class="border px-4 py-2">2024-05-16 10:00</td>
                                        <td class="border px-4 py-2">Meeting with team</td>
                                      </tr>
                                      <tr>
                                        <td class="border px-4 py-2">2024-05-17 14:00</td>
                                        <td class="border px-4 py-2">Project deadline</td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  <div class="flex justify-end space-x-4 mt-4">
                                    {{-- <button type="button" onclick="closeModale()"
                                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none">
                                      Save
                                    </button> --}}
                                    <button type="button" onclick="closeModale()"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none">
                                      Cancel
                                    </button>
                                  </div>
                                </div>
                              </div>

                              <script>
                                function opennote() {
                                  document.getElementById('noteModale').classList.remove('hidden');
                                }

                                function closeModale(event) {
                                  if (event) {
                                    event.stopPropagation();
                                  }
                                  document.getElementById('noteModale').classList.add('hidden');
                                }

                                function saveNotee() {
                                  // Implement the save functionality
                                  closeModale();
                                }
                              </script>

                            {{-- </li>
                            <li class=""> --}}
                                <li class="">
                                    <div class="relative">
                                      <button id="popnote" type="button"
                                              class="flex items-center gap-x-1 text-sm leading-6 text-gray-900 dropdown-item text-start w-[200px]"
                                              aria-expanded="false" onclick="openModal()">
                                        Popup Notee
                                      </button>
                                    </div>
                                  </li>

                                  <script>
                                //  function openModal() {
                                //     // console.log(account)
                                //     document.getElementById('noteModal').classList.remove('hidden');
                                //     document.body.style.overflow = 'hidden'; // Disable scrolling on the background
                                // }

                                // function closeModal(event) {
                                //     if (!event || event.target === document.getElementById('noteModal')) {
                                //         document.getElementById('noteModal').classList.add('hidden');
                                //         document.body.style.overflow = 'auto'; // Re-enable scrolling
                                //     }
                                // }

                                  </script>

                            <li class="">
                                <div class="relative ">
                                    <button type="button"
                                        class="flex items-center gap-x-1 text-sm  leading-6 text-gray-900 dropdown-item text-start w-[200px]"
                                        aria-expanded="false" onclick="opennote_R()">
                                        Receipt
                                    </button>

                                </div>
                            </li>
                            @include('Service.receipt')
                            </li>
                            <li>
                                <div class="relative ">
                                    <button type="button"
                                        class="flex items-center gap-x-1 text-sm  leading-6 text-gray-900 dropdown-item text-start w-[200px]"
                                        aria-expanded="false" onclick="toggleSubDropdown('financialdetails')">
                                        Financial Transactions
                                        <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <div id="financialdetails"
                                        class="dropdown-content hidden absolute left-full top-0">
                                        <!-- Sub-dropdown content for Profile -->
                                        <ul class=" w-[150px]">
                                            <li class="context-menu-item px-4  hover:bg-gray-200 cursor-pointer" value="creditNote" onclick="CreditNote()">Credit Note</li>
                                            <li class="context-menu-item px-4  hover:bg-gray-200 cursor-pointer" value="creditAdjustment" onclick="CreditAdjustment()">Credit Adjustment</a></li>
                                            <li class="context-menu-item px-4  hover:bg-gray-200 cursor-pointer" value="invoice" onclick="OpenInvoice()">invoice</a></li>
                                            <li class="context-menu-item px-4  hover:bg-gray-200 cursor-pointer" value="refund" onclick="Refund()">Refund</a></li>
                                            <li class="context-menu-item px-4  hover:bg-gray-200 cursor-pointer" value="debitAdjustment" onclick="DebitAdjustment()">Debit Adjustment</a></li>
                                            <li class="context-menu-item px-4  hover:bg-gray-200 cursor-pointer" value="allocateTransection" onclick="AllocateTransection()">Allocate Transactions</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="">
                                <div class="relative ">

                                    <button type="button"
                                        class="flex items-center gap-x-1 text-sm  leading-6 text-gray-900 dropdown-item text-start w-[200px]"
                                        aria-expanded="false"
                                          onclick="opennote_M()">
                                        Miscellaneous Charges
                                    </button>

                                </div>
                            </li>

                               @include('Service.miscellaneous')
                            </li>
                            <li class="">
                                <div class="relative ">
                                    <button type="button"
                                        class="flex items-center gap-x-1 text-sm  leading-6 text-gray-900 dropdown-item text-start w-[200px]"
                                        aria-expanded="false"  onclick="opennote_D()">
                                        Discounting
                                    </button>

                                </div>
                            </li>
                            @include('Service.discount')
                        </li>

                            <li class="">
                                <div class="relative ">
                                    <button type="button"
                                        class="flex items-center gap-x-1 text-sm  leading-6 text-gray-900 dropdown-item text-start w-[200px]"
                                        aria-expanded="false" onclick="toggleSubDropdown('findaccount')">
                                        Charge Overrides </button>

                                </div>
                            </li>
                            <li class="">
                                <div class="relative ">
                                    <button type="button"
                                        class="flex items-center gap-x-1 text-sm  leading-6 text-gray-900 dropdown-item text-start w-[200px]"
                                        aria-expanded="false" onclick="toggleSubDropdown('findaccount')">
                                        Plan Overrides
                                    </button>

                                </div>
                            </li>
                            <li class="">
                                <div class="relative ">
                                    <button type="button"
                                        class="flex items-center gap-x-1 text-sm  leading-6 text-gray-900 dropdown-item text-start w-[200px]"
                                        aria-expanded="false" onclick="toggleSubDropdown('findaccount')">
                                        View Wholesale Tariff File
                                    </button>

                                </div>
                            </li>
                            <li class="">
                                <div class="relative">
                                    <button type="button"
                                        class="flex items-center gap-x-1 text-sm leading-6 text-gray-900 dropdown-item text-start w-[200px]"
                                        aria-expanded="false"
                                        onclick="window.location='{{ route('account.newaccount') }}'">
                                        New Account
                                    </button>
                                </div>

                            </li>

                        </ul>

                    </div>
                </div>

                {{-- Financial Transactions Dropdown Section Start --}}

                {{-- 1.Credit Note Popup UI  --}}

                <div id="creditNote" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-50 flex items-center justify-center hidden">
                    <div class="popup-container bg-white border border-gray-300 shadow-lg rounded-lg p-4 w-full md:w-3/4 h-full md:h-3/4 overflow-hidden">
                        <div class="modal-content bg-white mx-auto rounded-lg shadow-lg z-50 w-full h-full relative">
                            <div class="sticky top-0 flex justify-end items-center border-b pb-2 mb-4 bg-white z-50">
                                <button class="text-black hover:text-black p-2 rounded-lg bg-white focus:outline-none"
                                        onclick="hidePopupWithId('creditNote')">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <div class="max-w-5xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg overflow-y-auto h-[80%]">
                                <div class="text-center mb-6">
                                    <h2 class="text-2xl font-bold">Financial Transaction [Credit Note] Account</h2>
                                </div>
                                <div class="grid grid-cols-1 gap-6">
                                    <div class="grid grid-cols-3 gap-4">
                                        <div>
                                            <label for="number" class="block text-sm font-medium text-gray-700">Number</label>
                                            <input type="text" id="number" class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="3124679">
                                        </div>
                                        <div>
                                            <label for="amount" class="block text-sm font-medium text-gray-700">Amount (AUD)</label>
                                            <input type="number" id="amount" class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="0.00">
                                        </div>
                                        <div>
                                            <label for="Tax" class="block text-sm font-medium text-gray-700">Tax</label>
                                            <input type="number" id="Tax" class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="0.00">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-3 gap-4">
                                        <div>
                                            <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                                            <input type="date" id="date" class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="2024-05-30">
                                        </div>
                                        <div>
                                            <label for="due-date" class="block text-sm font-medium text-gray-700">Due Date</label>
                                            <div class="flex items-center mt-1">
                                                <input type="date" id="due-date" class="block w-full border border-gray-300 rounded-md p-2" value="2024-05-30">
                                                <input type="checkbox" id="due-date-checkbox" class="ml-2">
                                            </div>
                                        </div>
                                        <div>
                                            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                                            <select id="category" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                                                <option value="none">(None)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label for="other-ref" class="block text-sm font-medium text-gray-700">Other Ref</label>
                                            <input type="text" id="other-ref" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                                        </div>
                                        <div>
                                            <label for="reason" class="block text-sm font-medium text-gray-700">Reason</label>
                                            <select id="reason" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                                                <option value="none">(None)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-700 mb-2">Credit Note Detail</h3>
                                        <textarea class="mt-1 block w-full border border-gray-300 rounded-md p-2" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="mt-6 flex justify-end">
                                    <button class="px-4 py-2 bg-green-500 text-white rounded-md mx-2">Save</button>
                                    <button class="px-4 py-2 bg-red-500 text-white rounded-md mx-2" onclick="hidePopupWithId('creditNote')">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <script>
                    function CreditNote() {
                        document.getElementById('creditNote').classList.remove('hidden');
                    }

                    function closeCreditNote(event) {
                        if (event) {
                            event.stopPropagation();
                        }
                        document.getElementById('creditNote').classList.add('hidden');
                    }

                    function saveNotee() {
                        // Implement the save functionality
                        closeCreditNote();
                    }
                </script>

                {{-- 1.Credit Note Popup UI CLosed --}}

                {{-- 2. Credit Adjustment Popup UI Opened --}}

                <div id="creditAdjustment" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-50 flex items-center justify-center hidden">
                    <div class="popup-container bg-white border border-gray-300 shadow-lg rounded-lg p-4 w-full md:w-3/4 h-full md:h-3/4 overflow-hidden">
                        <div class="modal-content bg-white mx-auto rounded-lg shadow-lg z-50 w-full h-full relative">
                            <div class="sticky top-0 flex justify-end items-center border-b pb-2 mb-4 bg-white z-50">
                                <button class="text-black hover:text-black p-2 rounded-lg bg-white focus:outline-none"
                                        onclick="hidePopupWithId('creditAdjustment')">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <div class="max-w-5xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg overflow-y-auto h-[80%]">
                                <div class="text-center mb-6">
                                    <h2 class="text-2xl font-bold">Financial Transaction [Credit Adjustment] Account</h2>
                                </div>
                                <div class="grid grid-cols-1 gap-6">
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label for="number" class="block text-sm font-medium text-gray-700">Number</label>
                                            <input type="text" id="number" class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="3124679">
                                        </div>
                                        <div>
                                            <label for="amount" class="block text-sm font-medium text-gray-700">Amount (AUD)</label>
                                            <input type="number" id="amount" class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="0.00">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-3 gap-4">
                                        <div>
                                            <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                                            <input type="date" id="date" class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="2024-05-30">
                                        </div>
                                        <div>
                                            <label for="due-date" class="block text-sm font-medium text-gray-700">Due Date</label>
                                            <div class="flex items-center mt-1">
                                                <input type="date" id="due-date" class="block w-full border border-gray-300 rounded-md p-2" value="2024-05-30">
                                                <input type="checkbox" id="due-date-checkbox" class="ml-2">
                                            </div>
                                        </div>
                                        <div>
                                            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                                            <select id="category" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                                                <option value="none">(None)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label for="other-ref" class="block text-sm font-medium text-gray-700">Other Ref</label>
                                            <input type="text" id="other-ref" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                                        </div>
                                        <div>
                                            <label for="reason" class="block text-sm font-medium text-gray-700">Reason</label>
                                            <select id="reason" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                                                <option value="none">(None)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-700 mb-2">Credit Adjustment Detail</h3>
                                        <textarea class="mt-1 block w-full border border-gray-300 rounded-md p-2" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="mt-6 flex justify-end">
                                    <button class="px-4 py-2 bg-green-500 text-white rounded-md mx-2">Save</button>
                                    <button class="px-4 py-2 bg-red-500 text-white rounded-md mx-2" onclick="hidePopupWithId('creditAdjustment')">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <script>
                    function CreditAdjustment() {
                        document.getElementById('creditAdjustment').classList.remove('hidden');
                    }

                    function closeCreditAdjustment(event) {
                        if (event) {
                            event.stopPropagation();
                        }
                        document.getElementById('creditAdjustment').classList.add('hidden');
                    }
                </script>

                {{-- 2.Credit Adjustment Popup UI Closed --}}

                {{-- 3.Invoice Popup UI Opened --}}

                <div id="invoice" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-50 flex items-center justify-center hidden">
                    <div class="popup-container bg-white border border-gray-300 shadow-lg rounded-lg p-4 w-full md:w-3/4 h-full md:h-3/4 overflow-hidden">
                        <div class="modal-content bg-white mx-auto rounded-lg shadow-lg z-50 w-full h-full relative">
                            <div class="sticky top-0 flex justify-end items-center border-b pb-2 mb-4 bg-white z-50">
                                <button class="text-black hover:text-black p-2 rounded-lg bg-white focus:outline-none"
                                        onclick="hidePopupWithId('invoice')">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <div class="max-w-5xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg overflow-y-auto h-[80%]">
                                <div class="text-center mb-6">
                                    <h2 class="text-2xl font-bold">Financial Transaction [ Invoice ] Account</h2>
                                </div>
                                <div class="grid grid-cols-1 gap-6">
                                    <div class="grid grid-cols-3 gap-4">
                                        <div>
                                            <label for="number" class="block text-sm font-medium text-gray-700">Number</label>
                                            <input type="text" id="number" class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="3124679">
                                        </div>
                                        <div>
                                            <label for="amount" class="block text-sm font-medium text-gray-700">Amount (AUD)</label>
                                            <input type="number" id="amount" class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="0.00">
                                        </div>
                                        <div>
                                            <label for="Tax" class="block text-sm font-medium text-gray-700">Tax</label>
                                            <input type="number" id="Tax" class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="0.00">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-3 gap-4">
                                        <div>
                                            <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                                            <input type="date" id="date" class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="2024-05-30">
                                        </div>
                                        <div>
                                            <label for="due-date" class="block text-sm font-medium text-gray-700">Due Date</label>
                                            <div class="flex items-center mt-1">
                                                <input type="date" id="due-date" class="block w-full border border-gray-300 rounded-md p-2" value="2024-05-30">
                                                <input type="checkbox" id="due-date-checkbox" class="ml-2">
                                            </div>
                                        </div>
                                        <div>
                                            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                                            <select id="category" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                                                <option value="none">(None)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label for="other-ref" class="block text-sm font-medium text-gray-700">Other Ref</label>
                                            <input type="text" id="other-ref" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                                        </div>
                                        <div>
                                            <label for="reason" class="block text-sm font-medium text-gray-700">Reason</label>
                                            <select id="reason" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                                                <option value="none">(None)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-700 mb-2">Invoice Detail</h3>
                                        <textarea class="mt-1 block w-full border border-gray-300 rounded-md p-2" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="mt-6 flex justify-end">
                                    <button class="px-4 py-2 bg-green-500 text-white rounded-md mx-2">Save</button>
                                    <button class="px-4 py-2 bg-red-500 text-white rounded-md mx-2" onclick="hidePopupWithId('invoice')">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <script>
                    function OpenInvoice() {
                        document.getElementById('invoice').classList.remove('hidden');
                    }

                    function closeInvoice(event) {
                        if (event) {
                            event.stopPropagation();
                        }
                        document.getElementById('invoice').classList.add('hidden');
                    }

                    function saveNotee() {
                        // Implement the save functionality
                        closeCreditNote();
                    }
                </script>

                {{-- 3.Invoice Popup UI Closed --}}

                {{-- 4.Refund Popup UI Opened --}}

                <div id="refund" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-50 flex items-center justify-center hidden">
                    <div class="popup-container bg-white border border-gray-300 shadow-lg rounded-lg p-4 w-full md:w-3/4 h-full md:h-3/4 overflow-hidden">
                        <div class="modal-content bg-white mx-auto rounded-lg shadow-lg z-50 w-full h-full relative">
                            <div class="sticky top-0 flex justify-end items-center border-b pb-2 mb-4 bg-white z-50">
                                <button class="text-black hover:text-black p-2 rounded-lg bg-white focus:outline-none"
                                        onclick="hidePopupWithId('refund')">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <div class="max-w-5xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg overflow-y-auto h-[80%]">
                                <div class="text-center mb-6">
                                    <h2 class="text-2xl font-bold">Financial Transaction [ Refund ] Account</h2>
                                </div>
                                <div class="grid grid-cols-1 gap-6">
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label for="number" class="block text-sm font-medium text-gray-700">Number</label>
                                            <input type="text" id="number" class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="3124679">
                                        </div>
                                        <div>
                                            <label for="amount" class="block text-sm font-medium text-gray-700">Amount (AUD)</label>
                                            <input type="number" id="amount" class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="0.00">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-3 gap-4">
                                        <div>
                                            <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                                            <input type="date" id="date" class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="2024-05-30">
                                        </div>
                                        <div>
                                            <label for="due-date" class="block text-sm font-medium text-gray-700">Due Date</label>
                                            <div class="flex items-center mt-1">
                                                <input type="date" id="due-date" class="block w-full border border-gray-300 rounded-md p-2" value="2024-05-30">
                                                <input type="checkbox" id="due-date-checkbox" class="ml-2">
                                            </div>
                                        </div>
                                        <div>
                                            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                                            <select id="category" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                                                <option value="none">(None)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label for="other-ref" class="block text-sm font-medium text-gray-700">Other Ref</label>
                                            <input type="text" id="other-ref" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                                        </div>
                                        <div>
                                            <label for="reason" class="block text-sm font-medium text-gray-700">Reason</label>
                                            <select id="reason" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                                                <option value="none">(None)</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-700 mb-2">Payment Methods</h3>
                                        <table class="min-w-full bg-white border border-gray-300">
                                            <thead>
                                                <tr class="bg-gray-50">
                                                    <th class="border border-gray-300 p-2 text-left text-sm font-medium text-gray-700">Type</th>
                                                    <th class="border border-gray-300 p-2 text-left text-sm font-medium text-gray-700">Name</th>
                                                    <th class="border border-gray-300 p-2 text-left text-sm font-medium text-gray-700">Number</th>
                                                    <th class="border border-gray-300 p-2 text-left text-sm font-medium text-gray-700">BSB/Exp Date</th>
                                                    <th class="border border-gray-300 p-2 text-left text-sm font-medium text-gray-700">Cheque/Transaction No.</th>
                                                    <th class="border border-gray-300 p-2 text-left text-sm font-medium text-gray-700">Status</th>
                                                    <th class="border border-gray-300 p-2 text-left text-sm font-medium text-gray-700">GL Account</th>
                                                    <th class="border border-gray-300 p-2 text-left text-sm font-medium text-gray-700">Type Code</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="border border-gray-300 p-2">Cash</td>
                                                    <td class="border border-gray-300 p-2"></td>
                                                    <td class="border border-gray-300 p-2"></td>
                                                    <td class="border border-gray-300 p-2"></td>
                                                    <td class="border border-gray-300 p-2"></td>
                                                    <td class="border border-gray-300 p-2"></td>
                                                    <td class="border border-gray-300 p-2"></td>
                                                    <td class="border border-gray-300 p-2"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button class="mt-2 ml-auto flex px-4 py-2 bg-blue-500 text-white rounded-md">New Payment Method</button>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-700 mb-2">Refund Detail</h3>
                                        <textarea class="mt-1 block w-full border border-gray-300 rounded-md p-2" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="mt-6 flex justify-end">
                                    <button class="px-4 py-2 bg-green-500 text-white rounded-md mx-2">Save</button>
                                    <button class="px-4 py-2 bg-red-500 text-white rounded-md mx-2" onclick="hidePopupWithId('refund')">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    function Refund() {
                        document.getElementById('refund').classList.remove('hidden');
                    }

                    function closeRefund(event) {
                        if (event) {
                            event.stopPropagation();
                        }
                        document.getElementById('refund').classList.add('hidden');
                    }

                    function saveNotee() {
                        // Implement the save functionality
                        closeModales_R();
                    }
                </script>

                {{-- 4.Refund Popup UI Closed --}}

                {{-- 5.Debit Adjustment Popup UI Opened --}}

                <div id="debitAdjustment" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-50 flex items-center justify-center hidden">
                    <div class="popup-container bg-white border border-gray-300 shadow-lg rounded-lg p-4 w-full md:w-3/4 h-full md:h-3/4 overflow-hidden">
                        <div class="modal-content bg-white mx-auto rounded-lg shadow-lg z-50 w-full h-full relative">
                            <div class="sticky top-0 flex justify-end items-center border-b pb-2 mb-4 bg-white z-50">
                                <button class="text-black hover:text-black p-2 rounded-lg bg-white focus:outline-none"
                                        onclick="hidePopupWithId('debitAdjustment')">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <div class="max-w-5xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg overflow-y-auto h-[80%]">
                                <div class="text-center mb-6">
                                    <h2 class="text-2xl font-bold">Financial Transaction [ Debit Adjustment ] Account</h2>
                                </div>
                                <div class="grid grid-cols-1 gap-6">
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label for="number" class="block text-sm font-medium text-gray-700">Number</label>
                                            <input type="text" id="number" class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="3124679">
                                        </div>
                                        <div>
                                            <label for="amount" class="block text-sm font-medium text-gray-700">Amount (AUD)</label>
                                            <input type="number" id="amount" class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="0.00">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-3 gap-4">
                                        <div>
                                            <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                                            <input type="date" id="date" class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="2024-05-30">
                                        </div>
                                        <div>
                                            <label for="due-date" class="block text-sm font-medium text-gray-700">Due Date</label>
                                            <div class="flex items-center mt-1">
                                                <input type="date" id="due-date" class="block w-full border border-gray-300 rounded-md p-2" value="2024-05-30">
                                                <input type="checkbox" id="due-date-checkbox" class="ml-2">
                                            </div>
                                        </div>
                                        <div>
                                            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                                            <select id="category" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                                                <option value="none">(None)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label for="other-ref" class="block text-sm font-medium text-gray-700">Other Ref</label>
                                            <input type="text" id="other-ref" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                                        </div>
                                        <div>
                                            <label for="reason" class="block text-sm font-medium text-gray-700">Reason</label>
                                            <select id="reason" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                                                <option value="none">(None)</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-700 mb-2">Debit Adjustment Detail</h3>
                                        <textarea class="mt-1 block w-full border border-gray-300 rounded-md p-2" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="mt-6 flex justify-end">
                                    <button class="px-4 py-2 bg-green-500 text-white rounded-md mx-2">Save</button>
                                    <button class="px-4 py-2 bg-red-500 text-white rounded-md mx-2" onclick="hidePopupWithId('debitAdjustment')">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    function DebitAdjustment() {
                        document.getElementById('debitAdjustment').classList.remove('hidden');
                    }

                    function closeDebitAdjustment(event) {
                        if (event) {
                            event.stopPropagation();
                        }
                        document.getElementById('debitAdjustment').classList.add('hidden');
                    }
                </script>

                {{-- 5.Debit Adjustment Popup UI Closed --}}

                {{-- 6.Allocate Transection Popup UI Opened --}}

                <div id="allocateTransection" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-50 flex items-center justify-center hidden">
                    <div class="bg-white border border-gray-300 shadow-lg rounded-lg p-6 w-full max-w-lg h-auto md:h-3/4 overflow-auto">
                        <div class="sticky top-0 flex justify-end items-center border-b pb-2 mb-4 bg-white z-50">
                            <button class="text-black hover:text-black p-2 rounded-lg focus:outline-none"
                                    aria-label="Close" onclick="hidePopupWithId('allocateTransection')">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="container bg-white p-5">
                            <div class="mb-5">
                                <label class="block font-bold mb-2">Automatically Allocate Transactions for</label>
                                <div class="mb-2">
                                    <input type="radio" name="allocation" id="this-account" checked class="mr-2">
                                    <label for="this-account">This Account: 40015000 Only</label>
                                </div>
                                <div class="mb-2">
                                    <input type="radio" name="allocation" id="zero-balance" class="mr-2">
                                    <label for="zero-balance">All Accounts with Zero Balance</label>
                                </div>
                                <div class="mb-2">
                                    <input type="radio" name="allocation" id="all-accounts" class="mr-2">
                                    <label for="all-accounts">All Accounts</label>
                                </div>
                            </div>
                            <div class="mb-5">
                                <label class="block font-bold mb-2">Options</label>
                                <div class="mb-2">
                                    <input type="checkbox" id="delete-allocations" class="mr-2">
                                    <label for="delete-allocations">Delete all Existing Allocations</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="use-date" class="mr-2">
                                    <label for="use-date">Use the Transaction Date for New Allocations</label>
                                </div>
                            </div>
                            <div><strong> Note </strong> </div>
                            <div class="mb-5 border border-gray-300 p-3 rounded-md">
                                <div class="mb-2">
                                    <input type="checkbox" id="create-event" class="mr-2">
                                    <label for="create-event">Create Event</label>
                                </div>
                                <label for="reason" class="block font-bold mb-2">Reason</label>
                                <select id="reason" class="w-full mb-3 p-2 border border-gray-300 rounded-md">
                                    <option>&lt;none&gt;</option>
                                    <!-- Add other options here -->
                                </select>
                                <label for="note" class="block font-bold mb-2">Note</label>
                                <textarea id="note" rows="4" class="w-full p-2 border border-gray-300 rounded-md"></textarea>
                            </div>
                            <div class="flex justify-end space-x-4">
                                <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 focus:outline-none">OK</button>
                                <button class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 focus:outline-none" onclick="hidePopupWithId('allocateTransection')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>


                <script>
                    function AllocateTransection() {
                        document.getElementById('allocateTransection').classList.remove('hidden');
                    }

                    function closeAllocateTransection(event) {
                        if (event) {
                            event.stopPropagation();
                        }
                        document.getElementById('allocateTransection').classList.add('hidden');
                    }
                </script>


                {{-- 6.Allocate Transection Popup UI Closed --}}

                <!-- Repeat the same pattern for other dropdowns -->
                <!-- Service Dropdown -->
                <div class="relative w-10">
                    <button type="button"
                            class="flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900"
                            aria-expanded="false" onclick="toggleDropdown('serviceDropdown')">
                        Service
                        {{-- <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                  d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                  clip-rule="evenodd" />
                        </svg> --}}
                    </button>
                    <div id="serviceDropdown" class="dropdown-content-service hidden">
                        <ul>
                            <li>
                                <button type="button"
                                        class="dropdown-item"
                                        aria-expanded="false" onclick="toggleSubDropdown('findAccount')">
                                    Find Service
                                </button>
                            </li>
                            <li>
                                <button type="button"
                                        class="dropdown-item"
                                        aria-expanded="false"
                                        onclick="window.location='{{ route('service_newservice') }}'">
                                    New Service
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="relative  w-10">
                    <button type="button "
                        class="flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900"
                        aria-expanded="false" onclick="toggleDropdown('UtilitiesDropdown')">
                        Utilities
                        {{-- <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                clip-rule="evenodd" />
                        </svg> --}}
                    </button>
                    <div id="UtilitiesDropdown" class="dropdown-content hidden">
                        <!-- Dropdown content for Service -->
                        <ul>
                            <li><a href="#" class="dropdown-item">Option 1</a></li>
                            <li><a href="#" class="dropdown-item">Option 2</a></li>
                            <li><a href="#" class="dropdown-item">Option 3</a></li>
                        </ul>
                    </div>
                </div>


                <div class="relative  w-10">
                    <button type="button"
                        class="flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900"
                        aria-expanded="false" onclick="toggleDropdown('OptionsDropdown')">
                        Options
                        {{-- <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                clip-rule="evenodd" />
                        </svg> --}}
                    </button>
                    <div id="OptionsDropdown" class="dropdown-content hidden">
                        <!-- Dropdown content for Service -->
                        <ul>
                            <li><a href="#" class="dropdown-item">Option 1</a></li>
                            <li><a href="#" class="dropdown-item">Option 2</a></li>
                            <li><a href="#" class="dropdown-item">Option 3</a></li>
                        </ul>
                    </div>
                </div>


                <div class="relative  w-10">
                    <button type="button"
                        class="flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900"
                        aria-expanded="false" onclick="toggleDropdown('WindowsDropdown')">
                        Windows
                        {{-- <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                clip-rule="evenodd" />
                        </svg> --}}
                    </button>
                    <div id="WindowsDropdown" class="dropdown-content hidden">
                        <!-- Dropdown content for Service -->
                        <ul>
                            <li><a href="#" class="dropdown-item">Option 1</a></li>
                            <li><a href="#" class="dropdown-item">Option 2</a></li>
                            <li><a href="#" class="dropdown-item">Option 3</a></li>
                        </ul>
                    </div>
                </div>


                <!-- Repeat for other items -->


            </div>


            <div class="flex justify-end items-end text-end w-6/12 ">

                <form method="post" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class=" border-gray-600 w-24 h-10  rounded-lg bg-red-500 text-white">Logout</button>

                </form>
            </div>

        </div>



    </nav>



    {{-- dropdown --}}
    <script>
        // Function to toggle dropdown visibility
        function toggleDropdown(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            const allDropdowns = document.querySelectorAll('.dropdown-content, .dropdown-content-account, .dropdown-content-service');

            // Hide all open dropdowns except the one being clicked
            allDropdowns.forEach((dropdownElement) => {
                if (dropdownElement.id !== dropdownId && !dropdownElement.classList.contains('hidden')) {
                    dropdownElement.classList.add('hidden');
                }
            });

            // Toggle the visibility of the clicked dropdown
            dropdown.classList.toggle('hidden');

            // Hide the clicked dropdown when mouse leaves
            dropdown.addEventListener('mouseleave', () => {
                dropdown.classList.add('hidden');
            });
        }

        // Close all dropdowns
        function closeAllDropdowns() {
            const allDropdowns = document.querySelectorAll('.dropdown-content, .dropdown-content-account, .dropdown-content-service');
            allDropdowns.forEach((dropdown) => {
                dropdown.classList.add('hidden');
            });
        }

        // Add event listener to close dropdowns when clicking outside
        document.addEventListener('click', (event) => {
            const isDropdownButton = event.target.matches('[onclick^="toggleDropdown"]');
            if (!isDropdownButton) {
                closeAllDropdowns();
            }
        });

        // Prevent dropdown from closing when clicking inside
        const allDropdowns = document.querySelectorAll('.dropdown-content, .dropdown-content-account, .dropdown-content-service');
        allDropdowns.forEach((dropdown) => {
            dropdown.addEventListener('click', (event) => {
                event.stopPropagation();
            });
        });

        // Sub-dropdown script
        let currentSubDropdown = null;

        function toggleSubDropdown(id) {
            const subDropdown = document.getElementById(id);

            // Close the current sub-dropdown if it exists and is not the same as the one being clicked
            if (currentSubDropdown && currentSubDropdown !== subDropdown) {
                currentSubDropdown.classList.add('hidden');
            }

            // Toggle the visibility of the clicked sub-dropdown
            subDropdown.classList.toggle('hidden');

            // Update the current sub-dropdown
            currentSubDropdown = subDropdown;
        }
    </script>




</body>

</html>
