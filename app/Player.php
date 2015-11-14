<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
	public function game()
	{
		return $this->belongsTo('App\Game', 'fk_games', 'pk_id');
	}

	public function cards()
	{
		return $this->belongsToMany('App\Card', 'hands', 'fk_cards', 'fk_players' );
	}

	public function turns()
	{
		return $this->hasMany('App\Turn', 'fk_story_teller', 'pk_id');
	}

	public function vote()
	{
		return $this->belongsToMany('App\Selection', 'fk_players');
	}

	public function selections()
	{
		return $this->belongsToMany('App\Selection', 'selection_is_voted_players', 'fk_players', 'pk_selection_voted');
	}

	protected $table = 'players';
	protected $primarykey = 'pk_id';
	protected $fillable = array('pseudo');
}