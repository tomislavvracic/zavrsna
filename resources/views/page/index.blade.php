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
                                    
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Author
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Title
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
                            @foreach ($pages as $page)
                            <tr class="bg-white border-b ">
                                    <th class="px-6 py-4"><img style="max-width: 50px" src="/storage/{{$page->img}}" alt=""></th>
                                    <th class="px-6 py-4">{{ App\Models\User::where("id",$page->user_id)->pluck("first_name")->first() . " " . App\Models\User::where("id",$page->user_id)->pluck("last_name")->first()}}</th>
                                    <th class="px-6 py-4">{{$page->title}}</th>
                                    <th class="px-6 py-4">
                                        <a href="/pages/{{$page->id}}/edit" style="color: cadetblue"><i class="fas fa-edit"></i></a>
                                    </th>
                                    <th class="px-6 py-4">
                                        <form action="/pages/{{ $page->id }}">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" style="color: red"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </th>
                                </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>
                <div class="new-button-container">
                    <a href="/pages/create" >
                        <button class="new-button">New</button>
                    </a>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
