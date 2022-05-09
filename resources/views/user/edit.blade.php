<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="/users/{{$user->id}}">
                        @csrf
                        @method("PATCH")
                        <!-- First Name -->
                        <div>
                            <x-label for="first_name" :value="__('First Name')" />
            
                            <input id="first_name" value={{$user->first_name}} class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="first_name" :value="old('first_name')"  required autofocus />
                        </div>
            
                        <!-- LastName -->
                        <div>
                            <x-label for="last_name" :value="__('LastName')" />
            
                            <input id="last_name" value={{$user->last_name}} class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="last_name" :value="old('last_name')"  required autofocus />
                        </div>

                        <!-- Phone -->
                        <div>
                            <x-label for="phone" :value="__('Phone')" />
            
                            <input id="phone" value="{{$user->phone}}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="phone" :value="old('phone')"  required autofocus />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />
            
                            <input id="email" value={{$user->email}} class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="email" name="email" :value="old('email')" required />
                        </div>
                        @if (Auth::user()->role_id == 1)
                        <!-- Role -->
                        <div class="mt-4">
                            <x-label for="role" :value="__('Role')" />
            
                            <select id="role" class="block mt-1 w-full" type="role" name="role" value={{$user->role_id}} required >
                                <option value=2 @if($user->role_id == 2)
                                    selected
                                @endif>Admin</option>
                                <option value=3 @if($user->role_id == 3)
                                    selected
                                @endif>User</option>
                            </select>
                        </div>    
                        @endif
                        
            
                        {{-- <!-- Password -->
                        <div class="mt-4">
                            <x-label for="password" :value="__('Password')" />
            
                            <x-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="new-password" />
                        </div>
            
                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-label for="password_confirmation" :value="__('Confirm Password')" />
            
                            <x-input id="password_confirmation" class="block mt-1 w-full"
                                            type="password"
                                            name="password_confirmation" required />
                        </div> --}}
            
                        <div class="flex items-center justify-end mt-4">
                            <button onclick="history.back()">Cancel</button>

                            <x-button class="ml-4">
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
