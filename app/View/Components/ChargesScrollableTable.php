<?php

namespace App\View\Components;


use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ChargesScrollableTable extends Component
{
    /**
     * The table headers.
     *
     * @var array
     */
    public $headers;

    /**
     * The table data.
     *
     * @var array
     */
    public $data;

    /**
     * Create a new component instance.
     *
     * @param array $headers
     * @param array $data
     */
    public function __construct(array $headers, array $data = null)
    {
        $this->headers = $headers;
        $this->data = $data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.charges-scrollable-table');
    }


}
