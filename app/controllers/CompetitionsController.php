<?php

class CompetitionsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$resultatsCompetitions = ResultatCompetition::all();
		$participants = Participant::all();
		return View::make('competitions.index',compact('resultatsCompetitions','participants'));
		
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$participants = Participant::all();
		$sports = Sport::all();
		$epreuves = Epreuve::all();
		return View::make('competitions.create',compact('participants','sports','epreuves'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		
		$resultatCompetition = new ResultatCompetition;
		$resultatCompetition->participant1_id = $input['participantsListe'];
		$resultatCompetition->participant2_id = $input['participantsListe2'];
		if($resultatCompetition->save()) {
			return Redirect::action('CompetitionsController@index');
		}
		else 
			die("oops");
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$resulatsCompetitions = ResulatCompetition::findOrFail($id);
		$resulatsCompetitions->delete();
		
		return Redirect::action('CompetitionsController@index');
	}


}
