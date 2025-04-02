@extends('admin.dashboard')

@section('title', 'category')

@section('admin-main-content')
<div class="d-flex justify-content-between">
<h3>Products</h3>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal" id="addAdmin">add product</button>

</div>
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                <h2 class="modal-title"> product form</h2>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
                <div class="modal-body">
                    <x-form-component :action="route('product.store')" method="POST" buttonText="Add product" formId="ProductForm">
                    @csrf 
                      <input type="hidden" name="_method" value="POST">
                      <input type="hidden" id="productId" name="productId">
                      <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                      </div>
                      <div class="mb-3">
                        <label for="image" class="form-label">image</label>
                        <input type="file" class="form-control" name="image" id="image">
                      </div>
                      <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" id="category" class="form-select">
                            <option value="men">Men</option>
                            <option value="women">women</option>
                            <option value="kids">kids</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="text" class="form-control" name="stock">
                      </div>
                      <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" name="price" min=0>
                      </div>
                    </x-form-component>
                </div>
            </div>
        </div>
    </div>



@endsection