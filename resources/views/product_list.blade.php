<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sản Phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 90%;
            margin: auto;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
            border-bottom: 2px solid red;
            padding-bottom: 5px;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .product {
            border: 1px solid #ddd;
            text-align: center;
            padding: 15px;
            border-radius: 10px;
        }

        .product img {
            width: 100%;
            max-height: 150px;
            object-fit: contain;
        }

        .price {
            color: red;
            font-weight: bold;
        }

        .old-price {
            text-decoration: line-through;
            color: gray;
            margin-left: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title">Danh Sách Sản Phẩm</div>

        @if(empty($products))
        <p>Chưa có sản phẩm nào!</p>
        @else
        <div class="product-grid">
            @foreach ($products as $product)
            <div class="product">
                <h3>{{ $product['name'] }}</h3>
                <p>Giá: {{ number_format($product['price']) }}đ</p>
                @if (!empty($product['image']))
                <img src="{{ asset('storage/images/' . $product['image']) }}" alt="Hình ảnh sản phẩm" width="150">
                @else
                <p>(Không có ảnh)</p>
                @endif
            </div>
            @endforeach

        </div>
        @endif
    </div>
</body>

</html>