<x-app-layout>
    <x-slot name="header">
        {{ __('Create Organization') }}
    </x-slot>

    <div class="flex mb-2 space-x-2">
        <a href="{{ route('organizations.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-600 shadow-lg flex items-center">
            <i class="fas fa-arrow-left px-1"></i>
            <span>Back</span>
        </a>
        <button type="submit" form="organizationForm" class="bg-blue-500 text-white font-bold ml-2 py-2 px-4 rounded hover:bg-blue-600 shadow-lg flex items-center">
            <i class="fas fa-save px-1"></i>
            <span>Save</span>
        </button>
    </div>
    
    <div class="flex flex-col">
        <div class="w-full">
            <div class="bg-white shadow-md rounded-lg p-6">
                <form id="organizationForm" action="{{ route('organizations.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('components.message-error')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                            <input type="text" id="name" name="name" placeholder="Enter Name"
                                class="form-input mt-1 block w-full rounded-md border-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div>
                            <label for="industry_type" class="block text-gray-700 font-medium mb-2">Industry Type</label>
                            <select id="industry_type" name="industry_type" class="form-select mt-1 block w-full rounded-md border-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="" disabled selected>Select Type</option>
                                <option value="bank" {{ old('industry_type') == 'bank' ? 'selected' : '' }}>Bank</option>
                                <option value="school" {{ old('industry_type') == 'school' ? 'selected' : '' }}>School</option>
                                <option value="startup" {{ old('industry_type') == 'startup' ? 'selected' : '' }}>Startup</option>
                                <option value="government" {{ old('industry_type') == 'government' ? 'selected' : '' }}>Gov</option>
                            </select>
                        </div>

                        <div>
                            <label for="website" class="block text-gray-700 font-medium mb-2">Media</label>
                            <input type="text" id="website" name="website" placeholder="Enter Website"
                                class="form-input mt-1 block w-full rounded-md border-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div>
                            <label for="address" class="block text-gray-700 font-medium mb-2">Address</label>
                            <input type="text" id="address" name="address" placeholder="Enter Address"
                                class="form-input mt-1 block w-full rounded-md border-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div>
                            <label for="phone_number" class="block text-gray-700 font-medium mb-2">Phone Number</label>
                            <input type="text" id="phone_number" name="phone_number" placeholder="Enter Phone Number"
                                class="form-input mt-1 block w-full rounded-md border-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
 
                        <div>
                            <label for="contact" class="block text-gray-700 font-medium mb-2">Contact Person</label>
                            <input type="text" id="contact" name="contact" placeholder="Enter Contact Person"
                                class="form-input mt-1 block w-full rounded-md border-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div>
                            <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                            <input type="email" id="email" name="email" placeholder="Enter Email"
                                class="form-input mt-1 block w-full rounded-md border-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <div>
                            <label for="about" class="block text-gray-700 font-medium mb-2">About</label>
                            <textarea id="about" name="about" placeholder="Enter About"
                                class="form-textarea mt-1 block w-full rounded-md border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                        </div>

                        <div>
                            <label for="location" class="block text-gray-700 font-medium mb-2">Location</label>
                            <input type="text" id="location" name="location" placeholder="Enter Location"
                                class="form-input mt-1 block w-full rounded-md border-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <div>
                            <label for="offer_policy" class="block text-gray-700 font-medium mb-2">Offer Policy</label>
                            <textarea id="offer_policy" name="offer_policy" placeholder="Enter Offer Policy"
                                class="form-textarea mt-1 block w-full rounded-md border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                        </div>
                        <div>
                            <label for="founded" class="block text-gray-700 font-medium mb-2">Founded</label>
                            <input type="date" id="founded" name="founded" placeholder="Enter Founded Date"
                                class="form-input mt-1 block w-full rounded-md border-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <div>
                            <label for="hour_of_operation" class="block text-gray-700 font-medium mb-2">Hours of Operation</label>
                            <input type="text" id="hour_of_operation" name="hour_of_operation" placeholder="Enter Hours of Operation"
                                class="form-input mt-1 block w-full rounded-md border-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div >
                            <label for="image" class="block text-gray-700 font-medium mb-2">Image</label>
                            <div
                                class="relative w-full h-64 bg-gray-100 border-2 border-dashed border-gray-300 rounded-lg flex items-center justify-center cursor-pointer hover:bg-gray-50">
                                <input type="file" id="image" name="image"
                                    class="absolute inset-0 opacity-0 cursor-pointer" onchange="previewImage(event)">
                                <div id="imagePreview" class="flex items-center justify-center">
                                    <img id="imageDisplay" src="#" alt="Image Preview"
                                        class="hidden w-full h-full object-cover rounded-lg" style="height:300px">
                                    <span class="text-gray-400" id="placeholder">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-16 w-16 mx-auto text-gray-300" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 7V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V7M3 7L10 3M21 7L14 3M14 3V7M10 3V7M5 19H19" />
                                        </svg>
                                        Upload Image
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function previewImage(event) {
            const imagePreview = document.getElementById('imagePreview');
            const imageDisplay = document.getElementById('imageDisplay');
            const placeholder = document.getElementById('placeholder');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imageDisplay.src = e.target.result;
                    imageDisplay.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
</x-app-layout>
