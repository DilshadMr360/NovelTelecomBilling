// Packege view Start
let responseData = [];

function getaservicedetails(phonenumber, accountId) {
    console.log(
        "Clicked on phone number: " +
            phonenumber +
            " for account ID: " +
            accountId
    );
    $.ajax({
        url: "/service/details/" + phonenumber + "/" + accountId,
        type: "GET",
        success: function (response) {
            console.log('sdfdsfsdfs',response);
            responseData = response.data;
            console.log(response.data[0].phonenumber);

            // Process the response data and populate the table
            const accountService = response.data[0]; // Assuming you're working with the first object in the array
            const fields = [
                { label: "Phone Number",value: accountService.phonenumber,action: "zoom", },
                { label: "Service Narrative",value: accountService.service_narrative,action: "service_narrative", },
                { label: "Status",value: accountService.status,action: "status", },
                { label: "Date Connected",value: accountService.created_at,action: "dateconnected", },
                { label: "Password",value: accountService.password,action: "password", },
                { label: "Package",value: accountService.service_id,action: "package", },
                { label: "Charge Override", value: "--", action: "changeoverride" },
                { label: "Package Start",value: accountService.created_at,action: "packagestart", },
                { label: "Contract",value: accountService.contract, action: "contract", },
                { label: "Contract Start", value: "--", action: "contractstart" },
                { label: "Contract End", value: "--", action: "contractend" },
                // { label: "Service Owner", value: "--", action: "more" },
                // { label: "Port Authority Date", value: "--", action: "more" },
                // { label: "Order Number", value: "--", action: "more" },
                { label: "IPND", value: "--", action: "ipnd" },
            ];

            const detailsTableBody =
                document.getElementById("details-table-body");

            // Clear existing table rows
            detailsTableBody.innerHTML = "";

            fields.forEach((field) => {
                const row = document.createElement("tr");
                const cellLabel = document.createElement("td");
                const cellValue = document.createElement("td");
                cellLabel.textContent = field.label;
                cellValue.textContent = field.value;

                // Add right-click event listener
                cellValue.addEventListener("contextmenu", (event) => {
                    event.preventDefault();
                       // Assuming cellValue is an input element
                       let value = cellValue.textContent; // For input elements
                       // Alternatively, if cellValue is a non-input element, like a <div> or <span>
                       // let value = cellValue.textContent;
                       // For debugging or further use
                    showContextMenu(event, field.action,value );
                });

                row.appendChild(cellLabel);
                row.appendChild(cellValue);
                detailsTableBody.appendChild(row);
            });
        },
        error: function (xhr, status, error) {
            console.error(error); // Handle error
        },
    });
}
const contextMenus = {
    zoom: [
        { id: "zoom-item", label: "Zoom", value: "{value}", onclick: "zoom('{value}')" },
        { id: "copy-all", label: "Copy All", value: "{value}", onclick: "edit('{value}')" },
        { id: "copy-item", label: "Copy Item", value: "{value}", onclick: "edit('{value}')" },
    ],

    service_narrative: [
        { id: "service-narrative-item", label: "Change Service Narrative", value: "{value}", onclick: "" },
        { id: "zoom-item", label: "Zoom", value: "{value}", onclick: "zoom('{value}')" },
        { id: "copy-all", label: "Copy All", value: "{value}", onclick: "edit('{value}')" },
        { id: "copy-item", label: "Copy Item", value: "{value}", onclick: "edit('{value}')" },
    ],

    status: [
        { id: "zoom-item", label: "Zoom", value: "{value}", onclick: "zoom('{value}')" },
        { id: "copy-all", label: "Copy All", value: "{value}", onclick: "edit('{value}')" },
        { id: "copy-item", label: "Copy Item", value: "{value}", onclick: "edit('{value}')" },
    ],

    dateconnected: [
        { id: "zoom-item", label: "Zoom", value: "{value}", onclick: "zoom('{value}')" },
        { id: "copy-all", label: "Copy All", value: "{value}", onclick: "edit('{value}')" },
        { id: "copy-item", label: "Copy Item", value: "{value}", onclick: "edit('{value}')" },
    ],

    password: [
        { id: "password-change", label: "Password Change", value: "{value}", onclick: "" },
        { id: "zoom-item", label: "Zoom", value: "{value}", onclick: "zoom('{value}')" },
        { id: "copy-all", label: "Copy All", value: "{value}", onclick: "edit('{value}')" },
        { id: "copy-item", label: "Copy Item", value: "{value}", onclick: "edit('{value}')" },
    ],

    package: [
        { id: "package-change", label: "Package Change", value: "{value}", onclick: "" },
        { id: "package-change-details", label: "Package Details", value: "{value}", onclick: "" },
        { id: "package-change-history", label: "Package Change History", value: "{value}", onclick: "" },
        { id: "zoom-item", label: "Zoom", value: "{value}", onclick: "zoom('{value}')" },
        { id: "copy-all", label: "Copy All", value: "{value}", onclick: "edit('{value}')" },
        { id: "copy-item", label: "Copy Item", value: "{value}", onclick: "edit('{value}')" },
    ],

    changeoverride:[
        { id: "package-change-details", label: "Package Details", value: "{value}", onclick: "" },
        { id: "package-change-history", label: "Package Change History", value: "{value}", onclick: "" },
        { id: "zoom-item", label: "Zoom", value: "{value}", onclick: "zoom('{value}')" },
        { id: "copy-all", label: "Copy All", value: "{value}", onclick: "edit('{value}')" },
        { id: "copy-item", label: "Copy Item", value: "{value}", onclick: "edit('{value}')" },
    ],

    packagestart: [
        { id: "package-change-details", label: "Package Details", value: "{value}", onclick: "" },
        { id: "package-change-history", label: "Package Change History", value: "{value}", onclick: "" },
        { id: "zoom-item", label: "Zoom", value: "{value}", onclick: "zoom('{value}')" },
        { id: "copy-all", label: "Copy All", value: "{value}", onclick: "edit('{value}')" },
        { id: "copy-item", label: "Copy Item", value: "{value}", onclick: "edit('{value}')" },
    ],

    contract: [
        { id: "manage-contract", label: "Manage Contract", value: "{value}", onclick: "contract('{value}')" },
        { id: "package-change-history", label: "Package Change History", value: "{value}", onclick: "" },
        { id: "zoom-item", label: "Zoom", value: "{value}", onclick: "zoom('{value}')" },
        { id: "copy-all", label: "Copy All", value: "{value}", onclick: "edit('{value}')" },
        { id: "copy-item", label: "Copy Item", value: "{value}", onclick: "edit('{value}')" },
    ],

    contractstart: [
        { id: "zoom-item", label: "Zoom", value: "{value}", onclick: "zoom('{value}')" },
        { id: "copy-all", label: "Copy All", value: "{value}", onclick: "edit('{value}')" },
        { id: "copy-item", label: "Copy Item", value: "{value}", onclick: "edit('{value}')" },
    ],

    contractend: [
        { id: "zoom-item", label: "Zoom", value: "{value}", onclick: "zoom('{value}')" },
        { id: "copy-all", label: "Copy All", value: "{value}", onclick: "edit('{value}')" },
        { id: "copy-item", label: "Copy Item", value: "{value}", onclick: "edit('{value}')" },
    ],

    ipnd: [
        { id: "ipnd", label: "IPND", value: "{value}", onclick: "" },
        { id: "zoom-item", label: "Zoom", value: "{value}", onclick: "zoom('{value}')" },
        { id: "copy-all", label: "Copy All", value: "{value}", onclick: "edit('{value}')" },
        { id: "copy-item", label: "Copy Item", value: "{value}", onclick: "edit('{value}')" },
    ],

    more: [
        { id: "more-item", label: "More", value: "{value}", onclick: "more('{value}')" },
    ],

    // view: [
    //     { id: "view-item", label: "View", value: "{value}", onclick: "view('{value}')" },
    //     { id: "view-test01", label: "test01", value: "{value}", onclick: "view('{value}')" },
    // ],
    // add: [
    //     { id: "add-item", label: "Add", value: "{value}", onclick: "add('{value}')" },
    //     { id: "add-test05", label: "test05", value: "{value}", onclick: "add('{value}')" },
    // ],

};



