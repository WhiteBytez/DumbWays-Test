<?php

use App\Candidate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CandidatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $candidateData = [
            [
                'name' => 'Nurhadi Aldo',
                'earned_vote' => 0
            ],
            [
                'name' => 'Umam',
                'earned_vote' => 0
            ]
        ];

        Candidate::insert($candidateData);
    }
}
