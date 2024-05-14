<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
  <h1 class="text-3xl font-bold underline">
    <form action="{{ route('file.upload') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="csv_file">
        <input type="submit" value="Upload">
        @dump($errors->first())
    </form>

  </h1>
</body>
</html>
