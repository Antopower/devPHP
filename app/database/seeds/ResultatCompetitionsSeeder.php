<?php
class ResultatCompetitionsTableSeeder extends Seeder {


	public function run()
	{
		DB::table('resultat_competitions')->delete();
//a faire 
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
					]
		];

		for($i=0; $i < count($epreuves); $i++) {		
			$sportid=DB::table('sports')->where('nom',$epreuves[$i]['Sport'])->pluck('id');
			foreach($epreuves[$i]['Liste'] as $item) {
				$nouveau = Epreuve::create(array('nom' => $item[0], 'description'=>$item[1],'sport_id'=>$sportid));
				
			}
		}
	}
}