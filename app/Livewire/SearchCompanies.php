<?php
namespace App\Livewire;
use App\Models\Empresas;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class SearchCompanies extends Component
{
    use WithPagination;

    public $search = '';

    #[On('searchChanged')]
    public function updateSearch($value)
    {
        $this->search = $value;
        $this->resetPage();
    }

    public function render()
    {
        $search = $this->search;
        $query = Empresas::query();

        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('nombre', 'LIKE', "%{$search}%")
                  ->orWhere('nit', 'LIKE', "%{$search}%");
            });
        }

        $empresas = $query->paginate(5);

        return view('livewire.search-companies', compact('empresas'));
    }
}
