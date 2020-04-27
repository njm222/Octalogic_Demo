<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB\Client as Mongo;

class MongoDB extends Controller
{
    private $mongo;
    private $db;

    function __construct () {
        $this->mongo = new Mongo();
        $this->db = $this->mongo->selectDatabase(env('DB_DATABASE'));
    }

    function testConnection () {
        return $this->db;
    }

    function setupData () {
        $this->db->users->drop();
        // Setup sample users data
        if ($this->db->users->countDocuments() === 0) {
            for ( $i = 0; $i < 10; $i++ )
            {
                $this->db->users->insertOne(array("userID" => $i ));
            }
        }
        $this->db->chats->drop();
        // Setup sample chats data
        if ($this->db->chats->countDocuments() === 0) {
            for ( $i = 1; $i < 10; $i++ )
            {
                $this->db->chats->insertOne(array("users" => array(0, $i),
                    "messages" => array(
                        array("senderID" => 0, "msg" => "test msg from user1"),
                        array("senderID" => $i, "msg" => "test msg from user$i")) ));
            }
        }

        return "sample data has been added";
    }
}
