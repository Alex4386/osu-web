<?php

/**
 *    Copyright 2015-2018 ppy Pty. Ltd.
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

return [
    'breadcrumbs' => [
        'news-index' => 'liste',
        'news-show' => 'post',
    ],

    'index' => [
        'title' => 'osu!news',

        'nav' => [
            'newer' => 'Neuere Posts',
            'older' => 'Ältere Posts',
        ],
    ],

    'show' => [
        'posted' => ':time veröffentlicht',

        'nav' => [
            'newer' => 'Neuerer Post',
            'older' => 'Älterer Post',
        ],
    ],

    'store' => [
        'button' => 'Aktualisieren',
        'ok' => 'Liste aktualisiert.',
    ],

    'update' => [
        'button' => 'Bearbeiten',
        'ok' => 'Post bearbeitet.',
    ],
];
