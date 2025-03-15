<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class formComponent extends Component
{
    /**
     * Create a new component instance.
     */
        public $action;
        public $method;
        public $buttonText;

        public function __construct($action='#',$method='POST',$buttonText='Add'){
            $this->action = $action;
            $this->method = strtoupper($method);
            $this->buttonText = $buttonText;
        }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-component');
    }
}
