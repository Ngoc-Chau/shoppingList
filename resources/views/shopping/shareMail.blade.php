<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Xác nhận đơn hàng</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<div class="container" style="background: #222;border-radius: 12px;padding:15px;">
		<div class="col-md-12" >

			<p style="text-align: center;color: #fff">Đây là email tự động khi khách hàng chia sẻ. Vui lòng không trả lời email này.</p>
			<div class="row" style="background: cadetblue;padding: 15px">

				
				<div class="col-md-12" style="text-align: center;color: #fff;font-weight: bold;font-size: 30px">
					<h3 style="margin:0">SHOPPING LIST</h3>
				</div>
				
				<div class="col-md-12">
					<p style="color:#fff;font-size: 17px;">Danh sách chia sẻ cho bạn với thông tin như sau:</p>
					<h4 style="color: #000;text-transform: uppercase;">Thông tin người chia sẻ</h4>
					<p>Họ và tên : <span style="color:#fff">{{$user->name}}</span></p>
					<p>Email : <span style="color:#fff">{{$user->email}}</span></p>	
                    
                    <h4 style="color: #000;text-transform: uppercase;">Shopping List</h4>
					<p>Sản phẩm cần mua</p>
                    <hr>
					<table class="table table-striped" style="border:1px">
						<thead>
							<tr>
								<th>Sản phẩm</th>
								<th>Mô tả</th>
								<th>Loại sản phẩm</th>
							</tr>
						</thead>

						<tbody>
							@foreach($products as $product)
                                <tr>
                                    <td>{{$product->title}}</td>
                                    <td>{{$product->content}}</td>
                                    <td>{{$product->name_cat}}</td>
                                </tr>
							@endforeach
						</tbody>
					</table>
                    <hr>
				</div>
				<center><p style="color:#fff">Shopping List</p></center>
			</div>
		</div>
	</div>
</body>
</html>