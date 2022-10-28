@if(session()->has('message'))
	<div class="message">
		<div class="container">
			<div class="row">
				<p>{{session('message')}}</p>
			</div>
		</div>
	</div>
@endif