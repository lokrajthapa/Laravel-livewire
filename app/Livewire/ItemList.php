<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class ItemList extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $title, $description, $image , $item_id, $old_image;
    public $search = '';

    public function render()
    {
       
        $items=Item::where('title', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(5);

        return view('livewire.item-list', ['items'=>$items]);
    }

    public function saveItem()
    {  
        $validateData = $this->validate([
            'title'=> 'required',
           'description'=>'required',
           'image' => 'image', 

        ]);

       

      $user = Auth::user();
      $canStore=$user->hasRole('admin') || $user->hasRole('editor');
       if($canStore==TRUE)
       {

        $filename="";
        if($this->image)
        {
            $filename=$this->image->store('images','public');
        }
        else 
        {
            $filename=Null;
        }

        

        Item::create([
            'title'=>$this->title,
            'description'=>$this->description,
            'image'=> $filename,
        ]);
        session()->flash('message','Item Created successfully');
        $this->resetInput();



       }
       else
       {      
          session()->flash('message','you are not allowed to Created new Item');
       }

       
       

        
    }

    public function resetInput()
    {
        $this->title='';
        $this->description='';
        $this->image='';
        $this->old_image='';


    }
    public function closeModal()
    {
        $this->resetInput();
    }

    public function editItem(int $item_id)
    {
     

            $item = Item::find($item_id);
            if($item)
            {
             $this->item_id=$item->id;
             $this->title=$item->title;
             $this->description=$item->description;
             $this->old_image=$item->image;
            }
            else{
                return redirect()->to('/items');
            }


            
       
        


     
      

    }
    public function UpdateItem()
    {
        $user = Auth::user();
        $canStore=$user->hasRole('admin') || $user->hasRole('editor');
         if($canStore==TRUE)
         {
            $validateData = $this->validate([
                'title'=> 'required',
                'description'=>'required',
                'image' => 'image | nullable', 
            ]);
    
        
    
    
            
          
            $filename="";
            if($this->image)
            {
                $filename=$this->image->store('images','public');
            }
            else 
            {
                $filename=$this->old_image;
            }
    
           
            
            Item::where('id',$this->item_id)->update([
                'title'=>$this->title,
                'description'=>$this->description,
                'image'=> $filename,
            ]);
            session()->flash('message','Item updated successfully');
            $this->resetInput();
         }
         else
         {
            session()->flash('message','you are not allowed to Edit Item');
         }
      
       
    }

    public function deleteItem(int $item_id)
    {
      $this->item_id = $item_id;


    }
    public function itemDestroy()
    {

        $user = Auth::user();
        $canStore=$user->hasRole('admin');
         if($canStore==TRUE)
         {
            Item::find($this->item_id)->delete();
            session()->flash('message','Item Deleted Successfully');
            $this->resetInput();
         }
         else{
            session()->flash('message','you are not allowed to Delete Item');

         }

    }
}
