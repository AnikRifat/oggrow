<!DOCTYPE html>
<html lang="en">
    @include('head')

    <body>
        <div class="container">
            <!-- ... (existing HTML code) ... -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-margin">
                        <div class="card-body">
                            <div class="row search-body">
                                <div class="col-lg-12">
                                    <div class="search-result">
                                        <div class="result-header">
                                            <!-- ... (existing HTML code) ... -->
                                        </div>
                                        <div class="result-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>id</th>
                                                            <th>name</th>
                                                            <th>Email</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="data-table-body">
                                                        <!-- Table body will be populated with AJAX data -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <nav class="d-flex justify-content-center">
                                <ul class="pagination pagination-base pagination-boxed pagination-square mb-0"
                                  id="pagination-links">
                                    <!-- Pagination links will be added here -->
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            // Function to fetch data from the API using AJAX
      function fetchDataFromAPI(pageNumber) {
        const apiEndpoint = `{{ url('/users') }}?page=${pageNumber}`;

        $.ajax({
          url: apiEndpoint,
          type: 'GET',
          dataType: 'json',
          success: function (data) {
            // Clear any existing data in the table body and pagination links
            $('#data-table-body').empty();
            $('#pagination-links').empty();

            // Iterate through the data and add rows to the table
            data.data.forEach((item) => {
              const row = `<tr>
                            <td>${item.id}</td>
                            <td>${item.name}</td>
                            <td>${item.email}</td>
                          </tr>`;
              $('#data-table-body').append(row);
            });

            // Add pagination links
            data.links.forEach((link) => {
              const pageLink = link.active
                ? `<li class="page-item active"><a class="page-link no-border" href="#" data-page="${link.label}">${link.label}</a></li>`
                : `<li class="page-item"><a class="page-link no-border" href="#" data-page="${link.label}">${link.label}</a></li>`;
              $('#pagination-links').append(pageLink);
            });

            // Add click event handler for pagination links
            $('#pagination-links a').on('click', function (event) {
              event.preventDefault();
              const pageNumber = $(this).data('page');
              fetchDataFromAPI(pageNumber);
            });
          },
          error: function (error) {
            console.error('Error fetching data:', error);
          },
        });
      }

      // Call the function to fetch data for the first page when the page is loaded
      $(document).ready(function () {
        fetchDataFromAPI(1);
      });
        </script>
    </body>

</html>