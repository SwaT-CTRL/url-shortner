<!DOCTYPE html>
<html>
<head>
    <title>Admin Invitation</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px;">
        <h2 style="color: #6366f1;">You're Invited!</h2>
        <p>Hello <strong>{{ $name }}</strong>,</p>
        <p><strong>{{ $inviterName }}</strong> has invited you as an Admin to the URL Shortener platform. Below are your login credentials:</p>
        <div style="background: #f4f4f9; padding: 15px; border-radius: 5px; margin: 20px 0;">
            <p style="margin: 5px 0;"><strong>Login URL:</strong> <a href="{{ route('admin.login') }}">{{ route('admin.login') }}</a></p>
            <p style="margin: 5px 0;"><strong>Email:</strong> {{ $email }}</p>
            <p style="margin: 5px 0;"><strong>Password:</strong> {{ $password }}</p>
        </div>
        <p>Please log in and change your password for security.</p>
        <p>Thank you!</p>
    </div>
</body>
</html>
