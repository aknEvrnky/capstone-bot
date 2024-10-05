<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdvisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $advisors = [
            ['id' => 3, 'name' => 'Adnan Çorum', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'Alper Camcı', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'Amir Navidfar', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'name' => 'Ayla Gülcü', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'name' => 'Ayşe Kavuşturucu', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'name' => 'Berke Gür', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'name' => 'Bülent Uluğ', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'name' => 'Çağlar Sivri', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 11, 'name' => 'Canan Bağcı', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 12, 'name' => 'Cemal Okan Şakar', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 13, 'name' => 'Cihangir Gümüştaş', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 14, 'name' => 'Derya Bodur', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 15, 'name' => 'Ece Gelal Soyak', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 16, 'name' => 'Elif Haktanır Aktaş', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 17, 'name' => 'Erkut Arıcan', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 18, 'name' => 'Fatih Kahraman', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 19, 'name' => 'Gökhan Gelişen', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 20, 'name' => 'Günet Eroğlu', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 21, 'name' => 'Gürkan Soykan', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 22, 'name' => 'Hakan Solmaz', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 23, 'name' => 'Hassan Imani', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 24, 'name' => 'Hüseyin Günhan Özcan', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 25, 'name' => 'İrem Şanal', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 27, 'name' => 'Lütfü Arda', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 28, 'name' => 'M. Aslı Aydın', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 29, 'name' => 'Mehmet Emin Yıldız', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 30, 'name' => 'Mustafa Özbayrak', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 31, 'name' => 'Nezihe Yıldıran', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 33, 'name' => 'Ömer Melih Gül', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 34, 'name' => 'Ömer Polat', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 35, 'name' => 'Ozan Akdoğan', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 36, 'name' => 'Özge Yücel Kasap', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 38, 'name' => 'Sabri Tankut Atan', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 39, 'name' => 'Sait Gül', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 40, 'name' => 'Selçuk Tuzcuoğlu', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 41, 'name' => 'Selin Nacaklı', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 42, 'name' => 'Senem Seven', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 43, 'name' => 'Şeref Kalem', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 44, 'name' => 'Suzan Üreten', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 45, 'name' => 'Tamer Uçar', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 46, 'name' => 'Tarkan Aydın', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 47, 'name' => 'Tevfik Aytekin', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 48, 'name' => 'Yalçın Çekiç', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 49, 'name' => 'Bora Büyüksaraç', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 50, 'name' => 'Burcu Tunç Çamlıbel', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 51, 'name' => 'Engin Baysoy', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 52, 'name' => 'Fırat Matur', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 53, 'name' => 'Mesut Negin', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 55, 'name' => 'Duygu Çakır Yenidoğan', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 56, 'name' => 'Beste Bahceci', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 57, 'name' => 'Barış Özcan', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 58, 'name' => 'Binnur Kurt', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 59, 'name' => 'Rasit ESKICIOGLU', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 60, 'name' => 'Murat Gökşin BAKIR', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 61, 'name' => 'Oğuzhan Erdinç', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 62, 'name' => 'Evrim Tetik', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('advisors')->insert($advisors);
    }
}
