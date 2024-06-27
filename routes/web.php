<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommandController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\VendeurController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// home
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::post('/panier', [HomeController::class, 'ajouterPanier'])->name('ajouterPanier');
Route::put('/panier/augmenter/{id}', [HomeController::class, 'augmenterStockPanier'])->name('augmenterStockPanier');
Route::put('/panier/deminuer/{id}', [HomeController::class, 'deminuerPanier'])->name('deminuerPanier');
Route::delete('/panier/{id}', [HomeController::class, 'destroyPanier'])->name('destroyPanier');

// Admin

Route::get('/register', [AdminController::class, 'registerForm'])->name('admins.registerForm');
Route::post('/register', [AdminController::class, 'register'])->name('admins.register');
Route::get('/login', [AdminController::class, 'loginForm'])->name('admins.loginForm');
Route::post('/login', [AdminController::class, 'login'])->name('admins.login');
Route::post('/logout', [AdminController::class, 'logout'])->name('admins.logout');
Route::get('/admins/{id}', [AdminController::class, 'indexAllAdmin'])->name('admins.indexAllAdmin');

// Clients
Route::get('/register/client', [ClientController::class, 'registerForm'])->name('clients.registerForm');
Route::post('/register/client', [ClientController::class, 'register'])->name('clients.register');
Route::get('clients/login', [ClientController::class, 'loginForm'])->name('clients.loginForm');
Route::post('clients/login', [ClientController::class, 'login'])->name('clients.login');
Route::get('clients/logout', [ClientController::class, 'logout'])->name('clients.logout');
Route::get('clients/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::put('clients/{id}', [ClientController::class, 'update'])->name('clients.update');

// Vendeurs
Route::get('/register', [VendeurController::class, 'registerForm'])->name('vendeurs.registerForm');
Route::post('/register', [VendeurController::class, 'register'])->name('vendeurs.register');
Route::get('/login/vendeur', [VendeurController::class, 'loginForm'])->name('vendeurs.loginForm');
Route::post('/login/vendeur', [VendeurController::class, 'login'])->name('vendeurs.login');
Route::get('/logout/vendeur', [VendeurController::class, 'logout'])->name('vendeurs.logout');

// categorie
Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategorieController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategorieController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}/edit', [CategorieController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}', [CategorieController::class, 'update'])->name('categories.update');
Route::delete('/categories/{id}', [CategorieController::class, 'destroy'])->name('categories.destroy');

// Produit
Route::get('/produits', [ProduitController::class, 'index'])->name('produits.index');
Route::get('/produits/create', [ProduitController::class, 'create'])->name('produits.create');
Route::post('/produits', [ProduitController::class, 'store'])->name('produits.store');
Route::get('/produits/{id}/edit', [ProduitController::class, 'edit'])->name('produits.edit');
Route::put('/produits/{id}', [ProduitController::class, 'update'])->name('produits.update');
Route::delete('/produits/{id}', [ProduitController::class, 'destroy'])->name('produits.destroy');

// Command
Route::get('/commands', [CommandController::class, 'index'])->name('commands.index');
Route::get('/commands/{id}/indexContenue', [CommandController::class, 'indexContenue'])->name('commands.indexContenue');
Route::post('/commands', [CommandController::class, 'passCommand'])->name('commands.passCommand');

// Temoignage

Route::get('/temoignages', [CommandController::class, 'indexTemoignage'])->name('temoignages.index');
Route::get('/temoignages', [CommandController::class, 'storeTemoignage'])->name('temoignages.store');
Route::post('/temoignages/{id}', [CommandController::class, 'destroyTemoignage'])->name('temoignages.destroy');
