@extends('layout.admin_layout.master')
@section('content')

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container">
			<!--begin::Dashboard-->
			<div class="row">
				<div class="col-lg-12">
					<!--begin::Card-->
					<div class="card card-custom example example-compact">
						<div class="card-header">
						<h3 class="card-title">adminLogo Update</h3>
							<a href="{{route('admin.dashboardlogo.index')}}">
							<h3 class="card-title btn btn-success">Back</h3>
							</a>

						</div>
						<!--begin::Form-->
						<form class="form" id="kt_form_1" method="post" action="{{route('admin.frontendlogo.update',$frontLogo->id)}}"enctype="multipart/form-data">
						@csrf
							<div class="card-body">


								<div class="alert alert-custom alert-light-danger d-none" role="alert" id="kt_form_1_msg">
									<div class="alert-icon">
										<i class="flaticon2-information"></i>
									</div>
									<div class="alert-text font-weight-bold">Oh snap! Change a few things up and try submitting again.</div>
									<div class="alert-close">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span>
												<i class="ki ki-close"></i>
											</span>
										</button>
									</div>
								</div>
							
								<div class="form-group row">
									<label class="col-form-label text-right col-lg-3 col-sm-12">Logo *</label>
									<div class="col-lg-9 col-md-9 col-sm-12">
										<input type="file" class="form-control" name="logo" id="adminLogo_image" />

									</div>
								</div>


							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-lg-9 ml-lg-auto">
										<button type="submit" class="btn btn-primary font-weight-bold mr-2" name="submitButton">Update Brand</button>

									</div>
								</div>
							</div>
						</form>
						<!--end::Form-->
					</div>
					<!--end::Card-->
				</div>

			</div>
			<!--end::Dashboard-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Entry-->
</div>
<!--end::Content-->
@endsection
