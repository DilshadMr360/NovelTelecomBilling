<!DOCTYPE html>
<html lang="en" class="antialiased">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DataTables </title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
    <!--Replace with your tailwind.css once created-->


    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

    <style>
        /*Overrides for Tailwind CSS */

        /*Form fields*/
        .dataTables_wrapper select,
        .dataTables_wrapper .dataTables_filter input {
            color: #4a5568;
            /*text-gray-700*/
            padding-left: 1rem;
            /*pl-4*/
            padding-right: 1rem;
            /*pl-4*/
            padding-top: .5rem;
            /*pl-2*/
            padding-bottom: .5rem;
            /*pl-2*/
            line-height: 1.25;
            /*leading-tight*/
            border-width: 2px;
            /*border-2*/
            border-radius: .25rem;
            border-color: #edf2f7;
            /*border-gray-200*/
            background-color: #edf2f7;
            /*bg-gray-200*/
        }

        /*Row Hover*/
        table.dataTable.hover tbody tr:hover,
        table.dataTable.display tbody tr:hover {
            background-color: #ebf4ff;
            /*bg-indigo-100*/
        }

        /*Pagination Buttons*/
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Pagination Buttons - Current selected */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            color: #fff !important;
            /*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            /*shadow*/
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            background: #667eea !important;
            /*bg-indigo-500*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Pagination Buttons - Hover */
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: #fff !important;
            /*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            /*shadow*/
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            background: #667eea !important;
            /*bg-indigo-500*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Add padding to bottom border */
        table.dataTable.no-footer {
            border-bottom: 1px solid #e2e8f0;
            /*border-b-1 border-gray-300*/
            margin-top: 0.75em;
            margin-bottom: 0.75em;
        }

        /*Change colour of responsive icon*/
        table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
        table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
            background-color: #667eea !important;
            /*bg-indigo-500*/
        }

        .accordion-content {
            transition: max-height 0.3s ease-out, padding 0.3s ease;
        }
    </style>

    <style>
        .top-100 {
            top: 100%
        }

        .bottom-100 {
            bottom: 100%
        }

        .max-h-select {
            max-height: 300px;
        }
    </style>

    <style>
        .selected-tab {
            border-bottom: 2px solid #22C55E;
            /* Change color as needed */
        }
    </style>

</head>

