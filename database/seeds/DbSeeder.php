<?php

use App\Aresta;
use App\Vertice;
use Illuminate\Database\Seeder;

class DbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vertice::create([
            "id" => "1",
            "name" => "Saadiyat Public Beach",
            "x" => "570",
            "y" => "169",
            "description" => "A meditative yoga session is what you need to find your inner calm with stroll along the white sandy shorelines Saadiyat Public Beach offers you a perfect setting for an everyday retreat",
            "image_path" => "saadiyat-public-beach.jpg"
        ]);
        Vertice::create([
            "id" => "2",
            "name" => "Manarat Al Saadiyat",
            "x" => "517",
            "y" => "212",
            "description" => "Manarat Al Saadiyat meanings the place of enlightenment is a purpose-built art and culture centre with multiple gallery spaces",
            "image_path" => "manarat-al-saadiyat.jpg"
        ]);
        Vertice::create([
            "id" => "3",
            "name" => "Ferrari World",
            "x" => "1103",
            "y" => "378",
            "description" => "Ferrari World Abu Dhabi was created in tribute to Ferrari passion heritage excellence innovation and performance",
            "image_path" => "ferrari-world.jpg"
        ]);
        Vertice::create([
            "id" => "4",
            "name" => "Etihad Plaza",
            "x" => "1106",
            "y" => "509",
            "description" => "Etihad Plaza is a development of 789 residential units in Khalifa City featuring comprehensive lifestyle amenities including 4973 square metres of retail and 4",
            "image_path" => "etihad-plaza.jpg"
        ]);
        Vertice::create([
            "id" => "5",
            "name" => "Abu Dhabi International Airport",
            "x" => "1236",
            "y" => "513",
            "description" => "The construction of the Midfield Terminal Complex (MTC) and overall expansion of Abu Dhabi International Airport are vital to enable the diversification of the Emirate economy",
            "image_path" => "abu-dhabi-international-airport.jpg"
        ]);
        Vertice::create([
            "id" => "6",
            "name" => "Zayed University",
            "x" => "1031",
            "y" => "671",
            "description" => "Zayed University is a national and regional leader in educational innovation. Founded in 1998 and proudly bearing the name of the Founder of the Nation",
            "image_path" => "zayed-university.jpg"
        ]);
        Vertice::create([
            "id" => "7",
            "name" => "Sheikh Zayed Grand Mosque",
            "x" => "692",
            "y" => "609",
            "description" => "Sheikh Zayed Grand Mosque is located in Abu Dhabi  the capital city of the United Arab Emirates  and is considered to be the key site for worship in the country",
            "image_path" => "sheikh-zayed-grand-mosque.jpg"
        ]);
        Vertice::create([
            "id" => "8",
            "name" => "Mangrove National Park",
            "x" => "514",
            "y" => "467",
            "description" => "Most often found growing in the sea waters of tropical and sub-tropical coastal areas. This hardy tree acts as a natural windbreak.",
            "image_path" => "mangrove-national-park.jpg"
        ]);
        Vertice::create([
            "id" => "9",
            "name" => "Al Ghaf Park",
            "x" => "491",
            "y" => "534",
            "description" => "The low-rise residential towers which feature a range of studio one two and three-bedroom apartments are the ideal location for professionals and small families",
            "image_path" => "al-ghaf-park.jpg"
        ]);
        Vertice::create([
            "id" => "10",
            "name" => "Umm Al Emarat Park",
            "x" => "399",
            "y" => "477",
            "description" => "Umm Al Emarat Park was first opened to visitors in 1982. It is one of the oldest and largest urban parks in Abu Dhabi centrally located on 15th Street between Airport Road and Karamah Street",
            "image_path" => "umm-al-emarat-park.jpg"
        ]);
        Vertice::create([
            "id" => "11",
            "name" => "Electra Park",
            "x" => "386",
            "y" => "334",
            "description" => "Abu Dhabi has more than 2000 well-maintained parks and gardens. Electra park is one of the main parks in Abudhabi situated near by corniche",
            "image_path" => "electra-park.jpg"
        ]);
        Vertice::create([
            "id" => "12",
            "name" => "Qasr Al Hosn",
            "x" => "318",
            "y" => "381",
            "description" => "It remained the emir`s palace and seat of government until 1966.",
            "image_path" => "qasr-al-hosn.jpg"
        ]);
        Vertice::create([
            "id" => "13",
            "name" => "Emirates Palace",
            "x" => "202",
            "y" => "449",
            "description" => "The Emirates Palace is a luxury hotel in Abu Dhabi. United Arab Emirates operated by Kempinski and opened in February 2005.",
            "image_path" => "emirates-palace.jpg"
        ]);
        Aresta::create([
            "starts" => "2",
            "ends" => "3",
            "distance" => "9"
        ]);
        Aresta::create([
            "starts" => "3",
            "ends" => "5",
            "distance" => "2"
        ]);
        Aresta::create([
            "starts" => "5",
            "ends" => "6",
            "distance" => "6"
        ]);
        Aresta::create([
            "starts" => "6",
            "ends" => "7",
            "distance" => "5"
        ]);
        Aresta::create([
            "starts" => "7",
            "ends" => "9",
            "distance" => "3"
        ]);
        Aresta::create([
            "starts" => "9",
            "ends" => "10",
            "distance" => "2"
        ]);
        Aresta::create([
            "starts" => "10",
            "ends" => "11",
            "distance" => "9"
        ]);
        Aresta::create([
            "starts" => "11",
            "ends" => "2",
            "distance" => "7"
        ]);
        Aresta::create([
            "starts" => "7",
            "ends" => "8",
            "distance" => "8"
        ]);
        Aresta::create([
            "starts" => "8",
            "ends" => "10",
            "distance" => "5"
        ]);
        Aresta::create([
            "starts" => "10",
            "ends" => "12",
            "distance" => "2"
        ]);
        Aresta::create([
            "starts" => "11",
            "ends" => "12",
            "distance" => "8"
        ]);
        Aresta::create([
            "starts" => "12",
            "ends" => "13",
            "distance" => "6"
        ]);
        Aresta::create([
            "starts" => "13",
            "ends" => "9",
            "distance" => "4"
        ]);
        Aresta::create([
            "starts" => "1",
            "ends" => "2",
            "distance" => "8"
        ]);
        Aresta::create([
            "starts" => "3",
            "ends" => "4",
            "distance" => "4"
        ]);
        Aresta::create([
            "starts" => "4",
            "ends" => "5",
            "distance" => "3"
        ]);
        Aresta::create([
            "starts" => "6",
            "ends" => "4",
            "distance" => "1"
        ]);
    }
}
