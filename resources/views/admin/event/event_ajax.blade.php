

{{-- add employee ajax --}}
<script>
    $(function() {

      // add new employee ajax request
      $("#add_event_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_event_btn").text('Adding...');
        $.ajax({
          url: '{{ route('event_store') }}',
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
                'Event Added Successfully!',
                'success'
              )
              fetchAllEvents();
            }
            $("#add_event_btn").text('Add Event');
            $("#add_event_form")[0].reset();
            $("#addEventModal").modal('hide');
          }
        });
      });

      // fetch all employees ajax request
      fetchAllEvents();

      function fetchAllEvents() {
        $.ajax({
          url: '{{ route('event_show') }}',
          method: 'get',
          success: function(response) {
            $("#show_all_events").html(response);
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
        url: '{{ route('event_edit') }}',
        method: 'get',
        data: {
            id: id,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            $("#edit_title").val(response.title);
            $("#edit_subTitle").val(response.subTitle);
            $("#edit_author").val(response.author);
            $("#edit_category").val(response.category);
            $("#edit_description").val(response.description);
            console.log(`public/images/admin_images/${response.image}`);
            $("#image").html(
            `<img src="storage/images/admin_images/${response.image}" width="100" class="img-fluid img-thumbnail">`);
            $("#event_id").val(response.id);
            $("#event_image").val(response.image);
        }
    });
});


       // update employee ajax request
       $("#edit_event_form").submit(function(e) {
    e.preventDefault();
    const fd = new FormData(this);
    $("#edit_event_btn").text('Updating...');
    $.ajax({
      url: '{{ route('event_update') }}',
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
            'Event Updated Successfully!',
            'success'
          )
          fetchAllEvents();
        }
        $("#edit_event_btn").text('Update Event');
        $("#edit_event_form")[0].reset();
        $("#editEventModal").modal('hide');
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
          url: '{{ route('event_delete') }}',
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
            fetchAllEvents();
          }
        });
      }
    })
  });

    });
  </script>

