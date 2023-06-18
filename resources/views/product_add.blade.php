
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.4.1/bootstrap-tagsinput.css" integrity="sha512-GH7CEz2ZI2YHzbh9dYyD/mVuo6o192+tPoyYHhThhdvu5mZtlF4AoCdx97UdnDsM+re1ZLoNY6bGFYOInOrYOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" > 


    <title>Hello, world!</title>
    <style>
        .label-info{
            background-color:#7303fc;
            padding:2px;
            border-radius:5px;
        }
    </style>
  </head>
  <body>
    <div >
    <h3 class="text-center text-primary p-3">Add Product</h3>
    </div>

    <div class="p-2 m-3" style="background-color:#F8F8FF;">

    <div class="box-body">
			  <div class="row">

				<div class="col">
					<form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                      @csrf  
					  <div class="row">
						<div class="col-12">	
                            <div class="row">
                                <div class="col-8"></div>
                                <div class="col-4">                        
                                    <a class="float-right mb-3 bg-info text-white p-2" href="{{url('/')}}">List Product</a>
                                </div>
                            </div>

                            <div class="row">   <!-- 1st row-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                    	<h5>Brand</h5>
                                    	<div class="controls">
											<select name="brand_id" class="form-control">
												<option value="">Select Brand</option>



                                                @foreach($brands as $brand)
                                                    <option value="{{$brand->id}}">{{$brand->brand_name_en}}</option>
                                                @endforeach
                                            </select>	
											</div>
									</div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    	<h5>Category</h5>
                                    	<div class="controls">
											<select name="category_id" class="form-control">
												<option value="">Select Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->category_name_en}}</option>
                                                @endforeach
											</select>
											</div>
									</div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    	<h5>SubCategory</h5>
                                    	<div class="controls">
											<select name="subcategory_id" class="form-control">
												<option value="">Select Sub Category</option>
												
											</select>
										</div>
									</div>
                                </div>
                            </div>  <!-- 1st row end-->

						
                            <div class="row">   <!-- 2nd row-->

                                <div class="col-md-4">
                                    <div class="form-group">
                                    	<h5>SubSubCategory</h5>
                                    	<div class="controls">
											<select name="subsubcategory_id" class="form-control">
												<option value="">Select Sub SubCategory</option>
												
											</select>
											
										</div>
									</div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Name English<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_name_en" class="form-control"> 
                                                                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Name Hindi<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_name_hi" class="form-control"> 
                                           
                                           
                                        </div>
                                    </div>
                                </div>
                                
                            </div>  <!-- 2nd row end-->

                            <div class="row">   <!-- 3rd row-->

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Code <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_code"  class="form-control"> 
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Quantity<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_qty" class="form-control"> 
                                        </div>
                                       
                                    </div>
                                </div>

                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Tags English<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_tags_en" value="Lorem,Ipsum,Amet"  data-role="tagsinput" class="form-control"> 
                                        </div>
                                    </div>
                                </div>
                                
                            </div>  <!-- 3rd row end-->

                            <div class="row">   <!-- 4th row-->

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Tags Hindi<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_tags_hi" value="Lorem,Ipsum,Amet" data-role="tagsinput" class="form-control"> 
                                        </div>
                                        
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                    <h5>Product Size English<span class="text-danger"></span></h5>

                                        <div class="controls">
                                            <input type="text" name="product_size_en" value="Small,Medium,Large" data-role="tagsinput" class="form-control"> 
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <h5>Product Size Hindi<span class="text-danger"></span></h5>

                                        <div class="controls">
                                            <input type="text" name="product_size_hi" value="छोटा,मध्यम,बड़ा
