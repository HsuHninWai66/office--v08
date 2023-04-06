<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<div>
</div>
<p>Welcome, <font color="#E67E23">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</font> <br />You're logined as @if(Auth::user()->role == 'Manager')<font color="#E67E23">Admin</font> @else Staff @endif <font color="#E67E23">Role</font>.</p>
<p>Thanks.</p>
</body>
</html>
