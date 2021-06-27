
<div class="form-group row">
  <label class="col-form-label text-right col-lg-3 col-sm-12">Select category Level</label>
  <div class="col-lg-9 col-md-9 col-sm-12">
    <select name="parent_id" id="parent_id" class="form-control" style="width: 100%;">
      <option value="0">Main Category</option>
      @if(!empty($getCategories))
          @foreach($getCategories as $category)
              <option value="{{$category['id']}}" >{{$category['category_name'] }}</option>
              @if(!empty($category['subcategories']))
  @foreach($category['subcategories'] as $subcategory)
  <option value="{{ $subcategory['id'] }}">&nbsp;&raquo;&nbsp;{{ $subcategory['category_name'] }}</option>
@endforeach
@endif
              @endforeach
              @endif
    </select>

  </div>
</div>
