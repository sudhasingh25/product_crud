<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" > 


    <title>Hello, world!</title>
  </head>
  <body>
    <div >
    <h3 class="text-center text-primary p-3">Products List</h3>
    </div>

    <div class="p-2 m-3" style="background-color:#F8F8FF;">
                    <a class="float-right mb-3 bg-info text-white p-2" href="{{route('add.product')}}">Add Product</a>

					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Image</th>
								<th>Product Name En</th>
								<th>Product Name hi</th>
								<th>Product Price</th>
								<th>Quantity</th>
								<th>Discount</th>
								<th>Status</th>

								<th>Action</th>
                            </tr>
						</thead>
						<tbody>
							@foreach($products as $product)
							<tr>
								<td><img src="{{asset($product->product_thumbnail)}}" style="width:60px; height:50px;"></td>
								<td>{{$product->product_name_en}}</td>
								<td>{{$product->product_name_hi}}</td>
								<td>{{$product->selling_price}} </td>

								<td> {{$product->product_qty}}</td>
								<td>
									@if($product->discount_price != NULL)
									@php
									$amount=$product->selling_price-$product->discount_price;
									$percentage=($amount*100)/$product->selling_price;
									@endphp
									<span class="badge badge-pill badge-danger">{{round($percentage)}} %</span>
									@else
									<span class="badge badge-pill badge-danger">No Discount</span>
									@endif
								</td>
								<td>
									@if($product->status==1)
									<span class="badge badge-pill badge-success ">Active</span>
									@else
									<span class="badge badge-pill badge-danger ">Inactive</span>
									@endif
								</td>

								
								<td width="30%">
                                    <a href="{{route('edit.product',$product->id)}}" title="Edit"class="btn btn-info btn-sm mr-1" ><i class="fa fa-pencil"></i></a>
                                    <a href="{{route('delete.product',$product->id)}}" title="Delete" id="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
									@if($product->status==1)
                                    <a href="" title="Inactive Now" class="btn btn-danger btn-sm mr-1" ><i class="fa fa-arrow-down"></i></a>
									@else
                                    <a href="" title="Active Now" class="btn btn-success btn-sm mr-1" ><i class="fa fa-arrow-up"></i></a>
									@endif
								</td>
							
							</tr>
                            @endforeach
						</tbody>
						
					  </table>
					</div>
				</div>
				
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
<!--   toastr message   -->
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script type="text/javascript">
$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
        Swal.fire({
          title: 'Are you sure?',
          text: "Delete This Data?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = link
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            )
          }
        }) 


    });

  });
</script>




</body>
</html>