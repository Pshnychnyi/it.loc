@if ($items && !$items->isEmpty())
	@foreach ($items as $item)

		@if ($item->hasChildren())
			<div class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown">{!! $item->title !!}</a>
				<div class="dropdown-menu">
					@foreach ($item->children() as $k => $el)
						<a href="{!! $el->url() !!}" class="dropdown-item">{!! $el->title !!}</a>
					@endforeach
				</div>
			</div>
			@continue
		@endif
		<a href="{!! $item->url() !!}" class="nav-item nav-link{{URL::current() == $item->url() ? ' active' : ''}}">{!! $item->title !!}</a>

	@endforeach
@endif


