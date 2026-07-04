<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>GenesysMeta Login Verification</title>

</head>

<body style="margin:0;padding:0;background:#0f172a;font-family:Arial,Helvetica,sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="padding:40px 0;">

<tr>

<td align="center">

<table
width="600"
cellpadding="0"
cellspacing="0"
style="background:#111827;border:1px solid #334155;border-radius:16px;overflow:hidden;">

<tr>

<td
style="background:#dc2626;padding:30px;text-align:center;">

<h1
style="margin:0;color:#ffffff;font-size:32px;">

GenesysMeta

</h1>

<p
style="margin-top:10px;color:#fee2e2;font-size:16px;">

Secure Login Verification

</p>

</td>

</tr>

<tr>

<td style="padding:40px;">

<h2
style="margin-top:0;color:#ffffff;">

Hello,

</h2>

<p
style="color:#cbd5e1;font-size:16px;line-height:28px;">

We received a login request for your
<strong style="color:#ffffff;">GenesysMeta</strong>
account.

To continue signing in, please enter the following One-Time Password (OTP):

</p>

<div
style="margin:35px 0;text-align:center;">

<div
style="
display:inline-block;
background:#dc2626;
color:#ffffff;
padding:18px 40px;
border-radius:12px;
font-size:42px;
font-weight:bold;
letter-spacing:10px;
">

{{ $otp }}

</div>

</div>

<p
style="color:#cbd5e1;font-size:16px;line-height:28px;">

This verification code is valid for
<strong style="color:#ffffff;">

5 minutes

</strong>.

For your security, never share this code with anyone.

</p>

<p
style="color:#cbd5e1;font-size:16px;line-height:28px;">

If you didn't attempt to sign in,
you can safely ignore this email.

</p>

</td>

</tr>

<tr>

<td
style="border-top:1px solid #334155;padding:25px;text-align:center;">

<p
style="margin:0;color:#94a3b8;font-size:13px;">

© {{ date('Y') }} GenesysMeta

</p>

<p
style="margin-top:8px;color:#64748b;font-size:12px;">

Yu-Gi-Oh! Genesys Format Database

</p>

</td>

</tr>

</table>

</td>

</tr>

</table>

</body>

</html>