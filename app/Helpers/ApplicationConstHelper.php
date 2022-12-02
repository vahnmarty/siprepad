<?php

namespace App\Helpers;

use App\Models\IdentifyRacially;
use App\Models\Spirituality;

class ApplicationConstHelper
{
    //Application step one
    public static function middleSchoolList()
    {
        $middleSchool = [
            ['school_name' => "A.P. Giannini Middle School"],
            ['school_name' => "Abbott Middle School"],
            ['school_name' => "Adda Clevenger"],
            ['school_name' => "Alice Fong Yu School"],
            ['school_name' => "All Souls Catholic School"],
            ['school_name' => "Alma Heights Christian Academy"],
            ['school_name' => "Alt School"],
            ['school_name' => "Alta Loma Middle School"],
            ['school_name' => "Alta Vista School"],
            ['school_name' => "Aptos Middle School"],
            ['school_name' => "Ben Franklin Intermediate School"],
            ['school_name' => "Bessie Carmichael Middle School"],
            ['school_name' => "Borel Middle School"],
            ['school_name' => "Bowditch Middle School"],
            ['school_name' => "Buena Vista Horace Mann K-8 School"],
            ['school_name' => "Bullis Charter School"],
            ['school_name' => "Burlingame Intermediate School"],
            ['school_name' => "Cabrillo Elementary School"],
            ['school_name' => "California Virtual Academy"],
            ['school_name' => "Cathedral School for Boys"],
            ['school_name' => "Central Middle School"],
            ['school_name' => "Challenger School"],
            ['school_name' => "Charles Armstrong School"],
            ['school_name' => "Children's Day School"],
            ['school_name' => "Chinese American International School"],
            ['school_name' => "Claire Lilienthal School"],
            ['school_name' => "Convent of the Sacred Heart Elementary"],
            ['school_name' => "Cornerstone Academy"],
            ['school_name' => "Corpus Christi Catholic School"],
            ['school_name' => "Creative Arts Charter School"],
            ['school_name' => "Crocker Middle School"],
            ['school_name' => "Crystal Springs Uplands School"],
            ['school_name' => "Davidson Middle School"],
            ['school_name' => "De Marillac Academy"],
            ['school_name' => "Del Mar Middle School"],
            ['school_name' => "Ecole Notre Dame des Victoires"],
            ['school_name' => "Edison Charter Academy"],
            ['school_name' => "Everett Middle School"],
            ['school_name' => "Father Sauer Academy"],
            ['school_name' => "Fernando Rivera Middle School"],
            ['school_name' => "Francisco Middle School"],
            ['school_name' => "French American International School"],
            ['school_name' => "Fusion Academy"],
            ['school_name' => "Gateway Middle School"],
            ['school_name' => "Good Shepherd School"],
            ['school_name' => "Hall Middle School"],
            ['school_name' => "Head-Royce School"],
            ['school_name' => "Herbert Hoover Middle School"],
            ['school_name' => "Highlands Christian School"],
            ['school_name' => "Hilldale School"],
            ['school_name' => "Hillview Middle School"],
            ['school_name' => "Hillwood Academic School"],
            ['school_name' => "Holy Angels School"],
            ['school_name' => "Holy Name School"],
            ['school_name' => "Immaculate Heart of Mary"],
            ['school_name' => "Ingrid B. Lacy Middle School"],
            ['school_name' => "James Denman Middle School"],
            ['school_name' => "James Lick Middle School"],
            ['school_name' => "Katherine Delmar Burke School"],
            ['school_name' => "Kent Middle School"],
            ['school_name' => "Keys School"],
            ['school_name' => "Kipp Bayview Academy"],
            ['school_name' => "KIPP SF Bay Academy"],
            ['school_name' => "Kittredge School"],
            ['school_name' => "KZV Armenian School"],
            ['school_name' => "La Scuola International School"],
            ['school_name' => "Lawton Alternative School"],
            ['school_name' => "Lipman Middle School"],
            ['school_name' => "Live Oak School"],
            ['school_name' => "Lycee Francais de San Francisco"],
            ['school_name' => "Manuel F. Cunha School"],
            ['school_name' => "Marin Country Day School"],
            ['school_name' => "Marin Horizon School"],
            ['school_name' => "Marin Montessori School"],
            ['school_name' => "Marin Preparatory School"],
            ['school_name' => "Marin Primary & Middle School"],
            ['school_name' => "Marina Middle School"],
            ['school_name' => "Mark Day School"],
            ['school_name' => "Martin Luther King Jr. Middle School"],
            ['school_name' => "Menlo School"],
            ['school_name' => "Mill Valley Middle School"],
            ['school_name' => "Millennium School"],
            ['school_name' => "Miller Creek Middle School"],
            ['school_name' => "Mission Dolores Academy"],
            ['school_name' => "Mount Tamalpais School"],
            ['school_name' => "Ocean Shore School"],
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
            ['school_name' => "Ring Mountain Day School"],
            ['school_name' => "Rooftop Alternative School"],
            ['school_name' => "Roosevelt Middle School"],
            ['school_name' => "Ross Grammar School"],
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
            ['school_name' => "Saint Gabriel School"],
            ['school_name' => "Saint Gregory School"],
            ['school_name' => "Saint Hilary School"],
            ['school_name' => "Saint Isabella School"],
            ['school_name' => "Saint James School"],
            ['school_name' => "Saint John School"],
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
            ['school_name' => "San Francisco Day School"],
            ['school_name' => "San Francisco Friends School"],
            ['school_name' => "San Francisco Pacific Academy"],
            ['school_name' => "School of the Epiphany"],
            ['school_name' => "School of the Madeleine"],
            ['school_name' => "Sea Crest School"],
            ['school_name' => "Sinaloa Middle School"],
            ['school_name' => "Spanish Infusion School"],
            ['school_name' => "Stratford School"],
            ['school_name' => "Stuart Hall for Boys"],
            ['school_name' => "Synergy School"],
            ['school_name' => "Taylor Middle School"],
            ['school_name' => "The Brandeis School of Marin"],
            ['school_name' => "The Brandeis School of San Francisco"],
            ['school_name' => "The Hamlin School"],
            ['school_name' => "The Mission Preparatory School"],
            ['school_name' => "The Nueva School"],
            ['school_name' => "The San Francisco School"],
            ['school_name' => "Thomas R. Pollicita School"],
            ['school_name' => "Tierra Linda Middle School"],
            ['school_name' => "Town School for Boys"],
            ['school_name' => "Urban Student Athlete Development Academy"],
            ['school_name' => "Vallemar School"],
            ['school_name' => "West Portal Lutheran School"],
            ['school_name' => "Westborough Middle School"],
            ['school_name' => "White Hill Middle School"],
            ['school_name' => "Willie Brown Jr. Middle School"],
            ['school_name' => "Willow Creek Academy"],
            ['school_name' => "Woodside Elementary School"],
            ['school_name' => "Woodside Priory School"],
            ['school_name' => "Zion Lutheran School"],
            ['school_name' => "Not Listed"]
        ];
        return $middleSchool;
    }

