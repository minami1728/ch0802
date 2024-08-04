@extends('layout.master3') 


@section('content') 
		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap">
				<div class="container">

					<div>

						<div class="form-result"></div>

						<div class="row">
							<div class="col-lg-12">
							<form action="/user/auth/sign_up" method="post" >
							@csrf
									<div class="form-process">
										<div class="css3-spinner">
											<div class="css3-spinner-scaler"></div>
										</div>
									</div>
									<div class="col-12 form-group">
										<label>暱稱:</label>
										<input type="text" name="nickname" id="nickname" class="form-control required" value="" placeholder="輸入名稱">
									</div>
									<div class="col-12 form-group">
										<label>帳號:</label>
										<input type="text" name="account" id="account" class="form-control required" value="" placeholder="輸入帳號">
									</div>
									<div class="col-12 form-group">
										<label>密碼:</label>
										<input type="text" name="password" id="password" class="form-control required" value="" placeholder="輸入密碼">
									</div>
									<div class="col-12 form-group">
										<label>帳號類型:</label><br>
										<div class="form-check form-check-inline">
											<input class="form-check-input required" type="radio" name="type"id="type" value="G">
											<label class="form-check-label text-transform-none" for="type">一般會員</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="type"id="type" value="A">
											<label class="form-check-label text-transform-none" for="type">管理者</label>
										</div>
									</div>
									<div class="col-12">
									<button type="submit" class="btn btn-secondary">Register</button>
									</div>

									<input type="hidden" name="prefix" value="event-registration-">
								</form>
							</div>

						</div>

					</div>

				</div>
			</div>
		</section><!-- #content end -->

@endsection 