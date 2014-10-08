<?php
class copyEpreuvesTableSeeder extends Seeder {


	public function run()
	{
		DB::table('epreuves')->delete();

		//épreuves associées au sport Badminton
		$epreuves= [
					['Sport' => 'Badminton',
			 		 'Liste' => [
								//nom, description
								["Simple Féminin",""],
								["Simple Masculin",""],
								["Double Féminin","" ],
								["Double Masculin","" ],
								["Épreuve par équipe",""]
								]
					],
					['Sport' => 'Boccia',
					'Liste' => [
								//nom, description
								["Épreuve lanceur",""],
								["Épreuve rampe",""],
								]
					],
					['Sport' => 'Hockey masculin',
					'Liste' => [
								//nom, description
								["Tournoi hockey masculin",""],
								]
					],
		];

		for($i=0; $i < count($epreuves); $i++) {		
			$sportid=DB::table('sports')->where('nom',$epreuves[$i]['Sport'])->pluck('id');
			foreach($epreuves[$i]['Liste'] as $item) {
				$nouveau = Epreuve::create(array('nom' => $item[0], 'description'=>$item[1],'sport_id'=>$sportid));
				
			}
		}
	}
}