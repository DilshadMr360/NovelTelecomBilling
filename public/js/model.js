document.addEventListener("DOMContentLoaded", function() {
    // Get all elements with the class 'open-modal'
    var openModalButtons = document.querySelectorAll('.open-modal');

    openModalButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default anchor behavior

            var target = button.getAttribute('data-target');
            var serviceType = button.getAttribute('data-service-type');
            var serviceName = button.getAttribute('data-service-name');
            var serviceid = button.getAttribute('data-service-id')
            var modal = document.querySelector(target);
            var typeSelect = document.getElementById('typeSelect')
            var typeId = document.getElementById('typeId')
            var serviceOptionId = document.getElementById('serviceOptionInput')
            serviceOptionId.value=serviceid;
            typeSelect.value = serviceName;
            typeId.value = serviceType;

            if (serviceType) {
                $.ajax({
                    url: "/getpackage/" + serviceType,
                    type: "GET",
                    success: function(response) {
                        console.log(response);

                        var packageSelect = document.getElementById(
                            'packageSelect');
                        packageSelect.innerHTML =
                            '<option value="" selected disabled>-- Select Package --</option>';

                        // Populate the select dropdown with package names
                        response.forEach(function(package) {
                            var option = document.createElement(
                                'option');
                            option.value = package
                                .id; // Set option value to package ID or any other unique value
                            option.textContent = package
                                .package_name; // Set the display text to package name
                            packageSelect.appendChild(option);
                        });

                        packageSelect.addEventListener('change', function() {
                        var selectedPackageId = packageSelect.value;
                        getpackageoption(selectedPackageId);
                        });

                    },
                    error: function(xhr, status, error) {
                        console.error(error); // Handle error
                    },
                });
            }
        });
    });
});

function getpackageoption(id){
    console.log(id);
    $.ajax({
        url: "/getpackageoptions/" + id,
        type: "GET",
        success: function(response) {
            console.log(response);
            var packageOptionSelect = document.getElementById('packageOptionSelect');
            packageOptionSelect.innerHTML = '<option value="" selected disabled>-- Select Package Option --</option>';

            // Populate the select dropdown with package options
            response.forEach(function(option) {
                var optionElement = document.createElement('option');
                optionElement.value = option.id; // Set option value to package option ID
                optionElement.textContent = option.package_options; // Set the display text to package option name
                packageOptionSelect.appendChild(optionElement);
            });
        },
        error: function(xhr, status, error) {
            console.error(error); // Handle error
        },
    });
}


function hidePopupWithId(id) {
    var modal = document.getElementById(id);
    if (modal) {
        modal.classList.add('hidden');
    }
}