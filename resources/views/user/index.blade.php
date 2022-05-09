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

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 ">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Edit
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Delete
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr class="bg-white border-b ">
                                    <th class="px-6 py-4">{{$user->first_name . " " . $user->last_name}}</th>
                                    <th class="px-6 py-4">{{$user->email}}</th>
                                    @if ($user->role_id != 1)
                                        <th class="px-6 py-4">
                                            <a href="/users/{{$user->id}}/edit" style="color: cadetblue"><i class="fas fa-edit"></i></a>
                                        </th>
                                        <th class="px-6 py-4">
                                            <form action="/users/{{ $user->id }}">
                                            @csrf
                                            @method('DELETE')
                                                <button type="submit" style="color: red"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </th>    
                                    @endif
                                    
                                </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>
                <div class="new-button-container">
                    <a href="/users/create" >
                        <button class="new-button">New</button>
                    </a>
                </div>
                                    

            </div>
            </div>
        </div>
    </div>
</x-app-layout>
