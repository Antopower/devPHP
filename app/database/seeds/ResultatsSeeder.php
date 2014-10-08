<?php
class ResultatsTableSeeder extends Seeder {


	public function run()
	{
		DB::table('resultats')->delete();

		$regions = ["ABT","BOU","CAP","CDQ","CHA","CTN","EDQ","EST","LSL","LAN","LAU","LAV","MAU","MON","OUT","RIY","RIS","SLJ","SUO" ];
		
		
		//nom, prenom, numero, region court (à mapper), equipe
		for($i=0;$i<100;$i++) {
			
			$regionid=DB::table('regions')->where('nom_court',$regions[rand(0,18)])->pluck('id');
			DB::table('resultats')->insert(array('nom' => "Participant$i", 'prenom'=>"Joe",
														'numero'=>$i,'region_id'=>$regionid, 'equipe'=>rand(0,1)));
		}
	}
}