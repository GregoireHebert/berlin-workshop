<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

/**
 * @author Grégoire Hébert gregoire@les-tilleuls.coop
 */
class RentBook
{
    public function __invoke($data)
    {
        // do some stuff...

        return new Response('stuff', Response::HTTP_CREATED);
        // return $data;
    }
}
