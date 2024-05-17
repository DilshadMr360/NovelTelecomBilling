<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body class="bg-white flex flex-col justify-center items-center min-h-screen">
    <div class="w-full max-w-6xl px-4">
        <h1 class="text-4xl font-bold text-center mb-10">Excel Uploader</h1>
        <div class="flex flex-wrap justify-around">
            
            <form action="{{ route('file.upload') }}" method="post" enctype="multipart/form-data" class="mb-4 w-full md:w-1/3 px-4 ">
                @csrf
                <h3 class="text-lg font-bold mb-2">1. Account Excel</h3>
                <input class="mt-1 text-lg w-full border rounded-md px-3 py-1" type="file" name="csv_file">
                <input class="bg-green-600 mt-2 text-white rounded-md px-3 py-1 font-medium text-lg w-full" type="submit" value="Upload">
                {{-- @dump($errors->first()) --}}
            </form>

            <form action="{{ route('file.upload') }}" method="post" enctype="multipart/form-data" class="mb-4 w-full md:w-1/3 px-4 ">
                @csrf
                <h3 class="text-lg font-bold mt-2">2. Service Summary</h3>
                <input class="mt-1 text-lg w-full border rounded-md px-3 py-1" type="file" name="csv_file">
                <input class="bg-green-600 mt-1 text-white rounded-md px-3 py-1 font-medium text-lg w-full" type="submit" value="Upload">
                {{-- @dump($errors->first()) --}}
            </form>

            <form action="{{ route('file.upload') }}" method="post" enctype="multipart/form-data" class="mb-4 w-full md:w-1/3 px-4">
                @csrf
                <h3 class="text-lg font-bold mt-2">3. Charges Summary</h3>
                <input class="mt-1 text-lg w-full border rounded-md px-3 py-1" type="file" name="csv_file">
                <input class="bg-green-600 mt-1 text-white rounded-md px-3 py-1 font-medium text-lg w-full" type="submit" value="Upload">
                {{-- @dump($errors->first()) --}}
            </form>

            <form action="{{ route('file.upload') }}" method="post" enctype="multipart/form-data" class="mb-4 w-full md:w-1/3 px-4">
                @csrf
                <h3 class="text-lg font-bold mt-2">4. Usage Summary</h3>
                <input class="mt-1 text-lg w-full border rounded-md px-3 py-1" type="file" name="csv_file">
                <input class="bg-green-600 mt-1 text-white rounded-md px-3 py-1 font-medium text-lg w-full" type="submit" value="Upload">
                {{-- @dump($errors->first()) --}}
            </form>

            <form action="{{ route('file.upload') }}" method="post" enctype="multipart/form-data" class="mb-4 w-full md:w-1/3 px-4">
                @csrf
                <h3 class="text-lg font-bold mt-2">5. Usage Details</h3>
                <input class="mt-1 text-lg w-full border rounded-md px-3 py-1" type="file" name="csv_file">
                <input class="bg-green-600 mt-1 text-white rounded-md px-3 py-1 font-medium text-lg w-full" type="submit" value="Upload">
                {{-- @dump($errors->first()) --}}
            </form>

            <form action="{{ route('file.upload') }}" method="post" enctype="multipart/form-data" class="mb-4 w-full md:w-1/3 px-4">
                @csrf
                <h3 class="text-lg font-bold mt-2">6. Call Excel</h3>
                <input class="mt-1 text-lg w-full border rounded-md px-3 py-1" type="file" name="csv_file">
                <input class="bg-green-600 mt-1 text-white rounded-md px-3 py-1 font-medium text-lg w-full" type="submit" value="Upload">
                {{-- @dump($errors->first()) --}}
            </form>
        </div>
    </div>
</body>
</html>


</html>
