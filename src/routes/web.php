<?php

use Illuminate\Support\Facades\Route;
use App\Models\Archetype;
use App\Models\Deck;
use App\Models\Guide;
use App\Models\Article;
use App\Models\TierList;
use App\Models\Bookmark;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/decks', function () {

    $archetypes = Archetype::withCount('decks')
        ->orderBy('name')
        ->get();

    return view('decks.archetypes', compact('archetypes'));

})->name('decks.index');

Route::get('/deck/{deck:slug}', function (Deck $deck) {

    $deck->load([
        'archetype',
        'cards',
    ]);

    return view('decks.show', compact('deck'));

})->name('decks.show');

Route::get('/decks/{archetype:slug}', function (Archetype $archetype) {

    $decks = $archetype->decks()
        ->latest()
        ->paginate(12);

    return view('decks.list', compact(
        'archetype',
        'decks'
    ));

})->name('decks.list');

Route::get('/guides', function () {

    $guides = Guide::latest()->paginate(12);

    return view('guides.index', compact('guides'));

})->name('guides.index');

Route::get('/articles', function () {

    $articles = Article::latest()->paginate(12);

    return view('articles.index', compact('articles'));

})->name('articles.index');

Route::get('/tier-lists', function () {

    $tierLists = TierList::latest()->paginate(12);

    return view('tierlists.index', compact('tierLists'));

})->name('tierlists.index');

Route::middleware('guest')->group(function () {

    Route::get('/login',
        [AuthController::class,'showLogin']
    )->name('login');

    Route::post('/login',
        [AuthController::class,'login']
    );

    Route::get('/register',
        [AuthController::class,'showRegister']
    )->name('register');

    Route::post('/register',
        [AuthController::class,'register']
    );

});

Route::post('/logout',
    [AuthController::class,'logout']
)
->middleware('auth')
->name('logout');

Route::post('/bookmark/{deck}', function (Deck $deck) {

    $bookmark = Bookmark::where([
        'user_id' => auth()->id(),
        'deck_id' => $deck->id,
    ])->first();

    if ($bookmark) {

        $bookmark->delete();

        return back()->with(
            'success',
            'Bookmark berhasil dihapus.'
        );

    }

    Bookmark::create([

        'user_id' => auth()->id(),

        'deck_id' => $deck->id,

    ]);

    return back()->with(
        'success',
        'Deck berhasil dibookmark.'
    );

})
->middleware('auth')
->name('bookmark.store');

Route::get('/bookmarks', function () {

    $bookmarks = Bookmark::with('deck.archetype')
        ->where('user_id', auth()->id())
        ->latest()
        ->get();

    return view('bookmarks.index', compact('bookmarks'));

})
->middleware('auth')
->name('bookmarks.index');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'index'])
        ->name('profile');

    Route::post('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

});

Route::middleware('auth')->group(function () {

    Route::get('/quiz', [QuizController::class, 'index'])
        ->name('quiz.index');

    Route::get('/quiz/start', [QuizController::class, 'start'])
        ->name('quiz.start');

    Route::post('/quiz/submit', [QuizController::class, 'submit'])
        ->name('quiz.submit');

});