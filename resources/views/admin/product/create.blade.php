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
						<h3 class="card-title">Product Details</h3>
							<a href="{{route('admin.product.index')}}">
							<h3 class="card-title btn btn-success">Back</h3>
							</a>

						</div>
						<!--begin::Form-->
						<form class="form" id="kt_form_1" method="post" action="{{route('admin.product.insert')}}" enctype="multipart/form-data">
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
									<label class="col-form-label text-right col-lg-3 col-sm-12">Select Category *</label>
									<div class="col-lg-9 col-md-9 col-sm-12">
									<select name="category_id" id="category_id" class="form-control">
											<option value="">Select</option>
											@foreach($categories as $section)
											<optgroup label="{{$section['name']}}">  </optgroup>
												@foreach($section['categories'] as $category)
												<option value="{{$category['id']}}" @if(!empty(@old('category_id')) && $category['id']==@old('category_id')) selected=""  @endif>&nbsp;&nbsp;&nbsp;==&nbsp;&nbsp;{{$category['category_name']}}</option>

												@foreach($category['subcategories'] as $subcategory)
												<option value="{{$subcategory['id']}}" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$subcategory['category_name']}}</option>
												@endforeach
												@endforeach
											@endforeach

											</select>

									</div>
								</div>

								<div class="form-group row">
									<label class="col-form-label text-right col-lg-3 col-sm-12">Product Name *</label>
									<div class="col-lg-9 col-md-9 col-sm-12">
										<input type="text" class="form-control" name="product_name" placeholder="Enter your Category name" />

									</div>
								</div>

								<div class="form-group row">
									<label class="col-form-label text-right col-lg-3 col-sm-12">Brand Name *</label>
									<div class="col-lg-9 col-md-9 col-sm-12">
									<select name="brand_id" id="brand_id" class="form-control">
											<option value="">Select</option>
											@foreach($brands as $brand)
											
												
												<option value="{{$brand['id']}}">{{$brand['name']}}</option>

												
												
											@endforeach

											</select>

									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label text-right col-lg-3 col-sm-12">product Color *</label>
									<div class="col-lg-9 col-md-9 col-sm-12">
										<input type="text" class="form-control" name="product_color" placeholder="Enter your product name" />

									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label text-right col-lg-3 col-sm-12">product Code *</label>
									<div class="col-lg-9 col-md-9 col-sm-12">
										<input type="text" class="form-control" name="product_code" placeholder="Enter your product name" />

									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label text-right col-lg-3 col-sm-12">product Image *</label>
									<div class="col-lg-9 col-md-9 col-sm-12">
										<input type="file" class="form-control" name="main_image" />

									</div>
								</div>

								<!-- <div class="form-group row">
									<label class="col-form-label text-right col-lg-3 col-sm-12">product Gallery *</label>
									<div class="col-lg-9 col-md-9 col-sm-12">
										<input type="file" class="form-control" name="images[]" multiple />

									</div>
								</div> -->
								<div class="form-group row">
									<label class="col-form-label text-right col-lg-3 col-sm-12">product Price *</label>
									<div class="col-lg-9 col-md-9 col-sm-12">
										<input type="number" class="form-control" name="product_price" placeholder="Enter your product name" />

									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label text-right col-lg-3 col-sm-12">product Discount *</label>
									<div class="col-lg-9 col-md-9 col-sm-12">
										<input type="text" class="form-control" name="product_discount" placeholder="Enter your product name" />

									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label text-right col-lg-3 col-sm-12">product Stock *</label>
									<div class="col-lg-9 col-md-9 col-sm-12">
										<input type="number" class="form-control" name="stock" placeholder="Enter your product Stock" />

									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label text-right col-lg-3 col-sm-12">product Description *</label>
									<div class="col-lg-9 col-md-9 col-sm-12">
										<textarea name="description" id="" cols="120" rows="8"></textarea>

									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label text-right col-lg-3 col-sm-12">product Meta_title *</label>
									<div class="col-lg-9 col-md-9 col-sm-12">
										<input type="text" class="form-control" name="meta_title" placeholder="Enter your product name" />

									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label text-right col-lg-3 col-sm-12">product Meta Description *</label>
									<div class="col-lg-9 col-md-9 col-sm-12">
										<textarea name="meta_description" id="" cols="120" rows="8"></textarea>

									</div>
								</div>
							


							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-lg-9 ml-lg-auto">
										<button type="submit" class="btn btn-primary font-weight-bold mr-2" name="submitButton">Add product</button>

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
