<?php

/**
 *    Copyright 2015-2017 ppy Pty. Ltd.
 *
 *    This file is part of osu!web. osu!web is distributed with the hope of
 *    attracting more community contributions to the core ecosystem of osu!.
 *
 *    osu!web is free software: you can redistribute it and/or modify
 *    it under the terms of the Affero GNU General Public License version 3
 *    as published by the Free Software Foundation.
 *
 *    osu!web is distributed WITHOUT ANY WARRANTY; without even the implied
 *    warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *    See the GNU Affero General Public License for more details.
 *
 *    You should have received a copy of the GNU Affero General Public License
 *    along with osu!web.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace App\Http\Controllers;

use App\Models\Tournament;
use Auth;

class TournamentsController extends Controller
{
    protected $section = 'community';

    public function __construct()
    {
        $this->middleware('auth', ['only' => [
            'register',
        ]]);

        parent::__construct();

        view()->share('currentAction', 'tournaments-'.current_action());
    }

    public function index()
    {
        return view('tournaments.index')
            ->with('listing', Tournament::getGroupedListing());
    }

    public function show($id)
    {
        return view('tournaments.show')
            ->with('tournament', Tournament::findOrFail($id));
    }

    public function unregister($id)
    {
        $tournament = Tournament::findOrFail($id);

        if (!$tournament->isRegistrationOpen()) {
            return error_popup('registrations are closed!');
        }

        $tournament->unregister(Auth::user());

        return ujs_redirect(route('tournaments.show', $tournament));
    }

    public function register($id)
    {
        $tournament = Tournament::findOrFail($id);
        $user = Auth::user();

        if (!$tournament->isRegistrationOpen()) {
            return error_popup('registrations are closed!');
        }

        if (!$tournament->isValidRank($user)) {
            return error_popup('invalid rank!');
        }

        $tournament->register($user);

        return ujs_redirect(route('tournaments.show', $tournament));
    }
}
