	<header class="header">
		<div class="container">
			<div class="col12">
				<button class="open-nav">
					<span class="navicon"></span>
				</button>
				<h1 class="site-brand">
					<a href="/"></a>
				</h1>
				@include('layouts/partials/user-tab')
			</div>
		</div>
		{!!
		    Menu::make('website.menu')
		        ->classes('main-nav')
		        ->render('components/menu')
		!!}
	</header>