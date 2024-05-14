function togglenew() {
    console.log("hello");
    // Use AJAX to call the Laravel route
    fetch('/packages')
        .then(response => response.json())
        .then(data => {
            // Assign the data array to a variable
            var dataArray = data;
            console.log(dataArray); // Check the data in the console

            // Select the div element by its ID
            var divContainer = document.getElementById('packageNames');

            // Clear the contents of the divContainer before appending new labels
            divContainer.innerHTML = '';

            // Create a select element
            var select = document.createElement('select');
            select.setAttribute('name', 'package_id');
            select.setAttribute('id', 'package_id');
            select.classList.add('w-full', 'p-2', 'border', 'border-gray-800', 'rounded-lg',
                            'opacity-60');
            // Loop through the dataArray and create an <option> element for each package
            dataArray.forEach(package => {
                var option = document.createElement('option'); // Create an <option> element
                option.textContent = package
                    .package_name; // Set the text content of the option to the package name
                option.value = package.id; // Set the value of the option to the package id
                select.appendChild(option); // Append the <option> element to the <select> element
            });

            // Append the <select> element to the div container
            var divContainer = document.getElementById('packageNames');
            divContainer.appendChild(select);

            // Add event listener to the select element
            select.addEventListener('change', function() {
                var selectedPackageId = this.value; // Get the selected package ID
                // Call a function passing the selected package ID
                callRoute(selectedPackageId);
            });

            // Function to call route with the selected package ID
            function callRoute(packageId) {
                // Make an AJAX request to the route using the selected package ID
                console.log(packageId);
                fetch('/package-option?package_id=' + packageId)
                    .then(response => response.json()) // Parse the JSON response
                    .then(data => {
                        var optionArray = data;
                        console.log(optionArray); // Log the response data in the console

                        var divContainer = document.getElementById('packageOption');

                        // Clear the contents of the divContainer before appending new options
                        divContainer.innerHTML = '';

                        // Create a select element
                        var select = document.createElement('select');
                        select.setAttribute('name', 'packageoption_id');
                        select.setAttribute('id', 'packageoption_id');
                        select.classList.add('w-full', 'p-2', 'border', 'border-gray-800', 'rounded-lg',
                            'opacity-60');

                        optionArray.forEach(package => {
                            var option = document.createElement(
                            'option'); // Create an <option> element
                            option.textContent = package
                            .package_options; // Set the text content of the option to the package option
                            option.value = package
                            .id; // Set the value of the option to the package id
                            select.appendChild(
                            option); // Append the <option> element to the <select> element
                        });

                        // Append the <select> element to the div container
                        divContainer.appendChild(select);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }

        })
        .catch(error => console.error('Error:', error));

}