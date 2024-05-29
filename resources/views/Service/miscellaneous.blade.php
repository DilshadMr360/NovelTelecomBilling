<div id="miscellaneous"
class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50"
onclick="closeModale(event)">
<div class="bg-white p-5 rounded-lg w-1/3" onclick="event.stopPropagation()">
<!-- Prevent click inside from closing modal -->
<div class="flex justify-between items-center">
 <h2 class="text-lg mb-4 ml-28">Miscellaneous Charges</h2>
 <button type="button" onclick="closeModales()"
         class="text-gray-500 hover:text-gray-800">
   <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
           d="M6 18L18 6M6 6l12 12" />
   </svg>
 </button>
</div>
<!-- Form inside the modal -->
<form class="bg-white p-8 rounded shadow-md w-full max-w-lg">
 <div class="flex flex-wrap -mx-3 mb-6">
     <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
         <label for="name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Name:</label>
         <input type="text" id="name" name="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
     </div>
     <div class="w-full md:w-1/2 px-3">
         <label for="charges" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Charges:</label>
         <input type="text" id="charges" name="charges" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
     </div>
 </div>
 <div class="flex flex-wrap -mx-3 mb-6">
     <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
         <label for="start-date" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Start Date:</label>
         <input type="date" id="start-date" name="start-date" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
     </div>
     <div class="w-full md:w-1/2 px-3">
         <label for="end-date" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">End Date:</label>
         <input type="date" id="end-date" name="end-date" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
     </div>
 </div>
 <div class="flex justify-center">
     <button type="button" name="Debit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Debit</button>
     <button type="Button" name="Credit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-2">Credit</button>
 </div>
</form>
</div>
</div>


 <script>
     function opennote_M() {
       document.getElementById('miscellaneous').classList.remove('hidden');
     }

     function closeModales(event) {
       if (event) {
         event.stopPropagation();
       }
       document.getElementById('miscellaneous').classList.add('hidden');
     }

     function saveNotee() {
       // Implement the save functionality
       closeModale();
     }
   </script>
