<?php

namespace App\Http\Livewire;

use App\Models\Kategori;
use App\Models\Subkategori;
use Livewire\Component;

class Select extends Component
{
    public $category;
    public $sub = NULL;
    public $subcategory;

    public function mount()
    {
        $this->category = Kategori::all();
        $this->subcategory = collect();
    }
    public function render()
    {
        return view('livewire.select')->extends('dashboard.main_dashboard.product');
    }

    public function updateSelect($categories)
    {
        if (!is_null($categories)) {
            $this->subcategory = Subkategori::where('kategori_id', $categories)->get();
        }
    }
}
