<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
        	[
        		'name' => 'Community',
        		'children' => [
        			['name' => 'Activities'],
        			['name' => 'Artists'],
        			['name' => 'Childcare'],
        			['name' => 'Classes'],
        			['name' => 'Events'],
        			['name' => 'General'],
        			['name' => 'Groups'],
        			['name' => 'Local News'],
        			['name' => 'Lost and Found'],
        			['name' => 'Musicians'],
        			['name' => 'Politics'],
        			['name' => 'Pets'],
        			['name' => 'Rideshare'],
        			['name' => 'Volunteers'],
        		]
        	],
        	[
        		'name' => 'Personals',
        		'children' => [
        			['name' => 'Strictly Platonic'],
        			['name' => 'Women Seeking Men'],
        			['name' => 'Women Seeking Women'],
        			['name' => 'Men Seeking Men'],
        			['name' => 'Missed Connections'],
        			['name' => 'Rants and Raves'],
        		]
        	],
        	[
        		'name' => 'Services',
        		'children' => [
        			['name' => 'Automotive'],
        			['name' => 'Beauty'],
        			['name' => 'Cell/mobile'],
        			['name' => 'Computer'],
        			['name' => 'Creative'],
        			['name' => 'Cycle'],
        			['name' => 'Event'],
        			['name' => 'Farm + Garden'],
        			['name' => 'Financial'],
        			['name' => 'Household'],
        			['name' => 'labour/move'],
        		]
        	],
        	[
        		'name' => 'Discussion Forums'
        	],
        	[
        		'name' => 'Housing',
        		'children' => [
        			['name' => 'Apts / Housing'],
        			['name' => 'Housing Swap'],
        			['name' => 'Housing Wanted'],
        			['name' => 'Office / Commercial'],
        			['name' => 'Parking / Storage'],
        			['name' => 'Real Estate Sale'],
        			['name' => 'Rooms / Shared'],
        			['name' => 'Rooms Wanted'],
        			['name' => 'Sublet / Temporary'],
        			['name' => 'Vacasion / Rental']
        		]
        	],
        	[
        		'name' => 'For Sale',
        		'children' => [
        			['name' => 'Antiques'],
        			['name' => 'Appliances'],
        			['name' => 'Arts + Crafts'],
        			['name' => 'Auto Parts'],
        			['name' => 'Barter'],
        			['name' => 'Bikes'],
        			['name' => 'Boats'],
        			['name' => 'Books'],
        			['name' => 'Cars / Trucks'],
        			['name' => 'Computers'],
        			['name' => 'Electronics'],
        			['name' => 'Fernitures'],
        			['name' => 'Jewelry'],
        			['name' => 'Sporting'],
        			['name' => 'Video Gaming'],
        			['name' => 'Trailers'],
        			['name' => 'Wanted']
        		]
        	],
        	[
        		'name' => 'Resumes'
        	],
        	[
        		'name' => 'Jobs',
        		'children' => [
        			['name' => 'Accouting, Finance'],
        			['name' => 'Admin, Office'],
        			['name' => 'Arch, Engineering'],
        			['name' => 'Art, Media Design'],
        			['name' => 'Biotech, Science'],
        			['name' => 'Customer Service'],
        			['name' => 'Education'],
        			['name' => 'Government'],
        			['name' => 'Internet Engineers'],
        			['name' => 'Manufacturing'],
        			['name' => 'Marketing'],
        			['name' => 'Medical, Health'],
        			['name' => 'Real Estate'],
        			['name' => 'IT, Software, Hardware'],
        			['name' => 'Technical Support'],
        			['name' => 'Web, Info design'],
        		] 
        	],
        	[
        		'name' => 'Gigs'
        	]
        ];

        foreach($categories as $category) {
        	\App\Category::create($category);
        }
    }
}
