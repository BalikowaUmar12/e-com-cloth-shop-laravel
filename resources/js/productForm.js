document.addEventListener('DOMContentLoaded', () => {
    // resetiing form for new product
    document.getElementById('addProduct').addEventListener('click',()=>{
      document.getElementById('ProductForm').reset();
      document.getElementById('productId').value = '';
      document.querySelector('input[name="_method"]').value = 'POST';
    });

    // handling edit using same form
    document.querySelectorAll('.productEditBtn').forEach(btn => {
      btn.addEventListener('click', function(){
       const productId = this.getAttribute('data-id');
       document.getElementById('name').value = this.getAttribute('data-name');
       document.getElementById('price').value = this.getAttribute('data-price');
       document.getElementById('stock').value = this.getAttribute('data-stock');
       document.getElementById('description').value = this.getAttribute('data-description');
       document.getElementById('category').value = this.getAttribute('data-category');

       let updateUrl = "/product/" + productId;
       document.getElementById('ProductForm').setAttribute('action',updateUrl);
       document.querySelector('input[name="_method"]').value = 'PUT';

       let  modal = new bootstrap.Modal(document.getElementById('addProductModal'));
       modal.show();
        
      });
    })
  });