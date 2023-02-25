@foreach ($menu as $item)
<li class="nav-item">
	<a href="{{ $item->url() }}" class="nav-link {{ URL::current() == $item->url() ? 'active' : '' }}">
		<i class="far fa-dot-circle"></i>
		<p>{{ $item->title }}</p>
	</a>
	@if ($item->hasChildren())
		<ul>
			@include('admin.custom_menu_items', ['menu' => $item->children()])
		</ul>
	@endif
</li>
@endforeach
