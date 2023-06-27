<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FetchData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Fetch:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get('https://fakestoreapi.com/products/10');
        $product = new Product();
        $product->title = $response['title'];
        $product->price = $response['price'];
        $product->category = $response['category'];
        $product->image = $response['image'];
        $product->save();
        Log::info("Success create data to database with data: " . $response);
    }
}
