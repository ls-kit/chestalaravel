{{-- This is for displaying a 403 Forbidden error page --}}
<!DOCTYPE html>
<html>

<head>
    <title>403 Forbidden</title>
</head>

<body>
    <h1>403 - Forbidden</h1>
    <p>{{ $exception->getMessage() }}</p>
    <a href="{{ url()->previous() }}">Go Back</a>
</body>

</html>
