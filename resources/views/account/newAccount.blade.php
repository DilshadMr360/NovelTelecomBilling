<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Include flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <title>Account</title>
    <style>
        .tab-button.selected {
            text-decoration: underline;
            color: red
        }
    </style>
</head>

<body>
    @include('layouts.layout')

    <div class=" flex justify-center items-center h-screen">
        <section class="dark:bg-gray-900 w-[1000px]  ">
            <div class="border">
                <!-- Start coding here -->
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg  h-full  overflow-y-auto">
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4 mt-2">

                        <div class="flex shadow-md border-1 border-green-600 flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0 w-full b">
                            <button id="subscribesButton" class="w-auto flex items-center justify-center tab-button py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none tab-button selected" type="button" onclick="toggleFormVisibility('subscribeForm')">
                                Subscribes
                            </button>
                            <button id="addressButton" class="w-full flex items-center justify-center py-2 px-4 text-sm font-medium tab-button" type="button" onclick="toggleFormVisibility('addressForm')">
                                Address
                            </button>
                            <button id="phonesButton" class="w-full flex items-center justify-center py-2 px-4 text-sm font-medium tab-button" type="button" onclick="toggleFormVisibility('phonesForm')">
                                Phones
                            </button>
                            <button id="billingButton" class="w-full flex items-center justify-center py-2 px-4 text-sm font-medium tab-button" type="button" onclick="toggleFormVisibility('billingForm')">
                                Billing/Payment
                            </button>
                            <button id="contactButton" class="w-full flex items-center justify-center py-2 px-4 text-sm font-medium tab-button" type="button" onclick="toggleFormVisibility('contactForm')">
                                Contact
                            </button>
                            <button id="addInfoButton" class="w-full flex items-center justify-center py-2 px-4 text-sm font-medium tab-button" type="button" onclick="toggleFormVisibility('addinfoForm')">
                                Add Info
                            </button>
                        </div>


                    </div>


                    <form id="mainform" method="" action="{{route('account.newaccount')}}">
                        {{-- subscribe form --}}
                        <div id="subscribeForm" class="flex-col font-medium text-15px">
                            <div class="flex flex-row gap-4 md:gap-8 m-5">
                                <div class="w-7/12">
                                    <label for="">Contact Code</label>
                                    <input type="text" name="Medium"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                </div>
                                <div class="flex flex-col w-7/12">
                                    <label for="typeSelect">Type</label>
                                    <select name="typeSelect" id="typeSelect" onchange="toggleFields()"
                                        class="w-full p-2 border border-gray-800 rounded-lg">
                                        <option value="Individual">Individual</option>
                                        <option value="Corporate">Corporate</option>
                                    </select>
                                </div>
                            </div>

                            <div class="flex flex-row gap-4 md:gap-8  m-5  ">
                                <div class="w-7/12">
                                    <label for="">Key</label>
                                    <input type="text" name="Medium"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                </div>
                                <div class="flex flex-col w-7/12" id="keyandtitle">
                                    <label for="">Title</label>
                                    <select name="" id=""
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                        <option value="">None</option>
                                        <option value="">Mr</option>
                                        <option value="">Mrs</option>
                                        <option value="">Miss</option>
                                        <option value="">Ms</option>
                                        <option value="">Dr</option>
                                        <option value="">Novel Tel</option>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>

                            <div id="businessUnitDiv" class="flex flex-row gap-4 md:gap-8 m-5" style="display: none;">
                                <div class="flex flex-col w-7/12">
                                    <label for="">Business Unit</label>
                                    <select name="" id=""
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                        <option value=""></option>
                                    </select>
                                </div>

                                <div class="w-7/12">
                                    <label for="">Name</label>
                                    <input type="text" name="Medium"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                </div>
                            </div>

                            <div class="flex flex-row gap-4 md:gap-8  m-5  " id="tradingname">
                                <div class="w-7/12">
                                    <label for=""> Trading Name</label>
                                    <input type="text" name="Medium"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                </div>
                            </div>

                            <div class="flex flex-row gap-4 md:gap-8  m-5  " id="acnandabn">

                                <div class="flex flex-col w-7/12">
                                    <label for="">ACN</label>
                                    <select name="" id=""
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                        <option value=""></option>
                                    </select>
                                </div>

                                <div class="w-7/12">
                                    <label for="">ABN</label>
                                    <input type="text" name="Medium"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                </div>
                            </div>

                            <div class="flex flex-row gap-4 md:gap-8  m-5  " id="emailandquestion">

                                <div class="flex flex-col w-7/12">
                                    <label for="">Email</label>
                                    <select name="" id=""
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                        <option value=""></option>
                                    </select>
                                </div>

                                <div class="w-7/12">
                                    <label for="">Question</label>
                                    <input type="text" name="Medium"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                </div>
                            </div>

                            <div class="flex flex-row gap-4 md:gap-8  m-5  " id="answers">
                                <div class="w-7/12">
                                    <label for="">Answer</label>
                                    <input type="text" name="Medium"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                </div>
                            </div>

                            <div class=" text-red-700 ml-5" id="titlecoparate">Primary Contact Details</div>

                            <div class="flex flex-row gap-4 md:gap-8 m-5">
                                <div class="w-7/12">
                                    <label for="">Initials</label>
                                    <input type="text" name="Medium"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                </div>

                                <div class="w-7/12">
                                    <label for=""> First Name</label>
                                    <input type="text" name="Medium"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                </div>
                            </div>


                            <div class="flex flex-row gap-4 md:gap-8 m-5">

                                <div class="w-7/12">
                                    <label for="">Last Name</label>
                                    <input type="text" name="Medium"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                </div>

                            </div>


                            <div class="flex flex-row gap-4 md:gap-8 m-5">
                                <div class="w-7/12">
                                    <label for="">Trading Name</label>
                                    <input type="text" name="Medium"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                </div>
                                <div class="flex flex-col w-7/12">
                                    <label for="">Gender</label>
                                    <select name="" id=""
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                        <option value="">Unknown</option>
                                        <option value="">Male</option>
                                        <option value="">Female</option>

                                    </select>
                                </div>
                            </div>

                            <div class="flex flex-row gap-4 md:gap-8 m-5">
                                <div class="w-7/12">
                                    <label for="">Date Of Birth</label>
                                    <!-- Date Picker Input -->
                                    <input type="text" id="datepicker" placeholder="Select Date"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                    <!-- Include flatpickr JavaScript -->
                                    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                                    <!-- Initialize flatpickr -->
                                    <script>
                                        flatpickr("#datepicker", {
                                            // Options
                                            dateFormat: "Y-m-d", // Date format
                                        });
                                    </script>
                                </div>

                                <div class="w-7/12">
                                    <label for="">Salutation</label>
                                    <input type="text" name="Medium"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                </div>
                            </div>


                            <div class="flex flex-row gap-4 md:gap-8 m-5">
                                <div class="w-7/12">
                                    <label for="">Employee No.</label>
                                    <input type="text" name="Medium"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                </div>
                                <div class="w-7/12">
                                    <label for="">Email</label>
                                    <input type="text" name="Medium"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                </div>
                            </div>

                            <div class="flex flex-row gap-4 md:gap-8 m-5">

                                <div class="flex flex-col w-7/12">
                                    <label for="">Question</label>
                                    <select name="" id=""
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                        <option value="">None</option>
                                        <option value="">MULTI SITE CUSTOMER</option>

                                    </select>
                                </div>
                                <div class="w-7/12">
                                    <label for="">Answer</label>
                                    <input type="text" name="Medium"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                </div>


                            </div>
                            <div id="novelteleventTable" class="overflow-x-auto  mt-5">
                                <label for="" class="m-5">Identification</label>
                                <table
                                    class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-separate m-5">

                                    <!-- Table content for Notes -->
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-300 h-10 rounded-full dark:bg-gray-700 dark:text-gray-600">
                                        <tr>
                                            <th>Event Description</th>
                                            <th>Event Date</th>
                                            <th>Due Time</th>
                                            <th>Status</th>
                                            <th>Status Time</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Credit Card</td>
                                        </tr>
                                        <tr>
                                            <td>Driver Licence</td>

                                        </tr>
                                        <tr>
                                            <td>Passport</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                            <button type="submit"
                                class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-green-600 mt-5">
                                <span class="mx-auto border-1 bg-green-">Save</span>
                            </button>
                        </div>
                        
                        {{-- address form --}}
                        <div id="addressForm" class="flex flex-col font-medium text-15px">
                            <div class="flex flex-row gap-4 md:gap-8 m-5">
                                <div class="w-7/12">
                                    <label for="">Address1</label>
                                    <input type="text" name="Medium"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                </div>
                                <div class="w-7/12">
                                    <label for="">Address2</label>
                                    <input type="text" name="Medium"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                </div>

                            </div>

                            <div class="flex flex-row gap-4 md:gap-8 m-5">
                                <div class="w-7/12">
                                    <label for="">Post Code</label>
                                    <input type="text" name="Medium"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                </div>
                                <div class="flex flex-col w-7/12 ">
                                    <label for="">Suburb</label>
                                    <select name="" id=""
                                        class="w-full p-2 border border-gray-800 rounded-lg ">
                                        <option value=""></option>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>

                            <div class="flex flex-row gap-4 md:gap-8 m-5">
                                <div class="w-7/12">
                                    <label for="">State</label>
                                    <input type="text" name="Medium"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                </div>
                                <div class="flex flex-col w-7/12 ">
                                    <label for="">Country</label>
                                    <select name="" id=""
                                        class="w-full p-2 border border-gray-800 rounded-lg ">
                                        <option value="">Australia</option>
                                        <option value="">Canada</option>
                                    </select>
                                </div>
                            </div>

                            <div class="flex flex-row gap-4 md:gap-8 m-5">
                                <div class="w-11/12">
                                    <label for="">Address Type</label>
                                    <ul
                                        class="w-48 text-sm font-medium text-gray-900 bg-white  dark:bg-gray-700 dark:border-gray-600 dark:text-white w- p-2 border border-gray-800 rounded-lg">
                                        <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                            <div class="flex items-center ps-3">
                                                <input id="vue-checkbox" type="checkbox" value=""
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="vue-checkbox"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Billing
                                                    Address</label>
                                            </div>
                                        </li>
                                        <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                            <div class="flex items-center ps-3">
                                                <input id="react-checkbox" type="checkbox" value=""
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="react-checkbox"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Delivery
                                                    Address</label>
                                            </div>
                                        </li>
                                        <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                            <div class="flex items-center ps-3">
                                                <input id="angular-checkbox" type="checkbox" value=""
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="angular-checkbox"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">IPND
                                                    Address</label>
                                            </div>
                                        </li>
                                        <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                            <div class="flex items-center ps-3">
                                                <input id="laravel-checkbox" type="checkbox" value=""
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="laravel-checkbox"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Service
                                                    Address</label>
                                            </div>
                                        </li>
                                        <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                            <div class="flex items-center ps-3">
                                                <input id="laravel-checkbox" type="checkbox" value=""
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="laravel-checkbox"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Street
                                                    Address</label>
                                            </div>
                                        </li>

                                    </ul>

                                </div>

                                <div class="w-7/12 mt-48">
                                    <div class=" flex col-2">
                                        <button type="submit"
                                            class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-green-600 mt-5">
                                            <span class="mx-auto border-1 bg-green-">Add</span>
                                        </button>
                                        <button type="submit"
                                            class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-red-900 mt-5">
                                            <span class="mx-auto border-1 ">Clear</span>
                                        </button>
                                    </div>
                                </div>

                            </div>




                            <div id="novelteleventTable" class="overflow-x-auto  mt-5">
                                <label for="" class="m-5">Addresses Entered</label>
                                <table
                                    class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-separate m-5">

                                    <!-- Table content for Notes -->
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-300 h-10 rounded-full dark:bg-gray-700 dark:text-gray-600">
                                        <tr>
                                            <th>Type</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Credit Card</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="w-7/12 ">
                                    <div class=" flex col-2">
                                        <button type="submit"
                                            class="items-center p-2 bg-primaryColor flex justify-start md:w-[100px] ml-11 rounded-lg text-white text-center bg-green-600 mt-5">
                                            <span class="mx-auto border-1 bg-green-">History</span>
                                        </button>
                                        <button type="submit"
                                            class="items-center p-2 bg-primaryColor flex justify-start md:w-[100px] ml-11 rounded-lg text-white text-center bg-red-900 mt-5">
                                            <span class="mx-auto border-1 ">Delete</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <button type="submit"
                                class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-green-600 mt-5">
                                <span class="mx-auto border-1 bg-green-">Save</span>
                            </button>
                        </div>
                        
                        {{-- Phones Form --}}
                        <div id="phonesForm" class="flex flex-col font-medium text-15px">
                            <label class="ml-5" for="">Phone Details</label>
                            <div class="flex flex-row gap-4 md:gap-8 m-5">
                                <div class="w-7/12">
                                    <label for="">Area Code</label>
                                    <input type="text" name="Medium"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                </div>
                                <div class="w-7/12">
                                    <label for="">Phone Number</label>
                                    <input type="text" name="Medium"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                </div>
                            </div>

                            <div class="flex flex-row gap-4 md:gap-8 m-5">
                                <div class="w-11/12">
                                    <label for="">Phone Type</label>
                                    <ul
                                        class="w-48 text-sm font-medium text-gray-900 bg-white  dark:bg-gray-700 dark:border-gray-600 dark:text-white w- p-2 border border-gray-800 rounded-lg">
                                        <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                            <div class="flex items-center ps-3">
                                                <input id="vue-checkbox" type="checkbox" value=""
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="vue-checkbox"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Home
                                                    Phone
                                                </label>
                                            </div>
                                        </li>
                                        <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                            <div class="flex items-center ps-3">
                                                <input id="react-checkbox" type="checkbox" value=""
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="react-checkbox"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mobile
                                                    Phone
                                                </label>
                                            </div>
                                        </li>
                                        <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                            <div class="flex items-center ps-3">
                                                <input id="angular-checkbox" type="checkbox" value=""
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="angular-checkbox"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Primary
                                                    Fax
                                                </label>
                                            </div>
                                        </li>
                                        <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                            <div class="flex items-center ps-3">
                                                <input id="laravel-checkbox" type="checkbox" value=""
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="laravel-checkbox"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Work
                                                    Phone
                                                </label>
                                            </div>
                                        </li>
                                        <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                            <div class="flex items-center ps-3">
                                                <input id="laravel-checkbox" type="checkbox" value=""
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="laravel-checkbox"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Street
                                                    Address</label>
                                            </div>
                                        </li>

                                    </ul>

                                </div>

                                <div class="w-7/12 mt-48">
                                    <div class=" flex col-2">
                                        <button type="submit"
                                            class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-green-600 mt-5">
                                            <span class="mx-auto border-1 bg-green-">Add</span>
                                        </button>
                                        <button type="submit"
                                            class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-red-900 mt-5">
                                            <span class="mx-auto border-1 ">Clear</span>
                                        </button>
                                    </div>
                                </div>

                            </div>

                            <div id="novelteleventTable" class="overflow-x-auto  mt-5">
                                <label for="" class="m-5">Phone Entered</label>
                                <table
                                    class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-separate m-5">

                                    <!-- Table content for Notes -->
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-300 h-10 rounded-full dark:bg-gray-700 dark:text-gray-600">
                                        <tr>
                                            <th>Type</th>
                                            <th>Phone</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Credit Card</td>
                                        </tr>



                                    </tbody>
                                </table>
                                <div class="w-7/12 ">
                                    <div class=" flex col-2">
                                        <button type="submit"
                                            class="items-center p-2 bg-primaryColor flex justify-start md:w-[100px] ml-11 rounded-lg text-white text-center bg-green-600 mt-5">
                                            <span class="mx-auto border-1 bg-green-">History</span>
                                        </button>
                                        <button type="submit"
                                            class="items-center p-2 bg-primaryColor flex justify-start md:w-[100px] ml-11 rounded-lg text-white text-center bg-red-900 mt-5">
                                            <span class="mx-auto border-1 ">Delete</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <button type="submit"
                                class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-green-600 mt-5">
                                <span class="mx-auto border-1 bg-green-">Save</span>
                            </button>
                        </div>
                        
                        {{-- Billing Form --}}
                        <div id="billingForm" class="flex flex-col font-medium text-15px">
                            <div class="flex flex-row gap-4 md:gap-8 m-5 p-4 border border-1 border-black rounded-lg">
                                <div class="flex flex-col w-7/12">
                                    <label for="">Payment Type</label>
                                    <select name="paymentType" id="paymentType"
                                        class="w-full p-2 border border-gray-800 rounded-lg">
                                        <option value="Cheque">Cheque</option>
                                        <option value="Credit Card">Credit Card</option>
                                        <option value="Remittance">Remittance</option>
                                    </select>
                                    <div id="chequeFields" style="display: none;">
                                        <div class="w-7/12">
                                            <label for="">Account</label>
                                            <input type="text" name="Medium"
                                                class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                        </div>
                                        <div class="w-7/12">
                                            <label for="">Account Name</label>
                                            <input type="text" name="Medium"
                                                class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                        </div>
                                        <div class="flex flex-row gap-4 md:gap-8 m-5">
                                            <div class="w-7/12">
                                                <label for="">B.S.B</label>
                                                <input type="text" name="Medium"
                                                    class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                            </div>
                                            <div class="flex flex-row gap-4 md:gap-8 m-5 ">
                                                <div class="w-7/12">
                                                    <div class="flex items-center ps-3">
                                                        <input id="vue-checkbox" type="checkbox" value=""
                                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                        <label for="vue-checkbox"
                                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subscribes
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="creditCardFields" style="display: none;">
                                        <div class="w-7/12">
                                            <label for="">Credit Card Num</label>
                                            <input type="text" name="Medium"
                                                class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                        </div>
                                        <div class="w-7/12">
                                            <label for="">Credit Holder Name</label>
                                            <input type="text" name="Medium"
                                                class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                        </div>
                                        <div class="w-7/12">
                                            <label for="">Expire Date(mm/yy)</label>
                                            <input type="text" name="Medium"
                                                class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-row gap-4 md:gap-8 m-5">
                                <div class="w-7/12">
                                    <label for="">Account Payment Method</label>
                                    <ul
                                        class="w-48 h-44 text-sm font-medium text-gray-900 bg-white  dark:bg-gray-700 dark:border-gray-600 dark:text-white w- p-2 border border-gray-800 rounded-lg">
                                        <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                            <div class="flex items-center ps-3">
                                                <input id="vue-checkbox" type="checkbox" value=""
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="vue-checkbox"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Use
                                                    as Default Method
                                                </label>
                                            </div>
                                        </li>
                                        <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                            <div class="flex items-center ps-3">
                                                <input id="react-checkbox" type="checkbox" value=""
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="react-checkbox"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Delivery
                                                    Address</label>
                                            </div>
                                        </li>
                                        <div class="flex flex-row gap-4 md:gap-8 ">
                                            <div class="w-full">

                                                <!-- Date Picker Input -->
                                                <input type="text" id="datepicker" placeholder="Select Date"
                                                    class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                                <!-- Include flatpickr JavaScript -->
                                                <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                                                <!-- Initialize flatpickr -->
                                                <script>
                                                    flatpickr("#datepicker", {
                                                        // Options
                                                        dateFormat: "Y-m-d", // Date format
                                                    });
                                                </script>
                                            </div>


                                        </div>

                                    </ul>

                                </div>
                                <div class="w-7/12 ">
                                    <label for="">Protection</label>
                                    <ul
                                        class="w-48 h-44 text-sm font-medium text-gray-900 bg-white  dark:bg-gray-700 dark:border-gray-600 dark:text-white w- p-2 border border-gray-800 rounded-lg">
                                        <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                            <div class="flex items-center ps-3">
                                                <input id="vue-checkbox" type="checkbox" value=""
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="vue-checkbox"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Protect
                                                    Payment Method
                                                </label>
                                            </div>
                                        </li>
                                        <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                            <div class="flex items-center ps-3">
                                                <input id="react-checkbox" type="checkbox" value=""
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="react-checkbox"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mark
                                                    as Eported
                                                </label>
                                            </div>
                                        </li>
                                        <div class="w-FULL">
                                            <label for="">Ext ID</label>
                                            <input type="text" name="Medium"
                                                class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                        </div>
                                    </ul>

                                </div>
                            </div>
                            <div class="flex flex-row gap-4 md:gap-8 m-5">
                                <div class="flex flex-col w-7/12 ">
                                    <label for="">Bill Format</label>
                                    <select name="" id=""
                                        class="w-full p-2 border border-gray-800 rounded-lg ">
                                        <option value="">Novel Tel</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex flex-row gap-4 md:gap-8 m-5">
                                <div class="flex flex-col w-7/12 ">
                                    <label for="">Bill Cycle</label>
                                    <select name="" id=""
                                        class="w-full p-2 border border-gray-800 rounded-lg ">
                                        <option value="">Novel Tel</option>

                                    </select>
                                </div>
                            </div>
                            <div class="flex flex-row gap-4 md:gap-8 m-5">
                                <div class="flex flex-col w-7/12 ">
                                    <label for="">Debit Cycle</label>
                                    <select name="" id=""
                                        class="w-full p-2 border border-gray-800 rounded-lg ">
                                        <option value="">Calendar Month</option>

                                    </select>
                                </div>
                            </div>
                            <div class="flex flex-row gap-4 md:gap-8 m-5">
                                <div class="flex flex-col w-7/12 ">
                                    <label for="">Currency</label>
                                    <select name="" id=""
                                        class="w-full p-2 border border-gray-800 rounded-lg ">
                                        <option value="">Australia Dollar</option>

                                    </select>
                                </div>
                            </div>
                            <div class="flex flex-row gap-4 md:gap-8 m-5">
                                <div class="flex flex-col w-7/12 ">
                                    <label for="">Tax</label>
                                    <select name="" id=""
                                        class="w-full p-2 border border-gray-800 rounded-lg ">
                                        <option value="">Australia GST</option>

                                    </select>
                                </div>
                            </div>

                            <div class="w-7/12 m-5 ">

                                <ul
                                    class="w-48 h-44 text-sm font-medium text-gray-900 bg-white  dark:bg-gray-700 dark:border-gray-600 dark:text-white w- p-2 border border-gray-800 rounded-lg">
                                    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="vue-checkbox" type="checkbox" value=""
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="vue-checkbox"
                                                class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Provide
                                                Email Bill

                                            </label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="react-checkbox" type="checkbox" value=""
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="react-checkbox"
                                                class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Provide
                                                Paper Bill

                                            </label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="react-checkbox" type="checkbox" value=""
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="react-checkbox"
                                                class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Provide
                                                Excel Bill

                                            </label>
                                        </div>
                                    </li>
                                </ul>

                            </div>
                            <button type="submit"
                                class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-green-600 mt-5">
                                <span class="mx-auto border-1 bg-green-">Save</span>
                            </button>
                        </div>
                        
                        {{-- contact Form --}}
                        <div id="contactForm" class="flex flex-col font-medium text-15px">
                            <div class="flex flex-row gap-4 md:gap-8 m-5">
                                <div class="w-11/12">
                                    <label for="">Contact Details</label>
                                    <div class="flex flex-row gap-4 md:gap-8 m-5">
                                        <div class="w-10/12">
                                            <label for="">Contact Code</label>
                                            <input type="text" name="Medium"
                                                class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                        </div>

                                    </div>
                                    <div class="flex flex-row gap-4 md:gap-8 m-5">
                                        <div class="w-10/12">
                                            <label for="">Contact Type</label>
                                            <input type="text" name="Medium"
                                                class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                        </div>

                                    </div>
                                    <div class="flex flex-row gap-4 md:gap-8 m-5">
                                        <div class="w-10/12">
                                            <label for="">Name</label>
                                            <input type="text" name="Medium"
                                                class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                        </div>

                                    </div>
                                </div>

                                <div class="w-7/12 mt-64">
                                    <div class=" flex col-2">
                                        <button type="submit"
                                            class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-green-600 mt-5">
                                            <span class="mx-auto border-1 bg-green-">New</span>
                                        </button>
                                        <button type="submit"
                                            class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-red-900 mt-5">
                                            <span class="mx-auto border-1 ">Search</span>
                                        </button>
                                    </div>
                                </div>

                            </div>

                            <div class="flex flex-row gap-4 md:gap-8 m-5">
                                <div class="w-11/12 m-5">
                                    <label for="">Contact Usage</label>
                                    <ul
                                        class="w-48 text-xl font-medium text-gray-900 bg-white  dark:bg-gray-700 dark:border-gray-600 dark:text-white w- p-2 border border-gray-800 rounded-lg">
                                        <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                            <div class="flex items-center ps-3">
                                                <input id="vue-checkbox" type="checkbox" value=""
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="vue-checkbox"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Authorised
                                                    Representative
                                                </label>
                                            </div>
                                        </li>
                                        <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                            <div class="flex items-center ps-3">
                                                <input id="react-checkbox" type="checkbox" value=""
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="react-checkbox"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Connection
                                                    User
                                                </label>
                                            </div>
                                        </li>


                                    </ul>

                                </div>

                                <div class="w-7/12 mt-20 ">
                                    <div class=" flex col-2">
                                        <button type="submit"
                                            class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-green-600 mt-5">
                                            <span class="mx-auto border-1 bg-green-">Add</span>
                                        </button>
                                        <button type="submit"
                                            class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-red-900 mt-5">
                                            <span class="mx-auto border-1 ">Clear</span>
                                        </button>
                                    </div>
                                </div>

                            </div>
                            <div id="novelteleventTable" class="overflow-x-auto  mt-5">
                                <label for="" class="m-5">Phone Entered</label>
                                <table
                                    class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-separate m-5">

                                    <!-- Table content for Notes -->
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-300 h-10 rounded-full dark:bg-gray-700 dark:text-gray-600">
                                        <tr>
                                            <th>Type</th>
                                            <th>Contact</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Credit Card</td>
                                        </tr>



                                    </tbody>
                                </table>
                                <div class="w-7/12 ">
                                    <div class=" flex col-2">
                                        <button type="submit"
                                            class="items-center p-2 bg-primaryColor flex justify-start md:w-[100px] ml-11 rounded-lg text-white text-center bg-red-900 mt-5">
                                            <span class="mx-auto border-1 ">Delete</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <button type="submit"
                                class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-green-600 mt-5">
                                <span class="mx-auto border-1 bg-green-">Save</span>
                            </button>
                        </div>
                        
                        {{-- add Info --}}
                        <div id="addinfoForm" class="flex flex-col font-medium text-15px">
                            <div id="novelteleventTable" class="overflow-x-auto  mt-5">
                                <label for="" class="m-5">Additinol information</label>
                                <table
                                    class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-separate m-5">

                                    <!-- Table content for Notes -->
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-300 h-10 rounded-full dark:bg-gray-700 dark:text-gray-600">
                                        <tr>
                                            <th>Name</th>
                                            <th>Value</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Credit Card</td>
                                        </tr>



                                    </tbody>
                                </table>

                            </div>


                            <div class="flex flex-row gap-4 md:gap-8 m-5">
                                <div class="w-11/12">
                                    <label for="">Contact Login/Password</label>
                                    <div class="flex flex-row gap-4 md:gap-8 m-5">
                                        <div class="w-10/12">
                                            <label for="">Login Code</label>
                                            <input type="text" name="Medium"
                                                class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                        </div>

                                    </div>
                                    <div class="flex flex-row gap-4 md:gap-8 m-5">
                                        <div class="w-10/12">
                                            <label for="">Password</label>
                                            <input type="text" name="Medium"
                                                class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                        </div>

                                    </div>

                                </div>


                                <div class="w-7/12 mt-64">
                                    <div class=" flex col-2">
                                        <button type="submit"
                                            class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-green-600 mt-5">
                                            <span class="mx-auto border-1 bg-green-">Add New</span>
                                        </button>
                                        <button type="submit"
                                            class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-red-900 mt-5">
                                            <span class="mx-auto border-1 ">Add Random</span>
                                        </button>
                                        <button type="submit"
                                            class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-red-900 mt-5">
                                            <span class="mx-auto border-1 ">Delete</span>
                                        </button>
                                    </div>
                                </div>

                            </div>
                            <div id="novelteleventTable" class="overflow-x-auto  mt-5">
                                <label for="" class="m-5">Additinol information</label>
                                <table
                                    class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-separate m-5">

                                    <!-- Table content for Notes -->
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-300 h-10 rounded-full dark:bg-gray-700 dark:text-gray-600">
                                        <tr>
                                            <th>Name</th>
                                            <th>Value</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Credit Card</td>
                                        </tr>



                                    </tbody>
                                </table>

                            </div><button type="submit"
                                class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-green-600 mt-5">
                                <span class="mx-auto border-1 bg-green-">Save</span>
                            </button>
                        </div>
                        
                    </form>

                </div>
            </div>
        </section>
        <script>
            function toggleFormVisibility(formId) {
                // Hide all forms
                var forms = document.querySelectorAll('form > div');
                forms.forEach(function(form) {
                    form.style.display = 'none';
                });
        
                // Show the selected form
                var selectedForm = document.getElementById(formId);
                if (selectedForm) {
                    selectedForm.style.display = 'flex';
                }
            }
        
            // Call toggleFormVisibility with 'subscribeForm' ID when the page loads
            window.onload = function() {
                toggleFormVisibility('subscribeForm');
            };
        </script>
        
        
        {{-- navigate and button select --}}
        {{-- <script>
            window.onload = function () {
                var currentForm = localStorage.getItem("currentForm");
                var forms = document.querySelectorAll('form');
                if (currentForm) {
                    forms.forEach(function (form) {
                        if (form.id === currentForm) {
                            form.style.display = "block";
                        } else {
                            form.style.display = "none";
                        }
                    });
                } else {
                    // If no form is in local storage, display the subscribe form by default
                    var subscribeForm = document.getElementById("subscribeForm");
                    subscribeForm.style.display = "block";
                    var subscribeButton = document.getElementById("subscribesButton");
                    subscribeButton.classList.add('selected');
                }
        
                var buttons = document.querySelectorAll('.tab-button');
                buttons.forEach(function (button) {
                    button.addEventListener('click', function () {
                        buttons.forEach(function (btn) {
                            btn.classList.remove('selected');
                        });
                        this.classList.add('selected');
                    });
                });
            };
        
            function toggleFormVisibility(formId) {
                var forms = document.querySelectorAll('form'); // Get all forms
                forms.forEach(function (form) { // Iterate through each form
                    if (form.id !== formId) { // If the form is not the one being toggled
                        form.style.display = "none"; // Hide the form
                    } else {
                        form.style.display = "block"; // Show the form associated with the clicked button
                        localStorage.setItem("currentForm", formId); // Save the current form ID to local storage
                    }
                });
            }
        </script> --}}
        <script>
            function toggleFields() {
                var typeSelect = document.getElementById("typeSelect");
                var businessUnitDiv = document.getElementById("businessUnitDiv");
                var tradingname = document.getElementById("tradingname")
                var acnandabn = document.getElementById("acnandabn")
                var answers = document.getElementById("answers")
                var emailandquestion = document.getElementById("emailandquestion")
                var keyandtitle = document.getElementById("keyandtitle")
                var titlecoparate = document.getElementById("titlecoparate")

                if (typeSelect.value === "Corporate") {
                    businessUnitDiv.style.display = "flex";
                    tradingname.style.display = "flex";
                    acnandabn.style.display = "flex";
                    answers.style.display = "flex";
                    emailandquestion.style.display = "flex";
                    keyandtitle.style.display = "none";
                    titlecoparate.style.display = "flex";
                } else {
                    businessUnitDiv.style.display = "none";
                    tradingname.style.display = "none";
                    acnandabn.style.display = "none";
                    answers.style.display = "none";
                    emailandquestion.style.display = "none";
                    keyandtitle.style.display = "flex";
                    titlecoparate.style.display = "none";
                }
            }
        </script>



        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const paymentTypeSelect = document.getElementById("paymentType");
                const chequeFields = document.getElementById("chequeFields");
                const creditCardFields = document.getElementById("creditCardFields");

                paymentTypeSelect.addEventListener("change", function() {
                    const selectedPaymentType = paymentTypeSelect.value;

                    // Hide all field sets initially
                    chequeFields.style.display = "none";
                    creditCardFields.style.display = "none";

                    // Show the selected field set
                    if (selectedPaymentType === "Cheque") {
                        chequeFields.style.display = "block";
                    } else if (selectedPaymentType === "Credit Card") {
                        creditCardFields.style.display = "block";
                    }
                });
            });
        </script>
    </div>
</body>

</html>
