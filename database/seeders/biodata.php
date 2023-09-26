<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class biodata extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('biodata')->insert([
            [
                "biodata" => "I grew up in a small town called f. It was a close-knit community where everyone knew each other and looked out for one another. Growing up there was a unique experience, filled with simplicity and a strong sense of belonging.

                Some of my best memories from childhood revolve around the outdoors. I spent countless hours exploring the nearby forests and playing in the fields with my friends. We would build forts, climb trees, and have epic adventures that seemed to last forever. Those carefree days taught me the importance of imagination and embracing the beauty of nature.
                
                If you were to ask my friends how they would describe me, some of the words they would use are kind-hearted, compassionate, and determined. I strive to treat others with respect and empathy, always willing to lend a helping hand when needed. My determination drives me to set goals and work hard to achieve them, never giving up even in the face of challenges.
                
                One of the accomplishments I am most proud of is graduating at the top of my class in high school. It required countless hours of studying and dedication, but it taught me the value of hard work and perseverance. Another accomplishment I hold dear is volunteering at a local shelter for several years. Being able to make a positive impact on the lives of those less fortunate brought me immense joy and fulfillment.
                
                To me, some of the most important values to live by are integrity, kindness, and gratitude. Integrity means staying true to oneself and holding onto moral principles even when faced with difficult choices. Kindness is essential in building meaningful connections and spreading positivity in the world. And gratitude reminds us to appreciate the little things in life and be thankful for what we have.
                
                I wish people understood that everyone has their own struggles and battles they are fighting. It's easy to judge someone based on surface-level observations, but taking the time to understand their story can change our perspective entirely. Empathy and compassion go a long way in creating a more understanding and inclusive society.
                
                In my free time, I like to indulge in creative pursuits. Whether it's painting, writing, or playing an instrument, these activities allow me to express myself and find solace in the midst of a busy world. I also enjoy spending time with loved ones, exploring new places, and immersing myself in different cultures through books and movies.
                
                If I could time travel to the future and tell future generations something important about how to live life, I would say to never lose sight of what truly matters. In a world that often prioritizes material possessions and external success, it is crucial to remember the importance of love, connection, and personal growth. Cherish the relationships you have, embrace your passions, and always strive to make a positive impact on the world around you. Life is too short to waste on things that don't bring joy and fulfillment.",

            ],

        ]);
    }
}