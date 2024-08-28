<div>

    <!-- Button to open modal (left aligned) -->
<button onclick="toggleModal()" class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-600 mb-4">Create User</button>
{{-- <button onclick="toggleModal('roleModal')" class="bg-green-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-green-600 mb-4">Assign Roles</button> --}}
    
<!-- Modal -->
<div id="userModal" class="modal fixed inset-0 flex items-center justify-center z-50 opacity-0 invisible transition-opacity duration-300">
    <div class="modal-overlay absolute inset-0 bg-black opacity-50" onclick="toggleModal()"></div>
    <div class="modal-content relative bg-white p-8 mx-4 max-w-4xl mx-auto rounded-lg shadow-lg overflow-y-auto max-h-screen">
        <!-- Close Button -->
        <button onclick="toggleModal()" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        <h2 class="text-2xl font-semibold mb-6 text-center">Create New User</h2>
        
        <!-- User Creation Form -->
        <form wire:submit.prevent="save" class="space-y-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" id="username" wire:model.defer="name" class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 sm:text-sm" required>
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" wire:model.defer="email" class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 sm:text-sm" required>
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" wire:model.defer="password" class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 sm:text-sm" required>
                    @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" id="password_confirmation" wire:model.defer="password_confirmation" class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 sm:text-sm">
                    @error('password_confirmation') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Role Dropdown -->
            <div>
                <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                <select id="role" wire:model.defer="role" class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 sm:text-sm" required>
                    <option value="">Select a role</option>
                    @foreach($allRoles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                @error('role') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Permissions Checkboxes -->
            <div>
                <label for="permissions" class="block text-sm font-medium text-gray-700">Permissions</label>
                <div id="permissions" class="space-y-2 max-h-40 overflow-y-auto border border-gray-300 rounded-lg p-2">
                    @foreach($allPermissions as $permission)
                        <div class="flex items-center">
                            <input type="checkbox" wire:model.defer="permissions" value="{{ $permission->name }}" class="mr-2">
                            <label class="text-sm">{{ $permission->name }}</label>
                        </div>
                    @endforeach
                </div>
                @error('permissions') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-end space-x-3">
                <button type="button" onclick="toggleModal()" class="bg-gray-300 text-gray-700 px-5 py-2 rounded-lg shadow-md hover:bg-gray-400">Cancel</button>
                <button type="submit" class="bg-blue-500 text-white px-5 py-2 rounded-lg shadow-md hover:bg-blue-600">Create</button>
            </div>
        </form>
    </div>
</div>

      <!-- Role Assignment Modal -->
      {{-- <div id="roleModal" class="modal fixed inset-0 flex items-center justify-start z-50 opacity-0 invisible">
        <div class="modal-overlay absolute inset-0" onclick="toggleModal('roleModal')"></div>
        <div class="modal-content relative p-8 mx-4 max-w-3xl mx-auto rounded-lg bg-white">
            <!-- Close Button -->
            <button onclick="toggleModal('roleModal')" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <h2 class="text-2xl font-semibold mb-6 text-center">Assign Roles</h2>
            
            <!-- Role Assignment Form -->
            <form wire:submit.prevent="assignRoles" class="space-y-6">
                <div>
                    <label for="user" class="block text-sm font-medium text-gray-700">Select User</label>
                    <select id="user" wire:model.defer="user_id" class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 sm:text-sm">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="roles" class="block text-sm font-medium text-gray-700">Assign Roles</label>
                    <div id="roles" class="max-h-40 overflow-y-auto border border-gray-300 rounded-lg p-4">
                        @foreach($roles as $role)
                            <div class="flex items-center mb-2">
                                <input type="checkbox" id="role_{{ $role->id }}" wire:model.defer="selectedRoles" value="{{ $role->id }}" class="form-checkbox h-4 w-4 text-blue-600">
                                <label for="role_{{ $role->id }}" class="ml-2 block text-sm text-gray-700">{{ $role->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    @error('selectedRoles') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="toggleModal('roleModal')" class="bg-gray-300 text-gray-700 px-5 py-2 rounded-lg shadow-md hover:bg-gray-400">Cancel</button>
                    <button type="submit" class="bg-blue-500 text-white px-5 py-2 rounded-lg shadow-md hover:bg-blue-600">Assign</button>
                </div>
            </form>
        </div>
    </div> --}}


     <!-- Flash Messages -->
    @if (session()->has('message'))
        <div id="error-message" class="bg-green-500 text-white p-3 rounded-lg mb-4 relative">
            {{ session('message') }}
            <button onclick="dismissMessage()" class="absolute top-1 right-1 text-white">
                &times;
            </button>
        </div>
    @endif
 
    @if (session()->has('error'))
        <div id="error-message" class="bg-red-500 text-white p-3 rounded-lg mb-4 relative">
            {{ session('error') }}
            <button onclick="dismissMessage()" class="absolute top-1 right-1 text-white">
                &times;
            </button>
        </div>
    @endif
    <!-- User Table -->
    <div class="flex-1 w-full max-w-6xl mx-auto mt-8">
        <h2 class="text-2xl font-bold mb-4">Users</h2>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Updated At</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($users as $user)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $user->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->created_at->format('Y-m-d H:i') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->updated_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

   

</div>
