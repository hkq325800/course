@if (has_notice())
	<div id="notice"  style="background-color:yellow;">
	{{ get_notice();clean_notice() }}
	</div>
@endif