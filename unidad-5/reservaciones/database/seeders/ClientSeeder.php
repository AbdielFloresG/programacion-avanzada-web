<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new Client();

        $client->name = 'Abdiel';
        $client->phone_number = "6122024759";
        $client->email = "abdielfg@gmail.com";

        $client->save();

        $client = new Client();

        $client->name = 'Angel Iran';
        $client->phone_number = "6122258960";
        $client->email = "hitlerParaPresidente@gmail.com";

        $client->save();
    }
}
