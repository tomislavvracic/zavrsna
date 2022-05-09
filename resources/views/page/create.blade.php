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
                    <form method="POST" action="/pages/store" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <x-label for="title" :value="__('title')" />
            
                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                        </div>
            
                        <div class="mt-4">
                            <x-label for="text" :value="__('text')" />
            
                            <textarea id="text" class="block mt-1 w-full shadow-sm sm:rounded-lg" type="text" name="text" :value="old('text')" required style="resize: none"></textarea>
                        </div>
            
                        <div class="mt-4">
                            <x-label for="image" :value="__('image')" />
            
                            <x-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" required />
                        </div>
            
                        <div class="flex items-center justify-end mt-4">
                            <button onclick="history.back()">Cancel</button>
                
                            <x-button class="ml-4">
                                {{ __('Create') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
