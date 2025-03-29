<div class="row g-2">
    <div class="col-md-3">
        <div class="list-group">
            <a href="" class="list-group-item list-group-item-action" data-target="userProfile">Profile</a>
            <a href="" class="list-group-item list-group-item-action" data-target="use">Orders</a>
            <a href="" class="list-group-item list-group-item-action" data-target="accountSecurity">Security</a>
        </div>
    </div>
    <div class="col-md-9" style="height:400px">
        <div id="content-area">

        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded',function () {
            document.querySelectorAll('.list-group-item').forEach(item => {
                item.addEventListener("click", function (e) {
                    e.preventDefault();

                    // let section = 
                    let url = this.dataset.target;
                    // console.log(url);
                    fetch(url)
                        .then(response => response.txt())
                        .then(data=>{
                            document.getElementById("content-area").innerHTML = data;
                        })
                        .catch(() => {
                            document.getElementById("content-area").innerHTML = "<p class='text-danger'>Failed to load section.</p>";
                        });
                    

                });
            });
        });
    </script>
</div>