

{{-- add employee ajax --}}
<script>
    $(function() {

      // fetch all employees ajax request
      fetchAllEmails();

      function fetchAllEmails() {
        $.ajax({
          url: '{{ route('email_show') }}',
          method: 'get',
          success: function(response) {
            $("#show_all_emails").html(response);
            $("table").DataTable({
              order: [0, 'desc']
            });
          }
        });
      }
      fetchAllEmails();

    });
  </script>

