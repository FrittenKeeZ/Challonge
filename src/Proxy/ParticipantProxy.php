<?php

namespace Challonge\Proxy;

class ParticipantProxy extends AbstractProxy
{
    /**
     * Retrieve a tournament's participant list.
     */
    public function index()
    {

    }

    /**
     * Add a participant to a tournament (up until it is started).
     */
    public function create()
    {

    }

    /**
     * Bulk add participants to a tournament (up until it is started). If an invalid participant is detected, bulk participant creation will halt and any previously added participants (from this API request) will be rolled back.
     */
    public function bulkAdd()
    {

    }

    /**
     * Retrieve a single participant record for a tournament.
     */
    public function show()
    {

    }

    /**
     * Update the attributes of a tournament participant.
     */
    public function update()
    {

    }

    /**
     * Checks a participant in, setting checked_in_at to the current time.
     */
    public function checkIn()
    {

    }

    /**
     * Marks a participant as having not checked in, setting checked_in_at to nil.
     */
    public function undoCheckIn()
    {

    }

    /**
     * If the tournament has not started, delete a participant, automatically filling in the abandoned seed number. If tournament is underway, mark a participant inactive, automatically forfeiting his/her remaining matches.
     */
    public function destroy()
    {

    }

    /**
     * Randomize seeds among participants. Only applicable before a tournament has started.
     */
    public function randomize()
    {

    }
}
