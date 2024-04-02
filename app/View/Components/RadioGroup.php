<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RadioGroup extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public array $options

         // ['entry' => 'entry', 'senior']
        // 0,        1

        // ['Entry' => 'entry', 'Senior' => 'senior']
    )
    {
        //
    }

    public function optionalWithLabels(): array {
 /* 
        In this case if array is released, which means it's not an associative array, we will use another function called
        array combine. 
        array combine it create an array where you specifically pass the keys and then the values.
*/
       return array_is_list($this->options) ? 
       array_combine($this->options, $this->options) : $this->options;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.radio-group');
    }
}
