<html>
<head>
  <meta charset="utf-8">
  <title>{{ config('app.name') }}</title>
	{{ Log::info($token) }}
  {{ Log::info('informacion enviada') }}
  <script>
    window.opener.postMessage({ token: "{{ $token }}" }, "{{ url('/') }}")
    window.close()
  </script>
</head>
<body>
</body>
</html>
