
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					{{-- <ul class="main-nav nav navbar-nav ">
						<li ><a href="">Home</a></li>
						@forelse ($categories as $item)
							<li  class="dropdown-item" ><a href="#">{{$item->translation()->name}}</a>
							<ul class="main-nav nav navbar-nav sub_menu">
								@forelse ($subCategories as $sub)
									@if($item->id == $sub->parent_id)
									<li  class="dropdown-item"><a href="#">{{$sub->translation()->name}}</a>
									@endif
								@empty	
								@endforelse
							</ul>
							</li>
						@empty	
						@endforelse	
					</ul> --}}
					<!-- /NAV -->
					<ul class="navbar-nav main-nav nav">
							<li class="nav-item active"><a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a></li>
							@forelse ($categories as $item)
							<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$item->translation()->name}}</a>
							@php $i=0; @endphp
							@foreach ($subCategories as $sub)@if($sub->parent_id == $item->id)@if($i==0) @php $i++;	@endphp 
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">@endif<a class="dropdown-item" href="{{route('category',$sub->id)}}">{{$sub->translation()->name}}</a><br> @endif
							@endforeach @if($i!=0)</div> @endif			
							</li>
							@empty	
							@endforelse	
						  </ul>

				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		