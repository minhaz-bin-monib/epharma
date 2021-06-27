@extends('layout.admin_layout.master')
@section('content')

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container">
			<!--begin::Dashboard-->
			@include('error.message')
			<div class="row">
				<div class="col-lg-12">
					<!--begin::Card-->
					<div class="card card-custom example example-compact">
						<div class="card-header">
						<h3 class="card-title">Product Attributes</h3>
							<a href="{{route('admin.product.index')}}">
							<h3 class="card-title btn btn-success">Back</h3>
							</a>

						</div>
						<!--begin::Form-->
						<form class="form" id="kt_form_1" method="post" action="{{route('admin.product.product_attribute',$productData['id'])}}"enctype="multipart/form-data">
						@csrf
						<input type="hidden" class="form-control" name="product_id" value="{{$productData['id']}}" />
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

								<input type="hidden" name="product_id" id="product_id" value="{{$productData['id']}}">

						<div class="control-group">
						<label class="control-label">Product Name:</label>
							<label class="control-label"><strong>{{$productData['product_name']}}</strong></label>
						</div>
						<div class="control-group">
						<label class="control-label">Product Code:</label>
						<label class="control-label"><strong>{{$productData['product_code']}}</strong></label>
						</div>
						<div class="control-group">
						<label class="control-label">Product Color:</label>
						<label class="control-label"><strong>{{$productData['product_color']}}</strong></label>
						</div>
								

								<div class="form-group row">
								<div class="field_wrapper">
									<div>
										<input type="text" name="sku[]" id="sku" placeholder="SKU" style="width: 120px"/>
										<input type="text" name="size[]" id="size" placeholder="Size" style="width: 120px"/>
										<input type="number" name="price[]" id="price" placeholder="Price" style="width: 120px"/>
										<input type="number" name="stock[]" id="stock" placeholder="Stock" style="width: 120px"/>
										<a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
										<br>
									</div>
								</div>
								</div>
								
					
							


							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-lg-9 ml-lg-auto">
										<button type="submit" class="btn btn-primary font-weight-bold mr-2" name="submitButton">Add product Attribute</button>

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

			<div class="card-body">
					<!--begin: Datatable-->
					<table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
						<thead>
							<tr>
								<th>Serial No:</th>
								<th>product SKU</th>
								<th>Product Size</th>
								<th>Product  Price</th>
								<th>product Stock</th>
								<th>Status</th>
                              <th>Action</th>


							</tr>
						</thead>
						<tbody>
							@foreach($productAttributes as $productAttribute)
							<tr>
								<td>{{$loop->index+1}}</td>



								<td>{{$productAttribute->sku}}</td>
							
								<td>{{$productAttribute->size}}</td>
								<td>{{$productAttribute->price}}</td>
								<td>{{$productAttribute->stock}}</td>
								<td><input type="checkbox" {{$productAttribute->status=='active'? 'checked':''}} id="productAttributeStatus" data-id="{{$productAttribute['id']}}" data-toggle="toggle" data-style="ios" data-on="Active" data-off="Inactive" data-offStyle="danger" data-onStyle="success"></td>
                        <td></td>

							</tr>
						@endforeach
						</tbody>
					</table>
					<!--end: Datatable-->
				</div>
		</div>
		<!--end::Container-->
	</div>
	<!--end::Entry-->
</div>
<!--end::Content-->
@endsection
