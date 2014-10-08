<?php
class TerrainsTableSeeder extends Seeder {


	public function run()
	{
		DB::table('terrains')->delete();

		$items = [
		//nom, localisation, description
		["Terrain 1", "",""],
		["Terrain 2", "",""],
		["Terrain 3", "",""],
		["Terrain 4", "",""],
		["Terrain 5", "",""],
		
		];

		foreach($items as $item) {
			DB::table('terrains')->insert(array('nom' => $item[0], 'localisation'=>$item[1],'description'=>$item[2]));
		}
	}
}