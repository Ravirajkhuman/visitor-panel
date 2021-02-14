 <!DOCTYPE html>
<html>
    <head>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" charset="utf-8"></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
        <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js" charset="utf-8"></script>
        </script>
    </head>
    <body>
        <div class="container mt-5">
            <a href="{{ url('exportcsv') }}" id="demo-add-row" class="btn btn-primary mb-2">Export</a>

            <a href="{{ url('visitor-list') }}" id="demo-add-row" class="btn btn-primary mb-2">Visit Vue</a>
            <table id="example" class="table display" cellspacing="0" width="100%">
                <thead>
                    <tr class="table-primary">
                        <th scope="col">#</th>
                        <th scope="col">First name</th>
                        <th scope="col">Last name</th>
                        <th scope="col">Email</th>
                        <th scope="col">DOB</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($visitors as $data)
                    <tr>
                        <th scope="row">{{ $data->id }}</th>
                        <td>{{ $data->first_name }}</td>
                        <td>{{ $data->last_name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->dob }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <script>
            $(document).ready(function(){
                $("#example").DataTable({
                });
            });     
        </script>
    </body>
</html>