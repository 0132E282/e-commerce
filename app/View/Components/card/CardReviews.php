<?php

namespace App\View\Components\card;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardReviews extends Component
{
    /**
     * Create a new component instance.
     */
    protected $review;
    public function __construct($review)
    {
        $this->review = $review;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card.card-reviews', ['review' => $this->review]);
    }
}
