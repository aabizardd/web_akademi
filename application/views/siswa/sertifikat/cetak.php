<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style type='text/css'>
    body,
    html {
        margin: 0;
        padding: 0;
    }

    body {
        color: black;
        display: table;
        font-family: Georgia, serif;
        font-size: 24px;
        text-align: center;
    }

    .container {
        border: 15px solid #4b0082;
        width: 750px;
        height: 563px;
        display: table-cell;
        vertical-align: middle;
    }

    .logo {
        color: #4b0082;
    }

    .marquee {
        color: #4b0082;
        font-size: 48px;
        margin: 20px;
    }

    .assignment {
        margin: 20px;
    }

    .person {
        border-bottom: 2px solid black;
        font-size: 32px;
        font-style: italic;
        margin: 20px auto;
        width: 400px;
    }

    .reason {
        margin: 20px;
    }
    </style>

</head>

<body>
    <div class="container">
        <div class="logo">
            An Organization
        </div>

        <div style="margin-top: 20px;">
            <img src="<?= base_url('asset/img/acompdemy 2.png') ?>" alt="" width="120">
        </div>

        <div class="marquee">
            Certificate of Completion
        </div>

        <div class="assignment">
            This certificate is presented to
        </div>

        <div class="person">
            <?= $this->session->userdata('nama') ?>
        </div>

        <div class="reason">
            <?= ucfirst($kelas['nama_kelas']) . " " . ucfirst($kelas['tingkat_kelas']) ?>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

<script>
window.print()
</script>

</html>