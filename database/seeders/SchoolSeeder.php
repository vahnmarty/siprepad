<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            ['school_name' => "A.P. Giannini Middle School"],
            ['school_name' => "Abbott Middle School"],
            ['school_name' => "Abraham Lincoln High School"],
            ['school_name' => "Adda Clevenger"],
            ['school_name' => "Alice Fong Yu School"],
            ['school_name' => "All Souls Catholic School"],
            ['school_name' => "Alma Heights Christian Academy"],
            ['school_name' => "Alt School"],
            ['school_name' => "Alta Loma Middle School"],
            ['school_name' => "Alta Vista School"],
            ['school_name' => "Aptos Middle School"],
            ['school_name' => "Aragon High School"],
            ['school_name' => "Archbishop Mitty High School"],
            ['school_name' => "Archbishop Riordan High School"],
            ['school_name' => "Balboa High School"],
            ['school_name' => "Bellarmine College Preparatory"],
            ['school_name' => "Ben Franklin Intermediate School"],
            ['school_name' => "Bentley School"],
            ['school_name' => "Bessie Carmichael Middle School"],
            ['school_name' => "Bishop O'Dowd High School"],
            ['school_name' => "Borel Middle School"],
            ['school_name' => "Bowditch Middle School"],
            ['school_name' => "Buena Vista Horace Mann K-8 School"],
            ['school_name' => "Bullis Charter School"],
            ['school_name' => "Burlingame High School"],
            ['school_name' => "Burlingame Intermediate School"],
            ['school_name' => "Cabrillo Elementary School"],
            ['school_name' => "California Virtual Academy"],
            ['school_name' => "Capuchino High School"],
            ['school_name' => "Carlmont High School"],
            ['school_name' => "Carondelet High School"],
            ['school_name' => "Cathedral School for Boys"],
            ['school_name' => "Central Middle School"],
            ['school_name' => "Challenger School"],
            ['school_name' => "Charles Armstrong School"],
            ['school_name' => "Children's Day School"],
            ['school_name' => "Chinese American International School"],
            ['school_name' => "Claire Lilienthal School"],
            ['school_name' => "Convent High School"],
            ['school_name' => "Convent of the Sacred Heart Elementary"],
            ['school_name' => "Cornerstone Academy"],
            ['school_name' => "Corpus Christi Catholic School"],
            ['school_name' => "Creative Arts Charter School"],
            ['school_name' => "Crocker Middle School"],
            ['school_name' => "Crystal Springs Uplands School"],
            ['school_name' => "Davidson Middle School"],
            ['school_name' => "De La Salle High School"],
            ['school_name' => "De Marillac Academy"],
            ['school_name' => "Del Mar Middle School"],
            ['school_name' => "Drew School"],
            ['school_name' => "Ecole Notre Dame des Victoires"],
            ['school_name' => "Edison Charter Academy"],
            ['school_name' => "El Camino High School"],
            ['school_name' => "Everett Middle School"],
            ['school_name' => "Father Sauer Academy"],
            ['school_name' => "Fernando Rivera Middle School"],
            ['school_name' => "Francisco Middle School"],
            ['school_name' => "French American International School"],
            ['school_name' => "Fusion Academy"],
            ['school_name' => "Galileo High School"],
            ['school_name' => "Gateway High School"],
            ['school_name' => "Gateway Middle School"],
            ['school_name' => "George Washington High School"],
            ['school_name' => "Good Shepherd School"],
            ['school_name' => "Hall Middle School"],
            ['school_name' => "Head-Royce School"],
            ['school_name' => "Herbert Hoover Middle School"],
            ['school_name' => "Highlands Christian School"],
            ['school_name' => "Hilldale School"],
            ['school_name' => "Hillsdale High School"],
            ['school_name' => "Hillview Middle School"],
            ['school_name' => "Hillwood Academic School"],
            ['school_name' => "Holy Angels School"],
            ['school_name' => "Holy Name School"],
            ['school_name' => "ICA Cristo Rey Academy"],
            ['school_name' => "Immaculate Heart of Mary"],
            ['school_name' => "Ingrid B. Lacy Middle School"],
            ['school_name' => "International High School"],
            ['school_name' => "James Denman Middle School"],
            ['school_name' => "James Lick Middle School"],
            ['school_name' => "Junipero Serra High School"],
            ['school_name' => "Katherine Delmar Burke School"],
            ['school_name' => "Kent Middle School"],
            ['school_name' => "Keys School"],
            ['school_name' => "Kipp Bayview Academy"],
            ['school_name' => "KIPP SF Bay Academy"],
            ['school_name' => "Kittredge School"],
            ['school_name' => "KZV Armenian School"],
            ['school_name' => "La Scuola International School"],
            ['school_name' => "Lawton Alternative School"],
            ['school_name' => "Lick-Wilmerding High School"],
            ['school_name' => "Lipman Middle School"],
            ['school_name' => "Live Oak School"],
            ['school_name' => "Lowell High School"],
            ['school_name' => "Lycee Francais de San Francisco"],
            ['school_name' => "Manuel F. Cunha School"],
            ['school_name' => "Marin Academy"],
            ['school_name' => "Marin Catholic"],
            ['school_name' => "Marin Country Day School"],
            ['school_name' => "Marin Horizon School"],
            ['school_name' => "Marin Montessori School"],
            ['school_name' => "Marin Preparatory School"],
            ['school_name' => "Marin Primary & Middle School"],
            ['school_name' => "Marina Middle School"],
            ['school_name' => "Mark Day School"],
            ['school_name' => "Martin Luther King Jr. Middle School"],
            ['school_name' => "Menlo School"],
            ['school_name' => "Mercy High School Burlingame"],
            ['school_name' => "Mill Valley Middle School"],
            ['school_name' => "Millennium School"],
            ['school_name' => "Miller Creek Middle School"],
            ['school_name' => "Mills High School"],
            ['school_name' => "Mission Dolores Academy"],
            ['school_name' => "Mount Tamalpais School"],
            ['school_name' => "Notre Dame Belmont"],
            ['school_name' => "Ocean Shore School"],
            ['school_name' => "Oceana High School"],
            ['school_name' => "Our Lady of Angels School"],
            ['school_name' => "Our Lady of Loretto School"],
            ['school_name' => "Our Lady of Mercy School"],
            ['school_name' => "Our Lady of Mount Carmel School"],
            ['school_name' => "Our Lady of Perpetual Help School"],
            ['school_name' => "Our Lady of the Visitacion School"],
            ['school_name' => "Parkside Intermediate School"],
            ['school_name' => "Piedmont Middle School"],
            ['school_name' => "Presidio Hill School"],
            ['school_name' => "Presidio Knolls School"],
            ['school_name' => "Presidio Middle School"],
            ['school_name' => "Ralston Middle School"],
            ['school_name' => "Redwood High School"],
            ['school_name' => "Ring Mountain Day School"],
            ['school_name' => "Rooftop Alternative School"],
            ['school_name' => "Roosevelt Middle School"],
            ['school_name' => "Ross Grammar School"],
            ['school_name' => "Ruth Asawa San Francisco School of the Arts"],
            ['school_name' => "Sacred Heart Cathedral Prep"],
            ['school_name' => "Sacred Heart Preparatory - Atherton"],
            ['school_name' => "Sacred Heart Schools, Atherton"],
            ['school_name' => "Saint Anne School"],
            ['school_name' => "Saint Anselm School"],
            ['school_name' => "Saint Anthony - ICA"],
            ['school_name' => "Saint Brendan School"],
            ['school_name' => "Saint Brigid School"],
            ['school_name' => "Saint Catherine of Siena School"],
            ['school_name' => "Saint Cecilia School"],
            ['school_name' => "Saint Charles Borromeo School"],
            ['school_name' => "Saint Charles School"],
            ['school_name' => "Saint Dunstan School"],
            ['school_name' => "Saint Elizabeth School"],
            ['school_name' => "Saint Finn Barr School"],
            ['school_name' => "Saint Francis High School"],
            ['school_name' => "Saint Gabriel School"],
            ['school_name' => "Saint Gregory School"],
            ['school_name' => "Saint Hilary School"],
            ['school_name' => "Saint Ignatius College Preparatory"],
            ['school_name' => "Saint Isabella School"],
            ['school_name' => "Saint James School"],
            ['school_name' => "Saint John School"],
            ['school_name' => "Saint Mary's College High School"],
            ['school_name' => "Saint Matthew Catholic School"],
            ['school_name' => "Saint Matthew's Episcopal Day"],
            ['school_name' => "Saint Monica School"],
            ['school_name' => "Saint Nicholas Catholic School"],
            ['school_name' => "Saint Patrick School"],
            ['school_name' => "Saint Paul School"],
            ['school_name' => "Saint Peter's Catholic School"],
            ['school_name' => "Saint Philip School"],
            ['school_name' => "Saint Pius School"],
            ['school_name' => "Saint Raphael School"],
            ['school_name' => "Saint Raymond School"],
            ['school_name' => "Saint Rita School"],
            ['school_name' => "Saint Robert School"],
            ['school_name' => "Saint Stephen School"],
            ['school_name' => "Saint Theresa School"],
            ['school_name' => "Saint Thomas More School"],
            ['school_name' => "Saint Thomas the Apostle School"],
            ['school_name' => "Saint Timothy School"],
            ['school_name' => "Saint Veronica School"],
            ['school_name' => "Saint Vincent De Paul School"],
            ['school_name' => "Saints Peter and Paul School"],
            ['school_name' => "San Carlos Charter Learning Center"],
            ['school_name' => "San Domenico Middle School"],
            ['school_name' => "San Domenico School"],
            ['school_name' => "San Francisco Day School"],
            ['school_name' => "San Francisco Friends School"],
            ['school_name' => "San Francisco Pacific Academy"],
            ['school_name' => "San Francisco University High School"],
            ['school_name' => "San Francisco Waldorf High School"],
            ['school_name' => "San Mateo High School"],
            ['school_name' => "School of the Epiphany"],
            ['school_name' => "School of the Madeleine"],
            ['school_name' => "Sea Crest School"],
            ['school_name' => "Sinaloa Middle School"],
            ['school_name' => "Spanish Infusion School"],
            ['school_name' => "Stratford School"],
            ['school_name' => "Stuart Hall for Boys"],
            ['school_name' => "Stuart Hall High School"],
            ['school_name' => "Summit Shasta Public School"],
            ['school_name' => "Synergy School"],
            ['school_name' => "Tamalpais High School"],
            ['school_name' => "Taylor Middle School"],
            ['school_name' => "Terra Linda High School"],
            ['school_name' => "Terra Nova High School"],
            ['school_name' => "The Bay School of San Francisco"],
            ['school_name' => "The Brandeis School of Marin"],
            ['school_name' => "The Brandeis School of San Francisco"],
            ['school_name' => "The Branson School"],
            ['school_name' => "The College Preparatory School"],
            ['school_name' => "The Hamlin School"],
            ['school_name' => "The Mission Preparatory School"],
            ['school_name' => "The Nueva School"],
            ['school_name' => "The San Francisco School"],
            ['school_name' => "Thomas R. Pollicita School"],
            ['school_name' => "Tierra Linda Middle School"],
            ['school_name' => "Town School for Boys"],
            ['school_name' => "Urban School of San Francisco"],
            ['school_name' => "Urban Student Athlete Development Academy"],
            ['school_name' => "Vallemar School"],
            ['school_name' => "West Portal Lutheran School"],
            ['school_name' => "Westborough Middle School"],
            ['school_name' => "Westmoor High School"],
            ['school_name' => "White Hill Middle School"],
            ['school_name' => "Willow Creek Academy"],
            ['school_name' => "Woodside Elementary School"],
            ['school_name' => "Woodside Priory School"],
            ['school_name' => "Zion Lutheran School"],
            ['school_name' => "Not Listed"]
        ];
        foreach ($datas as $data) {
            School::create($data);
        }
    }
}
