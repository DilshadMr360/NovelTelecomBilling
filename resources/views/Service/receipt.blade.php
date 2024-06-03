<div id="Account_Recipt" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-50 flex items-center justify-center hidden">
    <div class="popup-container bg-white border border-gray-300 shadow-lg rounded-lg p-4 w-full md:w-3/4 h-full md:h-3/4 overflow-hidden">
        <div class="modal-content bg-white mx-auto rounded-lg shadow-lg z-50 w-full h-full relative">
            <div class="sticky top-0 flex justify-end items-center border-b pb-2 mb-4 bg-white z-50">
                <button class="text-black hover:text-black p-2 rounded-lg bg-white focus:outline-none"
                        onclick="hidePopupWithId('Account_Recipt')">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="max-w-5xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg overflow-y-auto h-[80%]">
                <div class="text-center mb-6">
                    <h2 class="text-2xl font-bold">Financial Transaction Receipt Account</h2>
                </div>
                <div class="grid grid-cols-1 gap-6">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="number" class="block text-sm font-medium text-gray-700">Number</label>
                            <input type="text" id="number" class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="3124679">
                        </div>
                        <div>
                            <label for="amount" class="block text-sm font-medium text-gray-700">Amount (AUD)</label>
                            <input type="number" id="amount" class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="0.00">
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <div>
                            <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                            <input type="date" id="date" class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="2024-05-30">
                        </div>
                        <div>
                            <label for="due-date" class="block text-sm font-medium text-gray-700">Due Date</label>
                            <div class="flex items-center mt-1">
                                <input type="date" id="due-date" class="block w-full border border-gray-300 rounded-md p-2" value="2024-05-30">
                                <input type="checkbox" id="due-date-checkbox" class="ml-2">
                            </div>
                        </div>
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                            <select id="category" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                                <option value="none">(None)</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="reason" class="block text-sm font-medium text-gray-700">Reason</label>
                            <select id="reason" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                                <option value="none">(None)</option>
                            </select>
                        </div>
                        <div>
                            <label for="other-ref" class="block text-sm font-medium text-gray-700">Other Ref</label>
                            <input type="text" id="other-ref" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-700 mb-2">Payment Methods</h3>
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="border border-gray-300 p-2 text-left text-sm font-medium text-gray-700">Type</th>
                                    <th class="border border-gray-300 p-2 text-left text-sm font-medium text-gray-700">Name</th>
                                    <th class="border border-gray-300 p-2 text-left text-sm font-medium text-gray-700">Number</th>
                                    <th class="border border-gray-300 p-2 text-left text-sm font-medium text-gray-700">BSB/Exp Date</th>
                                    <th class="border border-gray-300 p-2 text-left text-sm font-medium text-gray-700">Cheque/Transaction No.</th>
                                    <th class="border border-gray-300 p-2 text-left text-sm font-medium text-gray-700">Status</th>
                                    <th class="border border-gray-300 p-2 text-left text-sm font-medium text-gray-700">GL Account</th>
                                    <th class="border border-gray-300 p-2 text-left text-sm font-medium text-gray-700">Type Code</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border border-gray-300 p-2">Cash</td>
                                    <td class="border border-gray-300 p-2"></td>
                                    <td class="border border-gray-300 p-2"></td>
                                    <td class="border border-gray-300 p-2"></td>
                                    <td class="border border-gray-300 p-2"></td>
                                    <td class="border border-gray-300 p-2"></td>
                                    <td class="border border-gray-300 p-2"></td>
                                    <td class="border border-gray-300 p-2"></td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="mt-2 ml-auto flex px-4 py-2 bg-blue-500 text-white rounded-md">New Payment Method</button>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-700 mb-2">Receipt Detail</h3>
                        <textarea class="mt-1 block w-full border border-gray-300 rounded-md p-2" rows="4"></textarea>
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                    <button class="px-4 py-2 bg-green-500 text-white rounded-md mx-2">Save</button>
                    <button class="px-4 py-2 bg-red-500 text-white rounded-md mx-2" onclick="hidePopupWithId('Account_Recipt')">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function opennote_R() {
        document.getElementById('Account_Recipt').classList.remove('hidden');
    }

    function closeModales_R(event) {
        if (event) {
            event.stopPropagation();
        }
        document.getElementById('Account_Recipt').classList.add('hidden');
    }

    function saveNotee() {
        // Implement the save functionality
        closeModales_R();
    }
</script>
