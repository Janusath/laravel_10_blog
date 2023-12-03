

{{-- add employee ajax --}}
<script>
    $(function() {

      // add new employee ajax request
      $("#add_shop_banner_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_shop_banner_btn").text('Adding...');
        $.ajax({
          url: '{{ route('shop_banner_store') }}',
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
                'Banner Added Successfully!',
                'success'
              )
              fetchAllBanners();
            }
            $("#add_shop_banner_btn").text('Add Banner');
            $("#add_shop_banner_form")[0].reset();
            $("#addShopBannerModal").modal('hide');
          }
        });
      });

      // fetch all employees ajax request
      fetchAllBanners();

      function fetchAllBanners() {
        $.ajax({
          url: '{{ route('shop_banner_show') }}',
          method: 'get',
          success: function(response) {
            $("#show_all_shop_banner").html(response);
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
        url: '{{ route('shop_banner_edit') }}',
        method: 'get',
        data: {
            id: id,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            $("#edit_description").val(response.description);  // Corrected ID
            console.log(`public/images/enterpreneur_images/${response.image}`);
            $("#image").html(
            `<img src="public/images/enterpreneur_images/${response.image}" width="100" class="img-fluid img-thumbnail">`);
            $("#banner_id").val(response.id);
            $("#banner_image").val(response.image);
        }
    });
});


       // update employee ajax request
       $("#edit_shop_banner_form").submit(function(e) {
    e.preventDefault();
    const fd = new FormData(this);
    $("#edit_shop_banner_btn").text('Updating...');
    $.ajax({
      url: '{{ route('shop_banner_update') }}',
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
            'Banner Updated Successfully!',
            'success'
          )
          fetchAllBanners();
        }
        $("#edit_shop_banner_btn").text('Update Banner');
        $("#edit_shop_banner_form")[0].reset();
        $("#editShopBannerModal").modal('hide');
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
          url: '{{ route('shop_banner_delete') }}',
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
            fetchAllBanners();
          }
        });
      }
    })
  });

    });
  </script>

