<!DOCTYPE html>

<html lang="en" class="light-style">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title></title>

  <style type="text/css">
    /* General styling */
    * {
      font-family: Helvetica, Arial, sans-serif;
    }

    body {
      -webkit-font-smoothing: antialiased;
      -webkit-text-size-adjust: none;
      width: 100% !important;
      margin: 0 !important;
      height: 100%;
      color: #f0f2f5;
    }

    a {
      color: #676767;
      text-decoration: none !important;
    }

    p {
      font-size: 17px;
      font-weight: 500;
    }

    .pull-left {
      text-align: left;
    }

    .pull-right {
      text-align: right;
    }

    .header-lg,
    .header-md,
    .header-sm {
      font-size: 32px;
      font-weight: 700;
      line-height: normal;
      padding: 35px 0 0;
      color: #4d4d4d;
    }

    .header-md {
      font-size: 24px;
    }

    .header-sm {
      padding: 5px 0;
      font-size: 18px;
      line-height: 1.3;
    }

    .content-padding {
      padding: 20px 0 30px;
    }

    .free-text {
      width: 100% !important;
      padding: 10px 60px 0px;
    }

    .block-rounded {
      border-radius: 5px;
      border: 1px solid #e5e5e5;
      vertical-align: top;
    }

    .button {
      padding: 30px 0;
    }

    .info-block {
      padding: 0 20px;
      width: 260px;
    }

    .button-width {
      width: 228px;
    }

    .btn {
      display: inline-block;
      font-weight: 400;
      text-align: center;
      vertical-align: middle;
      user-select: none;
      border: 1px solid transparent;
      padding: 0.438rem 1.125rem;
      font-size: 0.894rem;
      line-height: 1.54;
      border-radius: 0.25rem;
      transition: all 0.2s ease-in-out;
    }

    .btn-primary {
        border-color: transparent;
        background: #26B4FF;
        color: #fff;
    }

    .container {
      max-width: 450px;
    }
  </style>

</head>
  <body>
    <div style="background: black;">
    </div>
    <center>
      <div class="container">
          <h1 style="margin-top: 15px;text-align: center;font-size: 33px;">Application Report</h1>
          <p class="pull-left">Hi, <br>We received an application report from {{ $data['name'] }} ({{ $data['email'] }})</p>
          <p class="pull-left">Subject: {{ $data['subject'] }}</p>
          <p class="pull-left">Reporting Reason: {{ $data['reason'] }}</p>
          <p class="pull-left"><strong>- The Camber</strong></p>
      </div>
    </center>
  </body>
</html>