    //Application step one
    public static function highSchoolList()
    {
        $highSchool = [

            ['school_name' => "Abraham Lincoln High School"],
            ['school_name' => "Aragon High School"],
            ['school_name' => "Archbishop Mitty High School"],
            ['school_name' => "Archbishop Riordan High School"],
            ['school_name' => "Balboa High School"],
            ['school_name' => "Bellarmine College Preparatory"],
            ['school_name' => "Bentley School"],
            ['school_name' => "Bishop O'Dowd High School"],
            ['school_name' => "Burlingame High School"],
            ['school_name' => "California Virtual Academy"],
            ['school_name' => "Capuchino High School"],
            ['school_name' => "Carlmont High School"],
            ['school_name' => "Carondelet High School"],
            ['school_name' => "Convent High School"],
            ['school_name' => "Crystal Springs Uplands School"],
            ['school_name' => "De La Salle High School"],
            ['school_name' => "Drew School"],
            ['school_name' => "El Camino High School"],
            ['school_name' => "French American International School"],
            ['school_name' => "Galileo High School"],
            ['school_name' => "Gateway High School"],
            ['school_name' => "George Washington High School"],
            ['school_name' => "Head-Royce School"],
            ['school_name' => "Hillsdale High School"],
            ['school_name' => "ICA Cristo Rey Academy"],
            ['school_name' => "International High School"],
            ['school_name' => "Junipero Serra High School"],
            ['school_name' => "Lick-Wilmerding High School"],
            ['school_name' => "Lowell High School"],
            ['school_name' => "Lycee Francais de San Francisco"],
            ['school_name' => "Marin Academy"],
            ['school_name' => "Marin Catholic"],
            ['school_name' => "Menlo School"],
            ['school_name' => "Mercy High School Burlingame "],
            ['school_name' => "Mills High School"],
            ['school_name' => "Notre Dame Belmont"],
            ['school_name' => "Oceana High School"],
            ['school_name' => "Redwood High School"],
            ['school_name' => "Ruth Asawa San Francisco School of the Arts"],
            ['school_name' => "Sacred Heart Cathedral Prep"],
            ['school_name' => "Sacred Heart Preparatory - Atherton"],
            ['school_name' => "Saint Francis High School"],
            ['school_name' => "Saint Mary's College High School"],
            ['school_name' => "San Domenico School"],
            ['school_name' => "San Francisco University High School"],
            ['school_name' => "San Francisco Waldorf High School"],
            ['school_name' => "San Mateo High School"],
            ['school_name' => "Stuart Hall High School"],
            ['school_name' => "Summit Shasta Public School"],
            ['school_name' => "Tamalpais High School"],
            ['school_name' => "Terra Linda High School"],
            ['school_name' => "Terra Nova High School"],
            ['school_name' => "The Bay School of San Francisco"],
            ['school_name' => "The Branson School"],
            ['school_name' => "The College Preparatory School"],
            ['school_name' => "The Nueva School"],
            ['school_name' => "Urban School of San Francisco"],
            ['school_name' => "Westmoor High School"],
            ['school_name' => "Woodside Priory School"],
            ['school_name' => "Not Listed"]
        ];
        return $highSchool;
    }

