@extends('layout.master2') 

@section('content') 
		<section id="slider" class="slider-element min-vh-100 dark include-header">
			<div class="slider-inner">

				<div class="container">
					<div class="slider-caption slider-caption-center">
						<h2 data-animate="fadeInUp">歡迎來到首頁</h2>
					</div>
				</div>

				<div class="video-wrap no-placeholder" style="z-index: 1;">
					<video poster="/images/videos/explore-poster.jpg" preload="auto" loop autoplay muted playsinline>
						<source src='/images/videos/explore.mp4' type='video/mp4'>
						<source src='/images/videos/explore.webm' type='video/webm'>
					</video>
					<div class="video-overlay" style="background-color: rgba(0,0,0,0.45);"></div>
				</div>

			</div>
		</section>
@endsection