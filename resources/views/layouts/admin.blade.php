
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

<nav class="navbar navbar-dark bg-dark px-3">
    <a href="{{ route('admin.dashboard') }}" class="navbar-brand">Admin</a>
</nav>

<div class="container py-4">
@yield('content')
</div>

</body>
</html>
