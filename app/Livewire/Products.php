<?php

namespace App\Livewire;

use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Product;

class Products extends Component
{
    public $products;

    #[Locked]
    public $product_id;

    #[Validate('required')]
    public $name = '';

    #[Validate('required')]
    public $description = '';

    public $isEdit = false;

    public $title = 'Add New Product';

    public function resetFields()
    {
        $this->title = 'Add New Product';

        $this->reset('name', 'description');

        $this->isEdit = false;
    }

    public function save()
    {
        $this->validate();

        Product::updateOrCreate(['id' => $this->product_id], [
            'name' => $this->name,
            'description' => $this->description,
        ]);

        session()->flash('message', $this->product_id ? 'Product is updated.' : 'Product is added.');

        $this->resetFields();
    }

    public function edit($id)
    {
        $this->title = 'Edit Product';

        $product = Product::findOrFail($id);

        $this->product_id = $id;

        $this->name = $product->name;

        $this->description = $product->description;

        $this->isEdit = true;
    }

    public function cancel()
    {
        $this->resetFields();
    }

    public function delete($id)
    {
        Product::find($id)->delete();

        session()->flash('message', 'Product is deleted.');
    }

    public function render()
    {
        $this->products = Product::latest()->get();

        return view('livewire.products');
    }
}