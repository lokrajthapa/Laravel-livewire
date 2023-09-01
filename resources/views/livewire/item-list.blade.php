<div>
    @include('livewire.itemModal')
  <div>
    @if( session()->has('message'))
       
        <h5 class="bg-green-400 text-green-900 flex items-center  justify-center">
            {{  session('message') }}
        </h5>

    @endif
    <div class="bg-gray-400 text-black text-2xl flex items-center justify-between py-1">  
         Welcome to Groceries list
         <button data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            Add New
          </button>
          

    </div>
    {{-- </div>
       
    </div> --}}
  </div>

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
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
                    {{ $item->title }}
                </th>
                <td class="px-6 py-4">
                    {{ $item->description }}
                </td>
                <td class="px-6 py-4">
                       Image
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
