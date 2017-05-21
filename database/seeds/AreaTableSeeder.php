<?php

use Illuminate\Database\Seeder;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
        	[
	        	'name' => 'BD',
	        	'children' => [
	        		[
		        		'name' => 'Barisal',
		        		'children' => [
		        			['name' => 'Barguna'],
		        			['name' => 'Bhola'],
		        			['name' => 'Jhalokati'],
		        			['name' => 'Patuakhali'],
		        			['name' => 'Pirojpur']
		        		]
		        	],
		        	[
		        		'name' => 'Chittagong',
		        		'children' => [
		        			['name' => 'Bandarban'],
		        			['name' => 'Brahmanbaria'],
		        			['name' => 'Chandpur'],
		        			['name' => 'Comilla'],
		        			['name' => 'Cox\'s Bazar'],
		        			['name' => 'Feni'],
		        			['name' => 'Khagrachhari'],
		        			['name' => 'Lakshmipur'],
		        			['name' => 'Noakhali'],
		        			['name' => 'Rangamati']
		        		]
		        	],
		        	[
		        		'name' => 'Dhaka',
		        		'children' => [
		        			['name' => 'Faridpur'],
		        			['name' => 'Gazipur'],
		        			['name' => 'Gopalganj'],
		        			['name' => 'Kishoreganj'],
		        			['name' => 'Madaripur'],
		        			['name' => 'Manikganj'],
		        			['name' => 'Munshiganj'],
		        			['name' => 'Narayanganj'],
		        			['name' => 'Narsingdi'],
		        			['name' => 'Rajbari'],
		        			['name' => 'Shariatpur'],
		        			['name' => 'Tangail']
		        		]
		        	],
		        	[
		        		'name' => 'Khulna',
		        		'children' => [
		        			['name' => 'Bagerhat'],
		        			['name' => 'Chuadanga'],
		        			['name' => 'Jessore'],
		        			['name' => 'Jhenaidah'],
		        			['name' => 'Kushtia'],
		        			['name' => 'Magura'],
		        			['name' => 'Meherpur'],
		        			['name' => 'Narail'],
		        			['name' => 'Satkhira']
		        		]
		        	],
		        	[
		        		'name' => 'Mymensingh',
		        		'children' => [
		        			['name' => 'Jamalpur'],
		        			['name' => 'Netrokona'],
		        			['name' => 'Sherpur']
		        		]
		        	],
		        	[
		        		'name' => 'Rajshahi',
		        		'children' => [
		        			['name' => 'Bogra'],
		        			['name' => 'Jaipurhat'],
		        			['name' => 'Naogaon'],
		        			['name' => 'Natore'],
		        			['name' => 'Chapai Nawabganj'],
		        			['name' => 'Pabna'],
		        			['name' => 'Sirajganj'],
		        		]
		        	],
		        	[
		        		'name' => 'Rangpur',
		        		'children' => [
		        			['name' => 'Dinajpur'],
		        			['name' => 'Gaibandha'],
		        			['name' => 'Kurigram'],
		        			['name' => 'Lalmonirhat'],
		        			['name' => 'Nilphamari'],
		        			['name' => 'Panchagarh'],
		        			['name' => 'Thakurgaon'],
		        		]
		        	],
		        	[
		        		'name' => 'Sylhet',
		        		'children' => [
		        			['name' => 'Habiganj'],
		        			['name' => 'Moulvibazar'],
		        			['name' => 'Sunamganj']
		        		]
		        	]		
	        	]
        	]
        ];

        foreach($areas as $area){
        	\App\Area::create($area);
        }
    }
}
	