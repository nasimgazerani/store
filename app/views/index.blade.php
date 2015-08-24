@extends('layouts . guest')

@section('title')
	index
@stop

@section('content')
	<div id="body">
		<div class="right">
			<div id="basket">
				<h3>سبد خرید</h3>
				<div>تعاد کالا : <span class="count">0</span></div>
				<div>قیمت : <span class="cost">0</span></div>
				<a href="{{{ route('basket') }}}">نمایش سبد خرید</a>
			</div>
			
		</div>
		<div class="left">
			<div class="slide"></div>
			<div class="last-product">
				<h3 class="section-title">جدید ترین کالاها</h3>
				
				@foreach($lastProducts as $lastProduct)
					<div class="product">
						<div>{{{ $product->name }}} </div>
						<button>اضافه به سبد خرید</button>
					</div>
				@endforeach
				
				<div class="clearfix"></div>
			</div>
			<div class="top-sells">
				<h3 class="section-title">پرفروش ترین کالاها</h3>
				
				@foreach($topSells as $topSell)
					<div class="product">
						<div>{{{ $topSell->name }}}</div>
						<input type="hidden" value="{{{ $topSell->id }}}" />
						<button>اضافه به سبد خرید</button>
					</div>
				@endforeach
				
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
@stop