    //Application step three
    public static function suffixList()
    {
        return [
            ['suffix_name' => "Sr."],
            ['suffix_name' => "Jr."],
            ['suffix_name' => "II"],
            ['suffix_name' => "III"],
            ['suffix_name' => "IV"]
        ];
    }

    //Application step three
    public static function relationshipList()
    {
        return [
            ['relationship_name' => "Father"],
            ['relationship_name' => "Mother"],
            ['relationship_name' => "Stepfather"],
            ['relationship_name' => "Stepmother"],
            ['relationship_name' => "Grandfather"],
            ['relationship_name' => "Grandmother"],
            ['relationship_name' => "Uncle"],
            ['relationship_name' => "Aunt"],
            ['relationship_name' => "Male Guardian"],
            ['relationship_name' => "Female Guardian"]
        ];
    }

    //Application step three
    public static function salutationList()
    {
        return [
            ['salutation_name' => "Mr."],
            ['salutation_name' => "Mrs."],
            ['salutation_name' => "Ms."],
            ['salutation_name' => "Dr."],
            ['salutation_name' => "Prof."],
            ['salutation_name' => "Rev."],
            ['salutation_name' => "Hon."],
        ];
    }

    //Application step four
    public static function suffixListTwo()
    {
        return [
            ['suffix_name' => "Jr."],
            ['suffix_name' => "II"],
            ['suffix_name' => "III"],
            ['suffix_name' => "IV"],
            ['suffix_name' => "V"]
        ];
    }

