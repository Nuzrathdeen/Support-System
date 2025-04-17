<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    @extends('layouts.app')

    @section('content')
    <div class="text-center mt-5">
        <h1>Support Ticket</h1>
        <div class="m-5">

            <div class="row justify-content-center">
                <div class="col-lg-6 text-left">

                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>Ticket Reference</th>
                                <td>{{ $ticket->ref }}</td>
                            </tr>
                            <tr>
                                <th>Customer Name</th>
                                <td>{{ $ticket->customer_name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $ticket->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $ticket->phone }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{ $ticket->description }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    @endsection
</body>
</html>
