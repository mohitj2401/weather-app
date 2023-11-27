<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class WeatherWidget extends Component
{

    public $location;
    public $current;
    public $future;
    /**
     * Create a new component instance.
     */
    public function __construct($location, $current, $future)
    {
        $this->location = $location;
        $this->current = $current;
        $this->future = $future;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.weather-widget');
    }
}
