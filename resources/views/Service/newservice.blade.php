<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Include flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

</head>

<body>
    @include('layouts.layout')

    <section class=" justify-center items-center h-screen  ">
        <!-- Start coding here -->
        <div class="bg-white   shadow-md sm:rounded-lg  h-full  ">
            <div
                class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4 mt-2">

                <div
                    class="flex shadow-lg  flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0 w-full b">
                    <button id="subscribesButton"
                        class="w-auto flex items-center justify-center tab-button py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none tab-button selected"
                        type="button" onclick="toggleFormVisibility('subscribeForm')">
                        File
                    </button>
                    <button id="addressButton"
                        class="w-full flex items-center justify-center py-2 px-4 text-sm font-medium tab-button"
                        type="button" onclick="toggleFormVisibility('addressForm')">
                        View
                    </button>

                </div>
            </div>
            <div id="subscribeForm" class="flex-col font-medium text-15px border border-1 h-[300px]">

                <section class=" -mt-16 border-1 border ">

                    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
                        rel="stylesheet" />
                    <div class="w-full">
                        @foreach ($services as $service)
                            <div class="transition border border-1">
                                <!-- header -->
                                <div
                                    class="accordion-header cursor-pointer transition flex space-x-5 px-5 items-center h-14 font-bold">
                                    <i class="fas fa-plus icon"></i>
                                    <h3>{{ $service->service_name }}</h3>
                                </div>
                                <!-- Content -->
                                <div class="accordion-content height px-5 pt-0 overflow-hidden max-h-0">
                                    <ul>
                                        @foreach ($service->serviceoptions as $serviceoption)
                                            <li>
                                                <a href="#" class="leading-6 pl-9 text-justify open-modal"
                                                    data-target="#formModal" data-service="{{ $service->id }}"
                                                    data-service-name="{{ $serviceoption->service_types }}"
                                                    data-service-option="{{ $serviceoption->service_id }}"
                                                    onclick="updateServiceOption(this)">
                                                    {{ $serviceoption->service_types }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="w-7/12   justify-end">
                        <div class=" flex col-2">
                            <button type="submit"
                                class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-green-600 mt-5">
                                <span class="mx-auto border-1 bg-green-">Add</span>
                            </button>
                            <button type="submit"
                                class="items-center p-2 bg-primaryColor flex justify-start md:w-[150px] ml-11 rounded-lg text-white text-center bg-red-900 mt-5">
                                <span class="mx-auto border-1 ">Cancel</span>
                            </button>
                        </div>
                    </div>
                </section>
                @include('Service.modal')

            </div>



        </div>



    </section>

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
        function toggleFormVisibility(formId) {
            // Hide all forms
            var forms = document.querySelectorAll('form > form');
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

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/ui"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const openModalButtons = document.querySelectorAll('.open-modal');
            const formModal = document.getElementById('formModal');
            const form = document.getElementById('mainForm');

            openModalButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const modalId = button.dataset.target;
                    const modal = document.querySelector(modalId);

                    // Get the service name from the data attribute
                    const serviceName = button.dataset.service;

                    // Pass the service name to the modal or do any other processing
                    // For now, let's update the select option with the service name
                    const typeSelect = modal.querySelector('#typeSelect');
                    const option = document.createElement('option');
                    option.value = serviceName;
                    option.textContent = serviceName;
                    typeSelect.innerHTML = ''; // Clear previous options
                    typeSelect.appendChild(option);

                    modal.classList.remove('hidden');
                    form.action = '#' + modalId.slice(1);
                });
            });

            formModal.addEventListener('click', (event) => {
                if (event.target.classList.contains('modal-close') || !event.target.closest(
                        '.modal-content')) {
                    formModal.classList.add('hidden');
                }
            });
        });
    </script>

    <script>
        function updateServiceName(element) {
            // Prevent the default link behavior
            event.preventDefault();

            // Get the service option ID from the data attribute
            var serviceOptionName = element.getAttribute('  data-service-name');

            // Update the input field with the service option ID
            document.getElementById('serviceOptionInput').value = serviceOptionName;
        }

        function updateServiceOption(element) {
            // Prevent the default link behavior
            event.preventDefault();

            // Get the service option ID from the data attribute
            var serviceOptionId = element.getAttribute('data-service-option');

            // Update the input field with the service option ID
            document.getElementById('serviceOptionInput').value = serviceOptionId;
        }
    </script>


</body>

</html>
