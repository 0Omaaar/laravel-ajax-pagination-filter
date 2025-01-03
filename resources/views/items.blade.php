<!-- items.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Laravel 11 Ajax</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <input type="text" class="form-control mb-1" placeholder="Search..." id="search">
        <div class="card mt-5">
            <h3 class="card-header p-3">Laravel 11 Ajax Pagination</h3>
            <div class="card-body" id="item-lists">
                @include('data')
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            let searchTimer;

            $('#search').on('keyup', function() {
                clearTimeout(searchTimer);
                searchTimer = setTimeout(() => {
                    let query = $(this).val();
                    fetchData({
                        query: query,
                        page: 1
                    });
                }, 300);
            });

            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                let query = $('#search').val();
                fetchData({
                    query: query,
                    page: page
                });
            });

            function fetchData(params) {
                $.ajax({
                        url: '/search',
                        data: params,
                        type: 'GET'
                    })
                    .done(function(data) {
                        $('#item-lists').html(data);
                        window.history.pushState({}, '', `?page=${params.page}`);
                    })
                    .fail(function() {
                        alert('Request failed');
                    });
            }
        });
    </script>
</body>

</html>
