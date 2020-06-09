<?php

namespace App;

class Github
{
    protected $user;

    protected $secret;

    protected $repository;

    protected $branch;

    public function __construct($user, $secret, $repository, $branch)
    {
        $this->user = $user;
        $this->secret = $secret;
        $this->repository = $repository;
        $this->branch = $branch;
    }

    public static function create()
    {
        $config = config('database.connections.sqlite');
 
        return new static(
            $config['user'],
            $config['secret'],
            $config['repository'],
            $config['branch']
        );
    }
}
