<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserInput;
use App\Services\TwitterService;

class UserInputController extends Controller
{
    protected $twitter;

    public function __construct(TwitterService $twitter)
    {
        $this->twitter = $twitter;
    }

    public function store(Request $request)
    {
        $request->validate([
            'input_text' => 'required|string|max:255',
        ]);

        UserInput::create([
            'input_text' => $request->input_text,
        ]);

        return redirect()->back()->with('success', 'Input successfully saved!');
    }

    public function index()
    {
        $inputs = UserInput::all();
        $tweets = $this->twitter->searchTweets('politics'); // Contoh pencarian
        return view('user-inputs.index', compact('inputs', 'tweets'));
    }
}
