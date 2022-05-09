<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <div class="filter-container">
                <div>Now showing</div>
                <select name="filter" id="filter" onchange="window.location = '/' + this.value">
                    <option value="">All</option>
                    @foreach ($users as $user)
                        <option value="{{$user->id}}">{{ $user->first_name . " " . $user->last_name}}</option>
                    @endforeach
                </select>
                <div>News</div>
            </div>
        </div>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($pages as $page)
                <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="page-container">
                            <div class="img-container">
                                <img src="storage/{{$page->img}}" alt="">
                            </div>
                            <div class="text-container">
                                <div class="header">{{$page->title}}</div>
                                <div class="text">{{$page->text}}</div>
                                <div class="author">Author: {{ App\Models\User::where("id",$page->user_id)->pluck("first_name")->first() . " " . App\Models\User::where("id",$page->user_id)->pluck("last_name")->first()}}</div>
                            </div>
                        </div>
                    </div>
                </div>    
            @endforeach
            {{ $pages->links()}}
        </div>
    </div>
</x-app-layout>
