<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Item;


class ItemList extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $title, $description, $image , $item_id;

    public function render()
    {
        $items=Item::orderBy('id','DESC')->paginate(5);

        return view('livewire.item-list', ['items'=>$items]);
    }

    public function saveItem()
    {  
        $validateData = $this->validate([
            'title'=> 'required',
           'description'=>'required',
           'image' => 'image', 

        ]);
        $this->image->store('images');
        Item::create([
            'title'=>$this->title,
            'description'=>$this->description,
        ]);
        session()->flash('message','Item Created successfully');
        $this->resetInput();

        
    }

    public function resetInput()
    {
        $this->title='';
        $this->description='';
        $this->image='';


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


        }
        else{
            return redirect()->to('/items');
        }
      

    }
    public function UpdateItem()
    {
        $validateData = $this->validate([
            'title'=> 'required',
           'description'=>'required',
           'image' => 'image', 

        ]);

        Item::where('id',$this->item_id)->update([
            'title'=>$this->title,
            'description'=>$this->description,
            'image'=>$this->image,
        ]);
        session()->flash('message','Item updated successfully');
        $this->resetInput();
    }

    public function deleteItem(int $item_id)
    {
      $this->item_id = $item_id;


    }
    public function itemDestroy()
    {
       $item = Item::find($this->item_id)->delete();
       session()->flash('message','Item Deleted Successfully');
       $this->resetInput();
    }
}
