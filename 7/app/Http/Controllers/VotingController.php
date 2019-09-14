<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidate;

class VotingController extends Controller
{

    public function index()
    {
        $candidateList = Candidate::all();
        return view('home', compact('candidateList'));
    }

    public function vote(Request $request)
    {
        $candidate = Candidate::where('id', $request->id);
        $addVote = $candidate->increment('earned_vote');
        $returnData = [
            'success' => false
        ];

        if ($addVote) {
            $returnData['success'] = true;
            $returnData['count'] = $candidate->get('earned_vote');
        }

        return response()->json($returnData);
    }
}
