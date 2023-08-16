<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Faq;
use App\Models\NewsItem;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $legalCategory = Category::create([
            'name' => 'Legal',
        ]);
        $communicationCategory = Category::create([
            'name' => 'Communication',
        ]);
        $financialCategory = Category::create([
            'name' => 'Financial'
        ]);

        Faq::create([
            'question' => 'How can I change my profile information?',
            'answer' => 'You can go to profile by clicking on your name and there you can change your profile information.',
            'category_id' => $legalCategory->id,
            'publishing_date' => now(),
        ]);

        Faq::create([
            'question' => 'Through what can I communicate with my editor?',
            'answer' => 'We have two options for the moment, Discord and Teams.',
            'category_id' => $communicationCategory->id,
            'publishing_date' => now(),
        ]);

        Faq::create([
            'question' => 'What payment methods do we have?',
            'answer' => 'Paypal & Stripe',
            'category_id' => $financialCategory->id,
            'publishing_date' => now(),
        ]);

        NewsItem::create([
            'title' => "TM Media starts with new website!",
            'imageLink' => "https://twitter.com/TMMediaOfficial/photo",
            'content' => "TM Media creates it's first website and also comes with first domain: tmmedia.be. This will be expanded soon.",
            'publishing_date' => now(),
        ]);
    }
}
