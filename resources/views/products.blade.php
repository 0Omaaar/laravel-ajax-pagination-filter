<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel Datatables Tutorial</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        /* General Page Styling */
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
        }

        h2 {
            color: #343a40;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Table Styling */
        #myTable {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 8px;
            overflow: hidden;
        }

        #myTable thead {
            background-color: #007bff;
            color: #ffffff;
        }

        #myTable th,
        #myTable td {
            padding: 12px;
            text-align: left;
        }

        #myTable th {
            font-weight: bold;
        }

        #myTable tbody tr:nth-child(odd) {
            background-color: #f8f9fa;
        }

        #myTable tbody tr:hover {
            background-color: #e9ecef;
            transition: background-color 0.3s ease;
        }

        /* Button Styling */
        .btn-success,
        .btn-danger {
            padding: 6px 12px;
            font-size: 14px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }

            h2 {
                font-size: 24px;
            }

            #myTable th,
            #myTable td {
                padding: 8px;
            }
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <h2 class="mb-4">Laravel Yajra Datatables Example</h2>
        <table id="myTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Code</th>
                    <th>Name</th>
                    {{-- <th>Image</th> --}}
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(function() {
            var table = $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('products') }}",
                    type: 'GET',
                    error: function(xhr, error, thrown) {
                        console.log('Error:', error);
                        console.log('Thrown:', thrown);
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'product_code',
                        name: 'product_code'
                    },
                    {
                        data: 'product_name',
                        name: 'product_name'
                    },
                    // {
                    //     data: 'image',
                    //     name: 'image',
                    //     orderable: false,
                    //     searchable: false,
                    //     render: function(data, type, row) {
                    //         return data; // Render the image HTML
                    //     }
                    // },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>

</body>

</html>
