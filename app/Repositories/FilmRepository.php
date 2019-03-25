<?php

namespace App\Repositories;

use App\Model\Film;

use App\Repositories\Contracts\FilmInterface;

class FilmRepository extends BaseRepository implements FilmInterface
{
    public function __construct(Film $film)
    {
        parent::__construct($film);
    }
}
