<!DOCTYPE html>
<html lang="en" class="antialiased">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DataTables </title>
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="">
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
    <!--Replace with your tailwind.css once created-->

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">


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

        /* .close-button-container {
                position: fixed;
                top: 16px; /*adjust as needed*/
                /*right: 16px; *//*adjust as needed*/
                /*z-index: 1000; *//* ensure it stays on top */
          /*  } */

            .sticky {
                position: -webkit-sticky; /* For Safari */
                position: sticky;
                top: 0;
                background-color: white; /* Ensure background color matches the modal */
                z-index: 1000; /* Ensure it stays on top of other content */
                padding-top: 8px;
                padding-right: 8px;
            }

            .section-scrollable {
                max-height: 100px; /* Set a fixed height for the scrollable area */
                overflow-y: auto; /* Enable vertical scrolling */
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

        .scrollable {
            max-height: 150px;
            overflow-y: auto;
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


        <div class="flex flex-wrap ">

            {{-- first section --}}
            <section class="  p-3 sm:p-5 w-6/12 border  ">
                <div class=" border   ">
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
                                @if ($account != null)


                                    <tbody id="notesTableBody">
                                        @foreach ($notes as $note)
                                            <tr>
                                                <td>{{ $note->id }}</td>
                                                <td>{{ $note->note }}</td>
                                                <td>{{ $note->created_at }}</td>
                                                <td>{{ $note->user_id }}</td>
                                                {{-- <td>Updated At: {{ $note->updated_at }}</td> --}}
                                            </tr>
                                        @endforeach

                                        {{-- <tr>
                                        <td>Note 1</td>
                                        <td>Value 1</td>
                                        <td>Creator 1</td>
                                        <td>Creator 1</td>
                                    </tr> --}}
                                    </tbody>

                                    <!-- Button to Open the Modal -->
                                    <button
                                        class="flex w-24 h-10 items-center justify-center rounded-lg bg-green-500 text-white mt-5"
                                        onclick="openModal('{{ $account->id }}')">

                                        <h1 class="text-center">Add Note </h1>
                                    </button>
                                @endif
                            </table>

                            <!-- The Modal -->
                            <div id="noteModal"
                                class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50"
                                onclick="closeModal(event)">
                                <div class="bg-white p-5 rounded-lg w-1/3" onclick="event.stopPropagation()">
                                    <!-- Prevent click inside from closing modal -->
                                    <div class="flex justify-between items-center">
                                        <h2 class="text-lg mb-4">Add a Note </h2>
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
                                    <textarea id="noteText" name="noteText"
                                        class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-green-500"
                                        placeholder="Write your note here..." autofocus></textarea>
                                    @if ($account != null)
                                        <input type="text" value="{{ $account->id }}" name="account"
                                            id="account" hidden>
                                    @endif
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

    <div class="px-4 md:px-6 mx-auto w-full ">

        <div class="flex flex-wrap">
            {{-- side section expand --}}

            <section class=" -mt-16 border-1 border w-2/12 ">
                <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
                    rel="stylesheet" />

                <div class="grid place-items-center">
                    @if ($account != null)

                        @foreach ($accountservice as $service)
                            <div class="border w-full">
                                <div class="transition border border-1">
                                    <!-- Header -->
                                    <div
                                        class="accordion-header cursor-pointer transition flex space-x-5 px-5 items-center h-16">
                                        <i class="fas fa-plus icon"></i>
                                        <h3 >{{ $service->service_id }}</h3>
                                    </div>
                                    <div class="accordion-content height px-5 pt-0 overflow-hidden max-h-0"
                                        onclick="getaservicedetails('{{ $service->phonenumber }}', '{{ $account->id }}')">
                                        <a href="#"
                                            class="leading-6 font-light pl-9 text-justify show-details phone-link"
                                            data-accountservice="{{ json_encode($service) }}"
                                            data-accountserviceId="{{ $service->serviceoption_id }}"
                                            id="phoneLink-{{ $service->service_id }}">
                                            {{ $service->phonenumber }}
                                        </a>
                                    </div>

                                    <!-- Context Menu -->
                                    <ul id="contextMenu-{{ $service->service_id }}"
                                        class="hidden absolute bg-white border border-gray-300 shadow-lg rounded-lg w-50 mb-5 z-50">
                                        <li class="context-menu-item px-4  hover:bg-gray-200 cursor-pointer"
                                            value="Package">Package Change
                                        </li>
                                        <li
                                            class="context-menu-item px-4  hover:bg-gray-200 cursor-pointer"value="New">
                                            New Event
                                        </li>
                                        <li
                                            class="context-menu-item px-4  hover:bg-gray-200 cursor-pointer"value="Note">
                                            Note
                                        </li>
                                        <li
                                            class="context-menu-item px-4  hover:bg-gray-200 cursor-pointer"value="Bar">
                                            Bar Service
                                        </li>
                                        <li
                                            class="context-menu-item px-4  hover:bg-gray-200 cursor-pointer"value="Miscellaneous">
                                            Miscellaneous Charges
                                        </li>
                                        <li
                                            class="context-menu-item px-4  hover:bg-gray-200 cursor-pointer"value="Plan">
                                            Plan Overrides
                                        </li>
                                        <li
                                            class="context-menu-item px-4  hover:bg-gray-200 cursor-pointer"value="Charge">
                                            Charge Overrides
                                        </li>
                                        <li>
                                            <div class="relative  hover:bg-gray-200 main-button"id="management-{{ $service->service_id }}">
                                                <button type="button"
                                                    class="context-menu-item flex items-center gap-x-1 px-4  cursor-pointer"
                                                    aria-expanded="false"
                                                    onclick="showSubMenu('subManagement-{{ $service->service_id }}','management-{{ $service->service_id }}')">
                                                    <span>Service Management</span>
                                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                        aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                                <div id="subManagement-{{ $service->service_id }}"
                                                    class="dropdown-content-account-details hidden absolute left-full top-0 ">
                                                    <!-- Sub-dropdown content for Profile -->
                                                    <ul class=" w-[200px] ">
                                                        <li class="context-menu-item px-4  hover:bg-gray-200 cursor-pointer">Bar Service</li>
                                                        <li class="context-menu-item px-4  hover:bg-gray-200 cursor-pointer">UnBar Service</li>
                                                        <li class="context-menu-item px-4  hover:bg-gray-200 cursor-pointer" value="changePassword">Change Password</li>
                                                        <li class="context-menu-item px-4  hover:bg-gray-200 cursor-pointer" value="changeMailbox">Change Mailbox</li>
                                                        <li class="context-menu-item px-4  hover:bg-gray-200 cursor-pointer" value="discounting">Discounting</li>
                                                        <li class="context-menu-item px-4  hover:bg-gray-200 cursor-pointer" value="manageContract">Manage Contract</li>
                                                        <li class="context-menu-item px-4  hover:bg-gray-200 cursor-pointer" value="sellOnService">Sell-On Service</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="relative  hover:bg-gray-200 main-button"id="connect-{{ $service->service_id }}">
                                                <button type="button"
                                                    class="context-menu-item flex items-center gap-x-1 px-4 cursor-pointer"
                                                    aria-expanded="false"
                                                    onclick="showSubMenu('subConnect-{{ $service->service_id }}','connect-{{ $service->service_id }}')">
                                                    <span>Connect Service</span>
                                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                        aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                                <div id="subConnect-{{ $service->service_id }}"
                                                    class="dropdown-content-account-details hidden absolute left-full top-0 ">
                                                    <!-- Sub-dropdown content for Profile -->
                                                    <ul class=" w-[200px] ">
                                                        <li class="context-menu-item px-4  hover:bg-gray-200 cursor-pointer">Initial Connection</a></li>
                                                        <li class="context-menu-item px-4  hover:bg-gray-200 cursor-pointer">Close Uncoconnected Service</a></li>
                                                        <li class="context-menu-item px-4  hover:bg-gray-200 cursor-pointer" value="changeConnectionDate">Change Connection Date</li>
                                                        <li class="context-menu-item px-4  hover:bg-gray-200 cursor-pointer">Bulk Child Service Creation</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="relative  hover:bg-gray-200 main-button"id="disconnect-{{ $service->service_id }}">
                                                <button type="button"
                                                    class="context-menu-item flex items-center gap-x-1 px-4 cursor-pointer"
                                                    aria-expanded="false"
                                                    onclick="showSubMenu('subDisconnect-{{ $service->service_id }}','disconnect-{{ $service->service_id }}')">
                                                    <span>Disconnect Service</span>
                                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                        aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                                <div id="subDisconnect-{{ $service->service_id }}"
                                                    class="dropdown-content-account-details hidden absolute left-full top-0 ">
                                                    <!-- Sub-dropdown content for Profile -->
                                                    <ul class=" w-[200px] ">
                                                        <li class="context-menu-item px-4  hover:bg-gray-200 cursor-pointer" value="disconnectService">Disconnect Service</a></li>
                                                        <li class="context-menu-item px-4  hover:bg-gray-200 cursor-pointer" >Close Service </a></li>
                                                        <li class="context-menu-item px-4  hover:bg-gray-200 cursor-pointer" >Change Disconnection Date</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="relative  hover:bg-gray-200 main-button"id="history-{{ $service->service_id }}">
                                                <button type="button"
                                                    class="context-menu-item flex items-center gap-x-1 px-4 cursor-pointer"
                                                    aria-expanded="false"
                                                    onclick="showSubMenu('subHistory-{{ $service->service_id }}','history-{{ $service->service_id }}')">
                                                    <span>History</span>
                                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                        aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                                <div id="subHistory-{{ $service->service_id }}"
                                                    class="dropdown-content-account-details hidden absolute left-full top-0 ">
                                                    <!-- Sub-dropdown content for Profile -->
                                                    <ul class=" w-[200px] ">
                                                        <li><a href="#" class="dropdown-item ">Usage History -
                                                                All</a></li>
                                                        <li><a href="#" class="dropdown-item">Usage History -
                                                                Un-Invoiced</a></li>
                                                        <li><a href="#" class="dropdown-item">Package Change
                                                                History</a></li>
                                                        <li><a href="#" class="dropdown-item">Sell-On
                                                                History</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="relative hover:bg-gray-200 main-button"id="other-{{ $service->service_id }}">
                                                <button type="button"
                                                    class="context-menu-item flex items-center gap-x-1 px-4  cursor-pointer "
                                                    aria-expanded="false" onclick="showSubMenu('subOther-{{ $service->service_id }}','other-{{ $service->service_id }}')">
                                                    <span>Other</span>
                                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                        aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                                <div id="subOther-{{ $service->service_id }}"
                                                    class="dropdown-content-account-details hidden absolute left-full top-0 ">
                                                    <!-- Sub-dropdown content for Profile -->
                                                    <ul class=" w-[200px] ">
                                                        <li><a href="#" class="dropdown-item ">Set Parent</a>
                                                        </li>
                                                        <li><a href="#" class="dropdown-item">Edit
                                                                Attributes</a></li>
                                                        <li><a href="#" class="dropdown-item">Manage Cost
                                                                Centres</a></li>
                                                        <li><a href="#" class="dropdown-item">Edit Order
                                                                Number</a></li>
                                                        <li><a href="#" class="dropdown-item">Sub
                                                                Authorisation</a></li>
                                                        <li><a href="#" class="dropdown-item">Change Servise
                                                                Number</a></li>
                                                        <li><a href="#" class="dropdown-item">Change Servise
                                                                Type</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="context-menu-item px-4 hover:bg-gray-200 cursor-pointer" value="">
                                            <button onclick="copyAllFunction('{{ $service->phonenumber }}', '{{ $service->service_id }}')">Copy All</button>
                                        </li>
                                        <li class="context-menu-item px-4  hover:bg-gray-200 cursor-pointer"value="">
                                            <button onclick="copyItemFunction(' {{$service->phonenumber}} ')">Copy Item</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach

                    @endif
                </div>
                <div id="context-menu" class="hidden absolute bg-white shadow-lg z-50">
                    <ul class="list-none p-0 m-0"></ul>
                </div>
            </section>


            {{-- Servise Right click popup View Stat --}}

            <div id="Package" class="fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 z-50  items-center flex justify-center hidden">
                <div class="bg-white border border-gray-300 shadow-lg rounded-lg p-4 relative w-3/4 h-4/5 overflow-y-auto">
                    <!-- Close button -->
                    <button class="absolute top-2 right-2 text-gray-600 hover:text-gray-800" onclick="hidePopupWithId('Package')">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <!-- Popup content for Package -->
                    <form class="container mx-auto" action="/update-account-service" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="header mb-4 flex justify-between items-center">
                            <h1 class="text-xl font-semibold" id="head">Package Change</h1>
                            {{-- <button class="bg-gray-200 text-gray-700 px-3 py-1 rounded">File</button> --}}
                        </div>
                        <div class="flex space-x-4">
                            <div class="w-1/2">
                                <label for="package" class="block text-sm font-medium text-gray-700 mb-1">Choose a Package</label>
                                <select id="packageSelect" name="packageSelect" class="block w-full border border-gray-300 rounded px-2 py-4">
                                </select>
                            </div>
                            <div class="w-1/2">
                                <label for="">Package option</label>
                            <div id="packageOption">
                                <select name="packageoption_id" id="packageOptionSelect"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                    <option value="" selected disabled>-- Select Package Option --</option>
                                </select>
                            </div>
                            </div>

                            {{-- Send Account Service Id  --}}
                            <input type="hidden" id="accounServiceId" name="accounServiceId">

                        </div>
                        <div class="flex space-x-4 mt-4">
                            <div class="w-1/2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Enter Notes (optional)</label>
                                <textarea rows="4" class="block w-full border border-gray-300 rounded px-2 py-1"></textarea>
                            </div>
                            <div class="w-1/2 ">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Start Date</label>
                                <div class="border-2 border-gray-300 rounded-lg p-2">
                                <div class="flex items-center mb-2">
                                    <input type="radio" name="start_date" class="mr-2" checked> <span class="mr-4">This Date</span>
                                    <input type="date" class="border border-gray-300 rounded px-2 py-1">
                                </div>
                                <div class="flex items-center">
                                    <input type="radio" name="start_date" class="mr-2"> <span>Start of Next Bill Cycle (01/06/2024)</span>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex space-x-4 mt-4">
                            <div class="w-1/2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Also Apply to these Other Services:</label>
                                <div class="grid grid-cols-2 gap-4 border-2 border-gray-300 p-4 rounded-lg">
                                    <div class="flex items-center">
                                        <input type="checkbox" class="mr-2">
                                        <span>All</span>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" class="mr-2">
                                        <span>Same Service Type</span>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" class="mr-2">
                                        <span>Children</span>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" class="mr-2">
                                        <span>Siblings</span>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" class="mr-2"> <span>Close the Network event</span>
                                </div>
                                <div>
                                    <input type="checkbox" class="mr-2"> <span>Reprocess Usage Loaded on Previous Plan</span>
                                </div>
                            </div>

                            <div class="w-1/2 border-2 border-gray-300 p-2 rounded-lg">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Scheduled Changes</label>
                                <div class="flex flex-col space-y-2">
                                    <textarea rows="4" class="block w-full border border-gray-300 rounded px-2 py-1"></textarea>
                                    <a class="self-end bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</a>
                                </div>
                            </div>

                        </div>

                        <div class="form-group mb-4">

                        </div>
                        <div class="form-group mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Charge</label>
                            <table class="w-full border-collapse border border-gray-300 bg-gray-100">
                                <thead class="bg-gray-200">
                                    <tr>
                                        <th class="border border-gray-300 px-2 py-1">Charge</th>
                                        <th class="border border-gray-300 px-2 py-1">GL Code</th>
                                        <th class="border border-gray-300 px-2 py-1">Default (ex. Tax)</th>
                                        <th class="border border-gray-300 px-2 py-1">Frequency</th>
                                        <th class="border border-gray-300 px-2 py-1">Pro-rata</th>
                                        <th class="border border-gray-300 px-2 py-1">Charge Type</th>
                                        <th class="border border-gray-300 px-2 py-1">Selcomm Generated</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-gray-100">
                                        <td class="border border-gray-300 px-2 py-1">Example Charge 1</td>
                                        <td class="border border-gray-300 px-2 py-1">GL12345</td>
                                        <td class="border border-gray-300 px-2 py-1">$100.00</td>
                                        <td class="border border-gray-300 px-2 py-1">Monthly</td>
                                        <td class="border border-gray-300 px-2 py-1">Yes</td>
                                        <td class="border border-gray-300 px-2 py-1">Type 1</td>
                                        <td class="border border-gray-300 px-2 py-1">Yes</td>
                                    </tr>
                                    <tr class="bg-gray-100">
                                        <td class="border border-gray-300 px-2 py-1">Example Charge 2</td>
                                        <td class="border border-gray-300 px-2 py-1">GL67890</td>
                                        <td class="border border-gray-300 px-2 py-1">$200.00</td>
                                        <td class="border border-gray-300 px-2 py-1">Quarterly</td>
                                        <td class="border border-gray-300 px-2 py-1">No</td>
                                        <td class="border border-gray-300 px-2 py-1">Type 2</td>
                                        <td class="border border-gray-300 px-2 py-1">No</td>
                                    </tr>
                                    <!-- Add more rows as needed -->
                                </tbody>
                            </table>

                        </div>
                        <div class="form-group mb-4">
                            <input type="checkbox" class="mr-2"> <span>Display the contract management form after changing the package (this service's contract expires on 12/09/2025).</span>
                        </div>
                        <div class="form-actions flex justify-between items-center">
                            <a class="bg-gray-200 text-gray-700 px-4 py-1 rounded">Details</a>
                            <div>
                                <button class="bg-blue-500 text-white px-4 py-1 rounded mr-2">Save</button>
                                <a class="bg-red-500 text-white px-4 py-1 rounded" onclick="hidePopupWithId('Package')">Close</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div id="New" class="popup-container fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 z-50 flex items-center justify-center hidden">
                <div class="bg-white border border-gray-300 shadow-lg rounded-lg p-4 relative w-3/4 h-3/4 overflow-auto">

                    <!-- Close button -->
                    <button class="absolute top-2 right-2 text-gray-600 hover:text-gray-800" onclick="hidePopupWithId('New')">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <div class="text-white p-4 text-center rounded-t-lg">
                        <button id="eventEntryButton" class="px-4 py-2 text-black rounded mx-2" onclick="showEventCategoryPage()">Event Entry</button>
                        <button id="scheduleEventButton" class="px-4 py-2 text-black rounded mx-2" onclick="showScheduleEventPage()">Schedule Event</button>
                        <button id="attributesButton" class="px-4 py-2 text-black rounded mx-2" onclick="showAttributesTable()">Attributes</button>
                        <button id="bulkApplyButton" class="px-4 py-2 text-black rounded mx-2" onclick="showBulkApplyTable()">Bulk Apply</button>
                    </div>
                    <div id="eventCategoryPage" class="hidden">
                        <!-- Content for Event Entry -->
                        <div class="flex mt-4">
                            <div class="w-full p-4 bg-gray-50 rounded-lg">
                                <div class="flex mb-4">
                                    <div class="w-1/2 bg-gray-300 p-4 mr-2 rounded-lg">
                                        <h2 class="text-lg font-semibold mb-2">Event Category</h2>
                                        <ul id="eventCategoryList" class="list-inside list-none">
                                            <li class="cursor-pointer" onclick="showEvents('test')">Test</li>
                                            <li class="cursor-pointer" onclick="showEvents('example')">Example</li>
                                        </ul>
                                    </div>
                                    <div class="w-1/2 bg-gray-300 p-4 ml-2 rounded-lg">
                                        <h2 class="text-lg font-semibold mb-2">Event</h2>
                                        <ul id="eventList" class="list-inside list-none">
                                            <!-- Event list will be populated here -->
                                        </ul>
                                    </div>
                                </div>
                                <div class="flex mb-4">
                                    <div class="w-1/2 bg-gray-100 p-4 mr-2 rounded-lg">
                                        <h2 class="text-lg font-semibold mb-2">Event Reason</h2>
                                        <div class="flex items-center">
                                            <input type="text" class="w-full p-2 mb-2 border rounded" placeholder="Reason">
                                            <!-- Small button -->
                                            <button class="px-2 py-1 bg-green-600 hover:bg-blue-600 rounded text-white ml-2 text-xs">Button</button>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="checkbox" id="alertEvent" class="mr-2">
                                            <label for="alertEvent" class="text-gray-700">Mark as alert event</label>
                                        </div>
                                    </div>
                                    <div class="w-1/2 bg-gray-100 p-4 ml-2 rounded-lg">
                                        <h2 class="text-lg font-semibold mb-2">Notes</h2>
                                        <textarea class="w-full p-2 mb-2 border rounded" placeholder="Notes"></textarea>
                                    </div>
                                </div>
                                <div class="flex justify-end">
                                    <button class="px-4 py-2 bg-green-600 hover:bg-blue-600 rounded text-white mx-2">Save</button>
                                    <button class="px-4 py-2 bg-gray-400 hover:bg-gray-500 rounded text-white mx-2">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="scheduleEventPage" class="hidden">
                        <!-- Content for Schedule Event -->
                        <div class="flex flex-col mt-4 p-4 bg-gray-50 rounded-lg">
                            <div class="mb-4 flex items-center">
                                <input type="checkbox" id="scheduleEvent" class="mr-2">
                                <label for="scheduleEvent" class="text-gray-700">Schedule this event</label>
                            </div>
                            <div class="mb-4 flex">
                                <div class="flex flex-col w-1/2 pr-2">
                                    <label for="scheduledAction" class="text-gray-700 mb-2">Scheduled Action:</label>
                                    <input type="text" id="scheduledAction" class="p-2 border rounded" placeholder="Scheduled Action">
                                </div>
                                <div class="flex flex-col w-1/2 pl-2">
                                    <label for="scheduledDate" class="text-gray-700 mb-2">Scheduled Date:</label>
                                    <input type="date" id="scheduledDate" class="p-2 border rounded">
                                </div>
                            </div>
                            <div class="mb-4 flex">
                                <div class="flex flex-col w-1/2 pr-2">
                                    <label for="department" class="text-gray-700 mb-2">Department:</label>
                                    <input type="text" id="department" class="p-2 border rounded py-8" placeholder="Department">
                                </div>
                                <div class="flex flex-col w-1/2 pl-2">
                                    <div class="flex flex-col mb-2">
                                        <div class="flex items-center">
                                            <input type="checkbox" id="chooseOperator" class="mr-2">
                                            <label for="chooseOperator" class="text-gray-700 ">Choose Operator:</label>
                                        </div>
                                        <input type="text" id="operator" class="p-2 border rounded mt-2 py-8" placeholder="Operator">
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <button class="px-4 py-2 bg-green-600 hover:bg-blue-600 rounded text-white mx-2">Save</button>
                                <button class="px-4 py-2 bg-gray-400 hover:bg-gray-500 rounded text-white mx-2">Cancel</button>
                            </div>
                        </div>
                    </div>





                    <div id="attributesPage" class="hidden bg-gray-50 rounded-lg p-4">
                        <!-- Attributes table -->
                        <h2 class="text-lg font-semibold mb-4">Attributes</h2>
                        <table class="border border-gray-300 bg-gray-200 w-full">
                            <thead>
                                <tr>
                                    <th class="border border-gray-300 px-4 py-2 bg-gray-200">Attribute</th>
                                    <th class="border border-gray-300 px-4 py-2 bg-gray-200">Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">Color</td>
                                    <td class="border border-gray-300 px-4 py-2">Red</td>
                                </tr>
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">Size</td>
                                    <td class="border border-gray-300 px-4 py-2">Large</td>
                                </tr>
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">Material</td>
                                    <td class="border border-gray-300 px-4 py-2">Cotton</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="flex justify-end mt-4">
                            <button class="px-4 py-2 bg-green-600 hover:bg-blue-600 rounded text-white mx-2">Save</button>
                            <button class="px-4 py-2 bg-gray-400 hover:bg-gray-500 rounded text-white mx-2">Cancel</button>
                        </div>
                    </div>


                    <div id="bulkApplyPage" class="hidden">
                        <!-- Bulk Apply table -->
                        <div class="flex flex-col mt-4 p-4 bg-gray-50 rounded-lg">
                            <h2 class="text-lg font-semibold mb-4">Bulk Apply</h2>
                            <table class="border border-gray-300 bg-gray-200 w-full">
                                <thead>
                                    <tr>
                                        <th class="border border-gray-300 px-4 py-2 bg-gray-200">Apply</th>
                                        <th class="border border-gray-300 px-4 py-2 bg-gray-200">Service No</th>
                                        <th class="border border-gray-300 px-4 py-2 bg-gray-200">Status</th>
                                        <th class="border border-gray-300 px-4 py-2 bg-gray-200">Job Number</th>
                                        <th class="border border-gray-300 px-4 py-2 bg-gray-200">Start</th>
                                        <th class="border border-gray-300 px-4 py-2 bg-gray-200">End</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2"><input type="checkbox"></td>
                                        <td class="border border-gray-300 px-4 py-2">12345</td>
                                        <td class="border border-gray-300 px-4 py-2">In Progress</td>
                                        <td class="border border-gray-300 px-4 py-2">67890</td>
                                        <td class="border border-gray-300 px-4 py-2">2024-06-01</td>
                                        <td class="border border-gray-300 px-4 py-2">2024-06-10</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2"><input type="checkbox"></td>
                                        <td class="border border-gray-300 px-4 py-2">54321</td>
                                        <td class="border border-gray-300 px-4 py-2">Completed</td>
                                        <td class="border border-gray-300 px-4 py-2">09876</td>
                                        <td class="border border-gray-300 px-4 py-2">2024-05-15</td>
                                        <td class="border border-gray-300 px-4 py-2">2024-05-25</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="flex justify-end mt-4">
                                <button class="px-4 py-2 bg-green-600 hover:bg-blue-600 rounded text-white mx-2">Save</button>
                                <button class="px-4 py-2 bg-gray-400 hover:bg-gray-500 rounded text-white mx-2">Cancel</button>
                            </div>
                        </div>
                    </div>


                    <div id="helloWorldPage" class="hidden text-center">
                        <!-- Hello World message -->
                        <h2 id="helloWorldMessage" class="text-lg font-semibold mb-2"></h2>
                    </div>
                </div>
            </div>

            <script>
                function showEvents(category) {
                    const eventList = document.getElementById('eventList');

                    let events = [];

                    if (category === 'test') {
                        events = ['Test 01', 'Test 02'];
                    } else if (category === 'example') {
                        events = ['Example 01', 'Example 02'];
                    }

                    // Generate HTML for each event as clickable list items
                    const eventHTML = events.map(event => `<li class="cursor-pointer" onclick="showEventDetails('${event}')">${event}</li>`).join('');

                    // Update the event list with the generated HTML
                    eventList.innerHTML = eventHTML;
                }

                function showEventDetails(event) {
                    // Display the clicked event details, you can do whatever you want here
                    alert(`You clicked on: ${event}`);
                }

                function showEventCategoryPage() {
                    // Show the Event Entry page and hide the Hello World page
                    document.getElementById('eventCategoryPage').classList.remove('hidden');
                    document.getElementById('attributesPage').classList.add('hidden'); // Hide attributes page if shown
                    document.getElementById('helloWorldPage').classList.add('hidden');
                    document.getElementById('bulkApplyPage').classList.add('hidden'); // Hide bulk apply page if shown
                    document.getElementById('scheduleEventPage').classList.add('hidden'); // Hide schedule event page if shown

                    // Remove underline from other buttons
                    document.getElementById('eventEntryButton').style.borderBottom = "3px solid #10B981";
                    document.getElementById('scheduleEventButton').style.borderBottom = "none";
                    document.getElementById('attributesButton').style.borderBottom = "none";
                    document.getElementById('bulkApplyButton').style.borderBottom = "none";
                }

                function showAttributesTable() {
                    // Show the Attributes table page and hide other pages
                    document.getElementById('eventCategoryPage').classList.add('hidden');
                    document.getElementById('attributesPage').classList.remove('hidden');
                    document.getElementById('helloWorldPage').classList.add('hidden');
                    document.getElementById('bulkApplyPage').classList.add('hidden'); // Hide bulk apply page if shown
                    document.getElementById('scheduleEventPage').classList.add('hidden'); // Hide schedule event page if shown

                    // Remove underline from other buttons
                    document.getElementById('eventEntryButton').style.borderBottom = "none";
                    document.getElementById('scheduleEventButton').style.borderBottom = "none";
                    document.getElementById('attributesButton').style.borderBottom = "3px solid #10B981";
                    document.getElementById('bulkApplyButton').style.borderBottom = "none";
                }

                function showScheduleEventPage() {
                    // Show the Schedule Event page and hide other pages
                    document.getElementById('eventCategoryPage').classList.add('hidden');
                    document.getElementById('attributesPage').classList.add('hidden'); // Hide attributes page if shown
                    document.getElementById('helloWorldPage').classList.add('hidden');
                    document.getElementById('bulkApplyPage').classList.add('hidden'); // Hide bulk apply page if shown
                    document.getElementById('scheduleEventPage').classList.remove('hidden'); // Show schedule event page

                    // Remove underline from other buttons
                    document.getElementById('eventEntryButton').style.borderBottom = "none";
                    document.getElementById('scheduleEventButton').style.borderBottom = "3px solid #10B981";
                    document.getElementById('attributesButton').style.borderBottom = "none";
                    document.getElementById('bulkApplyButton').style.borderBottom = "none";
                }

                function showHelloWorld(message) {
                    document.getElementById('eventCategoryPage').classList.add('hidden');
                    document.getElementById('attributesPage').classList.add('hidden'); // Hide attributes page if shown
                    document.getElementById('helloWorldPage').classList.remove('hidden');
                    document.getElementById('bulkApplyPage').classList.add('hidden'); // Hide bulk apply page if shown
                    document.getElementById('scheduleEventPage').classList.add('hidden'); // Hide schedule event page if shown

                    // Remove underline from other buttons
                    document.getElementById('eventEntryButton').style.borderBottom = "none";
                    document.getElementById('scheduleEventButton').style.borderBottom = "none";
                    document.getElementById('attributesButton').style.borderBottom = "none";
                    document.getElementById('bulkApplyButton').style.borderBottom = "none";

                    // Add underline to the clicked button
                    if (message === 'Hello World 1') {
                        document.getElementById('scheduleEventButton').style.borderBottom = "3px solid #10B981";
                    } else if (message === 'Hello World 2') {
                        document.getElementById('attributesButton').style.borderBottom = "3px solid #10B981";
                    } else if (message === 'Hello World 3') {
                        document.getElementById('bulkApplyButton').style.borderBottom = "3px solid #10B981";
                    }
                }

                function showBulkApplyTable() {
                    // Show the Bulk Apply page and hide other pages
                    document.getElementById('eventCategoryPage').classList.add('hidden');
                    document.getElementById('attributesPage').classList.add('hidden'); // Hide attributes page if shown
                    document.getElementById('helloWorldPage').classList.add('hidden');
                    document.getElementById('bulkApplyPage').classList.remove('hidden'); // Show bulk apply page
                    document.getElementById('scheduleEventPage').classList.add('hidden'); // Hide schedule event page if shown

                    // Remove underline from other buttons
                    document.getElementById('eventEntryButton').style.borderBottom = "none";
                    document.getElementById('scheduleEventButton').style.borderBottom = "none";
                    document.getElementById('attributesButton').style.borderBottom = "none";
                    document.getElementById('bulkApplyButton').style.borderBottom = "3px solid #10B981";
                }

                function hidePopupWithId(id) {
                    // Hide the popup
                    document.getElementById(id).classList.add('hidden');
                }

                // Show the popup for demonstration purposes
                // document.getElementById('New').classList.remove('hidden');
            </script>


            <div id="Note"
                class="popup-container  fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 z-50 flex items-center justify-center hidden">
                <div class="bg-white border border-gray-300 shadow-lg rounded-lg p-4 relative w-1/2 h-1/2">
                    <!-- Close button -->
                    <button class="absolute top-2 right-2 text-gray-600 hover:text-gray-800" onclick="hidePopupWithId('Note')">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <!-- Popup content for Note -->
                    {{-- <h2 class="text-lg font-semibold mb-4">Note</h2> --}}
                    <table class="mt-4 border-collapse w-full bg-gray-300">
                        <thead>
                            <tr>
                                <th class="border border-black px-4 py-2">Date & Time</th>
                                <th class="border border-black px-4 py-2">Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-black px-4 py-2">2024-05-30 09:00 AM</td>
                                <td class="border border-black px-4 py-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                            </tr>
                            <tr>
                                <td class="border border-black px-4 py-2">2024-06-01 02:30 PM</td>
                                <td class="border border-black px-4 py-2">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- Close button -->
                    <button class="absolute bottom-4 right-4 px-4 py-2 bg-gray-400 hover:bg-gray-500  rounded text-white" onclick="hidePopupWithId('Note')">Close</button>
                </div>
            </div>


            <div id="Bar" class="popup-container fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 z-50 flex items-center justify-center hidden">
                <div class="bg-white border border-gray-300 shadow-lg rounded-lg p-4 relative w-3/4 h-[90%]">
                    <!-- Close button -->
                    <button class="absolute top-2 right-2 text-gray-600 hover:text-gray-800" onclick="hidePopupWithId('Bar')">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <!-- Popup content for Bar -->
                    <div class="mx-auto h-full flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between mb-4">
                                <div class="text-lg font-semibold">Bar service</div>
                            </div>
                            <div class="flex justify-between mb-4">
                                <div class="w-1/2 pr-2">
                                    <div class="mb-2"><strong>Bar Type</strong></div>
                                    <div class="mb-4">
                                        <select class="w-full h-10 border rounded-md">
                                            <option>Administration Bar</option>
                                        </select>
                                    </div>
                                    <div class="mb-2"><strong>Date to Bar Service</strong></div>
                                    <div class="mb-4">
                                        <input type="date" class="w-full h-10 border rounded-md">
                                    </div>
                                    <div class="flex items-center mb-2">
                                        <input type="checkbox" class="mr-2"> Automatically Unbar
                                    </div>
                                    <div class="mb-4">
                                        <input type="date" class="w-full h-10 border rounded-md">
                                    </div>
                                    <div class="mb-2"><strong>Also Apply to these Other Services:</strong></div>
                                    <div class="flex flex-wrap mb-2 border border-gray-300 rounded p-2">
                                        <label class="flex items-center w-1/2 mb-2">
                                            <input type="checkbox" class="mr-2"> All
                                        </label>
                                        <label class="flex items-center w-1/2 mb-2">
                                            <input type="checkbox" class="mr-2"> Same Service Type
                                        </label>
                                        <label class="flex items-center w-1/2 mb-2">
                                            <input type="checkbox" class="mr-2"> Children
                                        </label>
                                        <label class="flex items-center w-1/2 mb-2">
                                            <input type="checkbox" class="mr-2"> Siblings
                                        </label>
                                    </div>
                                    <div class="flex items-center mb-4">
                                        <input type="checkbox" class="mr-2"> Close the Network event
                                    </div>
                                </div>
                                <div class="w-1/2 pl-2">
                                    <div class="mb-2"><strong>Bar Reason</strong></div>
                                    <div class="mb-4">
                                        <select class="w-full h-10 border rounded-md">
                                            <option>Credit Alert</option>
                                            <option>Customer Request</option>
                                            <option>Lost/stolen Phone</option>
                                        </select>
                                    </div>
                                    <div class="mb-2"><strong>Enter Notes (optional)</strong></div>
                                    <div class="mb-4">
                                        <textarea class="w-full h-32 border rounded-md"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button class="px-4 py-2 bg-green-600 hover:bg-blue-600 rounded text-white mx-2">Save</button>
                            <button class="px-4 py-2 bg-gray-400 hover:bg-gray-500 rounded text-white mx-2 " onclick="hidePopupWithId('Miscellaneous')">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="Miscellaneous" class="fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 z-50 flex items-center justify-center hidden">
                <div class="bg-white shadow-lg rounded-lg p-4 w-full max-w-4xl max-h-4xl relative">



                    <!-- Close button -->
                    <button class="absolute top-2 right-2 text-gray-600 hover:text-gray-800" onclick="hidePopupWithId('Miscellaneous')">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <div class="p-4">
                        <div class="font-bold text-lg mb-4">Miscellaneous Charges</div>
                        <div class="flex mb-4">
                            <button id="chargesButton" class="px-4 py-2 border-b-2 border-gray-200 focus:outline-none" onclick="showTableView()">Charges</button>
                            <button id="detailsButton" class="px-4 py-2 border-b-2 border-gray-200 focus:outline-none" onclick="showDetailsView()">Details</button>
                        </div>
                        <div class="border" id="tableViewContainer" style="max-height: 400px; overflow-y: auto;">
                            <table class="w-full border-collapse" id="tableView">
                                <!-- Table content -->
                                <thead class="bg-gray-200">
                                    <tr>
                                        <th class="border p-2">Code</th>
                                        <th class="border p-2">Description</th>
                                        <th class="border p-2">Freq</th>
                                        <th class="border p-2">Unit Price</th>
                                        <th class="border p-2">Charge Start</th>
                                        <th class="border p-2">Charge End</th>
                                        <th class="border p-2">Charged To</th>
                                        <th class="border p-2">Amount Default</th>
                                        <th class="border p-2">Cost (ex. Tax)</th>
                                        <th class="border p-2">Source</th>
                                        <th class="border p-2">Package</th>
                                        <th class="border p-2">Package Option</th>
                                        <th class="border p-2">Pro-rata</th>
                                        <th class="border p-2">Charge Type</th>
                                        <th class="border p-2">Chargr ref</th>
                                        <th class="border p-2">Override ID</th>
                                        <th class="border p-2">Network Detail Ref</th>
                                        <th class="border p-2">Discount</th>
                                        <th class="border p-2">File Type</th>
                                        <th class="border p-2">Created Time</th>
                                        <th class="border p-2">Create By</th>
                                        <th class="border p-2">Last Updated</th>
                                        <th class="border p-2">Updated BY</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="border p-2">D090</td>
                                        <td class="border p-2">$9 Package Discount</td>
                                        <td class="border p-2">Monthly</td>
                                        <td class="border p-2">-8.1818182</td>
                                        <td class="border p-2">13/09/2023</td>
                                        <td class="border p-2">On-going</td>
                                        <td class="border p-2">31/05/2024</td>
                                        <td class="border p-2">-8.18</td>
                                        <td class="border p-2">$0.00</td>
                                        <td class="border p-2">Manual</td>
                                        <td class="border p-2">Test 1</td>
                                        <td class="border p-2">Test 1</td>
                                        <td class="border p-2">Test 1</td>
                                        <td class="border p-2">Test 1</td>
                                        <td class="border p-2">Test 1</td>
                                        <td class="border p-2">Test 1</td>
                                        <td class="border p-2">Test 1</td>
                                        <td class="border p-2">Test 1</td>
                                        <td class="border p-2">Test 1</td>
                                        <td class="border p-2">Test 1</td>
                                        <td class="border p-2">Test 1</td>
                                        <td class="border p-2">Test 1</td>
                                        <td class="border p-2">Test 1</td>
                                    </tr>
                                    <tr>
                                        <td class="border p-2">BN12</td>
                                        <td class="border p-2">NBN 12/1 Mbps</td>
                                        <td class="border p-2">Monthly</td>
                                        <td class="border p-2">$69.0818182</td>
                                        <td class="border p-2">13/09/2023</td>
                                        <td class="border p-2">On-going</td>
                                        <td class="border p-2">31/05/2024</td>
                                        <td class="border p-2">$69.08</td>
                                        <td class="border p-2">$0.00</td>
                                        <td class="border p-2">Package</td>
                                        <td class="border p-2">NOV-</td>
                                        <td class="border p-2">Test 02</td>
                                        <td class="border p-2">Test 02</td>
                                        <td class="border p-2">Test 02</td>
                                        <td class="border p-2">Test 02</td>
                                        <td class="border p-2">Test 02</td>
                                        <td class="border p-2">Test 02</td>
                                        <td class="border p-2">Test 02</td>
                                        <td class="border p-2">Test 02</td>
                                        <td class="border p-2">Test 02</td>
                                        <td class="border p-2">Test 02</td>
                                        <td class="border p-2">Test 02</td>
                                        <td class="border p-2">Test 02</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="border" id="detailsView" style="display: none;">
                            <div class="border mb-4">
                                <div class="bg-gray-200 p-2">Invoiced charges</div>
                                <div class="scrollable">
                                    <table class="w-full border-collapse">
                                        <thead class="bg-gray-200">
                                            <tr>
                                                <th class="border p-2 min-w-28 max-w-72">Period</th>
                                                <th class="border p-2 min-w-28 max-w-72">Charge From</th>
                                                <th class="border p-2 min-w-28 max-w-72">Charge To</th>
                                                <th class="border p-2 min-w-28 max-w-72">Description</th>
                                                <th class="border p-2 min-w-28 max-w-72">Price (ex. Tax) Non Disc.</th>
                                                <th class="border p-2 min-w-28 max-w-72">Price (ex. Tax) Discounted</th>
                                                <th class="border p-2 min-w-28 max-w-72">Price (inc. Tax) Non Disc.</th>
                                                <th class="border p-2 min-w-28 max-w-72">Price (inc. Tax) Discounted</th>
                                                <th class="border p-2 min-w-28 max-w-72">Override ID</th>
                                                <th class="border p-2 min-w-28 max-w-72">Package</th>
                                                <th class="border p-2 min-w-28 max-w-72">Option</th>
                                                <th class="border p-2 min-w-28 max-w-72">Freq</th>
                                                <th class="border p-2 min-w-28 max-w-72">Pro-rata</th>
                                                <th class="border p-2 min-w-28 max-w-72">Charge Type</th>
                                                <th class="border p-2 min-w-28 max-w-72">Code</th>
                                                <th class="border p-2 min-w-28 max-w-72">Invoice</th>
                                                <th class="border p-2 min-w-28 max-w-72">Network Cost(ex Tax)</th>
                                                <th class="border p-2 min-w-28 max-w-72">Account Num</th>
                                                <th class="border p-2 min-w-28 max-w-72">Account Name</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="border p-2">202404</td>
                                                <td class="border p-2">1/05/2024</td>
                                                <td class="border p-2">31/05/2024 11:59:59 PM</td>
                                                <td class="border p-2">\$9 Package Discount</td>
                                                <td class="border p-2">-8.18</td>
                                                <td class="border p-2">-8.18</td>
                                                <td class="border p-2">\$9.00</td>
                                                <td class="border p-2">\$9.00</td>
                                                <td class="border p-2">-</td>
                                                <td class="border p-2">-</td>
                                                <td class="border p-2">-</td>
                                                <td class="border p-2">-</td>
                                                <td class="border p-2">-</td>
                                                <td class="border p-2">-</td>
                                                <td class="border p-2">-</td>
                                                <td class="border p-2">-</td>
                                                <td class="border p-2">-</td>
                                                <td class="border p-2">-</td>
                                                <td class="border p-2">-</td>
                                            </tr>
                                            <tr>
                                                <td class="border p-2">202405</td>
                                                <td class="border p-2">1/05/2024</td>
                                                <td class="border p-2">31/05/2024 11:59:59 PM</td>
                                                <td class="border p-2">NBN 12/1 Mbps</td>
                                                <td class="border p-2">\$69.08</td>
                                                <td class="border p-2">\$69.08</td>
                                                <td class="border p-2">\$75.99</td>
                                                <td class="border p-2">\$75.99</td>
                                                <td class="border p-2">-</td>
                                                <td class="border p-2">NOV-</td>
                                                <td class="border p-2">-</td>
                                                <td class="border p-2">-</td>
                                                <td class="border p-2">-</td>
                                                <td class="border p-2">-</td>
                                                <td class="border p-2">-</td>
                                                <td class="border p-2">-</td>
                                                <td class="border p-2">-</td>
                                                <td class="border p-2">-</td>
                                                <td class="border p-2">-</td>
                                            </tr>
                                            <!-- Add more rows as needed -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="border mb-4">
                                <div class="bg-gray-200 p-2">Un-invoiced and future charges (for fifteen periods only)</div>
                                <div class="scrollable">
                                    <table class="w-full border-collapse">
                                        <thead class="bg-gray-200">
                                            <tr>
                                                <th class="border p-2 min-w-28 max-w-72">Period</th>
                                                <th class="border p-2 min-w-28 max-w-72">Charge From</th>
                                                <th class="border p-2 min-w-28 max-w-72">Charge To</th>
                                                <th class="border p-2 min-w-28 max-w-72">Description</th>
                                                <th class="border p-2 min-w-28 max-w-72">Price (ex. Tax) Non Disc.</th>
                                                <th class="border p-2 min-w-28 max-w-72">Price (ex. Tax) Discounted</th>
                                                <th class="border p-2 min-w-28 max-w-72">Price (inc. Tax) Non Disc.</th>
                                                <th class="border p-2 min-w-28 max-w-72">Price (inc. Tax) Discounted</th>
                                                <th class="border p-2 min-w-28 max-w-72">Override ID</th>
                                                <th class="border p-2 min-w-28 max-w-72">Package</th>
                                                <th class="border p-2 min-w-28 max-w-72">Option</th>
                                                <th class="border p-2 min-w-28 max-w-72">Freq</th>
                                                <th class="border p-2 min-w-28 max-w-72">Pro-rata</th>
                                                <th class="border p-2 min-w-28 max-w-72">Charge Type</th>
                                                <th class="border p-2 min-w-28 max-w-72">Code</th>
                                                <th class="border p-2 min-w-28 max-w-72">Charge Start</th>
                                                <th class="border p-2 min-w-28 max-w-72">Charge End</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="border p-2">202405</td>
                                                <td class="border p-2">1/06/2024</td>
                                                <td class="border p-2">30/06/2024 11:59:59 PM</td>
                                                <td class="border p-2">\$9 Package Discount</td>
                                                <td class="border p-2">-8.18</td>
                                                <td class="border p-2">-8.18</td>
                                                <td class="border p-2">\$9.00</td>
                                                <td class="border p-2">\$9.00</td>
                                                <td class="border p-2">-</td>
                                                <td class="border p-2">-</td>
                                                <td class="border p-2">-</td>
                                                <td class="border p-2">-</td>
                                                <td class="border p-2">-</td>
                                                <td class="border p-2">-</td>
                                                <td class="border p-2">-</td>
                                                <td class="border p-2">-</td>
                                                <td class="border p-2">-</td>
                                            </tr>
                                            <tr>
                                                <td class="border p-2">202406</td>
                                                <td class="border p-2">1/07/2024</td>
                                                <td class="border p-2">31/07/2024 11:59:59 PM</td>
                                                <td class="border p-2">NBN 12/1 Mbps</td>
                                                <td class="border p-2">\$69.08</td>
                                                <td class="border p-2">\$69.08</td>
                                                <td class="border p-2">\$75.99</td>
                                                <td class="border p-2">\$75.99</td>
                                                <td class="border p-2">-</td>
                                                <td class="border p-2">NOV-</td>
                                                <td class="border p-2">-</td>
                                                <td class="border p-2">-</td>
                                                <td class="border p-2">-</td>
                                                <td class="border p-2">-</td>
                                                <td class="border p-2">-</td>
                                                <td class="border p-2">-</td>
                                                <td class="border p-2">-</td>
                                            </tr>
                                            <!-- Add more rows as needed -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <div class="flex justify-end mt-4">
                                <button class="bg-gray-300 px-4 py-2">Close</button>
                            </div>
                        </div>

                        <div id="checkboxclick" class="flex flex-col md:flex-row justify-between items-start md:items-center p-4">
                            <div class="flex flex-col md:flex-row items-start md:items-center mb-4 md:mb-0">
                                <label class="inline-flex items-center mb-2 md:mb-0 md:mr-4">
                                    <input type="checkbox" class="mr-2"> Display times in the charge Start and End columns
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" class="mr-2"> Only Display Current or Future Charges
                                </label>
                            </div>
                        </div>

                        <div id="clickbutton" class="flex flex-col md:flex-row md:ml-auto">
                            <button class="bg-gray-300 hover:bg-gray-400 px-4 py-2 mr-2" onclick="showTableView()">Details</button>
                            <button class="bg-green-600 text-white hover:bg-gray-400 ml-96 px-4 py-2 mr-2">New</button>
                            <button class="bg-gray-300 hover:bg-gray-400 px-4 py-2 mr-2">Update</button>
                            <button class="bg-red-600 text-white hover:bg-gray-400 px-4 py-2 mr-2">Delete</button>
                            <button class="bg-gray-300 hover:bg-gray-400 px-4 py-2" onclick="hidePopupWithId('Miscellaneous')">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <script>
            function showTableView() {
                document.getElementById("tableView").style.display = "block";
                document.getElementById("detailsView").style.display = "none";
                document.getElementById("clickbutton").style.display = "block"; // Show the buttons
                document.getElementById("checkboxclick").style.display = "block"; // Show the checkboxes
                document.getElementById("chargesButton").classList.add("border-b-2", "border-green-500");
                document.getElementById("detailsButton").classList.remove("border-b-2", "border-green-500");
            }

            function showDetailsView() {
                document.getElementById("tableView").style.display = "none";
                document.getElementById("detailsView").style.display = "block";
                document.getElementById("clickbutton").style.display = "none"; // Hide the buttons
                document.getElementById("checkboxclick").style.display = "none"; // Hide the checkboxes
                document.getElementById("chargesButton").classList.remove("border-b-2", "border-green-500");
                document.getElementById("detailsButton").classList.add("border-b-2", "border-green-500");
            }

            function hidePopupWithId(id) {
                document.getElementById(id).classList.add('hidden');
            }
            </script>



            <div id="Plan"
                class="popup-container  fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 z-50 flex items-center justify-center hidden">
                <div class="bg-white border border-gray-300 shadow-lg rounded-lg p-4 relative w-3/4 h-max">
                    <!-- Close button -->
                    <button class="absolute top-2 right-2 text-gray-600 hover:text-gray-800"
                        onclick="hidePopupWithId('Plan')">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <div class="border"  style="max-height: 400px; overflow-y: auto;">
                        <table class="w-full border-collapse" >
                            <!-- Table content -->
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="border p-2">ID</th>
                                    <th class="border p-2">Service</th>
                                    <th class="border p-2">Type</th>
                                    <th class="border p-2">Plan</th>
                                    <th class="border p-2">Usage Type</th>
                                    <th class="border p-2">Usage Description</th>
                                    <th class="border p-2">Time Band</th>
                                    <th class="border p-2">From</th>
                                    <th class="border p-2">To</th>
                                    <th class="border p-2">Markup Radio</th>
                                    <th class="border p-2">Flag Fall</th>
                                    <th class="border p-2">Band 1</th>
                                    <th class="border p-2">Band 2</th>
                                    <th class="border p-2">Band 3</th>
                                    <th class="border p-2">Band 4</th>
                                    <th class="border p-2">Use Final Band Rate for Entire Transaction </th>
                                    <th class="border p-2">Min.Charge</th>
                                    <th class="border p-2">Min.Quantity</th>
                                    <th class="border p-2">Capping</th>
                                    <th class="border p-2">Capping Type</th>
                                    <th class="border p-2">Plan Code</th>
                                    <th class="border p-2">Used</th>
                                    <th class="border p-2">Created</th>
                                    <th class="border p-2">Created By</th>
                                    <th class="border p-2">Last Updated</th>
                                    <th class="border p-2">Updated By</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border p-2">D090</td>
                                    <td class="border p-2">$9 Package Discount</td>
                                    <td class="border p-2">Monthly</td>
                                    <td class="border p-2">-8.1818182</td>
                                    <td class="border p-2">13/09/2023</td>
                                    <td class="border p-2">On-going</td>
                                    <td class="border p-2">31/05/2024</td>
                                    <td class="border p-2">-8.18</td>
                                    <td class="border p-2">$0.00</td>
                                    <td class="border p-2">Manual</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                </tr>
                                <tr>
                                    <td class="border p-2">BN12</td>
                                    <td class="border p-2">NBN 12/1 Mbps</td>
                                    <td class="border p-2">Monthly</td>
                                    <td class="border p-2">$69.0818182</td>
                                    <td class="border p-2">13/09/2023</td>
                                    <td class="border p-2">On-going</td>
                                    <td class="border p-2">31/05/2024</td>
                                    <td class="border p-2">$69.08</td>
                                    <td class="border p-2">$0.00</td>
                                    <td class="border p-2">Package</td>
                                    <td class="border p-2">NOV-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="checkboxclick" class="flex flex-col md:flex-row justify-between items-start md:items-center p-4">
                        <div class="flex flex-col md:flex-row items-start md:items-center mb-4 md:mb-0">
                            <label lass="inline-flex items-center mb-2 md:mb-0 md:mr-4">Show: </label>
                            <label class="inline-flex items-center mb-2 md:mb-0 md:mr-4">
                                <input type="checkbox" class="mr-2 ml-2">Old Records
                            </label>
                            <label class="inline-flex items-center  mb-2 md:mb-0 md:mr-4">
                                <input type="checkbox" class="mr-2"> Account Level Records
                            </label>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="mr-2"> Unused Records
                            </label>
                        </div>
                    </div>

                    <div id="clickbutton" class="flex flex-col justify-end md:flex-row md:ml-auto">
                        <button class="bg-green-600 text-white hover:bg-gray-400 px-4 py-2 mr-2" onclick="showTableView()">New</button>
                        <button class="bg-gray-300  hover:bg-gray-400 px-4 py-2 mr-2">Update</button>
                        <button class="bg-red-600  hover:bg-gray-400  text-white px-4 py-2 mr-2">End</button>
                        <button class="bg-gray-300 hover:bg-gray-400 px-4 py-2 mr-2">Test</button>
                        <button class="bg-gray-300 hover:bg-gray-400 px-4 py-2" onclick="hidePopupWithId('Plan')">Close</button>
                    </div>
                </div>
            </div>
            <div id="Charge"
                class="popup-container  fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 z-50 flex items-center justify-center hidden">
                <div class="bg-white border border-gray-300 shadow-lg rounded-lg p-4 relative w-3/4 h-max">
                    <!-- Close button -->
                    <button class="absolute top-2 right-2 text-gray-600 hover:text-gray-800"
                        onclick="hidePopupWithId('Charge')">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <div class="border"  style="max-height: 400px; overflow-y: auto;">
                        <table class="w-full border-collapse" >
                            <!-- Table content -->
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="border p-2">ID</th>
                                    <th class="border p-2">Service</th>
                                    <th class="border p-2">Package</th>
                                    <th class="border p-2">Option</th>
                                    <th class="border p-2">Charge Code</th>
                                    <th class="border p-2">Charge</th>
                                    <th class="border p-2">Bill Narrative</th>
                                    <th class="border p-2">Amount</th>
                                    <th class="border p-2">Markup Ratio</th>
                                    <th class="border p-2">From</th>
                                    <th class="border p-2">To</th>
                                    <th class="border p-2">Terminate on Change Package</th>
                                    <th class="border p-2">Used</th>
                                    <th class="border p-2">Created</th>
                                    <th class="border p-2">Created By</th>
                                    <th class="border p-2">Last Updated</th>
                                    <th class="border p-2">Updated By</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border p-2">D090</td>
                                    <td class="border p-2">$9 Package Discount</td>
                                    <td class="border p-2">Monthly</td>
                                    <td class="border p-2">-8.1818182</td>
                                    <td class="border p-2">13/09/2023</td>
                                    <td class="border p-2">On-going</td>
                                    <td class="border p-2">31/05/2024</td>
                                    <td class="border p-2">-8.18</td>
                                    <td class="border p-2">$0.00</td>
                                    <td class="border p-2">Manual</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                </tr>
                                <tr>
                                    <td class="border p-2">BN12</td>
                                    <td class="border p-2">NBN 12/1 Mbps</td>
                                    <td class="border p-2">Monthly</td>
                                    <td class="border p-2">$69.0818182</td>
                                    <td class="border p-2">13/09/2023</td>
                                    <td class="border p-2">On-going</td>
                                    <td class="border p-2">31/05/2024</td>
                                    <td class="border p-2">$69.08</td>
                                    <td class="border p-2">$0.00</td>
                                    <td class="border p-2">Package</td>
                                    <td class="border p-2">NOV-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                    <td class="border p-2">-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="checkboxclick" class="flex flex-col md:flex-row justify-between items-start md:items-center p-4">
                        <div class="flex flex-col md:flex-row items-start md:items-center mb-4 md:mb-0">
                            <label lass="inline-flex items-center mb-2 md:mb-0 md:mr-4">Show: </label>
                            <label class="inline-flex items-center mb-2 md:mb-0 md:mr-4">
                                <input type="checkbox" class="mr-2 ml-2">Old Records
                            </label>
                            <label class="inline-flex items-center  mb-2 md:mb-0 md:mr-4">
                                <input type="checkbox" class="mr-2"> Account Level Records
                            </label>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="mr-2"> Unused Records
                            </label>
                        </div>
                    </div>

                    <div id="clickbutton" class="flex flex-col justify-end md:flex-row md:ml-auto">
                        <button class="bg-green-600 text-white hover:bg-gray-400 px-4 py-2 mr-2" onclick="showTableView()">New</button>
                        <button class="bg-gray-300  hover:bg-gray-400 px-4 py-2 mr-2">Update</button>
                        <button class="bg-red-600  hover:bg-gray-400  text-white px-4 py-2 mr-2">Delete</button>
                        <button class="bg-gray-300 hover:bg-gray-400 px-4 py-2 mr-2">End</button>
                        <button class="bg-gray-300 hover:bg-gray-400 px-4 py-2" onclick="hidePopupWithId('Charge')">Close</button>
                    </div>
                </div>

            </div>
            <div id="Service"
                class="popup-container  fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 z-50 flex items-center justify-center hidden">
                <div class="bg-white border border-gray-300 shadow-lg rounded-lg p-4 relative w-1/2 h-1/2">
                    <!-- Close button -->
                    <button class="absolute top-2 right-2 text-gray-600 hover:text-gray-800"
                        onclick="hidePopupWithId('Service ')">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <!-- Popup content for Service -->
                    Service popup content
                </div>
            </div>

            {{-- Service Management Dropdown Popup UI --}}

            {{-- 3.Change Password Popup UI --}}

            <div id="changePassword" class="popup-container fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 z-50 flex items-center justify-center hidden">
                <div class="bg-white border border-gray-300 shadow-lg rounded-lg p-4 relative w-full max-w-lg">
                    <!-- Close button -->
                    <button class="absolute top-2 right-2 text-gray-600 hover:text-gray-800" onclick="hidePopupWithId('changePassword')">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <!-- Popup content for Change Password -->
                    <div class="bg-white p-8 rounded-lg shadow-md w-full">
                        <h2 class="text-2xl font-bold mb-6">Change Password</h2>

                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700">New enquiry password</label>
                            <input type="password" id="password" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" placeholder="Enter password">
                        </div>

                        <div class="mb-4">
                            <label for="notes" class="block text-sm font-medium text-gray-700">Enter Notes (Optional)</label>
                            <textarea id="notes" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" rows="4" placeholder="Enter notes..."></textarea>
                        </div>

                        <div class="mb-4">
                            <p class="block text-sm font-medium text-gray-700">Also apply to these other services:</p>
                            <div class="mt-2 grid grid-cols-2 gap-4 border border-1 border-gray-500 p-4">
                                <div class="flex items-center">
                                    <input type="checkbox" id="same-service" class="mr-2">
                                    <label for="same-service" class="text-sm text-gray-700">Same Service Type</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="siblings" class="mr-2">
                                    <label for="siblings" class="text-sm text-gray-700">Siblings</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="all" class="mr-2">
                                    <label for="all" class="text-sm text-gray-700">All</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="children" class="mr-2">
                                    <label for="children" class="text-sm text-gray-700">Children</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <input type="checkbox" id="close-event" class="mr-2">
                            <label for="close-event" class="text-sm text-gray-700">Close network event</label>
                        </div>

                        <div class="flex justify-end space-x-4">
                            <button class="px-4 py-2 bg-green-600 text-white rounded-md">Save</button>
                            <button class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md" onclick="hidePopupWithId('changePassword')">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 3..Change Password Popup UI CLosee --}}

            {{-- 4.Change Mailbox Popup UI --}}

            <div id="changeMailbox" class="popup-container fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 z-50 flex items-center justify-center hidden">
                <div class="bg-white border border-gray-300 shadow-lg rounded-lg p-4 relative w-full max-w-lg ">
                    <!-- Close button -->
                    <button class="absolute top-2 right-2 text-gray-600 hover:text-gray-800" onclick="hidePopupWithId('changeMailbox')">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <!-- Popup content for Connect -->
                    <div class="container max-w-md p-4 bg-white">
                        <div class="header flex justify-between items-center border-b border-gray-300 pb-2 mb-4">
                            <div>Change Mailbox Number</div>
                        </div>
                        <div class="section mb-4">
                            <label class="block mb-2">
                                <input type="radio" name="status" value="not-active" class="mr-2" checked> Not Active
                            </label>
                            <label class="block mb-2">
                                <input type="radio" name="status" value="mailbox-number" class="mr-2"> Mailbox Number
                                <input type="text" name="mailbox-number" class="border border-gray-300 p-1 ml-2">
                            </label>
                        </div>
                        <div class="section mb-4">
                            <label for="notes" class="block mb-2">Enter Notes (optional)</label>
                            <textarea id="notes" name="notes" class="w-full h-24 border border-gray-300 p-2"></textarea>
                        </div>
                        <div class="buttons flex justify-end gap-2">
                            <button class="bg-green-600 text-white px-4 py-2 rounded">Save</button>
                            <button class="bg-gray-300 px-4 py-2 rounded" onclick="hidePopupWithId('changeMailbox')">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 4.Change Mailbox Popup UI closed --}}

            {{-- 5.Discounting Popup UI  --}}

            <div id="discounting" class="popup-container  fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 z-50 flex items-center justify-center hidden">
                <div class="bg-white border border-gray-300 shadow-lg rounded-lg p-4 relative max-w-fit max-h-fit">
                    <!-- Close button -->
                    <button class="absolute top-2 right-2 text-gray-600 hover:text-gray-800"
                        onclick="hidePopupWithId('discounting')">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <!-- Popup content for Connect -->
                    <div class="border mt-4"  tyle="max-height: 400px; overflow-y: auto;">
                        <table class="w-full border-collapse" >
                            <!-- Table content -->
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="border p-2">Discount</th>
                                    <th class="border p-2">From</th>
                                    <th class="border p-2">To</th>
                                    <th class="border p-2">Source</th>
                                    <th class="border p-2">Package</th>
                                    <th class="border p-2">Status</th>
                                    <th class="border p-2">Terminal Discounting</th>
                                    <th class="border p-2">Last Updated</th>
                                    <th class="border p-2">Updated By</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border p-2">D090</td>
                                    <td class="border p-2">$9 Package Discount</td>
                                    <td class="border p-2">Monthly</td>
                                    <td class="border p-2">-8.1818182</td>
                                    <td class="border p-2">13/09/2023</td>
                                    <td class="border p-2">On-going</td>
                                    <td class="border p-2">31/05/2024</td>
                                    <td class="border p-2">-8.18</td>
                                    <td class="border p-2">$0.00</td>
                                </tr>
                                <tr>
                                    <td class="border p-2">BN12</td>
                                    <td class="border p-2">NBN 12/1 Mbps</td>
                                    <td class="border p-2">Monthly</td>
                                    <td class="border p-2">$69.0818182</td>
                                    <td class="border p-2">13/09/2023</td>
                                    <td class="border p-2">On-going</td>
                                    <td class="border p-2">31/05/2024</td>
                                    <td class="border p-2">$69.08</td>
                                    <td class="border p-2">$0.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="flex flex-col justify-end md:flex-row md:ml-auto mt-4">
                        <button class="bg-green-600 text-white hover:bg-gray-400 px-4 py-2 mr-2" onclick="showTableView()">New</button>
                        <button class="bg-red-600  hover:bg-gray-400 text-white px-4 py-2 mr-2">Delete</button>
                        <button class="bg-gray-300 hover:bg-gray-400 px-4 py-2 mr-2">Edit</button>
                        <button class="bg-gray-300 hover:bg-gray-400 px-4 py-2" onclick="hidePopupWithId('discounting')">Close</button>
                    </div>
                </div>
            </div>

            {{-- 5.Discounting Popup UI closed --}}

            {{-- 6.Manage Contract Popup UI --}}

            <div id="manageContract" class="popup-container fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 z-50 flex items-center justify-center hidden">
                <div class="bg-white border border-gray-300 shadow-lg rounded-lg p-4 relative max-w-2xl w-full h-3/4 overflow-auto">
                    <!-- Close button -->
                    <button class="absolute top-2 right-2 text-gray-600 hover:text-gray-800" onclick="hidePopupWithId('manageContract')">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <!-- Popup content for Contract Management -->
                    <div class="p-4">
                        <div class="flex justify-between items-center mb-4 border-b pb-2">
                            <div>Contract Management</div>
                        </div>
                        <div class="mb-4">
                            <div class="mb-2 font-semibold">Contract Details</div>
                            <div class="border border-1 border-gray-500 p-4">
                            <div class="mb-2">
                                <label class="block">Description</label>
                                <input type="text" class="w-full border border-gray-300 p-1" value="24 Month Contract">
                            </div>
                            <div class="flex mb-2 gap-2 ">
                                <div class="w-1/2">
                                    <label class="block">Start Date</label>
                                    <input type="text" class="w-full border border-gray-300 p-1" value="13/09/2023">
                                </div>
                                <div class="w-1/2">
                                    <label class="block">End Date</label>
                                    <input type="text" class="w-full border border-gray-300 p-1" value="12/09/2025 11:59:59 PM">
                                </div>
                            </div>
                            <div class="mb-2">
                                <label class="block">Contract No.</label>
                                <input type="text" class="w-full border border-gray-300 p-1">
                            </div>
                            <div class="mb-2">
                                <label class="block">Salesperson</label>
                                <input type="text" class="w-full border border-gray-300 p-1">
                            </div>
                            <div class="flex mb-2 gap-2">
                                <div class="w-1/2">
                                    <label class="block">Created Date</label>
                                    <input type="text" class="w-full border border-gray-300 p-1" value="3/10/2023 5:58:38 PM">
                                </div>
                                <div class="w-1/2">
                                    <label class="block">Created By</label>
                                    <input type="text" class="w-full border border-gray-300 p-1" value="bupereri">
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <button class="bg-gray-300 px-4 py-2 rounded">Replace</button>
                            </div>
                            </div>
                        </div>
                        <div class="mb-4 ">
                            <div class="mb-2 font-semibold">Contract Extensions</div>
                            <div class="border border-1 border-gray-500 p-4">
                            <div class="border mb-2 h-24 overflow-y-auto">
                                <table class="w-full border-collapse">
                                    <thead class="bg-gray-200">
                                        <tr>
                                            <th class="border p-2">Start Date</th>
                                            <th class="border p-2">End Date</th>
                                            <th class="border p-2">Sales Person</th>
                                            <th class="border p-2">Description</th>
                                            <th class="border p-2">Created Date</th>
                                            <th class="border p-2">Created By</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Add rows here as needed -->
                                    </tbody>
                                </table>
                            </div>
                            <div class="flex justify-end gap-2">
                                <button class="bg-green-600 text-white px-4 py-2 rounded">New</button>
                                <button class="bg-red-600 text-white px-4 py-2 rounded">Delete</button>
                            </div>
                            </div>
                        </div>
                        <div class="flex justify-end gap-2">
                            <button class="bg-gray-300 px-4 py-2 rounded" onclick="hidePopupWithId('manageContract')">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 6.Manage Contract Popup Ui Closed --}}

            {{-- 7.Sell On Service Popup UI --}}

            <div id="sellOnService" class="popup-container fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 z-50 flex items-center justify-center hidden">
                <div class="bg-white  shadow-lg rounded-lg p-4 relative max-w-2xl w-full h-3/4 overflow-auto">
                    <!-- Close button -->
                    <button class="absolute top-2 right-2 text-gray-600 hover:text-gray-800" onclick="hidePopupWithId('sellOnService')">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <!-- Popup content for Sell-On -->
                    <div class=" p-4 max-w-lg mx-auto">
                        <div class="flex justify-between mb-4">
                            <div>Sell-On Service</div>
                        </div>
                        <div class="mb-4">
                            <div class="mb-2"><strong>Account Details</strong></div>
                            <div class="border border-1 border-gray-500 p-4">
                            <div class="flex mb-2">
                                <div class="w-1/2 pr-1">
                                    <label class="block">Account No.</label>
                                    <input type="text" class="w-full border border-gray-300 p-1">
                                </div>
                                <div class="mt-6 w-1/2 pl-1 ">
                                    <button class="bg-green-600 text-white px-2 py-1 mr-1">New</button>
                                    <button class="bg-gray-300 text-black px-2 py-1 ">Search</button>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="block">Name</label>
                                <input type="text" class="w-full border border-gray-300 p-1">
                            </div>
                            </div>
                            <div class="mb-4">
                                <div class="mb-2 mt-2"><strong>Sell-On Details</strong></div>
                                <div class="border border-1 border-gray-500 p-4">
                                <div class="flex mb-2">
                                    <div class="w-1/2 pr-1">
                                        <label class="block">New Password</label>
                                        <input type="text" class="w-full border border-gray-300 p-1" >
                                    </div>
                                    <div class="w-1/2 pl-1">
                                        <label class="block">Sell-On Date</label>
                                        <input type="text" class="w-full border border-gray-300 p-1" >
                                    </div>
                                </div>
                                <div class="flex mb-2">
                                    <div class="w-1/2 pr-1">
                                        <label class="block">Sell-On Fee</label>
                                        <input type="text" class="w-full border border-gray-300 p-1" >
                                    </div>
                                </div>
                                <div class="flex  mb-2">
                                    <div class="w-full pr-1">
                                        <label class="block">Cost Centre</label>
                                        <input type="text" class="w-full border border-gray-300 p-1">
                                    </div>
                                    <div class="flex  items-end">
                                        <button class="bg-gray-300 px-2 py-1 mr-1">X</button>
                                        <button class="bg-gray-300 px-2 py-1">...</button>
                                    </div>
                                </div>
                                <div class="flex mb-2">
                                    <div class="w-full pr-1">
                                        <label class="block">Dealer</label>
                                        <input type="text" class="w-full border border-gray-300 p-1">
                                    </div>
                                    <div class="flex  items-end">
                                        <button class="bg-gray-300 px-2 py-1 mr-1">X</button>
                                        <button class="bg-gray-300 px-2 py-1">...</button>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="block">Parent Service</label>
                                    <select class="w-full border border-gray-300 p-1">
                                        <option>&lt;not selected&gt;</option>
                                    </select>
                                </div>
                            </div>
                            </div>
                            <div class="mb-4">
                                <div class="mb-2"><strong>Package</strong></div>
                                <div class="border border-1 border-gray-500 p-4">
                                <div class="mb-2">
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="package" class="mr-2"> Current
                                    </label>
                                    <span>[NOVEL TEL NBN DATA] option (NBN 12/1 Mbps)</span>
                                </div>
                                <div class="mb-4">
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="package" class="mr-2"> Select new package
                                    </label>
                                    <button class="bg-gray-300 px-2 py-1">...</button>
                                </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="block"><strong> Enter note </strong> </label>
                                <div class="border border-1 border-gray-500 p-4">
                                <textarea class="w-full border border-gray-300 p-1 h-20"></textarea>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="inline-flex items-center mb-2">
                                    <input type="checkbox" class="mr-2"> Close the Network Event
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" class="mr-2 ml-2"> Cancel all Open Events
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" class="mr-2"> Reprocess Usage Loaded after Sell-on Date
                                </label>
                            </div>
                        </div>
                        <div class="flex justify-end mb-4">
                            <button class="bg-green-600 text-white px-4 py-2 mr-2">Save</button>
                            <button class="bg-red-600 text-white px-4 py-2" onclick="hidePopupWithId('sellOnService')">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 7.Sell On Service Popup UI Closed --}}

            {{-- Service Management Dropdown Popup UI Closed --}}

     {{------------------------------------------------------------------}}

            {{-- Connection Service Dropdown Popup UI  --}}

            {{-- 3.Change Connection Date Popup UI --}}

            <div id="changeConnectionDate" class="popup-container fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 z-50 flex items-center justify-center hidden">
                <div class="bg-white border border-gray-300 shadow-lg rounded-lg p-6 relative max-w-lg w-full h-auto">
                    <!-- Close button -->
                    <button class="absolute top-4 right-4 text-gray-600 hover:text-gray-800" onclick="hidePopupWithId('changeConnectionDate')">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <!-- Popup content for Connect -->
                    <div class="flex flex-col justify-between h-full">
                        <div>
                            <div class="flex justify-between mb-6">
                                <div class="text-xl font-semibold">Change Connection Date</div>
                            </div>
                            <div class="mb-6">
                                <div class="mb-4">
                                    <label class="block font-medium mb-2">Current Connection Date</label>
                                    <input type="text" class="w-full h-10 border rounded-md px-2" readonly>
                                </div>
                                <div class="mb-4">
                                    <label class="block font-medium mb-2">New Connection Date</label>
                                    <input type="date" class="w-full h-10 border rounded-md px-2">
                                </div>
                                <div class="flex items-center mb-4">
                                    <input type="checkbox" class="mr-2"> <span>Back Date Charges</span>
                                </div>
                                <div class="mb-4">
                                    <label class="block font-medium mb-2">Enter Notes (optional)</label>
                                    <textarea class="w-full h-32 border rounded-md px-2 py-2"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button class="px-4 py-2 bg-green-600 hover:bg-green-700 rounded text-white mx-2">Save</button>
                            <button class="px-4 py-2 bg-gray-400 hover:bg-gray-500 rounded text-white mx-2" onclick="hidePopupWithId('changeConnectionDate')">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>


            {{-- 3.Change Connection Date Popup UI Closed --}}


            {{-- Connect Service Dropdown Popup UI closed --}}


            {{-- Disconnect Service Dropdown Popup UI  --}}

            {{-- 1.Disconnect Service Popup UI --}}


            <div id="disconnectService" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-50 flex items-center justify-center hidden">
                <div class="popup-container bg-white border border-gray-300 shadow-lg rounded-lg p-4 w-3/4 md:w-1/2 h-3/4 md:h-2/3 overflow-hidden">
                    <div class="modal-content bg-white mx-auto rounded-lg shadow-lg z-50 w-full h-full relative">
                        <div class="sticky top-0 flex justify-end items-center border-b pb-2 mb-4 bg-white z-50">
                            <button class="text-black hover:text-black p-2 rounded-lg bg-white focus:outline-none"
                                    onclick="hidePopupWithId('disconnectService')">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="modal-content bg-white mx-auto rounded shadow-lg z-50 overflow-y-auto w-full h-full p-4">
                            <div class="section mb-6">
                                <div class="overflow-y-auto flex" style="max-height: 100px;">
                                    <p>This service is under contract until 12/09/2025 11:59:59 (471 more days).</p>
                                    <button class="mt-2 bg-gray-600 text-white py-1 px-2 rounded hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 ml-auto">Detail</button>
                                </div>
                            </div>
                            <div><strong>General</strong></div>
                            <div class="section flex flex-col md:flex-row justify-between mb-6 border border-black p-2">
                                <div class="w-full md:w-1/2 pr-0 md:pr-4">
                                    <label for="disconnection-date" class="block mb-2 font-medium">Disconnection Date</label>
                                    <input type="date" id="disconnection-date" value="2024-05-30" class="border border-gray-300 p-2 rounded w-full mb-4">
                                    <div class="flex items-center mb-4">
                                        <input type="radio" name="disconnection-time" value="now" checked class="mr-2"> Now
                                        <input type="radio" name="disconnection-time" value="end-of-day" class="mr-2 ml-4"> End of Day
                                    </div>
                                    <label for="disconnection-reason" class="block mb-2 font-medium">Disconnection Reason</label>
                                    <select id="disconnection-reason" class="border border-gray-300 p-2 rounded w-full mb-4">
                                        <option>Bad Debt</option>
                                        <option>Bankrupt</option>
                                        <option>Credit Alert</option>
                                        <option>Customer Request</option>
                                        <option>Deceased</option>
                                        <option>Fraud</option>
                                        <option>Loss</option>
                                        <option>Lost/stolen Phone</option>
                                    </select>
                                </div>
                                <div class="w-full md:w-1/2 pl-0 md:pl-4">
                                    <label for="notes" class="block mb-2 font-medium">Notes (optional)</label>
                                    <textarea id="notes" class="border border-gray-300 p-2 rounded w-full mb-4"></textarea>
                                    <div class="space-y-2">
                                        <label class="flex items-center">
                                            <input type="checkbox" name="close-network-event" class="mr-2"> Close Network Event
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="cancel-open-events" class="mr-2"> Cancel All Open Events
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="credit-back-charges"  class="mr-2"> Credit Back Future Charges
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="bill-future-charges"  class="mr-2"> Bill Future Charges Immediately
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="unload-future-usage"  class="mr-2"> Unload Future Usage
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div><strong>Payout Details</strong></div>
                            <div class="border border-black p-2">
                                <div class="section mb-6">
                                    <label class="flex items-center mb-2">
                                        <input type="radio" name="payout-option" value="current" checked class="mr-2"> Use current package/option for calculating payout
                                    </label>
                                    <div class="flex items-center mb-2">
                                        <label class="flex items-center">
                                            <input type="radio" name="payout-option" value="new" class="mr-2"> Use this package/option for calculating payout
                                        </label>
                                        <button class="border border-black text-black hover:underline px-2 py-1 rounded ml-auto">...</button>
                                    </div>
                                </div>
                                <div class="section mb-6 flex">
                                    <label for="calculated-payout" class="block mb-2 font-medium">Calculated payout $0.00</label>
                                    <p>Note: Service currently has $0.00 of unbilled usage.</p>
                                    <button class="mt-2 mt-2 bg-gray-600 text-white py-1 px-2 rounded hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 ml-auto">Detail</button>
                                </div>
                            </div>
                            <div class="section mt-4 mb-6">
                                <label class="block mb-2 font-medium">Also Apply to these Other Services:</label>
                                <div class="flex flex-wrap space-y-2 border border-black p-2">
                                    <div class="w-full md:w-1/2">
                                        <label class="flex items-center">
                                            <input type="radio" name="apply-to-services" value="all" class="mr-2"> All
                                        </label>
                                    </div>
                                    <div class="w-full md:w-1/2">
                                        <label class="flex items-center">
                                            <input type="radio" name="apply-to-services" value="children" class="mr-2"> Children
                                        </label>
                                    </div>
                                    <div class="w-full md:w-1/2">
                                        <label class="flex items-center">
                                            <input type="radio" name="apply-to-services" value="same-type" class="mr-2"> Same Service Type
                                        </label>
                                    </div>
                                    <div class="w-full md:w-1/2">
                                        <label class="flex items-center">
                                            <input type="radio" name="apply-to-services" value="siblings" class="mr-2"> Siblings
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="buttons flex justify-end gap-4 mb-6">
                                <button class="bg-green-600 text-white py-2 px-4 rounded hover:bg-blue-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Save</button>
                                <button class="bg-gray-600 text-white py-2 px-4 rounded hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" onclick="hidePopupWithId('disconnectService')">Cancel</button>
                            </div>
                            <div class="footer flex justify-between items-center border-t border-gray-300 pt-4 text-sm text-gray-600">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{-- 1.Disconnect Service Popup UI Closed --}}


            <div id="Connect"
                class="popup-container  fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 z-50 flex items-center justify-center hidden">
                <div class="bg-white border border-gray-300 shadow-lg rounded-lg p-4 relative w-1/2 h-1/2">
                    <!-- Close button -->
                    <button class="absolute top-2 right-2 text-gray-600 hover:text-gray-800"
                        onclick="hidePopupWithId('Connect')">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <!-- Popup content for Connect -->
                    Connect popup content
                </div>
            </div>
            <div id="Disconnect"
                class="popup-container  fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 z-50 flex items-center justify-center hidden">
                <div class="bg-white border border-gray-300 shadow-lg rounded-lg p-4 relative w-1/2 h-1/2">
                    <!-- Close button -->
                    <button class="absolute top-2 right-2 text-gray-600 hover:text-gray-800"
                        onclick="hidePopupWithId('Disconnect')">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <!-- Popup content for Disconnect -->
                    Disconnect popup content
                </div>
            </div>
            <div id="History"
                class="popup-container  fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 z-50 flex items-center justify-center hidden">
                <div class="bg-white border border-gray-300 shadow-lg rounded-lg p-4 relative w-1/2 h-1/2">
                    <!-- Close button -->
                    <button class="absolute top-2 right-2 text-gray-600 hover:text-gray-800"
                        onclick="hidePopupWithId('History')">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <!-- Popup content for History -->
                    History popup content
                </div>
            </div>
            <div id="Other"
                class="popup-container  fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 z-50 flex items-center justify-center hidden">
                <div class="bg-white border border-gray-300 shadow-lg rounded-lg p-4 relative w-1/2 h-1/2">
                    <!-- Close button -->
                    <button class="absolute top-2 right-2 text-gray-600 hover:text-gray-800"
                        onclick="hidePopupWithId('Other')">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <!-- Popup content for Other -->
                    Other popup content
                </div>
            </div>

            {{-- Servise Right click popup View End --}}

            {{-- Servise Option Right click popup View Start --}}

            <div id="edit"
                class="popup-container fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 z-50 flex items-center justify-center hidden">
                <div class="bg-white border border-gray-300 shadow-lg rounded-lg p-4 relative w-1/2 h-1/2">
                    <!-- Close button -->
                    <button class="absolute top-2 right-2 text-gray-600 hover:text-gray-800"
                        onclick="hidePopupWithId('edit')">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <!-- Popup content for Other -->
                    <div id="edit-content"></div>

                </div>
            </div>


            <div id="contract"
            class="popup-container fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 z-50 flex items-center justify-center hidden ">
            <div class="bg-white border border-gray-300 shadow-lg rounded-lg p-4 relative w-3/4 h-3/4">
                <!-- Close button -->
                <button class="absolute top-2 right-2 text-gray-600 hover:text-gray-800" onclick="contracthidePopupWithId('contract')">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <!-- Popup content for Other -->
                <div class=" p-4 rounded-lg border border-gray-500">
                    <div>
                        <h1 class="text-lg font-semibold mb-4">File</h1>
                        <form action="{{ route('contracts.update') }}" method="POST">
                            @csrf
                            <h1 class="text-md font-medium mb-2">Contact Details</h1>
                            <input type="text" id="id" name="id"   class="hidden">
                            <div class="space-y-4">
                                <div class="flex items-center">
                                    <label class="block w-1/3 mb-2">Description</label>
                                    <input type="text" class="block w-2/3 mb-2 border border-gray-300 rounded p-2" name="contract" id="description" >
                                </div>
                                <div class="flex items-center">
                                    <label class="block w-1/3 mb-2">Start Date</label>
                                    <input type="date" class="block w-2/3 mb-2 border border-gray-300 rounded p-2" name="contract_start_date" id="contract_start_date" >
                                </div>
                                <div class="flex items-center">
                                    <label class="block w-1/3 mb-2">End Date</label>
                                    <input type="date" class="block w-2/3 mb-2 border border-gray-300 rounded p-2" name="contract_end_date" id="contract_end_date">
                                </div>
                                <div class="flex items-center">
                                    <label class="block w-1/3 mb-2">Contract Number</label>
                                    <input type="number" class="block w-2/3 mb-2 border border-gray-300 rounded p-2" name="contract_number" id="contract_number" >
                                </div>
                                <div class="flex items-center">
                                    <label class="block w-1/3 mb-2">Salesperson</label>
                                    <input type="text" class="block w-2/3 mb-2 border border-gray-300 rounded p-2" name="salesperson" id="salesperson">
                                </div>
                                <div class="flex items-center">
                                    <label class="block w-1/3 mb-2">Created Date</label>
                                    <input type="text" class="block w-2/3 mb-2 border border-gray-300 rounded p-2" name="createddate" id="createddate">
                                </div>
                                <div class="flex items-center">
                                    <label class="block w-1/3 mb-2">Created By</label>
                                    <input type="text" class="block w-2/3 mb-2 border border-gray-300 rounded p-2" value="admin" name="createdby" id="createdby">
                                </div>
                            </div>
                            <div class="flex justify-end mt-4">
                                <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700">REPLACE</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>






            {{-- Servise Option Right click popup View End --}}

            {{-- service package details 3rd div --}}
            <section class="  p-3 sm:p-5 w-4/12 border ">
                <div class=" border  ">
                    <!-- Start coding here -->

                    <div class=" bg-green-500   text-white text-lg ">
                        <!-- Account number -->

                        {{-- search box --}}
                        <div class="flex-auto flex flex-col  h-12 ">
                            <div class="flex-auto flex flex-col  h-12 ">
                                <div class="flex flex-col  relative">

                                    <div class="w-full ml-2 svelte-1l8159u -mt-1">
                                        <div class="pt-2 relative mx-auto text-gray-600  ">

                                            <input
                                                class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                                                type="searchd" name="searchd" placeholder="Search">
                                            <button type="submit" class="">
                                                <svg class="text-gray-600 ml-1 h-4 w-4 fill-current"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                                    id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966"
                                                    style="enable-background:new 0 0 56.966 56.966;"
                                                    xml:space="preserve" width="512px" height="512px">
                                                    <path
                                                        d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                                </svg>
                                            </button>
                                            {{-- <button>
                                                <img id="saveValue" src="{{ asset('Images/save.png') }}" alt="Login Image"  class=" ml-4 h-4 w-4 ">
                                            </button> --}}

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>


                    </div>
                    <div class="bg-white  relative shadow-md sm:rounded-lg  h-72 overflow-y-auto">
                        <div class="">

                            <div id="" class="overflow-x-auto">

                                <table id="details-table"
                                    class="w-full text-sm text-left text-gray-500  border-separate">

                                    <!-- Table content for Notes -->
                                    @if ($account != null)
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-300 h-10  rounded-full ">
                                            <tr>
                                                <th>Item</th>
                                                <th>Value</th>

                                            </tr>
                                        </thead>

                                        <tbody id="details-table-body">


                                        </tbody>
                                        <div id="dropdown" class="hidden absolute bg-white border shadow-md p-2">
                                            <!-- Dropdown content will be dynamically added here -->
                                        </div>
                                    @elseif(isset($errorMessage))
                                        <div class="flex justify-center items-center h-full max-h-full my-28">
                                            <div class="font-bold p-3">{{ $errorMessage }}</div>
                                        </div>
                                    @endif

                                </table>
                            </div>



                        </div>
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
</body>
<script src="{{ asset('../js/home.js') }}"></script>

</html>
