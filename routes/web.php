<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Livewire\Dashboard\Dashboard;
use App\Livewire\Roles\Index as RolesIndex;
use App\Livewire\Permisos\Index as PermisosIndex;
use App\Livewire\Usuarios\Index as UsuariosIndex;
use App\Livewire\Usuarios\Crear as UsuariosCrear;
use App\Livewire\Usuarios\Detalles as UsuariosDetalles;
use App\Livewire\CategoriaProductos\Index as CategoriaIndex;
use App\Livewire\Proveedores\Index as ProveedorIndex;
use App\Livewire\Departamentos\Index as DepartamentoIndex;
use App\Livewire\Productos\Index as ProductosIndex;
use App\Livewire\Productos\Crear as ProductosCrear;
use App\Livewire\Productos\Detalles as ProductosDetalles;
use App\Livewire\Pedidos\Index as PedidosIndex;
use App\Livewire\Pedidos\Crear as PedidosCrear;
use App\Livewire\Pedidos\AddProducto as PedidosAddProductos;
use App\Livewire\Pedidos\Detalles as PedidosDetalles;
use App\Livewire\Pedidos\Editar as PedidosEditar;
use App\Livewire\Pedidos\Entregas as PedidosEntregas;
use App\Livewire\Pedidos\CrearEntregas as PedidosEntregasCrear;
use App\Livewire\Pedidos\AddProductosEntrega as PedidosAddProductosEntregas;
use App\Livewire\Pedidos\DetallesEntrega as PedidosDetallesEntregas;
use App\Livewire\Inventarios\Index as InventariosIndex;
use App\Livewire\Inventarios\Detalles as InventariosDetalles;

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', [AuthController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/loginv', [AuthController::class, 'loginUser'])->name('loginUser');
Route::post('/logout', [AuthController::class, 'logout'])->name('logOut');


Route::middleware('auth')->group(function () {
Route::get('/inicio', Dashboard::class)->name('inicio');
Route::get('/roles', RolesIndex::class)->name('seguridad.roles.index');
Route::get('/permisos', PermisosIndex::class)->name('seguridad.permisos.index');


Route::get('/usuarios', UsuariosIndex::class)->name('usuarios.index');
Route::get('/usuarios/crear', UsuariosCrear::class)->name('usuarios.crear');
Route::get('/usuarios/detalles/{id}', UsuariosDetalles::class)->name('usuarios.detalles');
Route::get('/proveedor', ProveedorIndex::class)->name('proveedor.index');


// Mantenimiento
Route::get('/mantenimiento/categoria-productos', CategoriaIndex::class)->name('mantenimientos.categorias.index');
route::get('/mantenimiento/departamentos', DepartamentoIndex::class)->name('mantenimientos.departamentos.index');
// Productos
Route::get('/productos', ProductosIndex::class)->name('productos.index');
Route::get('/productos/crear', ProductosCrear::class)->name('productos.crear');
Route::get('/productos/detalles/{id}', ProductosDetalles::class)->name('productos.detalles');


// Pedidos
Route::get('/pedidos', PedidosIndex::class)->name('pedidos.index');
Route::get('/pedidos/crear', PedidosCrear::class)->name('pedidos.crear');
Route::get('/pedidos/crear/agregar-productos/{numero_pedido}/{proveedor_id}', PedidosAddProductos::class)->name('pedidos.agregar.productos');
Route::get('/pedidos/detalles/{id}', PedidosDetalles::class)->name('pedidos.detalles');
Route::get('/pedidos/editar/{numero_pedido}/{proveedor_id}', PedidosEditar::class)->name('pedidos.editar');

Route::get('/pedidos/entregas', PedidosEntregas::class)->name('pedidos.entregas');
Route::get('/pedidos/entregas/crear', PedidosEntregasCrear::class)->name('pedidos.entregas.crear');
Route::get('/pedidos/entregas/crear/agregar-productos/{numero_pedido}/{tipo}/{factura}', PedidosAddProductosEntregas::class)->name('pedidos.entregas.agregar.productos');
Route::get('/pedidos/entregas/detalles/{id}', PedidosDetallesEntregas::class)->name('pedidos.entregas.detalles');

// Inventario
Route::get('/Inventarios', InventariosIndex::class)->name('inventarios.index');
Route::get('/Inventarios/detalles/{id}', InventariosDetalles::class)->name('inventarios.detalles');
});

