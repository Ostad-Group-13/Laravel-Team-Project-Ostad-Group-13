<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Contact::insert([
            'name' => 'User',
            'email' => 'User@mail.com',
            'subject' => 'Support',
            'enquiry_type' => 'Ads',
            'message' => 'Hello, Sir I need Help You ?? Please Check Your Email Address',
        ]);
    }
}
