<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Four Buttons in a Row</title>
  <!-- Include Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="flex justify-center items-center min-h-screen">
  <div class="flex justify-between gap-40">
    <!-- Service -->
    <div class="relative text-center">

      <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -mt-8 text-xl text-black whitespace-nowrap overflow-hidden"><strong>1. Service</strong></div>
      <select  class="mt-1 border border-gray-300 p-2 rounded w-full mb-4">
        <option value="none">(None)</option>
      </select>
      <button class="bg-green-600 hover:bg-green-700 text-white mt-2 font-bold py-2 px-6 rounded-md shadow-md transition duration-300 ease-in-out" onclick="servicePackage()">ADD</button>
    </div>
    <!-- Service Option -->
    <div class="relative text-center">

      <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -mt-8 text-xl text-black whitespace-nowrap overflow-hidden"><strong>2. Service Option</strong></div>
      <select  class="mt-1 border border-gray-300 p-2 rounded w-full mb-4">
        <option value="none">(None)</option>
      </select>
      <button class="bg-green-600 hover:bg-green-700 text-white mt-2 font-bold py-2 px-6 rounded-md shadow-md transition duration-300 ease-in-out" onclick="serviceOption()">ADD</button>
    </div>
    <!-- Package -->
    <div class="relative text-center">

      <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -mt-8 text-xl text-black whitespace-nowrap overflow-hidden"><strong>3. Package</strong></div>
      <select class="mt-1 border border-gray-300 p-2 rounded w-full mb-4">
        <option value="none">(None)</option>
      </select>
      <button class="bg-green-600 hover:bg-green-700 text-white mt-2 font-bold py-2 px-6 rounded-md shadow-md transition duration-300 ease-in-out" onclick="package()">ADD</button>
    </div>
    <!-- Package Option -->
    <div class="relative text-center">
        <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -mt-8 text-xl text-black whitespace-nowrap overflow-hidden"><strong>4. Package Option</strong></div>
        <select class="mt-1 border border-gray-300 p-2 rounded w-full mb-4">
          <option value="none">(None)</option>
        </select>
        <button class="bg-green-600 hover:bg-green-700 text-white mt-2 font-bold py-2 px-6 rounded-md shadow-md transition duration-300 ease-in-out" onclick="packageOption()">ADD</button>
    </div>
  </div>
</div>

    {{-- Service Package Popup Opened  --}}

<div id="service_package" class="popup-container fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 z-50 flex items-center justify-center hidden">
  <div class="popup-content p-8 relative bg-white rounded-lg max-w-lg w-full">
    <!-- Close button -->
    <button class="absolute top-2 right-2 text-gray-600 hover:text-gray-800" onclick="hidePopupWithId('service_package')">
      <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
    <!-- Popup content for Sell-On -->
    <div class="flex flex-col items-center">
      <input type="text" placeholder="Name" class="border border-gray-300 rounded-md px-4 py-2 mb-4 focus:outline-none focus:border-green-500 w-full">
      <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-md shadow-md transition duration-300 ease-in-out focus:outline-none">Save</button>
    </div>
  </div>
</div>

<script>
  function servicePackage() {
    document.getElementById('service_package').classList.remove('hidden');
  }

  function hidePopupWithId(id) {
    document.getElementById(id).classList.add('hidden');
  }
</script>

{{-- Service Popup UI closed --}}



{{-- Service Option Popup UI Opened --}}
<div id="serviceOption" class="popup-container fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 z-50 flex items-center justify-center hidden">
    <div class="popup-content p-8 relative bg-white rounded-lg max-w-lg w-full">
      <!-- Close button -->
      <button class="absolute top-2 right-2 text-gray-600 hover:text-gray-800" onclick="hidePopupWithId('serviceOption')">
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
      <!-- Popup content for Sell-On -->
      <div class="flex flex-col items-center">
        <input type="text" placeholder="Name" class="border border-gray-300 rounded-md px-4 py-2 mb-4 focus:outline-none focus:border-green-500 w-full">
        <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-md shadow-md transition duration-300 ease-in-out focus:outline-none">Save</button>
      </div>
    </div>
  </div>

  <script>
    function serviceOption() {
      document.getElementById('serviceOption').classList.remove('hidden');
    }

    function hidePopupWithId(id) {
      document.getElementById(id).classList.add('hidden');
    }
  </script>

  {{-- Service Option Popup UI Closed --}}


  {{-- Package Popup UI Opened --}}
<div id="package_package" class="popup-container fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 z-50 flex items-center justify-center hidden">
    <div class="popup-content p-8 relative bg-white rounded-lg max-w-lg w-full">
      <!-- Close button -->
      <button class="absolute top-      2 right-2 text-gray-600 hover:text-gray-800" onclick="hidePopupWithId('package_package')">
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
      <!-- Popup content for Sell-On -->
      <div class="flex flex-col items-center">
        <input type="text" placeholder="Name" class="border border-gray-300 rounded-md px-4 py-2 mb-4 focus:outline-none focus:border-green-500 w-full">
        <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-md shadow-md transition duration-300 ease-in-out focus:outline-none">Save</button>
      </div>
    </div>
  </div>

  <script>
    function package() {
      document.getElementById('package_package').classList.remove('hidden');
    }

    function hidePopupWithId(id) {
      document.getElementById(id).classList.add('hidden');
    }
  </script>
  {{-- Package Popup UI closed --}}

  {{-- Package Option Popup UI Opened --}}
<div id="package_option" class="popup-container fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 z-50 flex items-center justify-center hidden">
    <div class="popup-content p-8 relative bg-white rounded-lg max-w-lg w-full">
      <!-- Close button -->
      <button class="absolute top-2 right-2 text-gray-600 hover:text-gray-800" onclick="hidePopupWithId('package_option')">
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
      <!-- Popup content for Sell-On -->
      <div class="flex flex-col items-center">
        <input type="text" placeholder="Name" class="border border-gray-300 rounded-md px-4 py-2 mb-4 focus:outline-none focus:border-green-500 w-full">
        <input type="number" placeholder="Price" class="border border-gray-300 rounded-md px-4 py-2 mb-4 focus:outline-none focus:border-green-500 w-full">
        <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-md shadow-md transition duration-300 ease-in-out focus:outline-none">Save</button>
      </div>
    </div>
  </div>

  <script>
    function packageOption() {
      document.getElementById('package_option').classList.remove('hidden');
    }

    function hidePopupWithId(id) {
      document.getElementById(id).classList.add('hidden');
    }
  </script>
  {{-- Package Option Popup UI closed --}}

</body>
</html>

