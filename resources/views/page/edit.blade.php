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
                    <form method="POST" action="/pages/{{$page->id}}" enctype="multipart/form-data">
                        @csrf
                        @method("PATCH")
                        <div>
                            <x-label for="title" :value="__('Title')" />
            
                            <input id="title" value={{ $page->title}}
                            class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                            type="text" name="title"   :value="old('title')"/>
                        </div>
            
                        <div class="mt-4">
                            <x-label for="text" :value="__('Text')" />
            
                            <textarea id="text" 
                            class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                            type="text" name="text"  :value="old('text')" style="resize:none">{{$page->text}}</textarea>
                        </div>
            
                        <div class="mt-4">
                            <x-label for="image" :value="__('Image')" />
                            
                            <img src="/storage/{{ $page->img}}" style="max-width: 250px" alt="">
                            <input id="image"
                            class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                            type="file" name="image" />
                        </div>
            
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
