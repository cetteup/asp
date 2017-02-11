<?php
/**
 * BF2Statistics ASP Management Asp
 *
 * Author:       Steven Wilson
 * Copyright:    Copyright (c) 2006-2017, BF2statistics.com
 * License:      GNU GPL v3
 *
 */
namespace System;

/**
 * ------------------------------------------------------------------
 * Define common criteria functions
 * ------------------------------------------------------------------
 */

$sRibbonCriteria = function($row, $timesAwarded)
{
    return ($timesAwarded == 0 && $row['result'] > 180000);
};

$vServiceMedalCriteria = function($row, $timesAwarded)
{
    $level = $timesAwarded + 1;
    $best = (int)$row['brnd'];
    $time = ((int)$row['time']) / 3600; // Convert to hours
    $wins = (int)$row['wins'];
    return ($best >= (100 * $level) && $time >= (100 * $level) && $wins >= (100 * $level));
};

$xServiceMedalCriteria = function($row, $timesAwarded)
{
    $level = $timesAwarded + 1;
    $best = (int)$row['brnd'];
    $time = ((int)$row['time']) / 3600; // Convert to hours
    $wins = (int)$row['wins'];
    return ($best >= (100 * $level) && $time >= (50 * $level) && $wins >= (50 * $level));
};


/**
 * ------------------------------------------------------------------
 * Return Backend Awards and Criteria
 * ------------------------------------------------------------------
 */