//  Service OPTION DROPDOWNS FUNCTIONS //

function showSubMenu(submenuId, buttonId) {
    var submenus = document.querySelectorAll('.dropdown-content-account-details');
    var buttons = document.querySelectorAll('.main-button');
    // Hide all submenus and remove bg color from all buttons
    submenus.forEach(function(submenu) {
        submenu.classList.add('hidden');
    });

    buttons.forEach(function(button) {
        button.classList.remove('bg-gray-200');
    });

    // Toggle the clicked submenu visibility
    var submenu = document.getElementById(submenuId);
    submenu.classList.toggle('hidden');

    // Add bg color to the clicked button
    var button = document.getElementById(buttonId);
    if (!submenu.classList.contains('hidden')) {
        button.classList.add('bg-gray-200');
    }
}

function copyItemFunction() {
    // Get the text field
    var copyText = document.getElementById("myInput");
    console.log(copyText);
    // Select the text field
    copyText.select();
    copyText.setSelectionRange(0, 99999); // For mobile devices

    // Copy the text inside the text field
    navigator.clipboard.writeText("Phone number : " + copyText.value);

    // Alert the copied text
    alert("Copied the text: " + copyText.value);
}

function copyAllFunction() {
    // Get the text field
    var myService = document.getElementById("myService");
    var copyText = document.getElementById("myInput");
    console.log(copyText);
    // Select the text field
    copyText.select();
    copyText.setSelectionRange(0, 99999); // For mobile devices

    // Select the text field
    myService.select();
    myService.setSelectionRange(0, 99999); // For mobile devices

    // Copy the text inside the text field
    navigator.clipboard.writeText("Phone number : " + copyText.value + " " + "\nService Name : " + myService.value);

    // Alert the copied text
    alert("Copied the text: " + copyText.value);
}

