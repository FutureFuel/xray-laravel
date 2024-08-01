<?php

declare(strict_types=1);

namespace Futurefuel\Xray\Resolvers\Contracts;

interface ResolvesUser
{
    public function getUser(): ?string;
}
