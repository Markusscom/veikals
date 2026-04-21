<?php

namespace Veikals\Core;

use DB;

abstract class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = DB::connect();
    }
}