// END  Service OPTION DROPDOWNS FUNCTIONS //



function showContextMenu(event, action, value) {
    console.log("Value: ", value);
    const contextMenu = document.getElementById("context-menu");
    const menuList = contextMenu.querySelector("ul");
    menuList.innerHTML = "";

    // Populate context menu based on action
    contextMenus[action].forEach((menuItem) => {
        console.log(menuItem);
        const li = document.createElement("li");
        li.id = menuItem.id;
        li.textContent = menuItem.label.replace("{value}", value);
        li.setAttribute("onclick", menuItem.onclick.replace("{value}", value));
        li.classList.add("px-4", "py-2", "cursor-pointer", "hover:bg-gray-200");
        menuList.appendChild(li);
    });

    // Calculate the correct position based on scroll position
    const top = event.clientY + window.scrollY;
    const left = event.clientX + window.scrollX;

    contextMenu.style.top = `${top}px`;
    contextMenu.style.left = `${left}px`;
    contextMenu.classList.remove("hidden");

    // Hide the context menu when clicking outside of it
    document.addEventListener("click", hideContextMenu);
    document.addEventListener("wheel", hideContextMenu);
}

function hideContextMenu(event) {
    const contextMenu = document.getElementById("context-menu");
    contextMenu.classList.add("hidden");
    document.removeEventListener("click", hideContextMenu);
    document.removeEventListener("wheel", hideContextMenu);
}

// Define the edit function to show the popup
// Function to show the popup
function zoom(value) {
    console.log("Edit action triggered with value:", value);

    // Find the account service based on the value
    const accountService = responseData.find(service =>
        service.phonenumber === value || service.service_narrative === value ||
        service.status === value || service.created_at === value ||
        service.password === value || service.service_id === value ||
        service.contract === value
    );

    const fields = [
        { label: "Phone Number", value: accountService.phonenumber },
        { label: "Service Narrative", value: accountService.service_narrative },
        { label: "Status", value: accountService.status },
        { label: "Date Connected", value: accountService.created_at },
        { label: "Password", value: accountService.password },
        { label: "Package", value: accountService.service_id },
        { label: "Charge Override", value: "--" },
        { label: "Package Start", value: accountService.created_at },
        { label: "Contract", value: accountService.contract },
        { label: "Contract Start", value: "--" },
        { label: "Contract End", value: "--" },
        { label: "Service Owner", value: "--" },
        { label: "Port Authority Date", value: "--" },
        { label: "Order Number", value: "--" },
        { label: "IPND", value: "--" },
    ];

    const tableContent = fields.map(field => `
        <tr>
            <td>${field.label}</td>
            <td>${field.value}</td>
        </tr>
    `).join('');

    const editContent = document.getElementById("edit-content");
    editContent.innerHTML = `
        <table class="w-full text-sm text-left text-gray-500 border-separate">
            <thead class="text-xs text-gray-700 uppercase bg-gray-300 h-10 rounded-full">
                <tr>
                    <th>Item</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                ${tableContent}
            </tbody>
        </table>
    `;

    const editPopup = document.getElementById("edit");
    editPopup.classList.remove("hidden");
}


