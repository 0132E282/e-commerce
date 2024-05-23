<?php

namespace App\storage;

use App\storage\StorageServer;

class StoreFactory
{
    static function initialize($type = null)
    {
        switch ($type) {

            default:
                return new StorageServer();
        }
    }
}
