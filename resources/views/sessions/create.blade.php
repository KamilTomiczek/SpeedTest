<x-header />

        button {
            border: #4a5568 solid 1px;
            margin-top: 20px;
            background-color: #718096;
            color: white;
            width: 150px;
            border-radius: 25px;
            height: 40px;
            font-size: 16px;
            font-weight: bold;
        }

        button:hover {
            background-color: #4a5568;
        }

    </style>
</head>

<body>
<main style="background-color: #cbd5e0; padding: 20px; border-radius: 25px; width: 600px; margin: auto; margin-top: 20px; text-align: center;" class="max-w-lg mx-auto">

    <h1 class="block mb-2 uppercase font-bold text-xl text-gray-700">Log in</h1>

    <form method="POST" action="/login">
        @csrf


        <div style="margin-top: 20px">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="email"
            >
                Email
            </label><br>

            <input style="text-align: center; border: #4a5568 solid 1px; height: 30px; width: 300px; border-radius: 25px;"
                   type="email" name="email" id="email" value="{{ old('email') }}" required
            >
            @error('email')
            <p style="color: #fc0c3c; font-size: 13px">{{ $message }}</p>
            @enderror
        </div>


        <div style="margin-top: 20px">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="password"
            >
                Password
            </label><br>

            <input style="text-align: center; border: #4a5568 solid 1px; height: 30px; width: 300px; border-radius: 25px;"
                   type="password" name="password" id="password" required
            >
            @error('password')
            <p style="color: #fc0c3c; font-size: 13px">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-6">
            <button type="submit">
                Log in
            </button>
        </div>

        <p class="block mb-2 uppercase font-bold text-xs text-gray-700">You don't have an account? <a style="color: black" href="/register">Register!</a></p>

    </form>
</main>
</body>
