

{{-- add employee ajax --}}
<script>
    $(function() {

      // add new employee ajax request
      $("#add_time_slot_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_time_slot_btn").text('Adding...');
        $.ajax({
          url: '{{ route('time_slot_store') }}',
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
                'TimeSlot Successfully!',
                'success'
              )
              fetchAllTimeSlots();
            }
            $("#add_time_slot_btn").text('Add TimeSlot');
            $("#add_time_slot_form")[0].reset();
            $("#addTimeSlotModal").modal('hide');
          }
        });
      });

      // fetch all employees ajax request
      fetchAllTimeSlots();

      function fetchAllTimeSlots() {
        $.ajax({
          url: '{{ route('time_slot_show') }}',
          method: 'get',
          success: function(response) {
            $("#show_all_time_slot").html(response);
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
        url: '{{ route('time_slot_edit') }}',
        method: 'get',
        data: {
            id: id,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {

            $("#edit_monday").val(response.monday);  // Corrected ID
            $("#edit_tuesday").val(response.tuesday);  // Corrected ID
            $("#edit_wednesday").val(response.wednesday);  // Corrected ID
            $("#edit_thursday").val(response.thursday);  // Corrected ID
            $("#edit_friday").val(response.friday);  // Corrected ID
            $("#edit_saturday").val(response.saturday);  // Corrected ID
            $("#edit_sunday").val(response.sunday);  // Corrected ID
            $("#time_slot_id").val(response.id);

        }
    });
});


       // update employee ajax request
       $("#edit_time_slot_form").submit(function(e) {
    e.preventDefault();
    const fd = new FormData(this);
    $("#edit_time_slot_btn").text('Updating...');
    $.ajax({
      url: '{{ route('time_slot_update') }}',
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
            'TimeSlot Updated Successfully!',
            'success'
          )
          fetchAllTimeSlots();
        }
        $("#edit_time_slot_btn").text('Update TimeSlot');
        $("#edit_time_slot_form")[0].reset();
        $("#editTimeSlotModal").modal('hide');
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
          url: '{{ route('time_slot_delete') }}',
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
            fetchAllTimeSlots();
          }
        });
      }
    })
  });

    });
  </script>

