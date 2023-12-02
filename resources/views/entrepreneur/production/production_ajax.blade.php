

{{-- add employee ajax --}}
<script>
    $(function() {

      // add new employee ajax request
      $("#add_product_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_product_btn").text('Adding...');
        $.ajax({
          url: '{{ route('production_store') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              Swal.fire(
                'Added!',
                'Product Added Successfully!',
                'success'
              )
               fetchAllProducts();
            }
            $("#add_product_btn").text('Add Product');
            $("#add_product_form")[0].reset();
            $("#addProductModal").modal('hide');
          }
        });
      });

      // fetch all employees ajax request
      fetchAllProducts();

      function fetchAllProducts() {
        $.ajax({
          url: '{{ route('production_show') }}',
          method: 'get',
          success: function(response) {
            $("#show_all_products").html(response);
            $("table").DataTable({
              order: [0, 'desc']
            });
          }
        });
      }

      // edit employee ajax request
      $(document).on('click', '.editIcon', function(e) {
    e.preventDefault();
    let id = $(this).attr('id');
    $.ajax({
        url: '{{ route('production_edit') }}',
        method: 'get',
        data: {
            id: id,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            $("#edit_name").val(response.name);  // Corrected ID
            $("#edit_category").val(response.category);  // Corrected ID
            $("#edit_details").val(response.details);  // Corrected ID
            console.log(`public/images/enterpreneur_images/${response.image}`);
            $("#image").html(
            `<img src="public/images/enterpreneur_images/${response.image}" width="100" class="img-fluid img-thumbnail">`);
            $("#product_id").val(response.id);
            $("#product_image").val(response.image);
        }
    });
});


       // update employee ajax request
       $("#edit_product_form").submit(function(e) {
    e.preventDefault();
    const fd = new FormData(this);
    $("#edit_product_btn").text('Updating...');
    $.ajax({
      url: '{{ route('production_update') }}',
      method: 'post',
      data: fd,
      cache: false,
      contentType: false,
      processData: false,
      dataType: 'json',
      success: function(response) {
        if (response.status == 200) {
          Swal.fire(
            'Updated!',
            'Product Updated Successfully!',
            'success'
          )
          fetchAllProducts();
        }
        $("#edit_product_btn").text('Update Product');
        $("#edit_product_form")[0].reset();
        $("#editProductModal").modal('hide');
      }
    });
  });

    // delete employee ajax request
    $(document).on('click', '.deleteIcon', function(e) {
    e.preventDefault();
    let id = $(this).attr('id');
    let csrf = '{{ csrf_token() }}';
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: '{{ route('production_delete') }}',
          method: 'delete',
          data: {
            id: id,
            _token: csrf
          },
          success: function(response) {
            console.log(response);
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            )
            fetchAllProducts();
          }
        });
      }
    })
  });

    });
  </script>

