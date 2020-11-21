<?php

namespace App\Teams;

class Repository
{
    public function points($team)
    {
        /* I will create tables later
         *
         * return $team->where('teams.id', $team->id)
         *  ->join('tickets', 'teams.id', '=', 'tickets.team_id')
         *  ->join('points', 'tickets.id', '=', 'points.ticket_id')
         *  ->sum('points.value');
         */

        return rand();

    }
}
