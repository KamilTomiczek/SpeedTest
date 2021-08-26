<x-header />

            .flash{
                background-color: #a0aec0;
                color: white;
                position: fixed;
                bottom: 10px;
                right: 10px;
                border-radius: 25px;
                text-align: center;
            }

            .flash p {
                font-size: 32px;
                padding-left: 30px;
                padding-right: 30px;
            }

            button {
                color: #4a5568;
                background-color: transparent;
                cursor: pointer;
                font-size: .875rem;
            }

            table, th, td {
                border: black solid 1px;
                border-collapse: collapse;
                text-align: center;
            }

            th, td {
                width: 225px;
            }

            tr:hover:not(.tableheader) {
                background-color: #a0aec0;
            }

            .tableheader, .tableheader th{
                border: black solid 2px;
            }

            .link {
                border: #4a5568 solid 1px;
                background-color: #718096;
                color: white;
                border-radius: 25px;
                font-size: 32px;
                font-weight: bold;
                text-decoration: none;
                margin: 20px;
                padding-left: 20px;
                padding-right: 20px;
            }

            .link:hover {
                background-color: #4a5568;
            }

        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0">
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <span style="font-size: 18px; ">Welcome, {{ auth()->user()->name }}!</span>
                        <form style="float: right; margin-left: 10px;" method="POST" action="/logout">
                            @csrf

                            <button type="submit">Log out</button>
                        </form>
                    @endauth
                </div>

            <div class="mx-auto sm:px-6 lg:px-8">
                <div style="background-color: #cbd5e0" class="mt-8 dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="p-6">
                        @auth
                        <table>
                            <tr class="tableheader">
                                <th>Provider</th>
                                <th>Ping</th>
                                <th>Download speed</th>
                                <th>Upload speed</th>
                                <th>IP</th>
                                <th>Date</th>
                            </tr>
                            @foreach($history as $data)
                                <tr>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->ping}}</td>
                                    <td>{{$data->download_speed}}</td>
                                    <td>{{$data->upload_speed}}</td>
                                    <td>{{$data->ip}}</td>
                                    <td>{{$data->created_at}}</td>
                                </tr>
                            @endforeach
                        </table>
                        @else
                            <a class="link" href="/login">Log in</a>
                            <a class="link" href="/register">Register</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        <x-flash />
    </body>
</html>
