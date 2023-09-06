<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckOwnership;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::prefix('v1')->group(function () {



    // Declare unauthenticated routes
    Route::group(['middleware' => 'guest'], function () {

        //Heartbeat route
        Route::any('/', function () {
            return response()->json(['message' => 'Welcome to Kulture Api'], 200);
        })->name('welcome');
        // Route::post('/upload', [BeatController::class, 'upload'])->name('beats.upload');
        Route::post('/register', [AuthController::class, 'register'])->name('register');

        Route::post('/signin', [AuthController::class, 'signin'])->name('signin');

        Route::post('/signout', [AuthController::class, 'signout'])->name('signout');

        Route::get('/genre', [GenreController::class, 'index'])->name('genre.index');

        Route::post('/genre/{id}', [GenreController::class, 'show'])->name('genre.show');

        Route::get('/beats/{id}', [BeatController::class, 'show'])->name('beats.show');

        Route::get('/beats', [BeatController::class, 'index'])->name('beats.index');

        Route::post('users/{id}', [UserController::class, 'show'])->name('show-user');

        Route::get('/producers', [ProducerController::class, 'index'])->name('producers.index');

        Route::post('/producers/{id}', [ProducerController::class, 'show'])->name('producers.show');

        Route::get('/artistes', [ArtisteController::class, 'index'])->name('artistes.index');

        Route::post('/artistes/{id}', [ArtisteController::class, 'show'])->name('artistes.show');

        Route::prefix('trending')->group(function () {
            Route::get('/beats', [BeatController::class, 'trending'])->name('beats.trending');
            Route::get('/producers', [ProducerController::class, 'trendingProducers'])->name('producers.trending');
            Route::get('/genres', [GenreController::class, 'trending'])->name('genres.trending');
        });
    });
    //Authentication







    // Declare authenticated routes
    Route::group(['middleware' => 'auth:api'], static function () {

        //Admin routes
        Route::prefix('admin')->group(function () {

            //Admin- Genre routes
            Route::prefix('genre')->group(function () {

                Route::post('/create', [GenreController::class, 'store'])->name('genre.store');
                Route::post('/update', [GenreController::class, 'update'])->name('genre.update');
                Route::post('/delete', [GenreController::class, 'delete'])->name('genre.delete');
            });

            Route::prefix('subscription')->group(function () {
                Route::post('/create', [SubscriptionController::class, 'store'])->name('subscription.store');
                Route::get('', [SubscriptionController::class, 'index'])->name('subscription.index');
                Route::post('/{id}', [SubscriptionController::class, 'show'])->name('subscription.show');
            });

           
        });

        //User routes
        Route::group(['prefix' => 'users'],  static function () {
            Route::get('/', [UserController::class, 'index'])->name('get-users');


            Route::group(['middleware' => 'isOwner:user'], function () {
                Route::put('/{id}', [UserController::class, 'update'])->name('user-update-self');
                Route::delete('/{id}', [UserController::class, 'destroy'])->name('users-delete-self');
            });
        });


        Route::prefix('beats')->middleware(['role:producer'])->group(function () {
            Route::post('/upload', [BeatController::class, 'upload'])->name('beats.upload');

            Route::group(['middleware' => 'isOwner:beat'], function () {
                Route::put('/{id}', [BeatController::class, 'update'])->name('beats.update');
                Route::delete('/{id}', [BeatController::class, 'destroy'])->name('beats.delete');
            });
        });
        //filter by genre
        Route::get('/beats/filter', [BeatController::class, 'filterByGenre'])->name('beats.filter');

        //filter by price
        Route::get('/beats/filter-by-price', [BeatController::class, 'filterByPrice'])->name('beats.filterByPrice');

        //search by beat title
        Route::get('/beats/search', [BeatController::class,'searchByTitle'])->name('beats.search');


        Route::prefix('downloads')->group(function () {
            Route::get('/beats/{id}', [BeatController::class, 'download'])->name('beats.download');
        });
    });
});