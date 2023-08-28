<?php

namespace app\models;

use mako\database\midgard\ORM;

class Task extends ORM
{
    /**
     * Table name
     * @var string
     */
    protected $tableName = 'tasks';

    /**
     * Typecasting
     * @var array
     */
    protected $cast = [
        'due_date' => 'date',
    ];

}