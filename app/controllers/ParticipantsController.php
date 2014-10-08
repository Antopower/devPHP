<?php

class ParticipantsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$participants = Participant::all();
		return View::make('participants.index', compact('participants'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$sports = Sport::all();
		$region = Region::lists('nom', 'id');
		return View::make('participants.create', compact('sports'))->with('region', $region);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		$input = Input::all();
		
		$participant = new Participant;
		$participant->nom = $input['nom'];
		$participant->prenom = $input['prenom'];
		$participant->numero = $input['numero'];
		$participant->region_id = $input['region'];
		$sports = Input::get('sport_checkbox');
		if($sports != NULL)
			if($participant->save()) {
	
				foreach($sports as $sport)
				{
					$participantSport = new ParticipantsSports;
					$participantSport->participant_id = $participant->id;
					$participantSport->sport_id = $sport;
					if(!$participantSport->save()){
						return Redirect::back()->withInput()->withErrors($participant->validationMessages);
					}
				}
				return Redirect::action('ParticipantsController@index');
				
			} else {
				return Redirect::back()->withInput()->withErrors($participant->validationMessages);
			}
		else {
			#return Redirect::back()->withInput()->withErrors("fuck you");
		} 
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
		return View::make('participants.show'); 
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$sports = Sport::all();
		$participant = Participant::findOrFail($id);
		$region = Region::lists('nom', 'id');
		$participants_sports = DB::select('select sport_id from participants_sports where participant_id = ?', array($id));
		$PSCount = count($participants_sports);
		$i = 0;
		#echo "<pre>";
		#var_dump($PSCount);
		#echo "</pre>";
		#die("lol");
		return View::make('participants.edit', compact('participant','sports','region','participants_sports','PSCount','i')); 
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
	$input = Input::all();
		
		$participant = Participant::findOrFail($id);
		$participant->nom = $input['nom'];
		$participant->prenom = $input['prenom'];
		$participant->numero = $input['numero'];
		$participant->region_id = $input['region'];
		
		if($participant->save()) {
			
			DB::delete('delete from participants_sports where participant_id = ?', array($id));

			$sports = Input::get('sport_checkbox');
			foreach($sports as $sport)
			{
				$participantSport = new ParticipantsSports;
				$participantSport->participant_id = $participant->id;
				$participantSport->sport_id = $sport;
				if(!$participantSport->save()){
					return Redirect::back()->withInput()->withErrors($sport->validationMessages);
				}
			}
			return Redirect::action('ParticipantsController@index');
		} else {
			return Redirect::back()->withInput()->withErrors($sport->validationMessages);
		} 
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$participant = Participant::findOrFail($id);
		$participant->delete();
		
		return Redirect::action('ParticipantsController@index');
	}

	public function participantsDropdown() {
		if(Request::ajax()) {
			$sportId = Input::get('sportId');
			try {
				$sport = Sport::findOrFail($sportId);
			} catch (ModelNotFoundException $e) {
				App::abort(404);
			}
			$participants = DB::select('select participant_id from participants_sports where sport_id = ?', array($sportId));
			return View::make('participants.dropdownParticipant')->with('participants',$participants)->with('sport',$sport);
	
		} else {
			return App::abort(404);
		}
	}
	

}
