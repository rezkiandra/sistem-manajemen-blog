<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SidebarItem extends Component
{
	public $title, $route, $icon;
	/**
	 * Create a new component instance.
	 */
	public function __construct($title, $route = null, $icon = null)
	{
		$this->title = $title;
		$this->route = $route;
		$this->icon = $icon;
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('components.sidebar-item');
	}
}