" data-role="tagsinput" class="form-control"> 
                                        </div>
                                                                          </div>
                                </div>


                            </div>  <!-- 4th row end-->


                            <div class="row">   <!-- 5th row-->


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Colour English<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_color_en" value="Red,Black,White" data-role="tagsinput" class="form-control"> 
                                                                                  </div>
                                        
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Colour Hindi<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_color_hi" value="लाल, काला, सफेद
                                                " data-role="tagsinput" class="form-control"> 
                                           
                                        </div>
                                       
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Selling Price<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="selling_price" class="form-control"> 
                                                                                   </div>
                                    </div>   
                                </div>


                            </div>  <!-- 5th row end-->

                            <div class="row"> <!-- 6th row start-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <h5>Product Discount Price<span class="text-danger"></span></h5>

                                        <div class="controls">
                                            <input type="text" name="discount_price" class="form-control"> 
                                            </div>
                                    </div>   
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Main Thumbnail <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="product_thumbnail"  class="form-control" onChange="mainThumbURL(this)"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <img src="" id="mainThumb">
                                </div>



                                
                            </div>  <!-- 6th row end-->


                            <div class="row"> <!-- 7th row start-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Product Short Description English<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="short_descp_en" id="textarea" class="form-control" ></textarea>

                                        </div>
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Product Short Description Hindi <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="short_descp_hi" id="textarea" class="form-control" ></textarea>

                                        </div>
                                    </div>  
                                </div>
                            </div>  <!-- 7th row end-->

                         <hr>   
                            <div class="row"> <!-- 8th row start-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Product Long Description English<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea id="editor1" name="long_descp_en" rows="10" cols="80">
												
						                    </textarea>
                                        </div>
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Product Long Description Hindi <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea id="editor2" name="long_descp_hi" rows="10" cols="80">
												
						                    </textarea>
                                        </div>
                                    </div>  
                                </div>
                            </div>  <!-- 8th row end-->
                        <hr>


                        
                            <div class="row"> <!-- 9th row start-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_2" name="hot_deals" value="1">
                                                <label for="checkbox_2">Hot Deals</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_3" name="featured" value="1">
                                                <label for="checkbox_3">Featured</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_4" name="special_offer" value="1">
                                                <label for="checkbox_4">Special Offer</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_5" name="special_deals" value="1">
                                                <label for="checkbox_5">Special Deals</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                    
                            </div>  <!-- 9th row end-->



                            







							</div>
						</div>
						
						<div class="text-xs-right">
						<input type="submit" class="btn btn-primary mb-5 text-center" value="Add Product">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
	</div>
				
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"> 
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('select[name="category_id"]').on("change",function(){
                var cat_id=$(this).val();
                if(cat_id){
                    $.ajax({
                        url: "{{ url('/category/get-subcategory/ajax') }}/"+cat_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data){
                            $('select[name="subcategory_id"]').empty();
                            $.each(data,function(key,value){
                                $('select[name="subcategory_id"]').append('<option value="'+value.id+'">'+
                                value.subcategory_name_en+'</option>')
                            });
                        },
                    });
                }else{
                    alert('danger');
                }
            });
        });
    </script>


    <script type="text/javascript">
        $(document).ready(function(){
            $('select[name="subcategory_id"]').on("change",function(){
                var subcatid=$(this).val();
                if(subcatid){
                    $.ajax({
                        url: "{{url('/subcategory/getsubsubcategory/ajax')}}/"+subcatid,
                        type:"GET",
                        dataType:"json",
                        success:function(data){
                           // alert("data---------------");
                            $('select[name="subsubcategory_id"]').empty();
                            $.each(data,function(key,value){
                                $('select[name="subsubcategory_id"]').append(
                                    '<option value="'+value.id+'">'+value.subsubcategory_name_en+'</option>'
                                )
                            });
                        },
                    });
                }else{
                    alert("danger");
                }
            });
        });
    </script>

    <script type="text/javascript">
	function mainThumbURL(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThumb').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.4.1/bootstrap-tagsinput.js" integrity="sha512-5kM6o6rK/lDqwNp08l5zl3Rw0qPuz28SKwuQWhcN8Mp0g+wGiQtPqSIPtkzQQGGR2ivSront3ZHQ3yh51BkmnQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    // ck editor
   
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
        CKEDITOR.replace('editor1');
</script>
<script>
        CKEDITOR.replace('editor2');
</script>



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
@if(Session::has('message'))
var type = "{{ Session::get('alert-type','info') }}"
switch(type){
case 'info':
toastr.info(" {{ Session::get('message') }} ");
break;
case 'success':
toastr.success(" {{ Session::get('message') }} ");
break;
case 'warning':
toastr.warning(" {{ Session::get('message') }} ");
break;
case 'error':
toastr.error(" {{ Session::get('message') }} ");
break; 
}
@endif 
</script>




    </body>
</html>



























			