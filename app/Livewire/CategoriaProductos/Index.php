<?php

namespace App\Livewire\CategoriaProductos;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Producto\CategoriaProducto;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class Index extends Component
{
    use WithPagination;
    public $categoria;
    public $nombre_categoria;
    public $observacion;
    public $query = '';
    public $modal = false;

    public function render()
    {
        $categorias = CategoriaProducto::where('nombre_categoria', 'like', '%' . $this->query . '%')->paginate(10);
        return view('livewire.categoria-productos.index', ['categorias' => $categorias]);
    }

    public function crear()
    {
        try {
            $this->validate([
                'nombre_categoria' => 'required|string|max:255|unique:categoria_productos,nombre_categoria',
            ]);

            CategoriaProducto::create([
                'nombre_categoria' => $this->nombre_categoria,
                'observacion' => $this->observacion,
            ]);

            $this->reset(['nombre_categoria', 'observacion']);

            session()->flash('success', 'Categoría creada exitosamente.');
            $this->dispatch('cerrar-modal');

            return redirect()->route('mantenimientos.categorias.index');
        } catch (ValidationException $e) {
            session()->flash('error', 'Error de validación. Verifica los campos.');
        } catch (\Exception $e) {
            Log::error('Error al crear categoría: ' . $e->getMessage());
            session()->flash('error', 'Ocurrió un error inesperado al crear la categoría.');
        }
    }

    public function abrirEditar($id)
    {
        $categoria = CategoriaProducto::find($id);
        $this->categoria = $categoria;
        $this->nombre_categoria = $categoria->nombre_categoria;
        $this->observacion = $categoria->observacion;
        $this->modal = true;
    }

    public function cerrarEditar()
    {
        $this->reset(['modal', 'nombre_categoria', 'observacion']);
    }

    public function editar()
    {
        try {
            $this->validate([
                'nombre_categoria' => [
                    'required',
                    'string',
                    Rule::unique('categoria_productos', 'nombre_categoria')->ignore($this->categoria->id),
                ],
            ]);

            $this->categoria->update([
                'nombre_categoria' => $this->nombre_categoria,
                'observacion' => $this->observacion
            ]);

            $this->reset(['nombre_categoria', 'observacion']);


            session()->flash('success', 'Categoría actualizada exitosamente.');
            $this->modal = false;
        } catch (\Illuminate\Validation\ValidationException $e) {
            session()->flash('error', 'Error de validación. Verifica los campos.');
        } catch (\Exception $e) {
            Log::error('Error al actualizar la categoría: ' . $e->getMessage());
            session()->flash('error', 'Ocurrió un error inesperado al actualizar la categoría.');
        }
    }
}
