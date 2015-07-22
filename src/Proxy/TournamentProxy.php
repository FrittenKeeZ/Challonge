<?php

namespace Challonge\Proxy;

class TournamentProxy extends AbstractProxy
{
    /**
     * Retrieve a set of tournaments created with your account.
     */
    public function index()
    {

    }

    /**
     * Create a new tournament.
     */
    public function create()
    {

    }

    /**
     * Retrieve a single tournament record created with your account.
     */
    public function show()
    {

    }

    /**
     * Update a tournament's attributes.
     */
    public function update()
    {

    }

    /**
     * Deletes a tournament along with all its associated records. There is no undo, so use with care!
     */
    public function destroy()
    {

    }

    /**
     * This should be invoked after a tournament's check-in window closes before the tournament is started.
     *
     * 1. Marks participants who have not checked in as inactive.
     * 2. Moves inactive participants to bottom seeds (ordered by original seed).
     * 3. Transitions the tournament state from 'checking_in' to 'checked_in'
     *
     * NOTE: Checked in participants on the waiting list will be promoted if slots become available.
     */
    public function processCheckIns()
    {

    }

    /**
     * When your tournament is in a 'checking_in' or 'checked_in' state, there's no way to edit the tournament's start time (start_at) or check-in duration (check_in_duration). You must first abort check-in, then you may edit those attributes.
     *
     * 1. Makes all participants active and clears their checked_in_at times.
     * 2. Transitions the tournament state from 'checking_in' or 'checked_in' to 'pending'
     */
    public function abortCheckIn()
    {

    }

    /**
     * Start a tournament, opening up first round matches for score reporting. The tournament must have at least 2 participants.
     */
    public function start()
    {

    }

    /**
     * Finalize a tournament that has had all match scores submitted, rendering its results permanent.
     */
    public function finalize()
    {

    }

    /**
     * Reset a tournament, clearing all of its scores and attachments. You can then add/remove/edit participants before starting the tournament again.
     */
    public function reset()
    {

    }
}
