@extends('layouts.app')
@section('content')
    <div class="list-product">
        @if (!empty(session('success')))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="header mb-2">
            <div class="right mb-1">
                <a href="{{ route('products.create') }}">
                    <button class="btn btn-success" style="right: 0px;">
                        <i class="fas fa-solid fa-plus"></i>
                        add
                    </button>
                </a>
            </div>
            <div>
                <form action="{{ route('products.index') }}" method="GET" class="form-filter row" id="search-form">
                    <div class="col-3">
                        <select class="form-select d-inline" aria-label="Default select example" name="status" id="search-by-status">
                            <option @if (!isset($filters) && !isset($filters['status'])) selected @endif value="">Chọn trạng thái</option>
                            <option @if (isset($filters) && !empty($filters['status']) && $filters['status'] == 1) selected @endif value="1">Hoạt động</option>
                            <option @if (isset($filters) && isset($filters['status']) && $filters['status'] == 0) selected @endif value="0">Không hoạt động</option>
                          </select>
                    </div>
                    <div class="col-9">
                        <input class="form-control d-inline" type="text" name="name"
                        @if (isset($filters) && !empty($filters['name'])) value="{{ $filters['name'] }}" @endif>
                    <button class="btn btn-primary d-inline" type="submit">search</button>
                    </div>
                </form>
            </div>
        </div>
        <table class="checkbox-datatable table table-hover nowrap" style="width: 100%; background-color: #CCFFFF">
            <thead style="background-color: #FFCC33">
                <tr>
                    <th>Ảnh</th>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Thời gian tạo</th>
                    <th>Trạng thái</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody class="table-striped">
                @if (!empty($products))
                    @foreach ($products as $key => $item)
                        <tr>
                            <td style="font-size: 16px">
                                <img @if ($item->image) {{ $item->image }}
                                src = "images/product/{{ $item->image }}"
                                @else src = "images/product/default.png" @endif
                                    style="width: 40px; height: 40px; margin-left: 25%">
                            </td>
                            <td style="font-size: 16px" style="font-size: 16px">{{ $item->code }}</td>
                            <td style="font-size: 16px">{{ $item->name }}</td>
                            <td style="font-size: 16px">{{ $item->price }}</td>
                            <td style="font-size: 16px">{{ $item->created_at }}</td>
                            <td style="font-size: 16px">
                                @if (!empty($item->status))
                                    <div class="active">Hoạt động</div>
                                @else
                                <div class="none-active">Không hoạt động</div>
                                @endif
                            </td>
                            <td style="font-size: 16px; width: 100px;">
                                <div class="d-inline mr-2"> <a href="{{ route('products.show', $item->id) }}"><i
                                            class="icon-copy fa fa-eye" aria-hidden="true"></i></a>
                                </div>
                                <div class="d-inline mr-2"> <a class="edit-product"
                                        href="{{ route('products.edit', $item->id) }}">
                                        edit</a>
                                </div>
                                <div class="d-inline ml-2 delete-product">
                                    <form class="d-inline" action="{{ route('products.destroy', $item->id) }}"
                                        id="destroy-form-{{ $item->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <div class="col-6">
                                            <i onclick="destroyProduct({{ $item->id }})"
                                                class="fas fa-solid fa-trash pointer"></i>
                                        </div>
                                    </form>

                                </div>
                            </td class="row" style="width: 100px;">
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
@endsection
@section('script')
    <script>
        function destroyProduct(productId) {
            $('#destroy-form-' + productId).submit();
        }
        $('#search-by-status').change( function() {
            $('#search-form').submit();
        });
    </script>
@endsection
@section('style')
    <style>
        .delete-product {
            margin-left: 10px;
            position: absolute;
            color: #e41313
        }

        .pointer {
            cursor: pointer;
        }

        .edit-product {
            margin-left: 10px;
            color: #30663e
        }

        .list-product {
            margin-top: 15px
        }

        .form-control {
            width: 90%;
        }
        .active {
            color: #24c04d
        }
        .none-active {
            color: #d40a0a
        }
    </style>
@endsection
