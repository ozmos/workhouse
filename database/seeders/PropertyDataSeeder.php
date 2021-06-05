<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use ParseCsv\Csv;
use Illuminate\Support\Carbon;

class PropertyDataSeeder extends Seeder
{
    private $file;
    private $csv;

    public function __construct()
    {
        $this->file = base_path() . '/database/seeders/csvs/property-data.csv';
        $this->csv = new Csv();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = $this->csvToArray();
        foreach ($data as $row ) {
            // TODO extract field names dynamically
            DB::table('property_data')->insert([
                'name' => $row['name'],
                'address' => $row['address'],
                'price' => $row['price'],
                'bedrooms' => $row['bedrooms'],
                'bathrooms' => $row['bathrooms'],
                'garages' => $row['garages'],
                'frontage' => $row['frontage'],
                'image' => $row['image'],
                'special' => $row['special'],
                'featured' => $row['featured'],
                "created_at"=> Carbon::now()
            ]);
        }

    }

    private function csvToArray()
    {
        $this->csv->auto($this->file);
        $this->csv->enclose_all = true;
        $data = $this->csv->data;
        return $data;
    }
}





