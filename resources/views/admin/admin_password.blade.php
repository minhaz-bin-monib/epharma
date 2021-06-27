@extends('layout.admin_layout.master')
@section('content')

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container">
        @include('error.message')
			<!--begin::Dashboard-->
			<div class="row">
									<div class="col-lg-12">
										<!--begin::Card-->
										<div class="card card-custom example example-compact">
											<div class="card-header">
												<h3 class="card-title">Change Password</h3>
												
											</div>
											<!--begin::Form-->
											<form class="form" novalidate="novalidate" id="t_login_signup_form" method="post" action="{{route('admin.updatePassword')}}">
                                                @csrf
												<div class="card-body">
													<!--begin: Code-->
													<div class="example-code mb-10">
														<ul class="example-nav nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-2x">
															<li class="nav-item">
																<a class="nav-link active" data-toggle="tab" href="#example_code_html">HTML</a>
															</li>
															<li class="nav-item">
																<a class="nav-link" data-toggle="tab" href="#example_code_js">JS</a>
															</li>
														</ul>
														<span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
														<div class="tab-content">
															<div class="tab-pane active" id="example_code_html" role="tabpanel">
																<div class="example-highlight">
																	<pre style="height:400px">


																</div>
															</div>
														</div>
													</div>
													<!--end: Code-->
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
														<label class="col-form-label text-right col-lg-3 col-sm-12">Email *</label>
														<div class="col-lg-9 col-md-9 col-sm-12">
															<input type="email" class="form-control" name="email" id="email" value="{{Auth::guard('admin')->user()->email}}" />
															
														</div>
													</div>

                                                    <div class="form-group row">
														<label class="col-form-label text-right col-lg-3 col-sm-12">Current Password *</label>
														<div class="col-lg-9 col-md-9 col-sm-12">
															<input type="password" class="form-control" name="current_pwd" id="current_pwd" placeholder="Enter your current password" />
															<span id="chkPwd"></span>
														</div>
													</div>
                                                    <div class="form-group row">
														<label class="col-form-label text-right col-lg-3 col-sm-12">New Password *</label>
														<div class="col-lg-9 col-md-9 col-sm-12">
															<input type="password" class="form-control" name="new_password" id="new_password" placeholder="Enter your new Password" />
															
														</div>
													</div>
                                                    <div class="form-group row">
														<label class="col-form-label text-right col-lg-3 col-sm-12">Confirm Password *</label>
														<div class="col-lg-9 col-md-9 col-sm-12">
															<input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter your Confirm Password" />
															
														</div>
													</div>
													
												
												</div>
												<div class="card-footer">
													<div class="row">
														<div class="col-lg-9 ml-lg-auto">
															<button type="submit" class="btn btn-primary font-weight-bold mr-2" name="submitButton">Update Password</button>
															
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
