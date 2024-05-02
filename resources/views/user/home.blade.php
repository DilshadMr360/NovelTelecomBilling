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
            <section class=" dark:bg-gray-900 p-3 sm:p-5 w-6/12 border ">
                <div class=" border  ">
                    <!-- Start coding here -->

                    <div class=" bg-green-500   text-white text-lg ">
                        <!-- Account number -->
                        {{-- search box --}}

                        <div class="flex-auto flex flex-col  h-12 ">
                            <div class="flex flex-col items-center  relative">
                                <div class="w-full svelte-1l8159u -mt-1">
                                    <div class="pt-2 relative mx-auto text-gray-600  ">
                                        <span class=" text-white">Account Number</span>
                                        <input
                                            class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                                            type="search" name="search" placeholder="Search">
                                        <button type="submit" class="">
                                            <svg class="text-gray-600 h-4 w-4 fill-current"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1"
                                                x="0px" y="0px" viewBox="0 0 56.966 56.966"
                                                style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                                                width="512px" height="512px">
                                                <path
                                                    d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>




                    </div>
                    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg  h-72 overflow-y-auto">
                        <div class="">

                            <div id="" class="overflow-x-auto">
                                <table
                                    class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-separate">

                                    <!-- Table content for Notes -->
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-300 h-10 rounded-full dark:bg-gray-700 dark:text-gray-600">
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

            {{-- second section --}}
            <section class=" dark:bg-gray-900 p-3 sm:p-5 w-6/12 border ">
                <div class=" border  ">
                    <!-- Start coding here -->
                    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg   overflow-y-auto">
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
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-separate">

                                <!-- Table content for Notes -->
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-300 h-10 rounded-full dark:bg-gray-700 dark:text-gray-600">
                                    <tr>
                                        <th>Piroty</th>
                                        <th>Date Time</th>
                                        <th>Creator</th>
                                        <th>Note</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Note 1</td>
                                        <td>Value 1</td>
                                    </tr>
                                    <tr>
                                        <td>Note 2</td>
                                        <td>Value 2</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                        <!-- Bill Table -->
                        <div id="billsTable" class="overflow-x-auto hidden">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-separate">
                                <!-- Table content for Bills -->
                                <thead
                                    class="text-xs text-gray-700 uppercase h-10  bg-gray-300  dark:bg-gray-700 dark:text-gray-400">
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
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-separate">
                                <!-- Table content for Bills -->
                                <thead
                                    class="text-xs text-gray-700 h-10  uppercase bg-gray-300  dark:bg-gray-700 dark:text-gray-400">
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
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-separate">
                                <!-- Table content for Bills -->
                                <thead
                                    class="text-xs text-gray-700  h-10  uppercase bg-gray-300  dark:bg-gray-700 dark:text-gray-400">
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
                            <table class="w-full text-sm text-left  text-gray-500 dark:text-gray-400">

                                <thead
                                    class="text-xs text-gray-700 h-10  uppercase bg-gray-300  dark:bg-gray-700 dark:text-gray-400">
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
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                                <thead
                                    class="text-xs text-gray-700  h-10  uppercase bg-gray-300  dark:bg-gray-700 dark:text-gray-400">
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
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                                <thead
                                    class="text-xs text-gray-700 h-10  uppercase bg-gray-300  dark:bg-gray-700 dark:text-gray-400">
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
            {{-- 3rd section --}}
            {{-- <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 ">
                <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                    <!-- Start coding here -->
                    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                        <div
                            class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                            <div class="w-full md:w-1/2">
                                <form class="flex items-center">
                                    <label for="simple-search" class="sr-only">Searcdh</label>
                                    <div class="relative w-full">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <input type="text" id="simple-search"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Search" required="">
                                    </div>
                                </form>
                            </div>
                            <div
                                class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                                <button type="button"
                                    class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path clip-rule="evenodd" fill-rule="evenodd"
                                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                    </svg>
                                    Add product
                                </button>
                                <div class="flex items-center space-x-3 w-full md:w-auto">
                                    <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown"
                                        class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                        type="button">
                                        <svg class="-ml-1 mr-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path clip-rule="evenodd" fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                        </svg>
                                        Actions
                                    </button>
                                    <div id="actionsDropdown"
                                        class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="actionsDropdownButton">
                                            <li>
                                                <a href="#"
                                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mass
                                                    Edit</a>
                                            </li>
                                        </ul>
                                        <div class="py-1">
                                            <a href="#"
                                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete
                                                all</a>
                                        </div>
                                    </div>
                                    <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
                                        class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                        type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                            class="h-4 w-4 mr-2 text-gray-400" viewbox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Filter
                                        <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path clip-rule="evenodd" fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                        </svg>
                                    </button>

                                </div>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-4 py-3">Product name</th>
                                        <th scope="col" class="px-4 py-3">Category</th>
                                        <th scope="col" class="px-4 py-3">Brand</th>
                                        <th scope="col" class="px-4 py-3">Description</th>
                                        <th scope="col" class="px-4 py-3">Price</th>
                                        <th scope="col" class="px-4 py-3">
                                            <span class="sr-only">Actions</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b dark:border-gray-700">
                                        <th scope="row"
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            Apple iMac 27&#34;</th>
                                        <td class="px-4 py-3">PC</td>
                                        <td class="px-4 py-3">Apple</td>
                                        <td class="px-4 py-3">300</td>
                                        <td class="px-4 py-3">$2999</td>
                                        <td class="px-4 py-3 flex items-center justify-end">
                                            <button id="apple-imac-27-dropdown-button"
                                                data-dropdown-toggle="apple-imac-27-dropdown"
                                                class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                                type="button">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                </svg>
                                            </button>
                                            <div id="apple-imac-27-dropdown"
                                                class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                                    aria-labelledby="apple-imac-27-dropdown-button">
                                                    <li>
                                                        <a href="#"
                                                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Show</a>
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                                    </li>
                                                </ul>
                                                <div class="py-1">
                                                    <a href="#"
                                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>


                                    <tr class="border-b dark:border-gray-700">
                                        <th scope="row"
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            Monitor BenQ EX2710Q</th>
                                        <td class="px-4 py-3">TV/Monitor</td>
                                        <td class="px-4 py-3">BenQ</td>
                                        <td class="px-4 py-3">354</td>
                                        <td class="px-4 py-3">$499</td>
                                        <td class="px-4 py-3 flex items-center justify-end">
                                            <button id="benq-ex2710q-dropdown-button"
                                                data-dropdown-toggle="benq-ex2710q-dropdown"
                                                class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                                type="button">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                </svg>
                                            </button>
                                            <div id="benq-ex2710q-dropdown"
                                                class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                                    aria-labelledby="benq-ex2710q-dropdown-button">
                                                    <li>
                                                        <a href="#"
                                                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Show</a>
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                                    </li>
                                                </ul>
                                                <div class="py-1">
                                                    <a href="#"
                                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
                            aria-label="Table navigation">
                            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                Showing
                                <span class="font-semibold text-gray-900 dark:text-white">1-10</span>
                                of
                                <span class="font-semibold text-gray-900 dark:text-white">1000</span>
                            </span>
                            <ul class="inline-flex items-stretch -space-x-px">
                                <li>
                                    <a href="#"
                                        class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                        <span class="sr-only">Previous</span>
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                            viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                                </li>
                                <li>
                                    <a href="#" aria-current="page"
                                        class="flex items-center justify-center text-sm z-10 py-2 px-3 leading-tight text-primary-600 bg-primary-50 border border-primary-300 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                        <span class="sr-only">Next</span>
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                            viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </section> --}}
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
            <section class=" dark:bg-gray-900 p-3 sm:p-5 w-4/12 border ">
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
                    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg  h-72 overflow-y-auto">
                        <div class="">

                            <div id="" class="overflow-x-auto">
                                <table
                                    class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-separate">

                                    <!-- Table content for Notes -->
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-300 h-10 rounded-full dark:bg-gray-700 dark:text-gray-600">
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
            <section class=" dark:bg-gray-900 p-3 sm:p-5 w-6/12 border ">
                <div class=" border  ">
                    <!-- Start coding here -->

                    <div class=" bg-green-500 h-10 text-white text-lg p-2">
                        Novel Tel
                    </div>
                    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg  h-72 overflow-y-auto">
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
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-separate ">

                                <!-- Table content for Notes -->
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-300 h-10 rounded-full dark:bg-gray-700 dark:text-gray-600">
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
                            <table class="w-full border-separate text-sm text-left text-gray-500 dark:text-gray-400">
                                <!-- Table content for Bills -->
                                <thead
                                    class="text-xs text-gray-700 uppercase h-10  bg-gray-300  dark:bg-gray-700 dark:text-gray-400">
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
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <!-- Table content for Bills -->
                                <thead
                                    class="text-xs text-gray-700 h-10  uppercase bg-gray-300  dark:bg-gray-700 dark:text-gray-400">
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
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <!-- Table content for Bills -->
                                <thead
                                    class="text-xs text-gray-700  h-10  uppercase bg-gray-300  dark:bg-gray-700 dark:text-gray-400">
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
                            <table class="w-full text-sm text-left  text-gray-500 dark:text-gray-400">

                                <thead
                                    class="text-xs text-gray-700 h-10  uppercase bg-gray-300  dark:bg-gray-700 dark:text-gray-400">
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
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                                <thead
                                    class="text-xs text-gray-700  h-10  uppercase bg-gray-300  dark:bg-gray-700 dark:text-gray-400">
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
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                                <thead
                                    class="text-xs text-gray-700 h-10  uppercase bg-gray-300  dark:bg-gray-700 dark:text-gray-400">
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
