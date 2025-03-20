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
        public $formId;

        public function __construct($action='#',$method='POST',$buttonText='Add', $formId='form'){
            $this->action = $action;
            $this->method = strtoupper($method);
            $this->buttonText = $buttonText;
            $this->formId = $formId;
        }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-component');
    }
}