function contracthidePopupWithId(id) {
    document.getElementById(id).classList.add("hidden");
}




function contract(value){

    const editcontractPopup = document.getElementById("contract");
    editcontractPopup.classList.remove("hidden");
}




// Define other functions like view, add, more as needed
function view(value) {
    console.log("View action triggered with value:", value);
    // Implement view logic
}

function add(value) {
    console.log("Add action triggered with value:", value);
    // Implement add logic
}

function more(value) {
    console.log("More action triggered with value:", value);
    // Implement more logic
}

// Function to hide popup
function hidePopupWithId(id) {
    document.getElementById(id).classList.add("hidden");
}

function showPopupWithId(id) {
    document.getElementById(id).classList.remove('hidden');
}

function hideContextMenu() {
    const contextMenu = document.getElementById("context-menu");
    contextMenu.classList.add("hidden");
    document.removeEventListener("click", hideContextMenu);
}






// Event listeners for context menu items
document.addEventListener("click", (event) => {
    if (event.target.id === "zoom-item") {
        console.log("Edit clicked");
        // Add your edit logic here
    } else if (event.target.id === "view-item") {
        console.log("View clicked");
        // Add your view logic here
    } else if (event.target.id === "add-item") {
        console.log("Add clicked");
        // Add your add logic here
    } else if (event.target.id === "more-item") {
        console.log("More clicked");
        // Add your more logic here
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const phoneLinks = document.querySelectorAll(".phone-link");
    let currentContextMenu = null; // To store the currently open context menu

    // Function to hide the context menu
    function hideContextMenuMain(contextMenu) {
        contextMenu.classList.add("hidden");
        currentContextMenu = null; // Reset the currently open context menu
    }

    phoneLinks.forEach((phoneLink) => {
        const serviceId = phoneLink.id.split("-")[1];
        const contextMenu = document.getElementById(`contextMenu-${serviceId}`);

        phoneLink.addEventListener("contextmenu", function (e) {
            e.preventDefault();

            // Hide the previously opened context menu if there is one
            if (currentContextMenu && currentContextMenu !== contextMenu) {
                hideContextMenuMain(currentContextMenu);
            }

            const { clientX: mouseX, clientY: mouseY } = e;
            contextMenu.style.top = `${mouseY + window.scrollY}px`;
            contextMenu.style.left = `${mouseX + window.scrollX}px`;
            contextMenu.classList.remove("hidden");

            // Update the currently open context menu
            currentContextMenu = contextMenu;
        });

        document.addEventListener("click", function (e) {
            if (currentContextMenu && !currentContextMenu.contains(e.target) && e.target !== phoneLink) {
                hideContextMenuMain(currentContextMenu);
            }
        });

        contextMenu.querySelectorAll(".context-menu-item").forEach((item) => {
            item.addEventListener("click", function () {
                const value = this.getAttribute("value");
                // Assuming you have a function named showPopupWithId() to display the popup view
                showPopupWithId(value); // Pass the value as the ID to match the popup view
                hideContextMenuMain(contextMenu);
            });
        });


    });
});

// Packege view E

// {{--navigate notes->document  --}}
document.addEventListener("DOMContentLoaded", function () {
    const notesButton = document.getElementById("notesButton");
    const billsButton = document.getElementById("billsButton");
    const correrpondenceButton = document.getElementById(
        "correrpondenceButton"
    );
    const eventButton = document.getElementById("eventButton");
    const financialButton = document.getElementById("financialButton");
    const paymentButton = document.getElementById("paymentButton");
    const documentButton = document.getElementById("documentButton");

    const notesTable = document.getElementById("notesTable");
    const billsTable = document.getElementById("billsTable");
    const correrpondenceTable = document.getElementById("correrpondenceTable");
    const eventTable = document.getElementById("eventTable");
    const financialTable = document.getElementById("financialTable");
    const paymentTable = document.getElementById("paymentTable");
    const DocumentTable = document.getElementById("DocumentTable");

    notesTable.classList.remove("hidden");
    notesButton.addEventListener("click", function () {
        hideAllTables();
        notesTable.classList.remove("hidden");
    });

    billsButton.addEventListener("click", function () {
        hideAllTables();
        billsTable.classList.remove("hidden");
    });

    correrpondenceButton.addEventListener("click", function () {
        hideAllTables();
        correrpondenceTable.classList.remove("hidden");
    });

    eventButton.addEventListener("click", function () {
        hideAllTables();
        eventTable.classList.remove("hidden");
    });

    financialButton.addEventListener("click", function () {
        hideAllTables();
        financialTable.classList.remove("hidden");
    });

    paymentButton.addEventListener("click", function () {
        hideAllTables();
        paymentTable.classList.remove("hidden");
    });

    paymentButton.addEventListener("click", function () {
        hideAllTables();
        paymentTable.classList.remove("hidden");
    });

    documentButton.addEventListener("click", function () {
        hideAllTables();
        DocumentTable.classList.remove("hidden");
    });

    // Function to hide all tables
    function hideAllTables() {
        notesTable.classList.add("hidden");
        billsTable.classList.add("hidden");
        correrpondenceTable.classList.add("hidden");
        eventTable.classList.add("hidden");
        financialTable.classList.add("hidden");
        paymentTable.classList.add("hidden");
        DocumentTable.classList.add("hidden");
    }
});

// second section navigate tab
document.addEventListener("DOMContentLoaded", function () {
    const notesButton = document.getElementById("notesButton");
    const billsButton = document.getElementById("billsButton");
    const correrpondenceButton = document.getElementById(
        "correrpondenceButton"
    );
    const eventButton = document.getElementById("eventButton");
    const financialButton = document.getElementById("financialButton");
    const paymentButton = document.getElementById("paymentButton");
    const documentButton = document.getElementById("documentButton");

    const notesTable = document.getElementById("notesTable");
    const billsTable = document.getElementById("billsTable");
    const correrpondenceTable = document.getElementById("correrpondenceTable");
    const eventTable = document.getElementById("eventTable");
    const financialTable = document.getElementById("financialTable");
    const paymentTable = document.getElementById("paymentTable");
    const DocumentTable = document.getElementById("DocumentTable");

    notesTable.classList.remove("hidden");
    notesButton.addEventListener("click", function () {
        hideAllTables();
        notesTable.classList.remove("hidden");
    });

    billsButton.addEventListener("click", function () {
        hideAllTables();
        billsTable.classList.remove("hidden");
    });

    correrpondenceButton.addEventListener("click", function () {
        hideAllTables();
        correrpondenceTable.classList.remove("hidden");
    });

    eventButton.addEventListener("click", function () {
        hideAllTables();
        eventTable.classList.remove("hidden");
    });

    financialButton.addEventListener("click", function () {
        hideAllTables();
        financialTable.classList.remove("hidden");
    });

    paymentButton.addEventListener("click", function () {
        hideAllTables();
        paymentTable.classList.remove("hidden");
    });

    paymentButton.addEventListener("click", function () {
        hideAllTables();
        paymentTable.classList.remove("hidden");
    });

    documentButton.addEventListener("click", function () {
        hideAllTables();
        DocumentTable.classList.remove("hidden");
    });

    // Function to hide all tables
    function hideAllTables() {
        notesTable.classList.add("hidden");
        billsTable.classList.add("hidden");
        correrpondenceTable.classList.add("hidden");
        eventTable.classList.add("hidden");
        financialTable.classList.add("hidden");
        paymentTable.classList.add("hidden");
        DocumentTable.classList.add("hidden");
    }
});

// 4th section billing table
document.addEventListener("DOMContentLoaded", function () {
    const novelteleventButton = document.getElementById("novelteleventButton");
    const noveltelesitesButton = document.getElementById(
        "noveltelesitesButton"
    );
    const novelteleventTable = document.getElementById("novelteleventTable");
    const noveltelesitesTable = document.getElementById("noveltelesitesTable");

    novelteleventTable.classList.remove("hidden");

    novelteleventButton.addEventListener("click", function () {
        hideAllTables();
        novelteleventTable.classList.remove("hidden");
    });

    noveltelesitesButton.addEventListener("click", function () {
        hideAllTables();
        noveltelesitesTable.classList.remove("hidden");
    });

    // function to hide all tables
    function hideAllTables() {
        novelteleventTable.classList.add("hidden");
        noveltelesitesTable.classList.add("hidden");
    }
});

// tab underline script
function selectTab(button) {
    const buttons = document.querySelectorAll(".tab-button");
    buttons.forEach((btn) => {
        btn.classList.remove("selected-tab");
    });
    button.classList.add("selected-tab");
}

//side expand script
const accordionHeader = document.querySelectorAll(".accordion-header");
accordionHeader.forEach((header) => {
    const accordionContent =
        header.parentElement.querySelector(".accordion-content");
    const accordionHeadericon = header.querySelector(".fas");

    console.log(accordionHeadericon);
    window.addEventListener("resize", function () {
        if (window.visualViewport.width < 768) {
            accordionContent.style.maxHeight = "0";
            header.querySelector(".fas").classList.add("hidden");
        } else {
            accordionHeadericon.style.display = "none";
            accordionContent.style.maxHeight = "unset";
        }
    });

    header.addEventListener("click", function () {
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
            header.parentElement.classList.remove("bg-indigo-50");
        }
    });
});

