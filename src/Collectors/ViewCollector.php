<?php

declare(strict_types=1);

namespace Futurefuel\Xray\Collectors;

class ViewCollector extends EventsCollector
{
    public function registerEventListeners(): void
    {
        $this->app['events']->listen('creating:*', function ($view, $data = []) {
            $viewName = substr($view, 10);
            $this->addSegment('View ' . $viewName)->end();
        });

        $this->app['events']->listen('composing:*', function ($view, $data = []) {
            $viewName = substr($view, 11);
            if ($this->hasAddedSegment('View ' . $viewName)) {
                $this->endSegment('View ' . $viewName);
            }
        });
    }
}
