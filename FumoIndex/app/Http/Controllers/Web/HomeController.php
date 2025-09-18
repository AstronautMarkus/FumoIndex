<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FumoType;

class HomeController extends Controller
{
    public function index()
    {
        // Get only primary categories, evite hardcoding hehehe
        $categories = FumoType::where('is_primary', true)->get();
        $faqs = [
            [
                'question' => 'What is a Fumo?',
                'answer' => 'A Fumo is a plush toy, originally based on Touhou Project characters, produced by Gift. They are highly collectible and loved by fans worldwide. For detailed information, read the "What is a Fumo?" page.'
            ],
            [
                'question' => 'Where can I buy Fumos?',
                'answer' => 'Fumos are sold by Gift, the company that makes them. The easiest way to buy one is through third-party stores like AmiAmi. You can also look for them in second-hand shops such as eBay, where Fumos are often sold sealed in their packaging.'
            ],
            [
                'question' => 'Are there Fumos from other franchises?',
                'answer' => 'Yes! While Fumos started with Touhou Project, there are now collaborations with other franchises, expanding the variety of available plush toys.'
            ],
            [
                'question' => 'Is this site official?',
                'answer' => 'No, this is a fan-made project. We do not sell Fumos or have any official affiliation with Gift or Touhou Project.'
            ],
            [
                'question' => 'How can I contribute to this project?',
                'answer' => 'We welcome contributions! You can help by reporting issues, suggesting new features, or even contributing code. Check out our GitHub repository for more details.'
            ],
            [
                'question'=>'Your information is correct?',
                'answer'=>'We strive to keep our information accurate and up-to-date. However, if you find any discrepancies, please let us know so we can correct them.'
            ],
            [
                'question' => 'Where is Fumo Index data stored?',
                'answer' => 'We mainly separate the information into parts. Photos for pages, Fumo types, and similar content are stored locally on our provider\'s server. For data such as the Fumos themselves or community photos, we use S3 to keep the service secure and scalable.'
            ],
            [
                'question' => 'I want a Mima Fumo :(',
                'answer' => 'Me too, son.'
            ]
        ];
        return view('home', compact('categories', 'faqs'));
    }
}