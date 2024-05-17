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

        <div class="flex w-full  ">
            <div class="lg:flex lg:gap-x-12 w-6/12 ">
                <div class="relative  w-10">
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
                                    <div id="accountdetails" class="dropdown-content hidden absolute left-full top-0">
                                        <!-- Sub-dropdown content for Profile -->
                                        <ul class=" w-[150px]">
                                            <li><a href="#" class="dropdown-item ">Sub Profile 1</a></li>
                                            <li><a href="#" class="dropdown-item">Sub Profile 2</a></li>
                                            <li><a href="#" class="dropdown-item">Sub Profile 3</a></li>
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
                                        aria-expanded="false" onclick="toggleSubDropdown('findaccount')">
                                        Receipt
                                    </button>

                                </div>
                            </li>
                            <li>
                                <div class="relative ">
                                    <button type="button"
                                        class="flex items-center gap-x-1 text-sm  leading-6 text-gray-900 dropdown-item text-start w-[200px]"
                                        aria-expanded="false" onclick="toggleSubDropdown('financialdetails')">
                                        Fanancial Transactions
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
                                            <li><a href="#" class="dropdown-item ">Fanancial Profile 1</a></li>
                                            <li><a href="#" class="dropdown-item">Fanancial Profile 2</a></li>
                                            <li><a href="#" class="dropdown-item">Fanancial Profile 3</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="">
                                <div class="relative ">
                                    <button type="button"
                                        class="flex items-center gap-x-1 text-sm  leading-6 text-gray-900 dropdown-item text-start w-[200px]"
                                        aria-expanded="false" onclick="toggleSubDropdown('findaccount')">
                                        Miscellaneous Charges
                                    </button>

                                </div>
                            </li>
                            <li class="">
                                <div class="relative ">
                                    <button type="button"
                                        class="flex items-center gap-x-1 text-sm  leading-6 text-gray-900 dropdown-item text-start w-[200px]"
                                        aria-expanded="false" onclick="toggleSubDropdown('findaccount')">
                                        Discounting
                                    </button>

                                </div>
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
            const allDropdowns = document.querySelectorAll('.dropdown-content');

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
    </script>



    {{-- subdropdown --}}
    <script>
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
