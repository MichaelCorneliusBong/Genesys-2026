<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use App\Models\QuizHistory;

class QuizController extends Controller
{
    public function index()
    {
        return view('quiz.index');
    }

    public function play()
    {
        $cards = Card::whereNotNull('genesys_points')
            ->inRandomOrder()
            ->take(10)
            ->get();

        session([
            'quiz_card_ids' => $cards->pluck('id')->toArray(),
        ]);

        return view('quiz.play', compact('cards'));
    }

    public function result(Request $request)
    {
        $cards = Card::whereIn(
            'id',
            session('quiz_card_ids', [])
        )->get();

        $score = 0;

        foreach ($cards as $card) {

            $answer = $request->input('answer_'.$card->id);

            if ($answer == $card->genesys_points) {

                $score++;

            }

        }

        QuizHistory::create([

            'user_id' => auth()->id(),

            'quiz_type' => 'genesys_point',

            'score' => $score,

            'total_question' => $cards->count(),

        ]);

        return view('quiz.result', compact(
            'score',
            'cards'
        ));
    }
}