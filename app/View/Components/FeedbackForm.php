<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FeedbackForm extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public int $product_id,
        public int $user_id,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.feedback-form');
    }
}
