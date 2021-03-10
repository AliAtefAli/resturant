<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>مطعم الديناصور النباتي</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
        }
    </style>
</head>
<body>
<h1>الاشتراكات المنتهيه</h1>
    <table id="adminsTable" class="table table-bordered table-striped">
        <thead>
        <tr class="text-center">
            <th>#</th>
            <th>اسم العميل</th>
            <th>اسم الباقه</th>
            <th>تاريخ الانتهاء</th>
        </tr>
        </thead>
        <tbody>
            <tr style="text-align: center">
                <td>{{$data['id']}}</td>
                <td>{{$data['user_name']}}</td>
                <td>{{$data['subscribe_name']}}</td>
                <td>{{$data['end_date']}}</td>
            </tr>
        </tbody>
    </table>

</body>
</html>