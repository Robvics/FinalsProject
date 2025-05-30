<?php

namespace App\Livewire\Admin;

use App\Models\Products as Prod;
use App\Models\Supplier;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Exception;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
#[Title('Dashboard')]

class Products extends Component
{
    use WithFileUploads;

    public $name;
    public $price;
    public $category;
    public $quantity;
    public $productImage;

    public $statusMessage;

    public $products;
    public $action='Add';
 
    public $product;

    public $suppliers;
    public $supplierID;

    public function mount(){
        $this->suppliers=Supplier::all();
    }


    
    public function render()
    {
        $this->products = Supplier::join('products','products.supplier_id','suppliers.id')
                        ->select(
                            'products.*',
                            'suppliers.name as supplier_name'
                        )
                        ->get();

        
        
        return view('livewire.admin.products');
    }

    public function saveproduct()
    {
        $this->validate([
            'supplierID' => 'required|exists:suppliers,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'quantity' => 'required|numeric|integer|min:0',
            'productImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        try {
            $filename = $this->product->file_path ?? null; // Keep existing filename if no new image
    
            if ($this->productImage) {
                $filename = $this->productImage->getClientOriginalName();
                $this->productImage->storeAs('product-images', $filename, 'public_uploads');
            }
    
            $productData = [
                'supplier_id' => $this->supplierID,
                'name' => $this->name,
                'price' => $this->price,
                'category' => $this->category,
                'quantity' => $this->quantity,
                'file_path' => $filename,
            ];
    
            if ($this->action == 'edit' && $this->product) {
                $this->product->update($productData);
            } else {
                Prod::create($productData);
            }
    
            $this->resetVariable();
            $this->action = 'Add'; // Reset action after saving
            $this->statusMessage = 'Product saved successfully!';
            $this->dispatch('productSaved'); // Example event
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function toggleEditProduct($id){
        $this->action='edit';

        $this->product = Prod::where('id',$id)->first();

        if($this->product){
        $this->name = $this->product->name;
        $this->price = $this->product->price;
        $this->category = $this->product->category;
        $this->quantity = $this->product->quantity;



        }
    }

    public function DeleteProduct($id){
        $this->product = Prod::where('id',$id)->first();
        if($this->product){
            $this->product->delete();

            $this->statusMessage = 'Product deleted successfully!';
    }
}

    public function resetVariable(){

    $this->name = null;
    $this->price = null;
    $this->category = null;
    $this->quantity = null;
    $this->product = null;
    $this->action = null;
    }
    public function scopeSearch($query, $term)
{
    return $query->where('products.name', 'like', "%$term%");
}
}