<body>

    @include('layouts.layout')

    <div class="px-4 md:px-6 mx-auto w-full ">

        <div class="flex flex-wrap">

            {{-- first section --}}
            <section class="  p-3 sm:p-5 w-6/12 border ">
                <div class=" border  ">
                    <!-- Start coding here -->

                    <div class=" bg-green-500   text-white text-lg ">
                        <!-- Account number -->
                        {{-- search box --}}

                        <div class="flex-auto flex flex-col  h-12 ">
                            <div class="flex flex-col items-center  relative">
                                <div class="w-full svelte-1l8159u -mt-1">
                                    <div class="pt-2 relative mx-auto text-gray-600  ">
                                        <form method="POST" action="{{ route('account.search') }}">
                                            @csrf
                                            <span class="text-white">Account Number</span>
                                            <input
                                                class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                                                type="search" name="search" placeholder="Search"
                                                value="{{ isset($account_number) ? $account_number : '' }}">

                                            <button type="submit">
                                                <svg class="text-gray-600 h-4 w-4 fill-current"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                                    id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966"
                                                    style="enable-background:new 0 0 56.966 56.966;"
                                                    xml:space="preserve" width="512px" height="512px">
                                                    <path
                                                        d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="bg-white  relative shadow-md sm:rounded-lg  h-72 overflow-y-auto">
                        <div class="">

                            <div id="" class="overflow-x-auto">
                                <table class="w-full text-sm text-left text-gray-500  border-separate">

                                    <!-- Table content for Notes -->
                                    @if ($account != null)
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-300 h-10 rounded-full ">
                                            <tr>
                                                <th>Item</th>
                                                <th>Value</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Contact Code</td>
                                                <td>{{ $account->contact_code }}</td>
                                            </tr>
                                            <tr>
                                                <td>Key</td>
                                                <td>{{ $account->Key }}</td>
                                            </tr>
                                            <tr>
                                                <td>Business Unit</td>
                                                <td>{{ $account->business_unit }}</td>
                                            </tr>
                                            <tr>
                                                <td>Name</td>
                                                <td>{{ $account->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Trading as</td>
                                                <td>{{ $account->trading_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td>--</td>
                                            </tr>
                                            <tr>
                                                <td>Type</td>
                                                <td>{{ $account->typeSelect }}</td>
                                            </tr>
                                            <tr>
                                                <td>ABN</td>
                                                <td>{{ $account->abn }}</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>{{ $account->email }}</td>
                                            </tr>
                                            <tr>
                                                <td>Bill Format</td>
                                                <td>--</td>
                                            </tr>
                                            <tr>
                                                <td>Bill Option</td>
                                                <td>{{ $bill->bill_typess }}</td>
                                            </tr>
                                            <tr>
                                                <td>Bill Cycle</td>
                                                <td>--</td>
                                            </tr>
                                            <tr>
                                                <td>Credit Cotrol Plan</td>
                                                <td>--</td>
                                            </tr>
                                            <tr>
                                                <td>Billing Address</td>
                                                <td>{{ $address->address1 }}</td>
                                            </tr>
                                            <tr>
                                                <td>Street Address</td>
                                                <td>{{ $address->address1 }}</td>
                                            </tr>
                                            <tr>
                                                <td>Work Phone</td>
                                                <td>{{ $phone->phone_number }}</td>
                                            </tr>
                                            <tr>
                                                <td>Mobile Phone</td>
                                                <td>{{ $phone->phone_number }}</td>
                                            </tr>
                                            <tr>
                                                <td>Primary Contact</td>
                                                <td>{{ $phone->phone_number }}</td>
                                            </tr>
                                            <tr>
                                                <td>Exclude from late payments</td>
                                                <td>--</td>
                                            </tr>
                                            <tr>
                                                <td>Exclude from Paper bill</td>
                                                <td>--</td>
                                            </tr>
                                            <tr>
                                                <td>Usage Alert Email CC Enable</td>
                                                <td>--</td>
                                            </tr>
                                        </tbody>
                                    @elseif(isset($errorMessage))
                                        <div class="flex justify-center items-center h-full max-h-full my-28">
                                            <div class="font-bold p-3">{{ $errorMessage }}</div>
                                        </div>
                                    @endif
                                </table>
                            </div>



                        </div>
            </section>

            {{-- second section --}}
            <section class="  p-3 sm:p-5 w-6/12 border ">
                <div class=" border  ">
                    <!-- Start coding here -->
                    <div class="bg-white  relative shadow-md sm:rounded-lg   overflow-y-auto">
                        <div
                            class="flex flex-col md:flex-row items-center overflow-auto justify-between space-y-3 md:space-y-0 md:space-x-4 p-4 mt-2 mr-7">

                            <div
                                class="flex items-start  shadow-lg flex-col md:flex-row space-y-2 md:space-y-0   w-full ">

                                <button id="notesButton"
                                    class="w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-non tab-button"
                                    type="button" onclick="selectTab(this)">
                                    Notes
                                </button>

                                <button id="billsButton" data-dropdown-toggle="actionsDropdown"
                                    class="w-full flex items-center justify-center py-2 px-4 text-sm font-medium tab-button"
                                    type="button" onclick="selectTab(this)">
                                    Bills
                                </button>
                                <button id="correrpondenceButton" data-dropdown-toggle="actionsDropdown"
                                    class="w-full flex items-center justify-center py-2 px-4 text-sm font-medium tab-button"
                                    type="button" onclick="selectTab(this)">
                                    Correspondence
                                </button>
                                <button id="eventButton" data-dropdown-toggle="actionsDropdown"
                                    class="w-full flex items-center justify-center py-2 px-4 text-sm font-medium tab-button"
                                    type="button" onclick="selectTab(this)">
                                    Events
                                </button>
                                <button id="financialButton" data-dropdown-toggle="actionsDropdown"
                                    class="w-full flex items-center justify-center py-2 px-4 text-sm font-medium tab-button"
                                    type="button" onclick="selectTab(this)">
                                    Financial
                                </button>
                                <button id="paymentButton" data-dropdown-toggle="actionsDropdown"
                                    class="w-full flex items-center justify-center py-2 px-4 text-sm font-medium tab-button"
                                    type="button" onclick="selectTab(this)">
                                    Payment method
                                </button>
                                <button id="documentButton" data-dropdown-toggle="actionsDropdown"
                                    class="w-full flex items-center justify-center py-2 px-4 text-sm font-medium tab-button"
                                    type="button" onclick="selectTab(this)">
                                    Document
                                </button>
                            </div>
                        </div>


                        <div id="notesTable" class="overflow-x-auto hidden mt-5">
                            <table class="w-full text-sm text-left text-gray-500  border-separate">

                                <!-- Table content for Notes -->
                                <thead class="text-xs text-gray-700 uppercase bg-gray-300 h-10 rounded-full ">
                                    <tr>
                                        <th>Piroty</th>
                                        <th>Note</th>
                                        <th>Date Time</th>
                                        <th>Creator</th>
                                    </tr>
                                </thead>
                                <tbody id="notesTableBody">
                                    {{-- <tr>
                                        <td>Note 1</td>
                                        <td>Value 1</td>
                                        <td>Creator 1</td>
                                        <td>Creator 1</td>
                                    </tr> --}}


                                </tbody>
                            </table>

                            <script>
                                function updateNotesTable(notes) {
                                    const tableBody = document.getElementById('notesTableBody');
                                    tableBody.innerHTML = '';

                                    notes.forEach(note => {
                                        const row = document.createElement('tr');
                                        row.innerHTML = `
                                     <td></td>
                                  <td>${note.note}</td>

                                   <td>${note.created_at}</td>
                                   <td></td>
                                                    `;
                                        tableBody.appendChild(row);
                                    });

                                    document.getElementById('notesTable').classList.remove('hidden');
                                }
                            </script>

                            <!-- Button to Open the Modal -->
                            <button
                                class="flex w-24 h-10 items-center justify-center rounded-lg bg-green-500 text-white mt-5"
                                onclick="openModal()">
                                <h1 class="text-center">Add Note</h1>
                            </button>



                            <!-- The Modal -->
                            <div id="noteModal"
                                class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50"
                                onclick="closeModal(event)">
                                <div class="bg-white p-5 rounded-lg w-1/3" onclick="event.stopPropagation()">
                                    <!-- Prevent click inside from closing modal -->
                                    <div class="flex justify-between items-center">
                                        <h2 class="text-lg mb-4">Add a Note</h2>

                                        <button type="submit" onclick="closeModal()"
                                            class="text-gray-500 hover:text-gray-800">
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>


                                    </div>
                                    <!-- Form inside the modal -->
                                    <textarea id="noteText"
                                        class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-green-500"
                                        placeholder="Write your note here..." autofocus></textarea>

                                    <div class="flex justify-end space-x-4 mt-4">
                                        <button onclick="saveNote()"
                                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none">
                                            Save
                                        </button>
                                        <button onclick="closeModal()"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <script>
                                function openModal() {
                                    document.getElementById('noteModal').classList.remove('hidden');
                                    document.body.style.overflow = 'hidden'; // Disable scrolling on the background
                                }

                                function closeModal(event) {
                                    if (!event || event.target === document.getElementById('noteModal')) {
                                        document.getElementById('noteModal').classList.add('hidden');
                                        document.body.style.overflow = 'auto'; // Re-enable scrolling
                                    }
                                }

                                function saveNote() {
                                    console.log('Entering saveNote function');
                                    var noteText = document.getElementById('noteText').value;

                                    console.log('Note Saved:', noteText);


                                    fetch('/notestore', {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Add CSRF token if using Laravel CSRF protection
                                            },
                                            body: JSON.stringify({
                                                note: noteText
                                            }), // Send note text in JSON format
                                        })
                                        .then(response => {
                                            console.log('Response:', response);
                                            if (!response.ok) {
                                                throw new Error('Failed to save note');
                                            }
                                            return response.json();
                                        })
                                        .then(data => {
                                            console.log('Note saved successfully:', data);
                                            getNotes();
                                            // Optionally: Do something with the response, like updating UI
                                        })
                                        .catch(error => {
                                            console.error('Error saving note:', error);
                                            // Optionally: Display an error message to the user
                                        });
                                }


                                function getNotes() {
                                    fetch('/notes', {
                                            method: 'GET',
                                        })
                                        .then(response => {
                                            if (!response.ok) {
                                                throw new Error('Failed to fetch notes');
                                            }
                                            return response.json();
                                        })
                                        .then(data => {
                                            // Update UI with the received notes
                                            updateNotesTable(data);
                                        })
                                        .catch(error => {
                                            console.error('Error fetching notes:', error);
                                            // Optionally: Display an error message to the user
                                        });
                                }


                                getNotes();


                                closeModal();
                            </script>

                        </div>



                        <!-- Bill Table -->
                        <div id="billsTable" class="overflow-x-auto hidden">
                            <table class="w-full text-sm text-left text-gray-500  border-separate">
                                <!-- Table content for Bills -->
                                <thead class="text-xs text-gray-700 uppercase h-10  bg-gray-300   ">
                                    <tr>
                                        <th>Sequence</th>
                                        <th>Number</th>
                                        <th>Date</th>
                                        <th>Period</th>
                                        <th>Amount</th>
                                        <th>New Charges</th>
                                        <th>Source</th>
                                        <th>Cycle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Bill 1</td>
                                        <td>Value 1</td>
                                    </tr>
                                    <tr>
                                        <td>Bill 2</td>
                                        <td>Value 2</td>
                                    </tr>
                                    <tr>
                                        <td>Bill 1</td>
                                        <td>Value 1</td>
                                    </tr>
                                    <tr>
                                        <td>Bill 2</td>
                                        <td>Value 2</td>
                                    </tr>
                                    <tr>
                                        <td>Bill 1</td>
                                        <td>Value 1</td>
                                    </tr>
                                    <tr>
                                        <td>Bill 2</td>
                                        <td>Value 2</td>
                                    </tr>
                                    <tr>
                                        <td>Bill 1</td>
                                        <td>Value 1</td>
                                    </tr>
                                    <tr>
                                        <td>Bill 2</td>
                                        <td>Value 2</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div id="correrpondenceTable" class="overflow-x-auto hidden">
                            <table class="w-full text-sm text-left text-gray-500  border-separate">
                                <!-- Table content for Bills -->
                                <thead class="text-xs text-gray-700 h-10  uppercase bg-gray-300   ">
                                    <tr>
                                        <th>correrpondence Column 1</th>
                                        <th>correrpondence Column 2</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>correrpondence 1</td>
                                        <td>Value 1</td>
                                    </tr>
                                    <tr>
                                        <td>correrpondence 2</td>
                                        <td>Value 2</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>



                        <div id="eventTable" class="overflow-x-auto hidden">
                            <table class="w-full text-sm text-left text-gray-500  border-separate">
                                <!-- Table content for Bills -->
                                <thead class="text-xs text-gray-700  h-10  uppercase bg-gray-300   ">
                                    <tr>
                                        <th>event Column 1</th>
                                        <th>event Column 2</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>event 1</td>
                                        <td>Value 1</td>
                                    </tr>
                                    <tr>
                                        <td>event 2</td>
                                        <td>Value 2</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Financial Table -->
                        <div id="financialTable" class="overflow-x-auto hidden">
                            <table class="w-full text-sm text-left  text-gray-500 ">

                                <thead class="text-xs text-gray-700 h-10  uppercase bg-gray-300   ">
                                    <tr>
                                        <th>Financial Column 1</th>
                                        <th>Financial Column 2</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Financial 1</td>
                                        <td>Value 1</td>
                                    </tr>
                                    <tr>
                                        <td>Financial 2</td>
                                        <td>Value 2</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                        <!-- Payment method Table -->
                        <div id="paymentTable" class="overflow-x-auto hidden">
                            <table class="w-full text-sm text-left text-gray-500 ">

                                <thead class="text-xs text-gray-700  h-10  uppercase bg-gray-300   ">
                                    <tr>
                                        <th>Payment Column 1</th>
                                        <th>Payment Column 2</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Payment 1</td>
                                        <td>Value 1</td>
                                    </tr>
                                    <tr>
                                        <td>Payment 2</td>
                                        <td>Value 2</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>



                        <!-- Document Table -->
                        <div id="DocumentTable" class="overflow-x-auto hidden">
                            <table class="w-full text-sm text-left text-gray-500 ">

                                <thead class="text-xs text-gray-700 h-10  uppercase bg-gray-300   ">
                                    <tr>
                                        <th>Document Column 1</th>
                                        <th>Document Column 2</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Document 1</td>
                                        <td>Value 1</td>
                                    </tr>
                                    <tr>
                                        <td>Document 2</td>
                                        <td>Value 2</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                    </div>

                </div>



            </section>

        </div>
    </div>
    </section>
    </div>


    </div>

    <div class="px-4 md:px-6 mx-auto w-full ">

        <div class="flex flex-wrap">
            <section class=" -mt-16 border-1 border w-2/12 ">
                <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
                    rel="stylesheet" />

                <div class=" grid place-items-center">

                    <div class="borde w-full">

                        <div class="transition border border-1">
                            <!-- header -->
                            <div
                                class="accordion-header cursor-pointer transition flex space-x-5 px-5 items-center h-16">
                                <i class="fas fa-plus icon"></i>
                                <h3>IP Express</h3>
                            </div>
                            <!-- Content -->
                            <div class="accordion-content heigh px-5 pt-0 overflow-hidden max-h-0">
                                <p class="leading-6 font-light pl-9 text-justify">
                                    0387741140
                                </p>

                            </div>
                        </div>

                        <div class="transition border border-1">
                            <!-- header -->
                            <div
                                class="accordion-header cursor-pointer transition flex space-x-5 px-5 items-center h-16">
                                <i class="fas fa-plus icon"></i>
                                <h3>IP Express</h3>
                            </div>
                            <!-- Content -->
                            <div class="accordion-content heigh px-5 pt-0 overflow-hidden max-h-0">
                                <p class="leading-6 font-light pl-9 text-justify">
                                    0387741140
                                </p>

                            </div>
                        </div>

                        <div class="transition border border-1">
                            <!-- header -->
                            <div
                                class="accordion-header cursor-pointer transition flex space-x-5 px-5 items-center h-16">
                                <i class="fas fa-plus icon"></i>
                                <h3>SuperLoop</h3>
                            </div>
                            <!-- Content -->
                            <div class="accordion-content heigh px-5 pt-0 overflow-hidden max-h-0">
                                <p class="leading-6 font-light pl-9 text-justify">
                                    0387741140
                                </p>

                            </div>
                        </div>


                    </div>

                </div>
            </section>
            <section class="  p-3 sm:p-5 w-4/12 border ">
                <div class=" border  ">
                    <!-- Start coding here -->

                    <div class=" bg-green-500   text-white text-lg ">
                        <!-- Account number -->

                        {{-- search box --}}
                        <div class="flex-auto flex flex-col  h-12 ">
                            <div class="flex-auto flex flex-col  h-12 ">
                                <div class="flex flex-col  relative">

                                    <div class="w-full svelte-1l8159u -mt-1">
                                        <div class="pt-2 relative mx-auto text-gray-600  ">

                                            <input
                                                class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                                                type="search" name="search" placeholder="Search">
                                            <button type="submit" class="">
                                                <svg class="text-gray-600 h-4 w-4 fill-current"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                                    id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966"
                                                    style="enable-background:new 0 0 56.966 56.966;"
                                                    xml:space="preserve" width="512px" height="512px">
                                                    <path
                                                        d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>


                    </div>
                    <div class="bg-white  relative shadow-md sm:rounded-lg  h-72 overflow-y-auto">
                        <div class="">

                            <div id="" class="overflow-x-auto">
                                <table class="w-full text-sm text-left text-gray-500  border-separate">

                                    <!-- Table content for Notes -->
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-300 h-10 rounded-full ">
                                        <tr>
                                            <th>Item</th>
                                            <th>Value</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Type</td>
                                            <td>Corporate</td>


                                        </tr>
                                        <tr>
                                            <td>Abn</td>
                                            <td>74163388065</td>

                                        </tr>
                                        <tr>
                                            <td>Bill Format</td>
                                            <td>Novel Tel</td>

                                        </tr>

                                        <tr>
                                            <td>Bill Option</td>
                                            <td>Provide Paper Bill</td>

                                        </tr>
                                        <tr>
                                            <td>Bill Cycle</td>
                                            <td>Novel Tel</td>

                                        </tr>
                                        <tr>
                                            <td>Credit Control Plan</td>
                                            <td>Novel Tel</td>

                                        </tr>
                                        <tr>
                                            <td>Billing Address</td>
                                            <td>205 Lonsdale street</td>

                                        </tr>
                                        <tr>
                                            <td>Street Address</td>
                                            <td>As Above</td>

                                        </tr>
                                        <tr>
                                            <td>Work Phone</td>
                                            <td>0387741140</td>

                                        </tr>
                                        <tr>
                                            <td>Mobile Number</td>
                                            <td>04158363832</td>

                                        </tr>

                                    </tbody>
                                </table>
                            </div>



                        </div>
            </section>


            {{-- 4th div --}}
            <section class="  p-3 sm:p-5 w-6/12 border ">
                <div class=" border  ">
                    <!-- Start coding here -->

                    <div class=" bg-green-500 h-10 text-white text-lg p-2">
                        Novel Tel
                    </div>
                    <div class="bg-white  relative shadow-md sm:rounded-lg  h-72 overflow-y-auto">
                        <div
                            class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4 mt-2">
                            <div class="w-full md:w-1/2">

                            </div>

                            <div
                                class=" flex shadow-md border-1 border-green-600  flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0 w-full b">

                                <div class="flex items-center w-full  ">
                                    <button id="novelteleventButton"
                                        class="w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-non tab-button"
                                        type="button" onclick="selectTab(this)">
                                        Events
                                    </button>
                                </div>

                                <button id="noveltelesitesButton" data-dropdown-toggle="actionsDropdown"
                                    class="w-full flex items-center justify-center py-2 px-4 text-sm font-medium tab-button"
                                    type="button" onclick="selectTab(this)">
                                    Sites
                                </button>
                                <button id="correrpondenceButton" data-dropdown-toggle="actionsDropdown"
                                    class="w-full flex items-center justify-center py-2 px-4 text-sm font-medium tab-button"
                                    type="button" onclick="selectTab(this)">
                                    Equipment
                                </button>
                                <button id="eventButton" data-dropdown-toggle="actionsDropdown"
                                    class="w-full flex items-center justify-center py-2 px-4 text-sm font-medium tab-button"
                                    type="button" onclick="selectTab(this)">
                                    Network Elements
                                </button>
                                <button id="financialButton" data-dropdown-toggle="actionsDropdown"
                                    class="w-full flex items-center justify-center py-2 px-4 text-sm font-medium tab-button"
                                    type="button" onclick="selectTab(this)">
                                    Network Status
                                </button>


                            </div>


                        </div>

                        <div id="novelteleventTable" class="overflow-x-auto hidden mt-5">
                            <table class="w-full text-sm text-left text-gray-500  border-separate ">

                                <!-- Table content for Notes -->
                                <thead class="text-xs text-gray-700 uppercase bg-gray-300 h-10 rounded-full ">
                                    <tr>
                                        <th>Event Description</th>
                                        <th>Event Date</th>
                                        <th>Due Time</th>
                                        <th>Status</th>
                                        <th>Status Time</th>
                                        <th>Created By</th>
                                        <th>Reason</th>
                                        <th>Department</th>
                                        <th>Department To|</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Note 1</td>
                                        <td>Value 1</td>
                                        <td>Note 1</td>
                                        <td>Value 1</td>
                                        <td>Note 1</td>
                                        <td>Value 1</td>
                                        <td>Note 1</td>
                                        <td>Value 1</td>
                                        <td>Note 1</td>

                                    </tr>
                                    <tr>
                                        <td>Note 1</td>
                                        <td>Value 1</td>
                                        <td>Note 1</td>
                                        <td>Value 1</td>
                                        <td>Note 1</td>
                                        <td>Value 1</td>
                                        <td>Note 1</td>
                                        <td>Value 1</td>
                                        <td>Note 1</td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>


                        <!-- Bill Table -->
                        <div id="noveltelesitesTable" class="overflow-x-auto hidden">
                            <table class="w-full border-separate text-sm text-left text-gray-500 ">
                                <!-- Table content for Bills -->
                                <thead class="text-xs text-gray-700 uppercase h-10  bg-gray-300   ">
                                    <tr>
                                        <th>Id</th>
                                        <th>Type</th>
                                        <th>Name</th>
                                        <th>Address1</th>
                                        <th>Address2</th>
                                        <th>Suburb</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Postcode</th>
                                        <th>From</th>
                                        <th>To</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Bill 1</td>
                                        <td>Value 1</td>
                                    </tr>
                                    <tr>
                                        <td>Bill 2</td>
                                        <td>Value 2</td>
                                    </tr>
                                    <tr>
                                        <td>Bill 1</td>
                                        <td>Value 1</td>
                                    </tr>
                                    <tr>
                                        <td>Bill 2</td>
                                        <td>Value 2</td>
                                    </tr>
                                    <tr>
                                        <td>Bill 1</td>
                                        <td>Value 1</td>
                                    </tr>
                                    <tr>
                                        <td>Bill 2</td>
                                        <td>Value 2</td>
                                    </tr>
                                    <tr>
                                        <td>Bill 1</td>
                                        <td>Value 1</td>
                                    </tr>
                                    <tr>
                                        <td>Bill 2</td>
                                        <td>Value 2</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div id="correrpondenceTable" class="overflow-x-auto hidden">
                            <table class="w-full text-sm text-left text-gray-500 ">
                                <!-- Table content for Bills -->
                                <thead class="text-xs text-gray-700 h-10  uppercase bg-gray-300   ">
                                    <tr>
                                        <th>correrpondence Column 1</th>
                                        <th>correrpondence Column 2</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>correrpondence 1</td>
                                        <td>Value 1</td>
                                    </tr>
                                    <tr>
                                        <td>correrpondence 2</td>
                                        <td>Value 2</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>



                        <div id="eventTable" class="overflow-x-auto hidden">
                            <table class="w-full text-sm text-left text-gray-500 ">
                                <!-- Table content for Bills -->
                                <thead class="text-xs text-gray-700  h-10  uppercase bg-gray-300   ">
                                    <tr>
                                        <th>event Column 1</th>
                                        <th>event Column 2</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>event 1</td>
                                        <td>Value 1</td>
                                    </tr>
                                    <tr>
                                        <td>event 2</td>
                                        <td>Value 2</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Financial Table -->
                        <div id="financialTable" class="overflow-x-auto hidden">
                            <table class="w-full text-sm text-left  text-gray-500 ">

                                <thead class="text-xs text-gray-700 h-10  uppercase bg-gray-300   ">
                                    <tr>
                                        <th>Financial Column 1</th>
                                        <th>Financial Column 2</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Financial 1</td>
                                        <td>Value 1</td>
                                    </tr>
                                    <tr>
                                        <td>Financial 2</td>
                                        <td>Value 2</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                        <!-- Payment method Table -->
                        <div id="paymentTable" class="overflow-x-auto hidden">
                            <table class="w-full text-sm text-left text-gray-500 ">

                                <thead class="text-xs text-gray-700  h-10  uppercase bg-gray-300   ">
                                    <tr>
                                        <th>Payment Column 1</th>
                                        <th>Payment Column 2</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Payment 1</td>
                                        <td>Value 1</td>
                                    </tr>
                                    <tr>
                                        <td>Payment 2</td>
                                        <td>Value 2</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>



                        <!-- Document Table -->
                        <div id="DocumentTable" class="overflow-x-auto hidden">
                            <table class="w-full text-sm text-left text-gray-500 ">

                                <thead class="text-xs text-gray-700 h-10  uppercase bg-gray-300   ">
                                    <tr>
                                        <th>Document Column 1</th>
                                        <th>Document Column 2</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Document 1</td>
                                        <td>Value 1</td>
                                    </tr>
                                    <tr>
                                        <td>Document 2</td>
                                        <td>Value 2</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>



                    </div>
                </div>
            </section>
        </div>


    </div>




    </div>
</body>




{{--  --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const notesButton = document.getElementById('notesButton');
        const billsButton = document.getElementById('billsButton');
        const correrpondenceButton = document.getElementById('correrpondenceButton')
        const eventButton = document.getElementById('eventButton')
        const financialButton = document.getElementById('financialButton')
        const paymentButton = document.getElementById('paymentButton')
        const documentButton = document.getElementById('documentButton')

        const notesTable = document.getElementById('notesTable');
        const billsTable = document.getElementById('billsTable');
        const correrpondenceTable = document.getElementById('correrpondenceTable');
        const eventTable = document.getElementById('eventTable');
        const financialTable = document.getElementById('financialTable');
        const paymentTable = document.getElementById('paymentTable');
        const DocumentTable = document.getElementById('DocumentTable');

        notesTable.classList.remove('hidden');
        notesButton.addEventListener('click', function() {
            hideAllTables();
            notesTable.classList.remove('hidden');
        });

        billsButton.addEventListener('click', function() {
            hideAllTables();
            billsTable.classList.remove('hidden');
        });

        correrpondenceButton.addEventListener('click', function() {
            hideAllTables();
            correrpondenceTable.classList.remove('hidden');
        });


        eventButton.addEventListener('click', function() {
            hideAllTables();
            eventTable.classList.remove('hidden');
        });


        financialButton.addEventListener('click', function() {
            hideAllTables();
            financialTable.classList.remove('hidden');
        });


        paymentButton.addEventListener('click', function() {
            hideAllTables();
            paymentTable.classList.remove('hidden');
        });

        paymentButton.addEventListener('click', function() {
            hideAllTables();
            paymentTable.classList.remove('hidden');
        });

        documentButton.addEventListener('click', function() {
            hideAllTables();
            DocumentTable.classList.remove('hidden');
        });



        // Function to hide all tables
        function hideAllTables() {
            notesTable.classList.add('hidden');
            billsTable.classList.add('hidden');
            correrpondenceTable.classList.add('hidden')
            eventTable.classList.add('hidden');
            financialTable.classList.add('hidden');
            paymentTable.classList.add('hidden');
            DocumentTable.classList.add('hidden');
        }
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const novelteleventButton = document.getElementById('novelteleventButton');
        const noveltelesitesButton = document.getElementById('noveltelesitesButton')
        const novelteleventTable = document.getElementById('novelteleventTable');
        const noveltelesitesTable = document.getElementById('noveltelesitesTable')

        novelteleventTable.classList.remove('hidden');

        novelteleventButton.addEventListener('click', function() {
            hideAllTables();
            novelteleventTable.classList.remove('hidden');
        });

        noveltelesitesButton.addEventListener('click', function() {
            hideAllTables();
            noveltelesitesTable.classList.remove('hidden')
        })


        // function to hide all tables
        function hideAllTables() {
            novelteleventTable.classList.add('hidden');
            noveltelesitesTable.classList.add('hidden')
        }
    });
</script>

<script>
    const accordionHeader = document.querySelectorAll(".accordion-header");
    accordionHeader.forEach((header) => {
        const accordionContent = header.parentElement.querySelector(
            ".accordion-content"
        );
        const accordionHeadericon = header.querySelector(
            ".fas"
        );

        console.log(accordionHeadericon)
        window.addEventListener('resize', function() {
            if (window.visualViewport.width < 768) {
                accordionContent.style.maxHeight = '0';
                header.querySelector(".fas").classList.add("hidden");
            } else {
                accordionHeadericon.style.display = 'none'
                accordionContent.style.maxHeight = 'unset';
            }
        });

        header.addEventListener("click", function() {
            let accordionMaxHeight = accordionContent.style.maxHeight;

            // Condition handling
            if (accordionMaxHeight == "0px" || accordionMaxHeight.length == 0) {
                accordionContent.style.maxHeight = `${
        accordionContent.scrollHeight + 32
      }px`;
                header.querySelector(".fas").classList.remove("fa-plus");
                header.querySelector(".fas").classList.add("fa-minus");
                header.parentElement.classList.add("");
            } else {

                accordionContent.style.maxHeight = `0px`;
                header.querySelector(".fas").classList.add("fa-plus");
                header.querySelector(".fas").classList.remove("fa-minus");
                header.parentElement.classList.remove('bg-indigo-50');
            }
        });
    });
</script>
<script>
    function selectTab(button) {
        const buttons = document.querySelectorAll('.tab-button');
        buttons.forEach(btn => {
            btn.classList.remove('selected-tab');
        });
        button.classList.add('selected-tab');
    }
</script>



</html>
