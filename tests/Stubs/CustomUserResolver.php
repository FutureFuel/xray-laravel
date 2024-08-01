<?php

declare(strict_types=1);

namespace Futurefuel\Xray\Tests\Stubs;

use Futurefuel\Xray\Resolvers\Contracts\ResolvesUser;

class CustomUserResolver implements ResolvesUser
{
    public function getUser(): ?string
    {
        return 'foo';
    }
}