// NOTE Start

function updateNotesTable(notes) {
    const tableBody = document.getElementById("notesTableBody");
    tableBody.innerHTML = "";

    notes.forEach((note) => {
        const row = document.createElement("tr");
        row.innerHTML = `
     <td>${note.id}</td>
  <td>${note.note}</td>

   <td>${note.created_at}</td>
   <td>${note.user_id}</td>
                    `;
        tableBody.appendChild(row);
    });

    document.getElementById("notesTable").classList.remove("hidden");
}

function openModal(account) {
    console.log(account);
    document.getElementById("noteModal").classList.remove("hidden");
    document.body.style.overflow = "hidden"; // Disable scrolling on the background
}

function closeModal(event) {
    if (!event || event.target === document.getElementById("noteModal")) {
        document.getElementById("noteModal").classList.add("hidden");
        document.body.style.overflow = "auto"; // Re-enable scrolling
    }
}

function saveNote() {
    console.log("Entering saveNote function");
    var noteText = document.getElementById("noteText").value.trim(); // Get the text and trim whitespace
    var account = document.getElementById("account").value;

    if (noteText == "") {
        alert("Please write your note before saving."); // Alert if empty
        return false; // Stop the function
    }

    console.log("Note Saved:", noteText);
    console.log(account);

    // Construct the URL with query parameters
    var url =
        "/notestore/" +
        encodeURIComponent(noteText) +
        "/" +
        encodeURIComponent(account);

    var csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    $.ajax({
        url: url,
        type: "POST",
        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
        success: function (data) {
            console.log("Note saved successfully:", data.creater);
            var accId = data.creater;
            console.log(accId);
            getNotes(accId);
            closeModal();

            // Optionally: Do something with the response, like updating UI
        },
        error: function (xhr, status, error) {
            console.error("Error saving note:", error);
            // Optionally: Display an error message to the user
        },
    });
}

function getNotes(accId) {
    console.log("hi");
    $.ajax({
        url: "/notes",
        type: "GET",
        data: {
            accId: accId,
        },
        success: function (data) {
            // Update UI with the received notes
            updateNotesTable(data);
        },
        error: function (xhr, status, error) {
            console.error("Error fetching notes:", error);
            // Optionally: Display an error message to the user
        },
    });
}

// NOTE End
