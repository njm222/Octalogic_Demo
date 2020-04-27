<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Chat extends Eloquent
{
    protected $collection = 'chats';
}