return array(
    /** Service Ribbons */

    // Middle Eastern Service Ribbon
    new BackendAward(3191305, [
        new AwardCriteria('player_map', 'count(*) AS result', 'mapid IN (0,1,2,3,4,5,6) AND time >= 1',
            function($row, $timesAwarded)
            {
                return ($timesAwarded == 0 && $row['result'] == 7);
            }
        )
    ]),
    // Far East Service Ribbon
    new BackendAward(3190605, [
        new AwardCriteria('player_map', 'count(*) AS result', 'mapid IN (100,101,102,103,105,601) AND time >= 1',
            function($row, $timesAwarded)
            {
                return ($timesAwarded == 0 && $row['result'] == 6);
            }
        )
    ]),
    // European Union Service Ribbon
    new BackendAward(3270519, [
        new AwardCriteria('player_map', 'count(*) AS result', 'mapid IN (10,11,110) AND time >= 1',
            function($row, $timesAwarded)
            {
                return ($timesAwarded == 0 && $row['result'] == 3);
            }
        ),
        new AwardCriteria('player_map', 'sum(time) AS result', 'mapid IN (10,11,110)',
            function($row, $timesAwarded)
            {
                return ($timesAwarded == 0 && $row['result'] == 180000);
            }
        ),
    ]),
    // North American Service Ribbon
    new BackendAward(3271401, [
        new AwardCriteria('player_map', 'count(*) AS result', 'mapid IN (200,201,202) AND time >= 1',
            function($row, $timesAwarded)
            {
                return ($timesAwarded == 0 && $row['result'] == 3);
            }
        ),
        new AwardCriteria('player_map', 'sum(time) AS result', 'mapid IN (200,201,202)',
            function($row, $timesAwarded)
            {
                return ($timesAwarded == 0 && $row['result'] == 90000);
            }
        ),
    ]),

    /** Xpack Service Ribbons */

    // Navy Seal Special Service Ribbon
    new BackendAward(3261919, [
        new AwardCriteria('player_army', 'time AS result', 'id = 3', $sRibbonCriteria),
        new AwardCriteria('player_map', 'count(*) AS result', 'mapid IN (300,301,304) AND time >= 1',
            function($row, $timesAwarded)
            {
                return ($timesAwarded == 0 && $row['result'] == 3);
            }
        ),
    ]),
    // SAS Special Service Ribbon
    new BackendAward(3261901, [
        new AwardCriteria('player_army', 'time AS result', 'id = 4', $sRibbonCriteria),
        new AwardCriteria('player_map', 'count(*) AS result', 'mapid IN (302,303,307) AND time >= 1',
            function($row, $timesAwarded)
            {
                return ($timesAwarded == 0 && $row['result'] == 3);
            }
        ),
    ]),
    // SPETZNAS Service Ribbon
    new BackendAward(3261819, [
        new AwardCriteria('player_army', 'time AS result', 'id = 5', $sRibbonCriteria),
        new AwardCriteria('player_map', 'count(*) AS result', 'mapid IN (305,306,307) AND time >= 1',
            function($row, $timesAwarded)
            {
                return ($timesAwarded == 0 && $row['result'] == 3);
            }
        ),
    ]),
    // MECSF Service Ribbon
    new BackendAward(3261319, [
        new AwardCriteria('player_army', 'time AS result', 'id = 6', $sRibbonCriteria),
        new AwardCriteria('player_map', 'count(*) AS result', 'mapid IN (300,301,304) AND time >= 1',
            function($row, $timesAwarded)
            {
                return ($timesAwarded == 0 && $row['result'] == 3);
            }
        ),
    ]),
    // Rebel Service Ribbon
    new BackendAward(3261805, [
        new AwardCriteria('player_army', 'time AS result', 'id = 7', $sRibbonCriteria),
        new AwardCriteria('player_map', 'count(*) AS result', 'mapid IN (305,306) AND time >= 1',
            function($row, $timesAwarded)
            {
                return ($timesAwarded == 0 && $row['result'] == 2);
            }
        ),
    ]),
    // Insurgent Service Ribbon
    new BackendAward(3260914, [
        new AwardCriteria('player_army', 'time AS result', 'id = 8', $sRibbonCriteria),
        new AwardCriteria('player_map', 'count(*) AS result', 'mapid IN (302,303) AND time >= 1',
            function($row, $timesAwarded)
            {
                return ($timesAwarded == 0 && $row['result'] == 2);
            }
        ),
    ]),

    /** Service Medals */

    // Navy Cross
    new BackendAward(2021403, [
        new AwardCriteria('player_army', 'time, wins, brnd', 'id = 0', $vServiceMedalCriteria),
    ]),
    // Golden Scimitar
    new BackendAward(2020719, [
        new AwardCriteria('player_army', 'time, wins, brnd', 'id = 1', $vServiceMedalCriteria),
    ]),
    // Peoples Medallion
    new BackendAward(2021613, [
        new AwardCriteria('player_army', 'time, wins, brnd', 'id = 2', $vServiceMedalCriteria),
    ]),
    // European Union Service Medal
    new BackendAward(2270521, [
        new AwardCriteria('player_army', 'time, wins, brnd', 'id = 9', $xServiceMedalCriteria),
    ]),

    /** Xpack Service Medals */

    // Navy Seal Special Service Medal
    new BackendAward(2261913, [
        new AwardCriteria('player_army', 'time, wins, brnd', 'id = 3', $xServiceMedalCriteria),
    ]),
    // SAS Special Service Medal
    new BackendAward(2261919, [
        new AwardCriteria('player_army', 'time, wins, brnd', 'id = 4', $xServiceMedalCriteria),
    ]),
    // SPETZ Special Service Medal
    new BackendAward(2261613, [
        new AwardCriteria('player_army', 'time, wins, brnd', 'id = 5', $xServiceMedalCriteria),
    ]),
    // MECSF Special Service Medal
    new BackendAward(2261303, [
        new AwardCriteria('player_army', 'time, wins, brnd', 'id = 6', $xServiceMedalCriteria),
    ]),
    // Rebels Special Service Medal
    new BackendAward(2261802, [
        new AwardCriteria('player_army', 'time, wins, brnd', 'id = 7', $xServiceMedalCriteria),
    ]),
    // Insurgent Special Service Medal
    new BackendAward(2260914, [
        new AwardCriteria('player_army', 'time, wins, brnd', 'id = 8', $xServiceMedalCriteria),
    ]),
);