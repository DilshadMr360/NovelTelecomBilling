<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Include flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

</head>

<body>
    <div class="h-screen  w-screen items-center justify-center">
        <form class="modal-container hidden fixed w-full h-full top-0 left-0 flex" id="Package"
            action="/save-account-service" method="post" enctype="multipart/form-data">

            @csrf
            <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50 "></div>

            <div class="modal-content bg-white mx-auto rounded shadow-lg z-50 overflow-y-auto w-2/3 relative my-auto">
                <!-- Modal header with close button -->
                <div class="flex justify-end">
                    <a href="#" class="text-gray-600 hover:text-gray-800 p-2 rounded-lg m-5 bg-red-500"
                        onclick="hidePopupWithId('Package')">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </a>
                </div>
                <div
                    class="modal-content bg-white mx-auto rounded shadow-lg z-50 overflow-y-auto w relative h-4/5 my-auto">

                    <div id="subscribeForm" class="flex-col font-medium text-15px mx-8">
                        <div class="flex flex-row gap-4 md:gap-8 m-5 ">
                            <div class="flex flex-col w-7/12">
                                <label for="">Network</label>
                                <select name="network" id=""
                                    class="w-full p-2 border border-gray-800 rounded-lg">
                                    <option value="optus">Optus</option>
                                    <option value="BBB">Optsssus</option>
                                </select>
                            </div>
                            <div class="flex flex-col w-7/12">
                                <label for="">Service Type</label>
                                <input id="typeSelect" class="w-full p-2 border border-gray-800 rounded-lg " />
                            </div>
                            <div class="flex flex-col w-7/12 hidden">
                                <label for="">Service Type</label>
                                <input name="serviceoption_id" id="typeId"
                                    class="w-full p-2 border border-gray-800 rounded-lg " />
                            </div>

                            <div class="flex flex-col w-7/12 hidden">
                                <label for="serviceNameSelect">Service Name</label>
                                <input name="service_name" id="serviceNameSelect"
                                    class="w-full p-2 border border-gray-800 rounded-lg" disabled />
                            </div>
                        </div>

                        <div class="flex flex-row gap-4 md:gap-8 m-5">
                            <div class="w-7/12">
                                <label for="">Phone Number</label>
                                <input type="text" name="phonenumber"
                                    class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                            </div>

                            <div class="w-7/12 hidden">
                                <label for="serviceOptionInput">Service Option ID</label>
                                <input type="text" id="serviceOptionInput" name="service_id"
                                    class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                            </div>


                            <div class="flex flex-col w-7/12" id="keyandtitle">
                                <label for="">Status</label>
                                <select name="status" id=""
                                    class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                    <option value="Connected(Open)">Connected(Open)</option>
                                    <option value="Discount">Disconnected</option>
                                </select>
                            </div>
                        </div>

                        <div id="businessUnitDiv" class="flex flex-row gap-4 md:gap-8 m-5">
                            <div class="flex flex-col w-6/12">
                                <label for="">Service Narrative</label>
                                <select name="service_narrative" id=""
                                    class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                    <option value="abcd">abcd</option>
                                    <option value="bbx">bbx</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex flex-row gap-4 md:gap-8 m-5">
                            <div class="w-7/12">
                                <label for="">Date Of Birth</label>
                                <!-- Date Picker Input -->
                                <input type="text" id="datepicker" name="dob" placeholder="Select Date"
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
                                <label for="">Password</label>
                                <input type="text" name="password"
                                    class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                            </div>
                        </div>

                        <div class="flex flex-row gap-4 md:gap-8 m-5" id="tradingname">
                            <div class="flex flex-col w-6/12">
                                <label for="">Parent</label>
                                <select name="parent" id=""
                                    class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                    <option value="notselectd">not selectd</option>
                                    <option value="selected">selectd</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex flex-row gap-4 md:gap-8 m-5" id="acnandabn">
                            <div class="flex flex-col w-6/12">
                                <label for="">Package</label>
                                <div id="packageNames">
                                    <select name="package_id" id="packageSelect"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                        <option value="" selected disabled>-- Select Package --</option>
                                    </select>
                                </div>
                            </div>

                            <div class="w-6/12">
                                <label for="">Package option</label>
                                <div id="packageOption">
                                    <select name="packageoption_id" id="packageOptionSelect"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                        <option value="" selected disabled>-- Select Package Option --</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-row gap-4 md:gap-8 m-5" id="acnandabn">
                            <div class="w-6/12">
                                <label for="">Dealer</label>
                                <input type="text" name="dealer"
                                    class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                            </div>
                        </div>

                        <div class="flex flex-row gap-4 md:gap-8 m-5" id="emailandquestion">
                            <div class="w-6/12">
                                <label for="">Cost Centre</label>
                                <input type="text" name="costcentre"
                                    class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                            </div>
                        </div>



                           {{-- CONTRACT --}}
                <div class="flex flex-row gap-4 md:gap-8 m-5" id="">
                    <div class="w-7/12">
                        <label for="contract">Contract</label>
                        <select name="contract" id="contract"
                            class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                            <option value="6 months">6 months</option>
                            <option value="12 months" selected>12 months</option>
                            <option value="18 months">18 months</option>
                            <option value="24 months">24 months</option>
                            <option value="36 months">36 months</option>
                            <option value="48 months">48 months</option>
                            <option value="60 months">60 months</option>
                        </select>
                    </div>
                </div>

                <div class="flex flex-row gap-4 md:gap-8 m-5" id="">
                    <div class="flex flex-col w-6/12">
                        <label for="contractStartDate">Contract Start Date</label>
                        <div id="contractStart">
                            <input type="date" id="contractStartDate" name="contract_start_date"
                                class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                        </div>
                    </div>

                    <div class="w-6/12">
                        <label for="contractEndDate">Contract End Date</label>
                        <div id="contractEnd">
                            <input type="date" id="contractEndDate" name="contract_end_date"
                                class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                        </div>
                    </div>
                </div>

                <div class="flex flex-row gap-4 md:gap-8 m-5" id="">
                    <div class="w-7/12">
                        <label for="contractStatus">Contract Status</label>
                        <select name="contract_status" id="contractStatus"
                            class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                {{-- CONTRACT --}}


                        <div id="novelteleventTable" class="overflow-x-auto mt-5">
                            <label for="" class="m-5">Attributes</label>
                            <table
                                class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-separate m-5">
                                <!-- Table content for Notes -->
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-300 h-10 rounded-full dark:bg-gray-700 dark:text-gray-600">
                                    <tr>
                                        <th>Attributes</th>
                                        <th>Values</th>
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

                        <div class="flex flex-row gap-4 md:gap-8 m-5" id="emailandquestion">
                            <div class="w-7/12">
                                <button type="submit"
                                    class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-green-600 mt-5">
                                    <span class="mx-auto border-1 bg-green-">Save</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>

    <script src="{{ asset('../js/model.js') }}"></script>
</body>

</html>
