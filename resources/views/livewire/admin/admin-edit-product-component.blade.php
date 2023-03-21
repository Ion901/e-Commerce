<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Edit Product
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        Edit Product
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('admin.products')}}" class="btn btn-success float-end">All Products</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                <div class="alert alert-succes" role="alert">{{Session::get('message')}}</div>
                                @endif
                                <form wire:submit.prevent='updateProduct'>
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name= "name" class="form-control" placeholder="Enter Product Name" wire:model="name" wire:keyup = "generateSlug">
                                        @error('name')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="slug" class="form-label">Slug</label>
                                        <input type="text" name="slug" class="form-control" placeholder="Enter Product Slug" wire:model="slug" wire:keyup = "generateSlug">
                                        @error('slug')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="short_description" class="form-label">Short Description</label>
                                        <textarea name="short_description" class="form-control" placeholder="Enter Short Description" wire:model="short_description" ></textarea>
                                        @error('short_description')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="description" class="form-label">escription</label>
                                        <textarea name="description" class="form-control" placeholder="Enter Description" wire:model="description"></textarea>
                                        @error('description')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="regular_price" class="form-label">Regular Price</label>
                                        <input type="text" name="regular_price" class="form-control" placeholder="Enter Regular price" wire:model="regular_price" wire:keyup = "generateSlug">
                                        @error('regular_price')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="sale_price" class="form-label">Sale Price</label>
                                        <input type="text" name="sale_price" class="form-control" placeholder="Enter Sale Price" wire:model="sale_price" wire:keyup = "generateSlug">
                                        @error('sale_price')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="sku" class="form-label">SKU</label>
                                        <input type="text" name="sku" class="form-control" placeholder="Enter SKU" wire:model="sku" wire:keyup = "generateSlug">
                                        @error('sku')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="regular_price" class="form-label" wire:model="stock_status">Stock Status</label>
                                        <select clas="form-control">
                                            <option value="instock">InStock</option>
                                            <option value="ouofstock">OutOfStock</option>
                                        </select>
                                        @error('stock_status')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="featured" class="form-label" wire:model="featured">Featured</label>
                                        <select clas="form-control" name="featured">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                        @error('featured')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="text" name="quantity" class="form-control" placeholder="Enter product quantity" wire:model="quantity" wire:keyup = "generateSlug">
                                        @error('quantity')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" name ="image" class="form-control" wire:model="newimage">
                                        @if ($newimage)
                                            <img src="{{$newimage->temporaryUrl()}}" alt="no image" width="120"/>

                                        @else
                                        <img src="{{asset('assets/img/products')}}/{{$image}}" alt="no image" width="120"/>
                                        @endif
                                        @error('newimage')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="category" class="form-label">Category</label>
                                        <select clas="form-control" name="category" wire:model="category_id">
                                            <option value="">Select category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category -> id}}">{{$category -> name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary float-end">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
