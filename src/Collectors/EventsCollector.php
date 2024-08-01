<?php

declare(strict_types=1);

namespace Futurefuel\Xray\Collectors;

use Illuminate\Foundation\Application;

abstract class EventsCollector extends SegmentCollector
{
    /**
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;

        $this->registerEventListeners();
    }
}
