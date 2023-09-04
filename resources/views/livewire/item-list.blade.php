<div>
    <div class="">
          
        <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <a class="flex items-center">
                
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Livewire Work</span>
                </a>
                <div class="flex items-center lg:order-2">
                    
                    <a href="{{ route('logout') }}" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Logout</a>
                  
                </div>
                <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li>
                            <a href="#" class="block py-2 pr-4 pl-3 text-white rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 dark:text-white" aria-current="page"> Dashboard Section </a>
                        </li>
                      
                        
                        
                    </ul>
                </div>
            </div>
        </nav>

    </div>


        <div class="my-8 mx-4">  


            @include('livewire.itemModal')
        <div>
            @if( session()->has('message'))
            
                <div class="bg-green-400 text-green-900 flex items-center  justify-center mx-2 my-4 py-4 text-large font-semibold">
                    {{  session('message') }}
                </div>

            @endif
            <div class="bg-gray-400 text-black flex items-center justify-between py-2 px-4 text-2xl font-bold">  
                Welcome to Groceries list
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    {{-- <input type="search" wire:model="search" id="search" class="block w-full  pl-8 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=" Search for Name " > --}}
                    
                </div>
                <button data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                    Add New
                </button>
                

            </div>
        
        </div>

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Id
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Item name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item )

                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->id }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->title }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->description }}
                            </td>
                            <td class="px-6 py-4">
                                <img class="h-20 w-20 " src="{{asset('storage')}}/{{$item->image}}" />
                            </td>
                        
                            <td class="px-6 py-4 flex gap-x-2">

                                <button type="button" wire:click="editItem( {{$item->id}} )" data-modal-target="UpdateItemModal" data-modal-toggle="UpdateItemModal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                    Edit
                                </button>
                                <button type="button" wire:click="deleteItem( {{$item->id}} )" data-modal-target="DeleteItemModal" data-modal-toggle="DeleteItemModal"  class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" type="button">
                                    Delete
                                </button>
                                
                                {{-- <button type="button" class="font-medium text-red-600 dark:text-red-500 hover:underline  m-1"> Delete </button> --}}
                            </td>
                        </tr>

                            
                        @empty
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            No records found
                        </tr>
                            
                        @endforelse

                    
                    
                    </tbody>
                </table>
                <div class="">

                    {{ $items->links() }}
                </div>


            

        </div>      
</div>
