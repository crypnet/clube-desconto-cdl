<?php


use Illuminate\Database\Seeder;

class DefaultSeeder extends Seeder
{
    public function run()
    {
        DB::connection('mysql')->insert("INSERT INTO users (id, name, email,role_id, email_verified_at, password, remember_token, created_at, updated_at) VALUES 
            (1,'Andre Luis','andre.luis@hgfpay.com.br','4',null,'$2y$10$j77eed9/UYcBQ80.EnVRue6JeRmBEf61FrGku6Pk2HGvzoG303kKC',NULL,'2019-07-26 15:52:49','2019-07-26 15:52:49')");

    }
//
}
