<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/Logo-02.png') }}?v={{ time() }}">
    <title>Access Code Generated - Sakanta</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Work Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #064852 0%, #0a6270 100%);
            padding: 20px;
        }

        .container {
            max-width: 500px;
            width: 100%;
            background: white;
            border-radius: 20px;
            padding: 50px 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: #10b981;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            font-size: 40px;
            color: white;
        }

        h1 {
            font-size: 28px;
            font-weight: 600;
            color: #064852;
            margin-bottom: 15px;
        }

        .subtitle {
            color: #666;
            margin-bottom: 30px;
            font-size: 15px;
            line-height: 1.6;
        }

        .access-code-box {
            background: #f0f8ff;
            border: 2px solid #064852;
            border-radius: 15px;
            padding: 30px 20px;
            margin: 30px 0;
        }

        .access-code-label {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .access-code {
            font-size: 32px;
            font-weight: 700;
            color: #064852;
            letter-spacing: 3px;
            font-family: 'Courier New', monospace;
            margin-bottom: 15px;
        }

        .copy-btn {
            background: #064852;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .copy-btn:hover {
            background: #053640;
        }

        .copy-btn.copied {
            background: #10b981;
        }

        .info-box {
            background: #fff9e6;
            border: 1px solid #ffd700;
            border-radius: 10px;
            padding: 15px;
            margin: 25px 0;
            font-size: 13px;
            color: #664d00;
            text-align: left;
        }

        .info-box strong {
            display: block;
            margin-bottom: 8px;
            color: #664d00;
        }

        .info-box ul {
            margin-left: 20px;
            margin-top: 8px;
        }

        .info-box li {
            margin-bottom: 5px;
        }

        .btn {
            width: 100%;
            padding: 16px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Work Sans', sans-serif;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }

        .btn-primary {
            background: #064852;
            color: white;
        }

        .btn-primary:hover {
            background: #053640;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(6, 72, 82, 0.3);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-icon">
            ✓
        </div>

        <h1>Access Granted!</h1>
        <p class="subtitle">
            Your access code has been generated successfully. Please save this code as you'll need it to sign in.
        </p>

        <div class="access-code-box">
            <div class="access-code-label">Your Access Code</div>
            <div class="access-code" id="accessCode">{{ $accessCode }}</div>
            <button class="copy-btn" onclick="copyCode()">📋 Copy Code</button>
        </div>

        <div class="info-box">
            <strong>⚠️ Important Instructions:</strong>
            <ul>
                <li>Save this access code securely</li>
                <li>You will need this code to sign in to Sakanta</li>
                <li>Keep this code confidential</li>
            </ul>
        </div>

        <a href="{{ route('auth.enter-access') }}" class="btn btn-primary">
            Continue to Sign In
        </a>
    </div>

    <script>
        function copyCode() {
            const code = document.getElementById('accessCode').textContent;
            navigator.clipboard.writeText(code).then(() => {
                const btn = document.querySelector('.copy-btn');
                btn.textContent = '✓ Copied!';
                btn.classList.add('copied');
                
                setTimeout(() => {
                    btn.textContent = '📋 Copy Code';
                    btn.classList.remove('copied');
                }, 2000);
            });
        }
    </script>
</body>
</html>
