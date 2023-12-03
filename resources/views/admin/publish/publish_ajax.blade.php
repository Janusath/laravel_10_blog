

{{-- add employee ajax --}}
<script>
    $(function() {

      // fetch all employees ajax request
      fetchAllPublish();

      function fetchAllPublish() {
        $.ajax({
          url: '{{ route('publish_show') }}',
          method: 'get',
          success: function(response) {
            $("#show_all_publish").html(response);
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
        url: '{{ route('publish_edit') }}',
        method: 'get',
        data: {
            id: id,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            $("#edit_entrepreneur_status").val(response.entrepreneur_status);  // Corrected ID
            $("#status_id").val(response.id);

        }
    });
});


       // update employee ajax request
       $("#edit_entrepreneur_status_form").submit(function(e) {
    e.preventDefault();
    const fd = new FormData(this);
    $("#edit_entrepreneur_status_btn").text('Updating...');
    $.ajax({
      url: '{{ route('publish_update') }}',
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
            'Status Updated Successfully!',
            'success'
          )
          fetchAllPublish();
        }
        $("#edit_entrepreneur_status_btn").text('Update Status');
        $("#edit_entrepreneur_status_form")[0].reset();
        $("#editStatusModal").modal('hide');
      }
    });
  });

    });
  </script>