    //Application step four
    public static function relationshipListTwo()
    {
        return [
            ['relationship_name' => "Brother"],
            ['relationship_name' => "Sister"],
            ['relationship_name' => "Stepbrother"],
            ['relationship_name' => "Stepsister"],
            ['relationship_name' => "Half-brother"],
            ['relationship_name' => "Half-sister"]
        ];
    }

    //Application step four
    public static function gradeList()
    {
        return [
            ['grade_name' => "Pre-Kindergarten"],
            ['grade_name' => "Kindergarten"],
            ['grade_name' => "1"],
            ['grade_name' => "2"],
            ['grade_name' => "3"],
            ['grade_name' => "4"],
            ['grade_name' => "5"],
            ['grade_name' => "6"],
            ['grade_name' => "7"],
            ['grade_name' => "8"],
            ['grade_name' => "Freshman"],
            ['grade_name' => "Sophomore"],
            ['grade_name' => "Junior"],
            ['grade_name' => "Senior"],
            ['grade_name' => "College"],
            ['grade_name' => "Post HS/College"]
        ];
    }

    //Application step five
    public static function relationshipListThree()
    {
        return [
            ['relationship_name' => "Father"],
            ['relationship_name' => "Mother"],
            ['relationship_name' => "Grandfather"],
            ['relationship_name' => "Uncle"],
            ['relationship_name' => "Aunt"],
            ['relationship_name' => "Great grandfather"],
            ['relationship_name' => "Stepfather"],
            ['relationship_name' => "Stepmother"],
            ['relationship_name' => "Cousin"]
        ];
    }

    //Application step six and seven
    public static function relationshipListFour()
    {
        return [
            ['relationship_name' => "Father"],
            ['relationship_name' => "Mother"],
            ['relationship_name' => "Stepfather"],
            ['relationship_name' => "Stepmother"],
            ['relationship_name' => "Guardian"],
        ];
    }

    //Application step seven
    public static function religionList()
    {
        return [
            ['religion_name' => "Catholic"],
            ['religion_name' => "Christian"],
            ['religion_name' => "Buddhist"],
            ['religion_name' => "Hindu"],
            ['religion_name' => "Jewish"],
            ['religion_name' => "Muslim"],
            ['religion_name' => "No Religion"],
            ['religion_name' => "Spiritual"],
            ['religion_name' => "Other"]
        ];
    }

    //Application step eight
    public static function numberOfYears()
    {
        return [
            ['name' => "1"],
            ['name' => "2"],
            ['name' => "3"],
            ['name' => "4"],
            ['name' => "5"],
            ['name' => "6"],
            ['name' => "7"],
            ['name' => "8"],
            ['name' => "9"],
            ['name' => "10+"]
        ];
    }

    //Application step eight
    public static function hoursPerWeek()
    {
        return [
            ['name' => "1 - 2"],
            ['name' => "3 - 5"],
            ['name' => "6 - 10"],
            ['name' => "11 - 15"],
            ['name' => "16+"]
        ];
    }

    public static function isJson($string)
    {
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }

    public static function getFamilySpirituality($data)
    {
        $data_is_json = self::isJson($data);
        $getNewArr = [];
        if ($data_is_json) {
            $arr = array();
            foreach (array_filter((array)json_decode($data)) as $dfsKey => $value) {
                $item = Spirituality::find($value);

                $arr[] = $item->name;
                
            }
            $getNewArr = array_combine($arr, $arr);
        } else {
            $strArray = explode(',',  $data);
            $getNewArr = array_combine($strArray, $strArray);
        }
        return $getNewArr;
    }

    public static function getRacially($data)
    {
        $data_is_json = self::isJson($data);
        $getNewArr = [];
        if ($data_is_json) {
            $arr = array();
            foreach (array_filter((array)json_decode($data)) as $dfsKey => $value) {
                $item = IdentifyRacially::find($dfsKey);

                $arr[] = $item->name;
            }
            $getNewArr = array_combine($arr, $arr);
        } else {
            $strArray = explode(',',  $data);
            $getNewArr = array_combine($strArray, $strArray);
        }
        return $getNewArr;
    }
}
