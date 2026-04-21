<?php

namespace Veikals\App\Core;

use Veikals\App\DB\DB;

abstract class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = DB::connect();
    }
}
