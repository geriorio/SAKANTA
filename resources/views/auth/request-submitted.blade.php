<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Submitted - Sakanta</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        .container {
            max-width: 600px;
            width: 100%;
        }
        .card {
            background: white;
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
            text-align: center;
        }
        .success-icon {
            font-size: 5rem;
            margin-bottom: 1rem;
        }
        .card h1 {
            color: #3498db;
            font-size: 2rem;
            margin-bottom: 1rem;
        }
        .card p {
            color: #666;
            line-height: 1.8;
            margin-bottom: 1rem;
            font-size: 1.1rem;
        }
        .info-box {
            background: #e3f2fd;
            border: 2px solid #2196f3;
            border-radius: 10px;
            padding: 1.5rem;
            margin: 2rem 0;
            text-align: left;
        }
        .info-box strong {
            color: #1976d2;
            display: block;
            margin-bottom: 0.5rem;
        }
        .info-box ul {
            color: #1976d2;
            margin-left: 1.5rem;
            line-height: 1.8;
        }
        .btn {
            display: inline-block;
            padding: 1rem 2rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            margin-top: 1rem;
            transition: transform 0.2s;
        }
        .btn:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="success-icon">📨</div>
            <h1>Request Submitted!</h1>
            <p>Thank you for your interest in Sakanta. Your access request has been received.</p>

            <div class="info-box">
                <strong>What happens next?</strong>
                <ul>
                    <li>Our admin team will review your request</li>
                    <li>You'll receive an access code via email once approved</li>
                    <li>Use the access code to sign in to Sakanta</li>
                </ul>
            </div>

            <p style="color: #999; font-size: 0.95rem;">We typically process requests within 1-2 business days.</p>

            <a href="{{ route('welcome') }}" class="btn">Back to Homepage</a>
        </div>
    </div>
</body>
</html>
