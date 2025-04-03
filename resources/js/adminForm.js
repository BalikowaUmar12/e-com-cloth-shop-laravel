document.addEventListener('DOMContentLoaded', () => {
    // resetting form for adding new admin
    document.getElementById('addAdmin').addEventListener('click', function(){
      document.getElementById('adminForm').reset();
      document.getElementById('adminId').value = '';
      document.querySelector('input[name="_method"]').value = 'POST';
  });


   const editBtnz = document.querySelectorAll('.adminEditBtn');
     editBtnz.forEach(button => {
        button.addEventListener('click', function() {
            // document.querySelector('.formBtn').innerHtml = 'Edit';
            // getting data from form attributes
            const adminId = this.getAttribute('data-id');
            document.getElementById('adminId').value =  adminId;
            document.getElementById('name').value = this.getAttribute('data-name');
            document.getElementById('email').value = this.getAttribute('data-email');
            document.getElementById('role').value = this.getAttribute('data-role');

            let updateUrl = "/admin/" + adminId;  
            document.getElementById('adminForm').setAttribute('action', updateUrl)
            document.querySelector('input[name="_method"]').value = 'PUT';

            // showing the modal
            let modal = new bootstrap.Modal(document.getElementById("addAdminModal"));
            modal.show();
        });
   });
});