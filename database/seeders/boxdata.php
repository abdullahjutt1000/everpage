<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class boxdata extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('boxdata')->insert([
            [
                'questions' => 'Where are you from?',

            ],
            [
                'questions' => 'What was it like growing up there? What are some of your best memories from childhood?'
            ],
            [
                'questions' => 'Some of the words my friends would use to describe me are _____________.'
            ],
            [
                'questions' => "The accomplishments I'm most proud of are _____________."
            ],
            [
                'questions' => 'What are some of the most important values to live by?'
            ],
            [
                'questions' => 'I wish people understood that _____________.'
            ],
            [
                'questions' => 'In my free time, I like to _____________.'
            ],
            [
                'questions' => 'If I could time travel to the future and tell future generations something important about how to live life, I would say _____________.'
            ],
        ]);
    }
}