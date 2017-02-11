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

class AwardCriteria
{
    /**
     * @var string The table to run the query
     */
    public $table = '';

    /**
     * @var string The field (or columns) to run the query on
     */
    public $field = '';

    /**
     * @var callable Anonymous function to check the award criteria
     */
    protected $function;

    /**
     * @var string The where statement to use when running the query
     */
    public $where = '';

    /**
     * AwardCriteria constructor.
     *
     * @param string $table The table to run the query
     * @param string $field The field (or columns) to run the query on
     * @param string $where The where statement when running the query
     * @param callable $function
     */
    public function __construct($table, $field, $where, callable $function)
    {
        $this->table = $table;
        $this->field = $field;
        $this->where = $where;
        $this->function = $function;
    }

    /**
     * Determines if the player has met the criteria to earn an award
     *
     * @param string[] $row The resulting row from the database
     * @param int $level The award level, or amount of times the Award has been awarded to the player
     *
     * @return bool true of the criteria for this award has been met for this award
     */
    public function checkCriteria($row, $level)
    {
        $function = $this->function;
        return $function($row, $level);
    }
}