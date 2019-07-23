<html>

<head>
    <meta charset="utf-8">
    <title>Data Members</title>
    <style>
        .report-boxs {
            margin: auto;
            padding: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 10px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .header>p {
            color: white;
            background-color: #0F6ECD;
            /* text-align: center; */
            padding: 5px 0px 1px 0px;
            height: 30px;
        }

        .desc {
            padding: 10px 10px 10px 0px;
            margin: 10px 10px 10px 0px;
        }

        .desc>span {
            display: block;
            margin-top: 5px;
        }

        .desc>span>p {
            margin: 0px;
            text-align: left;
            font-size: 12px;
        }

        .logo {
            width: 200px;
            height: 200px;
        }

        .title h2,
        p {
            text-align: center;
            margin-top: 0;
        }

        .date-generate {
            float: right;
            padding: 10px;
        }

        .content-table {
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            allign-content: left;
        }

        .content-table table {
            border-collapse: collapse;
        }

        .content-table thead {
            font-size: 10px;
            text-align: center;
        }

        .content-table table,
        th,
        td {
            border: 1px solid black;
        }

    </style>
</head>

<body>
    <div class="report-boxs">
        <div class="header">
            <p>Data Member</p>
        </div>
        <div class="desc">
            <span>
                <p>Tanggal Generate : </p>
            </span>
            <span>
                <p><strong>{{$date}}</strong></p>
            </span>
            <span>
                <p>User Generate : </p>
            </span>
            <span>
                <p><strong>{{$userGenerate}}</strong></p>
            </span>
        </div>
        <div class="content-table">
            <table class="table table-bordered" width="100%">
                <thead>
                    <tr>
                        <th>#No</th>
                        <th>Name</th>
                        <th>Member ID</th>
                        <th>Tanggal Lahir</th>
                        <th>Nomor Telp</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Terdaftar Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $index => $member)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->no_member }}</td>
                        <td>{{ $member->birthday }}</td>
                        <td>{{ $member->phone_number }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->address }}</td>
                        <td>{{ $member->created_at }}</td>
                    </tr>
                    @endforeach
            </table>
        </div>
    </div>
</body>

</html>
