<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GenesysMeta Verification</title>
</head>
<body style="margin:0; padding:0; background-color:#09090b; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; -webkit-font-smoothing: antialiased;">

    <table width="100%" cellpadding="0" cellspacing="0" style="padding: 40px 20px; background-color: #09090b;">
        <tr>
            <td align="center">

                <!-- Main Container -->
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #18181b; border: 1px solid #27272a; border-top: 4px solid #dc2626; border-radius: 6px; overflow: hidden; text-align: left;">
                    
                    <!-- Header -->
                    <tr>
                        <td style="padding: 35px 40px 10px 40px;">
                            <p style="margin: 0 0 5px 0; color: #ef4444; font-size: 10px; font-weight: bold; letter-spacing: 2px; text-transform: uppercase;">
                                System Verification
                            </p>
                            <h1 style="margin: 0; color: #ffffff; font-size: 28px; font-weight: 900; letter-spacing: -1px; text-transform: uppercase;">
                                Genesys<span style="color: #ef4444;">Meta</span>
                            </h1>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding: 20px 40px 30px 40px;">
                            
                            <hr style="border: 0; border-top: 1px solid #27272a; margin: 0 0 25px 0;">

                            <h2 style="margin: 0 0 15px 0; color: #ffffff; font-size: 18px; font-weight: bold;">
                                Hello,
                            </h2>
                            
                            <p style="margin: 0 0 20px 0; color: #a1a1aa; font-size: 14px; line-height: 24px;">
                                Your verification code for <strong style="color: #ffffff;">GenesysMeta</strong> is shown below. 
                                Use this One-Time Password (OTP) to continue with your account verification.
                            </p>

                            <!-- OTP Terminal Box -->
                            <div style="margin: 35px 0; text-align: center; background-color: #09090b; border: 1px solid #27272a; border-radius: 4px; padding: 25px;">
                                <p style="margin: 0 0 15px 0; color: #71717a; font-size: 10px; font-weight: bold; letter-spacing: 2px; text-transform: uppercase;">
                                    Authentication Code
                                </p>
                                <div style="color: #ffffff; font-size: 42px; font-weight: 900; letter-spacing: 12px; font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, 'Liberation Mono', 'Courier New', monospace;">
                                    {{ $otp }}
                                </div>
                            </div>

                            <p style="margin: 0 0 10px 0; color: #a1a1aa; font-size: 13px; line-height: 22px;">
                                This verification code is valid for <strong style="color: #ffffff;">5 minutes</strong>. 
                                For your security, never share this code with anyone.
                            </p>

                            <p style="margin: 0; color: #71717a; font-size: 13px; line-height: 22px;">
                                If you didn't request this verification, you can safely ignore this email.
                            </p>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="border-top: 1px solid #27272a; padding: 25px 40px; text-align: center; background-color: #18181b;">
                            <p style="margin: 0; color: #71717a; font-size: 12px; font-weight: bold;">
                                © {{ date('Y') }} GenesysMeta
                            </p>
                            <p style="margin: 5px 0 0 0; color: #52525b; font-size: 10px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase;">
                                Yu-Gi-Oh! Genesys Database
                            </p>
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>