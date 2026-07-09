<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $highestScore = $user->quizHistories()
            ->max('score');

        $totalQuiz = $user->quizHistories()
            ->count();

        $lastQuiz = $user->quizHistories()
            ->latest()
            ->first();

        return view(
            'profile.index',
            compact(
                'user',
                'highestScore',
                'totalQuiz',
                'lastQuiz'
            )
        );
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'password' => 'nullable|min:8|confirmed',
        ],[
            'name.required' => 'Name is required to be fill.',
            'password.min' => 'Password need to be at least 8 characters.',
            'password.confirmed' => "Confirmation password doesn't match.",
        ]);

        $user = Auth::user();

        $user->name = $request->name;

        if($request->filled('password')){
            $user->password = $request->password;
        }

        $user->save();

        return back()->with('success','Profile successfully updated.');
    }
}