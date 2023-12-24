<script>
    $(document).ready(function() {
        $(document).on('click', '.editbtn', function() {
            var id = $(this).val();
            $('#editEventModal').modal('show');
            console.log('Edit businessReNo button clicked. ID:', id);
            $.ajax({
                url: '/editEvent/' + id
                , method: 'get'
                , success: function(response) {
                    console.log('AJAX response:', response);
                    $("#eventCreated_at").text(response.created_at);
                    $("#title").text(response.title);
                    $("#subTitle").text(response.subTitle);
                    $("#author").text(response.author);
                    $("#description").text(response.description);
                    $("#eventCategory").text(response.category);
                    $("#image").html(
                        `<img src="storage/images/admin_images/${response.image}" width="100" class="img-fluid img-thumbnail">`);

                }
            });
        });

        $(document).on('click', '.editbtn1', function() {
            var businessReNo = $(this).val();
            $('#entrepreneurModal').modal('show');
            console.log('Edit entrepreneur businessReNo button clicked. ID:', businessReNo);
            $.ajax({
                url: '/businessReNoEditEntrepreneur/' + businessReNo
                , method: 'get'
                , success: function(response) {
                    console.log('AJAX response:', response[0]);
                    $("#date_created_at").text(response[0].created_at);
                    $("#ownerName").text(response[0].ownerName);
                    $("#shopName").text(response[0].shopName);
                    $("#location").text(response[0].location);
                    $("#category").text(response[0].category);
                    $("#phoneNo").text(response[0].phoneNo);
                    $("#email").text(response[0].email);
                    $("#picture").html(
                        `<img src="images/enterpreneur_images/${response[0].picture}" width="100" class="img-fluid img-thumbnail">`);
                }
            });
        });

        $(document).on('click', '.editbtn2', function() {
            var businessReNo = $(this).val();
            $('#timeslotModal').modal('show');
            console.log('Edit timeslot button clicked. ID:', businessReNo);
            $.ajax({
                url: '/businessReNoTimeSlot/' + businessReNo
                , method: 'get'
                , success: function(response) {
                    console.log('AJAX response:', response);
                    // Clear existing content
                    $(".timeslots").empty();

                    // Loop through each record and append to the container
                    $.each(response, function(index, timeslot_record) {
                        $(".timeslots").append(`
                <div class="text-center border border-warning-subtle">
                    <p>Date: <h6 class="d-inline">${timeslot_record.created_at}</h6></p>
                    <p>Monday: <h6 class="d-inline">${timeslot_record.monday}</h6></p>
                    <p>Tuesday: <h6 class="d-inline">${timeslot_record.tuesday}</h6></p>
                    <p>Wednesday: <h6 class="d-inline">${timeslot_record.wednesday}</h6></p>
                    <p>Thursday: <h6 class="d-inline">${timeslot_record.thursday}</h6></p>
                    <p>Friday: <h6 class="d-inline">${timeslot_record.friday}</h6></p>
                    <p>saturday: <h6 class="d-inline">${timeslot_record.saturday}</h6></p>
                    <p>Sunday: <h6 class="d-inline">${timeslot_record.sunday}</h6></p>
                </div>
                        <hr>
                        `);
                    });
                }
            });
        });

        $(document).on('click', '.editbtn3', function() {
            var businessReNo = $(this).val();
            $('#productModal').modal('show');
            console.log('Edit product businessReNo button clicked. ID:', businessReNo);

            $.ajax({
                url: '/businessReNoProduction/' + businessReNo
                , method: 'get'
                , success: function(response) {
                    console.log('AJAX response:', response);
                    // Clear existing content
                    $(".products").empty();

                    // Loop through each record and append to the container
                    $.each(response, function(index, product_record) {
                        $(".products").append(`
                    <div class="text-center border border-warning-subtle">
                        <p>Date: <h6 class="d-inline">${product_record.created_at}</h6></p>
                        <p>Product Name: <h6 class="d-inline">${product_record.name}</h6></p>
                        <p>Product Category: <h6 class="d-inline">${product_record.category}</h6></p>
                        <p>Product Details: <h6 class="d-inline">${product_record.details}</h6></p>
                        <p>Product Image: <img src="storage/images/enterpreneur_images/${product_record.image}" width="100" class="img-fluid img-thumbnail"></p>
                    </div>
                    <hr>
                     `);
                    });
                }
            });
        });


        $(document).on('click', '.editbtn4', function() {
            console.log('CLICKED ID', businessReNo);
            var businessReNo = $(this).val();
            $('#bannerModal').modal('show');
            // console.log('Edit banner businessReNo button clicked. ID:', businessReNo);

            $.ajax({
                url: '/businessReNoBanner/' + businessReNo
                , method: 'get'
                , success: function(response) {
                    console.log('AJAX response:', response);
                    // Clear existing content
                    $(".banners").empty();

                    // Loop through each record and append to the container
                    $.each(response, function(index, banner_record) {
                        $(".banners").append(`
                    <div class="text-center border border-warning-subtle">
                        <p>Date: <h6 class="d-inline">${banner_record.created_at}</h6></p>
                        <p>Banner Description: <h6 class="d-inline">${banner_record.description}</h6></p>
                        <p>Banner Image: <img src="storage/images/enterpreneur_images/${banner_record.image}" width="100" class="img-fluid img-thumbnail"></p>
                    </div>
                    <hr>
                     `);
                    });
                }
            });
        });

     
    });

</script>
