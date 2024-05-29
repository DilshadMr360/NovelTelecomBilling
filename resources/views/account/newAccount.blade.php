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

    <div class=" flex justify-center items-center h-screen ">
        <section class=" w-[1000px]  mt-20  ">
            <div class="border">
                <!-- Start coding here -->
                <div class="bg-white  relative shadow-md sm:rounded-lg  h-full  overflow-y-auto">
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4 mt-2">

                        <div
                            class="flex shadow-md border-1 border-green-600 flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0 w-full b">
                            <button id="subscribesButton"
                                class="w-auto flex items-center justify-center tab-button py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none tab-button selected"
                                type="button" onclick="toggleFormVisibility('subscribeForm')">
                                Subscribes
                            </button>
                            <button id="addressButton"
                                class="w-full flex items-center justify-center py-2 px-4 text-sm font-medium tab-button"
                                type="button" onclick="toggleFormVisibility('addressForm')">
                                Address
                            </button>
                            <button id="phonesButton"
                                class="w-full flex items-center justify-center py-2 px-4 text-sm font-medium tab-button"
                                type="button" onclick="toggleFormVisibility('phonesForm')">
                                Phones
                            </button>
                            <button id="billingButton"
                                class="w-full flex items-center justify-center py-2 px-4 text-sm font-medium tab-button"
                                type="button" onclick="toggleFormVisibility('billingForm')">
                                Billing/Payment
                            </button>
                            <button id="contactButton"
                                class="w-full flex items-center justify-center py-2 px-4 text-sm font-medium tab-button"
                                type="button" onclick="toggleFormVisibility('contactForm')">
                                Contact
                            </button>
                            <button id="addInfoButton"
                                class="w-full flex items-center justify-center py-2 px-4 text-sm font-medium tab-button"
                                type="button" onclick="toggleFormVisibility('addinfoForm'), SaveButtonDisable()">
                                Add Info
                            </button>
                        </div>


                    </div>


                    <form id="mainform" method="post" action="{{ route('account.store') }}">
                        {{-- subscribe form --}}
                        @csrf
                        <div id="subscribeForm" class="flex-col font-medium text-15px">
                            <div class="flex flex-row gap-4 md:gap-8 m-5">
                                <div class="w-7/12">
                                    <label for="">Contact Code</label>
                                    <input type="text" name="contact_code" oninput="validateContactCode(this)"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                    <span id="contactCodeError" class="text-red-500 hidden">Please fill in the contact
                                        code.</span>
                                </div>
                                <div class="flex flex-col w-7/12">
                                    <label for="typeSelect">Type</label>
                                    <select name="typeSelect" id="typeSelect" onchange="toggleFields()"
                                        class="w-full p-2 border border-gray-800 rounded-lg">
                                        <option value="">Select Type</option>
                                        <option value="Individual">Individual</option>
                                        <option value="Corporate">Corporate</option>
                                    </select>
                                    <span id="typeSelectError" class="text-red-500 hidden">Please choose a Type.</span>
                                </div>
                            </div>

                            <div class="flex flex-row gap-4 md:gap-8  m-5  ">
                                <div class="w-7/12">
                                    <label for="">Key</label>
                                    <input type="text" name="key"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                </div>
                                <div class="flex flex-col w-7/12" id="keyandtitle">
                                    <label for="">Title</label>
                                    <select name="title" id=""
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
                                    <input name="business_unit" id=""
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                    <span id="businessuniterror" class="text-red-500 hidden">Please fill business
                                        unit</span>

                                    </input>
                                </div>

                                <div class="w-7/12">
                                    <label for="">Name</label>
                                    <input type="text" name="name"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                    <span id="nameerror" class="text-red-500 hidden">Please fill business unit</span>

                                </div>
                            </div>

                            <div class="flex flex-row gap-4 md:gap-8  m-5  " id="tradingname">
                                <div class="w-7/12">
                                    <label for=""> Trading Name</label>
                                    <input type="text" name="trading_name"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                </div>
                            </div>

                            <div class="flex flex-row gap-4 md:gap-8  m-5  " id="acnandabn">

                                <div class="flex flex-col w-7/12">
                                    <label for="">ACN</label>
                                    <input name="acn" id=""
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                    <span id="acnerror" class="text-red-500 hidden">Please fill ABN </span>

                                    </input>
                                </div>

                                <div class="w-7/12">
                                    <label for="">ABN</label>
                                    <input type="text" name="abn"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                    <span id="abnerror" class="text-red-500 hidden">Please fill ACN</span>

                                </div>
                            </div>

                            <div class="flex flex-row gap-4 md:gap-8  m-5  " id="emailandquestion">

                                <div class="flex flex-col w-7/12">
                                    <label for="">Email</label>
                                    <input name="email" id=""
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                    </input>
                                </div>

                                <div class="w-7/12">
                                    <label for="">Question</label>
                                    <input type="text" name="question"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                </div>
                            </div>

                            <div class="flex flex-row gap-4 md:gap-8  m-5  " id="answers">
                                <div class="w-7/12">
                                    <label for="">Answer</label>
                                    <input type="text" name="answer"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                </div>
                            </div>

                            <div id="bordercontainer" class="border-2 rounded-md border-gray-500  ">



                                <script>
                                    document.getElementById("typeSelect").addEventListener("change", function() {
                                        var detailsContainer = document.getElementById("bordercontainer");
                                        if (this.value == "Corporate") {
                                            detailsContainer.classList.add("border-2");
                                        } else {
                                            detailsContainer.classList.remove("border-2");
                                        }
                                    });
                                </script>


                                <div class=" text-black font-bold ml-5 mt-2" id="titlecoparate">Primary Contact Details
                                </div>

                                <div class="flex flex-row gap-4 md:gap-8 m-5">
                                    <div class="w-7/12">
                                        <label for="">Initials</label>
                                        <input type="text" name="initials"
                                            class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                    </div>

                                    <div class="w-7/12">
                                        <label for=""> First Name</label>
                                        <input type="text" name="first_name"
                                            class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                        <span id="firstnameerror" class="text-red-500 hidden">Please fill business
                                            unit</span>

                                    </div>
                                </div>


                                <div class="flex flex-row gap-4 md:gap-8 m-5">

                                    <div class="w-6/12">
                                        <label for="">Last Name</label>
                                        <input type="text" name="last_name"
                                            class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                        <span id="lastnameerror" class="text-red-500 hidden">Please fill business
                                            unit</span>

                                    </div>

                                </div>


                                <div class="flex flex-row gap-4 md:gap-8 m-5">
                                    <div class="w-7/12">
                                        <label for="">Trading Name</label>
                                        <input type="text" name="trading_name"
                                            class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                    </div>



                                    <div class="flex flex-col w-7/12">
                                        <label for="gender">Gender</label>
                                        <select name="gender" id="gender"
                                            class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                            <option value="">Selcet a gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                        <span id="gendererror" class="text-red-500 hidden">Please choose a gender
                                        </span>

                                    </div>
                                </div>

                                <div class="flex flex-row gap-4 md:gap-8 m-5">
                                    <div class="w-7/12">
                                        <label for="datepicker">Date Of Birth</label>
                                        <!-- Date Picker Input -->
                                        <input type="text" id="datepicker" placeholder="Select Date"
                                            name="date_of_birth"
                                            class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                        <span id="dateOfBirthError" class="text-red-500 hidden">Please select a date
                                            of
                                            birth</span>

                                        <!-- Include flatpickr JavaScript -->
                                        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                                        <!-- Initialize flatpickr -->
                                        <script>
                                            flatpickr("#datepicker", {
                                                // Options
                                                dateFormat: "Y-m-d",
                                                maxDate: new Date().fp_incr(-18 * 365) // Date format
                                            });


                                            // function validateDOB() {
                                            //     var dobInput = document.getElementById("datepicker");
                                            //     var dobValue = dobInput.value;
                                            //     var errorSpan = document.getElementById("dateOfBirthError");
                                            //     var isValid = true; // Ensure this local variable exists to manage state

                                            //     // Check if the date input is empty
                                            //     if (!dobValue) {
                                            //         errorSpan.textContent = "Please select a date of birth.";
                                            //         errorSpan.classList.remove("hidden");
                                            //         isValid = false;
                                            //         return isValid; // Return isValid status
                                            //     }

                                            //     // Check age requirement
                                            //     var dob = new Date(dobValue);
                                            //     var today = new Date();
                                            //     var age = today.getFullYear() - dob.getFullYear();
                                            //     var m = today.getMonth() - dob.getMonth();
                                            //     if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
                                            //         age--;
                                            //     }

                                            //     if (age < 18) {
                                            //         errorSpan.textContent = "You must be at least 18 years old.";
                                            //         errorSpan.classList.remove("hidden");
                                            //         isValid = false;
                                            //     } else {
                                            //         errorSpan.classList.add("hidden");
                                            //     }
                                            //     return isValid; // Return isValid status
                                            // }
                                        </script>


                                    </div>

                                    <div class="w-7/12">
                                        <label for="">Salutation</label>
                                        <input type="text" name="salutation"
                                            class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                    </div>
                                </div>


                                <div class="flex flex-row gap-4 md:gap-8 m-5">
                                    <div class="w-7/12">
                                        <label for="">Employee No.</label>
                                        <input type="text" name="employee_no"
                                            class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                    </div>
                                    <div class="w-7/12">
                                        <label for="">Email</label>
                                        <input type="text" name="email"
                                            class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                    </div>
                                </div>

                                <div class="flex flex-row gap-4 md:gap-8 m-5">

                                    <div class="flex flex-col w-7/12">
                                        <label for="">Question</label>
                                        <select name="question_2" id=""
                                            class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                            <option value="">None</option>
                                            <option value="">MULTI SITE CUSTOMER</option>

                                        </select>
                                    </div>
                                    <div class="w-7/12">
                                        <label for="">Answer</label>
                                        <input type="text" name="answer_2"
                                            class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                    </div>


                                </div>
                                <div id="novelteleventTable" class="overflow-x-auto  mt-5">
                                    <label for="" class="m-5">Identification</label>
                                    <table class="w-full text-sm text-left text-gray-500  border-separate m-5">

                                        <!-- Table content for Notes -->
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-300 h-10 rounded-full  ">
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
                            </div>


                            <button id="nextButton" type="button"
                                class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-green-600 mt-5">
                                <span class="mx-auto border-1 bg-green-">Next</span>
                            </button>
                        </div>


                        <script>
                            // Function to validate the current form
                            function validateForm() {
                                var isValid = true;

                                // Perform validation for each field
                                var contactCode = document.getElementsByName("contact_code")[0].value;
                                if (!contactCode) {
                                    document.getElementById("contactCodeError").classList.remove("hidden");
                                    isValid = false;
                                } else {
                                    document.getElementById("contactCodeError").classList.add("hidden");
                                }






                                // Validation for Type
                                var typeSelect = document.getElementById("typeSelect").value;
                                if (!typeSelect) {
                                    document.getElementById("typeSelectError").classList.remove("hidden");
                                    isValid = false;
                                } else {
                                    document.getElementById("typeSelectError").classList.add("hidden");
                                }
                                if (typeSelect == "Corporate") {

                                    var acn = document.getElementsByName("acn")[0].value;
                                    var abn = document.getElementsByName("abn")[0].value;

                                    if (!acn && !abn) {
                                        // Both ACN and ABN are empty
                                        document.getElementById("acnerror").classList.remove("hidden");
                                        document.getElementById("abnerror").classList.remove("hidden");
                                        isValid = false;
                                    } else {
                                        // At least one of ACN or ABN is filled
                                        document.getElementById("acnerror").classList.add("hidden");
                                        document.getElementById("abnerror").classList.add("hidden");
                                    }

                                    var name = document.getElementsByName("name")[0].value;
                                    if (!name) {
                                        document.getElementById("nameerror").classList.remove("hidden");
                                        isValid = false;
                                    } else {
                                        document.getElementById("nameerror").classList.add("hidden");
                                    }
                                } else {
                                    isValid = true;
                                }
                                var first_name = document.getElementsByName("first_name")[0].value;
                                if (!first_name) {
                                    document.getElementById("firstnameerror").classList.remove("hidden");
                                    isValid = false;
                                } else {
                                    document.getElementById("firstnameerror").classList.add("hidden");
                                }
                                var last_name = document.getElementsByName("last_name")[0].value;
                                if (!last_name) {
                                    document.getElementById("lastnameerror").classList.remove("hidden");
                                    isValid = false;
                                } else {
                                    document.getElementById("lastnameerror").classList.add("hidden");
                                }



                                // Validation for Type
                                var gender1 = document.getElementById("gender").value;
                                if (!gender1) {
                                    document.getElementById("gendererror").classList.remove("hidden");
                                    isValid = false;
                                } else {
                                    document.getElementById("gendererror").classList.add("hidden");
                                }

                                // Perform validation for Date of Birth
                                // var dateOfBirth = document.getElementsByName("date_of_birth")[0].value;
                                // if (!dateOfBirth) {
                                //     document.getElementById("dateOfBirthError").classList.remove("hidden");
                                //     isValid = false;
                                // } else {
                                //     document.getElementById("dateOfBirthError").classList.add("hidden");
                                // }

                                // if (!validateDOB()) { // Use if the function returns false
                                //     isValid = false;
                                // }
                                // Add more validations for other fields...

                                return isValid;
                            }

                            // Function to enable/disable tabs based on form validity
                            function toggleTabs() {
                                var nextButton = document.getElementById("nextButton");
                                var otherTabs = document.querySelectorAll(".tab-button:not(#subscribesButton)");

                                // Disable all other tabs if the form is not valid
                                if (!validateForm()) {
                                    otherTabs.forEach(function(tab) {
                                        tab.disabled = true;
                                    });
                                } else {
                                    // Enable all other tabs if the form is valid
                                    otherTabs.forEach(function(tab) {
                                        tab.disabled = false;
                                    });
                                }

                            }

                            // Attach event listener to the Next button
                            document.getElementById("nextButton").addEventListener("click", function() {
                                // When Next button is clicked, validate the form and toggle tabs
                                if (validateForm()) {
                                    toggleTabs(); // Enable/disable tabs based on form validity

                                    // Move to the next tab programmatically (if needed)
                                    // For example:
                                    toggleFormVisibility('addressForm'); // Show the next tab (Address)

                                    // Add style to the "Address" button
                                    document.getElementById("addressButton").classList.add("selected");
                                    document.getElementById("subscribesButton").classList.remove("selected");
                                }
                            });
                        </script>



                        {{-- address form --}}
                        <div id="addressForm" class="flex flex-col font-medium text-15px">
                            <!-- Address fields -->
                            <div class="flex flex-row gap-4 md:gap-8 m-5">
                                <div class="w-7/12">
                                    <label for="">Address1</label>
                                    <input type="text" name="address1"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                    <span id="address1Error" class="text-red-500 hidden">Please enter Address1.</span>
                                </div>
                                <div class="w-7/12">
                                    <label for="">Address2</label>
                                    <input type="text" name="address2"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                    <span id="address2Error" class="text-red-500 hidden">Please enter Address2.</span>
                                </div>
                            </div>

                            <!-- Postcode and Suburb -->
                            <div class="flex flex-row gap-4 md:gap-8 m-5">
                                <div class="w-7/12">
                                    <label for="">Post Code</label>
                                    <input type="text" name="post_code"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                    <span id="postCodeError" class="text-red-500 hidden">Please enter Post
                                        Code.</span>
                                </div>
                                <div class="flex flex-col w-7/12">
                                    <label for="">Suburb</label>
                                    <input name="suburb" class="w-full p-2 border border-gray-800 rounded-lg">

                                    <span id="suburbError" class="text-red-500 hidden">Please select a Suburb.</span>
                                </div>
                            </div>

                            <!-- State and Country -->
                            <div class="flex flex-row gap-4 md:gap-8 m-5">
                                <div class="w-7/12">
                                    <label for="">State</label>
                                    <input type="text" name="state"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                    <span id="stateError" class="text-red-500 hidden">Please enter State.</span>
                                </div>
                                <div class="flex flex-col w-7/12">
                                    <label for="">Country</label>
                                    <input name="country" class="w-full p-2 border border-gray-800 rounded-lg">
                                    <span id="countryError" class="text-red-500 hidden">Please select a
                                        Country.</span>
                                </div>
                            </div>

                            <!-- Address Type checkboxes -->
                            <div class="flex flex-row gap-4 md:gap-8 m-5">
                                <div class="w-11/12">
                                    <label for="address_type">Address Type</label>
                                    <span id="addressTypeError" class="text-red-500 hidden">Please select an Address
                                        Type.</span>
                                    <ul
                                        class="w-48 text-sm font-medium text-gray-900 bg-white     w- p-2 border border-gray-800 rounded-lg">
                                        <li class="w-full border-b border-gray-200 rounded-t-lg ">
                                            <div class="flex items-center ps-3">
                                                <input id="vue-checkbox" type="checkbox" value="Billing Address"
                                                    name="addresstype[]"
                                                    class="address-type-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500    focus:ring-2  ">
                                                <label for="vue-checkbox" id="vue"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 ">Billing
                                                    Address</label>
                                            </div>
                                        </li>
                                        <li class="w-full border-b border-gray-200 rounded-t-lg ">
                                            <div class="flex items-center ps-3">
                                                <input id="react-checkbox" type="checkbox" value="Delivery Address"
                                                    name="addresstype[]"
                                                    class="address-type-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500    focus:ring-2  ">
                                                <label for="react-checkbox"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 ">Delivery
                                                    Address</label>
                                            </div>
                                        </li>
                                        <li class="w-full border-b border-gray-200 rounded-t-lg ">
                                            <div class="flex items-center ps-3">
                                                <input id="angular-checkbox" type="checkbox" value="IPND Address"
                                                    name="addresstype[]"
                                                    class="address-type-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500    focus:ring-2  ">
                                                <label for="angular-checkbox"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 ">IPND
                                                    Address</label>
                                            </div>
                                        </li>
                                        <li class="w-full border-b border-gray-200 rounded-t-lg ">
                                            <div class="flex items-center ps-3">
                                                <input id="laravel-checkbox" type="checkbox" value="Service Address"
                                                    name="addresstype[]"
                                                    class="address-type-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500    focus:ring-2  ">
                                                <label for="laravel-checkbox"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 ">Service
                                                    Address</label>
                                            </div>
                                        </li>
                                        <li class="w-full border-b border-gray-200 rounded-t-lg ">
                                            <div class="flex items-center ps-3">
                                                <input id="laravel-checkbox" type="checkbox" value="Street Address"
                                                    name="addresstype[]"
                                                    class="address-type-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500    focus:ring-2  ">
                                                <label for="laravel-checkbox"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 ">Street
                                                    Address</label>
                                            </div>
                                        </li>

                                    </ul>

                                </div>

                                <div class="w-7/12 mt-48">
                                    <div class=" flex col-2">
                                        <button type="button" onclick="addAddress()"
                                            class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-green-600 mt-5">
                                            <span class="mx-auto border-1 bg-green-">Add</span>
                                        </button>
                                        <button type="button" onclick="clearAddressFields()"
                                            class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-red-900 mt-5">
                                            <span class="mx-auto border-1 ">Clear</span>
                                        </button>
                                    </div>
                                </div>

                            </div>
                            <script>
                                function addAddress() {
                                    // console.log('hello');
                                    const address1 = document.querySelector('input[name="address1"]').value;
                                    const address2 = document.querySelector('input[name="address2"]').value;
                                    const postcode = document.querySelector('input[name="post_code"]').value;
                                    const suburb = document.querySelector('input[name="suburb"]').value;
                                    const state = document.querySelector('input[name="state"]').value;
                                    const country = document.querySelector('input[name="country"]').value;
                                    const selectAddressType = document.querySelectorAll('.address-type-checkbox:checked');


                                    if (!address1 || !address2 || !postcode || !suburb || !state || !country || selectAddressType.length === 0) {
                                        alert('Please enter all required fields and select at least one address type.');
                                        return;
                                    }
                                    const data = Array.from(selectAddressType).map(checkbox => [address1, address2, postcode, suburb, state,
                                        country, checkbox.value
                                    ]);
                                    console.log(data);
                                    const tbody = document.getElementById('address-body');

                                    // Check if any of the selected address types already exist in the table
                                    const existingAddressTypes = Array.from(tbody.querySelectorAll('input[name="addresstypes[]"]')).map(input =>
                                        input.value);
                                    const selectedAddressTypeValues = Array.from(selectAddressType).map(checkbox => checkbox.value);
                                    const duplicates = selectedAddressTypeValues.filter(value => existingAddressTypes.includes(value));

                                    if (duplicates.length > 0) {
                                        alert(
                                            'One or more selected address types already exist in the table. Please remove them before adding new ones.'
                                        );
                                        return;
                                    }

                                    const existingData = [];
                                    const existingRows = tbody.querySelectorAll('tr');
                                    existingRows.forEach(row => {
                                        const rowData = [];
                                        const cells = row.querySelectorAll('td input');
                                        cells.forEach(cell => {
                                            rowData.push(cell.value);
                                        });
                                        existingData.push(rowData);
                                    });

                                    const newData = existingData.concat(data);

                                    tbody.innerHTML = ''; // Clear existing rows

                                    newData.forEach(arr => {
                                        const tr = document.createElement('tr');
                                        arr.forEach((val, index) => {
                                            const td = document.createElement('td');
                                            const input = document.createElement('input');
                                            input.setAttribute('type', 'text');
                                            input.setAttribute('value', val);
                                            input.setAttribute('readonly', 'readonly');
                                            input.setAttribute('name',
                                                `${index === 0 ? 'address1s' : index === 1 ? 'address2s' : index === 2 ? 'post_codes' : index === 3 ? 'suburbs' : index === 4 ? 'states' : index === 5 ? 'countrys' : 'addresstypes'}[]`
                                            );
                                            td.appendChild(input);
                                            tr.appendChild(td);
                                        });
                                        tbody.appendChild(tr);
                                    });
                                    console.log(newData);
                                }

                                function deleteAddress() {
                                    const tbody = document.getElementById('address-body');
                                    const rows = tbody.querySelectorAll('tr');
                                    if (rows.length > 0) {
                                        tbody.removeChild(rows[rows.length - 1]);
                                    }
                                }

                                function clearAddressFields() {
                                    document.querySelector('input[name="address1"]').value = '';
                                    document.querySelector('input[name="address2"]').value = '';
                                    document.querySelector('input[name="post_code"]').value = '';
                                    document.querySelector('input[name="suburb"]').value = '';
                                    document.querySelector('input[name="state"]').value = '';
                                    document.querySelector('input[name="country"]').value = '';
                                    document.querySelectorAll('.address-type-checkbox:checked').forEach(checkbox => checkbox.checked = false);
                                }
                            </script>



                            <div id="novelteleventTable" class="overflow-x-auto  mt-5">
                                <label for="" class="m-5">Addresses Entered</label>
                                <table class="w-full text-sm text-left text-gray-500  border-separate m-5">

                                    <!-- Table content for Notes -->
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-300 h-10 rounded-full  ">
                                        <tr>
                                            <th>Address 01</th>
                                            <th>Address 02</th>
                                            <th>Post Code</th>
                                            <th>Suburb</th>
                                            <th>State</th>
                                            <th>Contry</th>
                                            <th>Type</th>
                                        </tr>
                                    </thead>
                                    <tbody id="address-body">
                                    </tbody>
                                </table>
                                <div class="w-7/12 ">
                                    <div class=" flex col-2">
                                        <button type="button"
                                            class="items-center p-2 bg-primaryColor flex justify-start md:w-[100px] ml-11 rounded-lg text-white text-center bg-green-600 mt-5">
                                            <span class="mx-auto border-1 bg-green-">History</span>
                                        </button>
                                        <button type="button" onclick="deleteAddress()"
                                            class="items-center p-2 bg-primaryColor flex justify-start md:w-[100px] ml-11 rounded-lg text-white text-center bg-red-900 mt-5">
                                            <span class="mx-auto border-1 ">Delete</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <button type="button" id="next_button2" onclick="validateAddressForms()"
                                class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-green-600 mt-5">
                                <span class="mx-auto border-1 bg-green-">Next</span>
                            </button>
                        </div>


                        <script>
                            // Function to validate the current form
                            function validateAddressForms() {
                                var isValid = false;
                                const tbody = document.getElementById('address-body');
                                const rows = tbody.querySelectorAll('tr');
                                if (rows.length > 0) {
                                    var isValid = true;
                                } else {
                                    alert('Pleass add Address details')
                                }
                                return isValid;
                            }

                            function isAnyCheckboxChecked() {
                                // Get all checkbox elements
                                const checkboxes = document.querySelectorAll('input[type="checkbox"][name="addresstype[]"]');

                                // Check if at least one checkbox is checked
                                for (let checkbox of checkboxes) {
                                    if (checkbox.checked) {
                                        return true; // Return true immediately if a checkbox is found to be checked
                                    }
                                }
                                return false; // Return false if no checkboxes are checked
                            }
                            // Function to enable/disable tabs based on form validity
                            function toggleTabs2() {
                                var nextButton = document.getElementById("next_button2");
                                var otherTabs = document.querySelectorAll(".tab-button:not(#addressButton)");

                                // Disable all other tabs if the form is not valid
                                if (!validateAddressForms()) {
                                    otherTabs.forEach(function(tab) {
                                        tab.disabled = true;
                                    });
                                } else {
                                    // Enable all other tabs if the form is valid
                                    otherTabs.forEach(function(tab) {
                                        tab.disabled = false;
                                    });
                                }
                                // Add your tab toggling logic here if needed
                            }

                            // Attach event listener to the Next button
                            document.getElementById("next_button2").addEventListener("click", function() {
                                // When Next button is clicked, validate the form and toggle tabs
                                if (validateAddressForms()) {
                                    console.log("phonesForm");
                                    toggleTabs2(); // Enable/disable tabs based on form validity

                                    // Move to the next tab programmatically (if needed)
                                    // For example:
                                    toggleFormVisibility('phonesForm'); // Show the next tab

                                    document.getElementById("phonesButton").classList.add("selected");
                                    document.getElementById("addressButton").classList.remove("selected");
                                }
                            });


                            function validateContactCode(input) {
                                // Remove any non-numeric characters
                                input.value = input.value.replace(/[^0-9]/g, '');

                                // Check if input is empty
                                if (!input.value) {
                                    document.getElementById("contactCodeError").classList.remove("hidden");
                                } else {
                                    document.getElementById("contactCodeError").classList.add("hidden");
                                }
                            }

                            function validateNumericInput(input) {
                                // Replace non-digit characters with an empty string
                                input.value = input.value.replace(/\D/g, '');
                            }
                        </script>





                        {{-- Phones Form --}}
                        <div id="phonesForm" class="flex flex-col font-medium text-15px">
                            <label class="ml-5" for="">Phone Details</label>
                            <div class="flex flex-row gap-4 md:gap-8 m-5">
                                <div class="w-7/12">
                                    <label for="">Area Code</label>
                                    <input type="text" name="area_code"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                    <span id="area_code_error" class="text-red-500 hidden">Please Enter Area
                                        Code</span>

                                </div>
                                <div class="w-7/12">
                                    <label for="">Phone Number</label>
                                    <input type="text" name="phone_number"
                                        class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                    <span id="phone_number_error" class="text-red-500 hidden">Please Enter Phone
                                        Number</span>
                                </div>
                            </div>

                            <div class="flex flex-row gap-4 md:gap-8 m-5">
                                <div class="w-11/12">
                                    <label for="">Phone Type</label>
                                    <ul
                                        class="w-48 text-sm font-medium text-gray-900 bg-white     w- p-2 border border-gray-800 rounded-lg">
                                        <li class="w-full border-b border-gray-200 rounded-t-lg ">
                                            <div class="flex items-center ps-3">
                                                <input id="vue-checkbox" type="checkbox" value="home-phone"
                                                    name="phone_type"
                                                    class="phone-type-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500    focus:ring-2  ">
                                                <label for="vue-checkbox"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 ">Home
                                                    Phone
                                                </label>
                                            </div>
                                        </li>
                                        <li class="w-full border-b border-gray-200 rounded-t-lg ">
                                            <div class="flex items-center ps-3">
                                                <input id="react-checkbox" type="checkbox" value="mobile-phone"
                                                    class="phone-type-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500    focus:ring-2  ">
                                                <label for="react-checkbox"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 ">Mobile
                                                    Phone
                                                </label>
                                            </div>
                                        </li>
                                        <li class="w-full border-b border-gray-200 rounded-t-lg ">
                                            <div class="flex items-center ps-3">
                                                <input id="angular-checkbox" type="checkbox" value="primary-phone"
                                                    class="phone-type-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500    focus:ring-2  ">
                                                <label for="angular-checkbox"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 ">Primary
                                                    Fax
                                                </label>
                                            </div>
                                        </li>
                                        <li class="w-full border-b border-gray-200 rounded-t-lg ">
                                            <div class="flex items-center ps-3">
                                                <input id="laravel-checkbox" type="checkbox" value="work-phone"
                                                    class="phone-type-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500    focus:ring-2  ">
                                                <label for="laravel-checkbox"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 ">Work
                                                    Phone
                                                </label>
                                            </div>
                                        </li>
                                        <li class="w-full border-b border-gray-200 rounded-t-lg ">
                                            <div class="flex items-center ps-3">
                                                <input id="laravel-checkbox" type="checkbox" value="street-address"
                                                    class="phone-type-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500    focus:ring-2  ">
                                                <label for="laravel-checkbox"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 ">Street
                                                    Address</label>
                                            </div>
                                        </li>

                                    </ul>

                                </div>

                                <div class="w-7/12 mt-48">
                                    <div class=" flex col-2">
                                        <button type="button" onclick="addPhoneNumber()"
                                            class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-green-600 mt-5">
                                            <span class="mx-auto border-1 bg-green-">Add</span>
                                        </button>
                                        <button type="button" onclick="clearFields()"
                                            class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-red-900 mt-5">
                                            <span class="mx-auto border-1 ">Clear</span>
                                        </button>
                                    </div>
                                </div>

                            </div>
                            <script>
                                function addPhoneNumber() {
                                    const areaCode = document.querySelector('input[name="area_code"]').value;
                                    const phoneNumber = document.querySelector('input[name="phone_number"]').value;
                                    const selectedPhoneTypes = document.querySelectorAll('.phone-type-checkbox:checked');

                                    if (!areaCode || !phoneNumber || selectedPhoneTypes.length === 0) {
                                        alert('Please enter all required fields and select at least one phone type.');
                                        return;
                                    }

                                    const data = Array.from(selectedPhoneTypes).map(checkbox => [areaCode, phoneNumber, checkbox.value]);

                                    const tbody = document.getElementById('table-body');

                                    // Check if any of the selected phone types already exist in the table
                                    const existingPhoneTypes = Array.from(tbody.querySelectorAll('input[name="phone_types[]"]')).map(input => input
                                        .value);
                                    const selectedPhoneTypeValues = Array.from(selectedPhoneTypes).map(checkbox => checkbox.value);
                                    const duplicates = selectedPhoneTypeValues.filter(value => existingPhoneTypes.includes(value));

                                    if (duplicates.length > 0) {
                                        alert(
                                            'One or more selected phone types already exist in the table. Please remove them before adding new ones.'
                                        );
                                        return;
                                    }

                                    const existingData = [];
                                    const existingRows = tbody.querySelectorAll('tr');
                                    existingRows.forEach(row => {
                                        const rowData = [];
                                        const cells = row.querySelectorAll('td input');
                                        cells.forEach(cell => {
                                            rowData.push(cell.value);
                                        });
                                        existingData.push(rowData);
                                    });

                                    const newData = existingData.concat(Array.from(selectedPhoneTypes).map(checkbox => [areaCode, phoneNumber,
                                        checkbox.value
                                    ]));

                                    tbody.innerHTML = ''; // Clear existing rows

                                    newData.forEach(arr => {
                                        const tr = document.createElement('tr');
                                        arr.forEach((val, index) => {
                                            const td = document.createElement('td');
                                            const input = document.createElement('input');
                                            input.setAttribute('type', 'text');
                                            input.setAttribute('value', val);
                                            input.setAttribute('readonly', 'readonly');
                                            input.setAttribute('name',
                                                `${index === 0 ? 'area_codes' : index === 1 ? 'phone_numbers' : 'phone_types'}[]`
                                            );
                                            td.appendChild(input);
                                            tr.appendChild(td);
                                        });
                                        tbody.appendChild(tr);
                                    });
                                    console.log(newData);
                                }

                                function deletePhoneNumber() {
                                    const tbody = document.getElementById('table-body');
                                    const rows = tbody.querySelectorAll('tr');
                                    if (rows.length > 0) {
                                        tbody.removeChild(rows[rows.length - 1]);
                                    }
                                }

                                function clearFields() {
                                    document.querySelector('input[name="area_code"]').value = '';
                                    document.querySelector('input[name="phone_number"]').value = '';
                                    document.querySelectorAll('.phone-type-checkbox:checked').forEach(checkbox => checkbox.checked = false);
                                }
                            </script>

                            <div id="novelteleventTable" class="overflow-x-auto  mt-5">
                                <label for="" class="m-5">Phone Entered</label>
                                <table class="w-full text-sm text-left text-gray-500  border-separate m-5">

                                    <!-- Table content for Notes -->
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-300 h-10 rounded-full  ">
                                        <tr>
                                            <th>Area code</th>
                                            <th>Phone</th>
                                            <th>Phone Type</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-body"></tbody>
                                </table>
                                <div class="w-7/12 ">
                                    <div class=" flex col-2">
                                        <button type="button"
                                            class="items-center p-2 bg-primaryColor flex justify-start md:w-[100px] ml-11 rounded-lg text-white text-center bg-green-600 mt-5">
                                            <span class="mx-auto border-1 bg-green-">History</span>
                                        </button>
                                        <button type="button" onclick="deletePhoneNumber() "
                                            class="items-center p-2 bg-primaryColor flex justify-start md:w-[100px] ml-11 rounded-lg text-white text-center bg-red-900 mt-5">
                                            <span class="mx-auto border-1 ">Delete</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <button type="button" id="next_button_3"
                                class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-green-600 mt-5">
                                <span class="mx-auto border-1 bg-green-">Next</span>
                            </button>
                        </div>


                        <script>
                            // Function to validate the current form
                            function validateContactForms() {
                                var isValid = false;
                                const tbody = document.getElementById('table-body');
                                const rows = tbody.querySelectorAll('tr');
                                if (rows.length > 0) {
                                    var isValid = true;
                                } else {
                                    alert('Pleass add phone details')
                                }
                                return isValid;
                            }

                            // Function to enable/disable tabs based on form validity
                            function toggleTabs3() {
                                var nextButton = document.getElementById("next_button_3");
                                var otherTabs = document.querySelectorAll(".tab-button:not(#billingButton)");

                                // Disable all other tabs if the form is not valid
                                if (!validateContactForms()) {
                                    otherTabs.forEach(function(tab) {
                                        tab.disabled = true;
                                    });
                                } else {
                                    // Enable all other tabs if the form is valid
                                    otherTabs.forEach(function(tab) {
                                        tab.disabled = false;
                                    });
                                }
                                // Add your tab toggling logic here if needed
                            }

                            // Attach event listener to the Next button
                            document.getElementById("next_button_3").addEventListener("click", function() {
                                // When Next button is clicked, validate the form and toggle tabs
                                if (validateContactForms()) {
                                    toggleTabs3(); // Enable/disable tabs based on form validity

                                    // Move to the next tab programmatically (if needed)
                                    // For example:
                                    toggleFormVisibility('billingForm'); // Show the next tab

                                    document.getElementById("billingButton").classList.add("selected");
                                    document.getElementById("phonesButton").classList.remove("selected");
                                }
                            });
                        </script>




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
                                            <input type="text" name="account"
                                                class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                        </div>
                                        <div class="w-7/12">
                                            <label for="">Account Name</label>
                                            <input type="text" name="account_name"
                                                class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                        </div>
                                        <div class="flex flex-row gap-4 md:gap-8 m-5">
                                            <div class="w-7/12">
                                                <label for="">B.S.B</label>
                                                <input type="text" name="bsb"
                                                    class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                            </div>
                                            <div class="flex flex-row gap-4 md:gap-8 m-5 ">
                                                <div class="w-7/12">
                                                    <div class="flex items-center ps-3">
                                                        <input id="vue-checkbox" type="checkbox" value=""
                                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500    focus:ring-2  ">
                                                        <label for="vue-checkbox"
                                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 ">Subscribes
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="creditCardFields" style="display: none;">
                                        <div class="w-7/12">
                                            <label for="">Credit Card Num</label>
                                            <input type="text" name="credit_card_number"
                                                class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                        </div>
                                        <div class="w-7/12">
                                            <label for="">Credit Holder Name</label>
                                            <input type="text" name="credit_holde_name"
                                                class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                        </div>
                                        <div class="w-7/12">
                                            <label for="">Expire Date(mm/yy)</label>
                                            <input type="text" name="exp_date"
                                                class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-row gap-4 md:gap-8 m-5">
                                <div class="w-7/12">
                                    <label for="">Account Payment Method</label>
                                    <ul
                                        class="w-48 h-44 text-sm font-medium text-gray-900 bg-white     w- p-2 border border-gray-800 rounded-lg">
                                        <li class="w-full border-b border-gray-200 rounded-t-lg ">
                                            <div class="flex items-center ps-3">
                                                <input id="vue-checkbox" type="checkbox" value=""
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500    focus:ring-2  ">
                                                <label for="vue-checkbox"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 ">Use
                                                    as Default Method
                                                </label>
                                            </div>
                                        </li>
                                        <li class="w-full border-b border-gray-200 rounded-t-lg ">
                                            <div class="flex items-center ps-3">
                                                <input id="react-checkbox" type="checkbox" value=""
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500    focus:ring-2  ">
                                                <label for="react-checkbox"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 ">Delivery
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
                                        class="w-48 h-44 text-sm font-medium text-gray-900 bg-white     w- p-2 border border-gray-800 rounded-lg">
                                        <li class="w-full border-b border-gray-200 rounded-t-lg ">
                                            <div class="flex items-center ps-3">
                                                <input id="vue-checkbox" type="checkbox" value=""
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500    focus:ring-2  ">
                                                <label for="vue-checkbox"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 ">Protect
                                                    Payment Method
                                                </label>
                                            </div>
                                        </li>
                                        <li class="w-full border-b border-gray-200 rounded-t-lg ">
                                            <div class="flex items-center ps-3">
                                                <input id="react-checkbox" type="checkbox" value=""
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500    focus:ring-2  ">
                                                <label for="react-checkbox"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 ">Mark
                                                    as Eported
                                                </label>
                                            </div>
                                        </li>
                                        <div class="w-FULL">
                                            <label for="">Ext ID</label>
                                            <input type="text" name="ext_id"
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
                                <span id="billTypeError" class="text-red-500 hidden">Please select a Bill</span>

                                <ul
                                    class="w-48 h-44 text-sm font-medium text-gray-900 bg-white    w- p-2 border border-gray-800 rounded-lg">
                                    <li class="w-full border-b border-gray-200 rounded-t-lg ">
                                        <div class="flex items-center ps-3">
                                            <input id="paper-bill-checkbox" type="checkbox" value="Paper Bill"
                                                name="bill_types[]"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500    focus:ring-2  ">
                                            <label for="paper-bill-checkbox"
                                                class="w-full py-3 ms-2 text-sm font-medium text-gray-900 ">Provide
                                                Paper Bill</label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 rounded-t-lg ">
                                        <div class="flex items-center ps-3">
                                            <input id="email-bill-checkbox" type="checkbox" value="Email Bill"
                                                name="bill_types[]"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500    focus:ring-2  ">
                                            <label for="email-bill-checkbox"
                                                class="w-full py-3 ms-2 text-sm font-medium text-gray-900 ">Provide
                                                Email Bill</label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 rounded-t-lg ">
                                        <div class="flex items-center ps-3">
                                            <input id="excel-bill-checkbox" type="checkbox" value="Excel Bill"
                                                name="bill_types[]"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500    focus:ring-2  ">
                                            <label for="excel-bill-checkbox"
                                                class="w-full py-3 ms-2 text-sm font-medium text-gray-900 ">Provide
                                                Excel Bill</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <button type="button" id="next_button_4"
                                class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-green-600 mt-5">
                                <span class="mx-auto border-1 bg-green-">Next</span>
                            </button>
                        </div>


                        <script>
                            function isAnyBillCheckboxChecked() {
                                // Get all checkbox elements
                                const checkboxes = document.querySelectorAll('input[type="checkbox"][name="bill_types[]"]');

                                // Check if at least one checkbox is checked
                                for (let checkbox of checkboxes) {
                                    if (checkbox.checked) {
                                        return true; // Return true immediately if a checkbox is found to be checked
                                    }
                                }
                                return false; // Return false if no checkboxes are checked
                            }
                        </script>
                        <script>
                            // Function to validate the billing form
                            function validateBillingForm() {
                                var isValid = true;

                                // Perform validation for each field in the billing form
                                // You can add specific validation logic here for other fields if needed

                                // Check if at least one bill type checkbox is checked
                                if (!isAnyBillCheckboxChecked()) {
                                    document.getElementById("billTypeError").classList.remove("hidden");
                                    isValid = false;
                                } else {
                                    document.getElementById("billTypeError").classList.add("hidden");
                                }

                                return isValid;
                            }

                            // Function to check if any bill type checkbox is checked
                            function isAnyBillCheckboxChecked() {
                                // Get all bill type checkboxes
                                const checkboxes = document.querySelectorAll('input[type="checkbox"][name="bill_types[]"]');

                                // Check if at least one checkbox is checked
                                for (let checkbox of checkboxes) {
                                    if (checkbox.checked) {
                                        return true; // Return true immediately if a checkbox is found to be checked
                                    }
                                }
                                return false; // Return false if no checkboxes are checked
                            }

                            // Attach event listener to the Next button in the billing form
                            document.getElementById("next_button_4").addEventListener("click", function() {
                                // When Next button in the billing form is clicked
                                if (validateBillingForm()) {
                                    // If the billing form is valid, change to the contact form
                                    toggleFormVisibility('contactForm');

                                    document.getElementById("contactButton").classList.add("selected");
                                    document.getElementById("billingButton").classList.remove("selected");
                                }
                            });
                        </script>



                        {{-- contact Form --}}
                        <div id="contactForm" class="flex flex-col font-medium text-15px">
                            <div class="flex flex-row gap-4 md:gap-8 m-5">
                                <div class="w-11/12">
                                    <label for="">Contact Details</label>
                                    <div class="flex flex-row gap-4 md:gap-8 m-5">
                                        <div class="w-10/12">
                                            <label for="">Contact Code</label>
                                            <input type="text" name="contact_code2"
                                                class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                        </div>

                                    </div>
                                    <div class="flex flex-row gap-4 md:gap-8 m-5">
                                        <div class="w-10/12">
                                            <label for="">Contact Type</label>
                                            <input type="text" name="contact_type"
                                                class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                        </div>

                                    </div>
                                    <div class="flex flex-row gap-4 md:gap-8 m-5">
                                        <div class="w-10/12">
                                            <label for="">Name</label>
                                            <input type="text" name="name1"
                                                class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                        </div>

                                    </div>
                                </div>

                                <div class="w-7/12 mt-64">
                                    <div class=" flex col-2">
                                        <button type="button"
                                            class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-green-600 mt-5">
                                            <span class="mx-auto border-1 bg-green-">New</span>
                                        </button>
                                        <button type="button"
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
                                        class="w-48 text-xl font-medium text-gray-900 bg-white     w- p-2 border border-gray-800 rounded-lg">
                                        <li class="w-full border-b border-gray-200 rounded-t-lg ">
                                            <div class="flex items-center ps-3">
                                                <input id="vue-checkbox" type="checkbox"
                                                    value="Authorised Representative" name="contactUsage[]"
                                                    class="contact-usage-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500    focus:ring-2  ">
                                                <label for="vue-checkbox"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 ">Authorised
                                                    Representative
                                                </label>
                                            </div>
                                        </li>
                                        <li class="w-full border-b border-gray-200 rounded-t-lg ">
                                            <div class="flex items-center ps-3">
                                                <input id="react-checkbox" type="checkbox" value="Connection User"
                                                    name="contactUsage[]"
                                                    class="contact-usage-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500    focus:ring-2  ">
                                                <label for="react-checkbox"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 ">Connection
                                                    User
                                                </label>
                                            </div>
                                        </li>


                                    </ul>

                                </div>

                                <div class="w-7/12 mt-20 ">
                                    <div class=" flex col-2">
                                        <button type="button" onclick="addContact()"
                                            class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-green-600 mt-5">
                                            <span class="mx-auto border-1 bg-green-">Add</span>
                                        </button>
                                        <button type="button" onclick="clearCOnatctFields()"
                                            class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-red-900 mt-5">
                                            <span class="mx-auto border-1 ">Clear</span>
                                        </button>
                                    </div>
                                </div>

                            </div>
                            <script>
                                function addContact() {
                                    // console.log('hello');
                                    const contact_code2 = document.querySelector('input[name="contact_code2"]').value;
                                    const contact_type = document.querySelector('input[name="contact_type"]').value;
                                    const name1 = document.querySelector('input[name="name1"]').value;
                                    // const suburb = document.querySelector('input[name="suburb"]').value;
                                    // const state = document.querySelector('input[name="state"]').value;
                                    // const country = document.querySelector('input[name="country"]').value;
                                    const selectContactUsage = document.querySelectorAll('.contact-usage-checkbox:checked');


                                    if (!contact_code2 || !contact_type || !name1 || selectContactUsage.length === 0) {
                                        alert('Please enter all required fields and select at least one Contact Usage type.');
                                        return;
                                    }

                                    const selectedContactUsageValues = Array.from(selectContactUsage).map(checkbox => checkbox.value);

                                    // Check for duplicates in contact usage types
                                    const tbody = document.getElementById('contact-body');
                                    const existingContactUsage = Array.from(tbody.querySelectorAll('input[name="contactUsages[]"]')).map(input =>
                                        input.value);

                                    // Check for duplicates in selected contact usages
                                    const duplicates = selectedContactUsageValues.filter(value => existingContactUsage.includes(value));

                                    if (duplicates.length > 0) {
                                        alert(
                                            'One or more selected contact usage types already exist in the table. Please remove them before adding new ones.'
                                            );
                                        return;
                                    }

                                    // Build new data with contact information and usage types
                                    const data = Array.from(selectContactUsage).map(checkbox => [contact_code2, contact_type, name1, checkbox
                                        .value
                                    ]);


                                    const existingData = [];
                                    const existingRows = tbody.querySelectorAll('tr');
                                    existingRows.forEach(row => {
                                        const rowData = [];
                                        const cells = row.querySelectorAll('td input');
                                        cells.forEach(cell => {
                                            rowData.push(cell.value);
                                        });
                                        existingData.push(rowData);
                                    });

                                    const newData = existingData.concat(data);

                                    tbody.innerHTML = ''; // Clear existing rows

                                    newData.forEach(arr => {
                                        const tr = document.createElement('tr');
                                        arr.forEach((val, index) => {
                                            const td = document.createElement('td');
                                            const input = document.createElement('input');
                                            input.setAttribute('type', 'text');
                                            input.setAttribute('value', val);
                                            input.setAttribute('readonly', 'readonly');
                                            input.setAttribute('name',
                                                `${index === 0 ? 'contact_code2s' : index === 1 ? 'contact_types' : index === 2 ? 'name1s'  : 'contactUsages'}[]`
                                            );
                                            td.appendChild(input);
                                            tr.appendChild(td);
                                        });
                                        tbody.appendChild(tr);
                                    });
                                    console.log(newData);
                                }

                                function deleteContact() {
                                    const tbody = document.getElementById('contact-body');
                                    const rows = tbody.querySelectorAll('tr');
                                    if (rows.length > 0) {
                                        tbody.removeChild(rows[rows.length - 1]);
                                    }
                                }

                                function clearCOnatctFields() {
                                    document.querySelector('input[name="contact_code2"]').value = '';
                                    document.querySelector('input[name="contact_type"]').value = '';
                                    document.querySelector('input[name="name1"]').value = '';
                                    document.querySelectorAll('.contact-usage-checkbox:checked').forEach(checkbox => checkbox.checked = false);
                                }
                            </script>

                            <div id="novelteleventTable" class="overflow-x-auto  mt-5">
                                <label for="" class="m-5">Phone Entered</label>
                                <table class="w-full text-sm text-left text-gray-500  border-separate m-5">

                                    <!-- Table content for Notes -->
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-300 h-10 rounded-full  ">
                                        <tr>
                                            <th>contact code</th>
                                            <th>Contact</th>
                                            <th>name</th>
                                            <th>usage</th>


                                        </tr>
                                    <tbody id="contact-body"></tbody>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Credit Card</td>
                                        </tr>



                                    </tbody>
                                </table>
                                <div class="w-7/12 ">
                                    <div class=" flex col-2">
                                        <button type="button" onclick="deleteContact()"
                                            class="items-center p-2 bg-primaryColor flex justify-start md:w-[100px] ml-11 rounded-lg text-white text-center bg-red-900 mt-5">
                                            <span class="mx-auto border-1 ">Delete</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <button type="button" id="next_button_5"
                                class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-green-600 mt-5">
                                <span class="mx-auto border-1 bg-green-">Next</span>
                            </button>
                        </div>


                        <script>
                            // Function to toggle the visibility of forms
                            function toggleFormVisibility(formId) {
                                // Hide all forms first
                                var forms = document.querySelectorAll('.form');
                                forms.forEach(function(form) {
                                    form.style.display = 'none';
                                    console.log("SaveBtn.disabled = false");
                                });

                                // Show the specified form
                                var formToShow = document.getElementById(formId);
                                if (formToShow) {
                                    formToShow.style.display = 'block';

                                }
                                SaveButtonDisable()

                                var SaveBtn = document.getElementById("save_button");
                                if (validateForm() && validateAddressForms() && validateBillingForm() && validateContactForms()) {
                                    SaveBtn.disabled = false;
                                    console.log("SaveBtn.disabled = false");
                                } else {
                                    SaveBtn.disabled = true;
                                    console.log("SaveBtn.disabled = true");
                                }
                            }

                            // Attach an event listener to the Next button on the billing page
                            document.getElementById("next_button_5").addEventListener("click", function() {
                                // Navigate to the contact form
                                toggleFormVisibility('addinfoForm');

                                document.getElementById("addInfoButton").classList.add("selected");
                                document.getElementById("contactButton").classList.remove("selected");
                            });
                        </script>

                        {{-- add Info --}}
                        <div id="addinfoForm" class="flex flex-col font-medium text-15px">
                            <div id="novelteleventTable" class="overflow-x-auto  mt-5">
                                <label for="" class="m-5">Additinol information</label>
                                <table class="w-full text-sm text-left text-gray-500  border-separate m-5">

                                    <!-- Table content for Notes -->
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-300 h-10 rounded-full  ">
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
                                            <input type="text" name="login_code"
                                                class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                        </div>

                                    </div>
                                    <div class="flex flex-row gap-4 md:gap-8 m-5">
                                        <div class="w-10/12">
                                            <label for="">Password</label>
                                            <input type="text" name="password"
                                                class="w-full p-2 border border-gray-800 rounded-lg opacity-60">
                                        </div>

                                    </div>

                                </div>


                                <div class="w-7/12 mt-64">
                                    <div class=" flex col-2">
                                        <button type="button"
                                            class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-green-600 mt-5">
                                            <span class="mx-auto border-1 bg-green-">Add New</span>
                                        </button>
                                        <button type="button"
                                            class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-red-900 mt-5">
                                            <span class="mx-auto border-1 ">Add Random</span>
                                        </button>
                                        <button type="button"
                                            class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-red-900 mt-5">
                                            <span class="mx-auto border-1 ">Delete</span>
                                        </button>
                                    </div>
                                </div>

                            </div>
                            <div id="novelteleventTable" class="overflow-x-auto  mt-5">
                                <label for="" class="m-5">Additinol information</label>
                                <table class="w-full text-sm text-left text-gray-500  border-separate m-5">

                                    <!-- Table content for Notes -->
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-300 h-10 rounded-full  ">
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
                            <button type="submit" id="save_button"
                                class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-green-600 mt-5"
                                disabled>
                                <span class="mx-auto border-1 bg-green-">Save</span>
                            </button>
                        </div>
                        <script>
                            function SaveButtonDisable() {
                                var SaveBtn = document.getElementById("save_button");
                                if (validateForm() && validateAddressForms() && validateBillingForm() && validateContactForms()) {
                                    SaveBtn.disabled = false;
                                    console.log("SaveBtn.disabled = false");
                                } else {
                                    SaveBtn.disabled = true;
                                    console.log("SaveBtn.disabled = true");
                                }
                            }
                        </script>
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

                var buttons = document.querySelectorAll('.tab-button');
                buttons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        buttons.forEach(function(btn) {
                            btn.classList.remove('selected');
                        });
                        this.classList.add('selected');
                    });
                });
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
                const SaveBtn = document.getElementById("save_button");
                SaveBtn.disabled = true;

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
