<?php
class Participant extends EloquentValidating {
	
	
	
	public function sports()
	{
		return $this->belongsToMany('Sport', 'participants_sports');
	}
	
	
	
/**
 * Validation
 *
 * une épreuve doit avoir:
 *  - nom: obligatoire, et unique pour un sport donné, mais je n'ai pas trouvé comment exprimer ca avec les règles de Laravel
 *  - Les autres champs sont falcultatifs.
 */


public $validationMessages;

public function validationRules() {
	return [
		'nom' => 'required',
		'prenom' => 'required',
		'numero' => 'required',
		];
}
	
}