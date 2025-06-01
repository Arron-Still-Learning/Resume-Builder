<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Choose Template</title>
    <link rel="stylesheet" href="{{ asset('css/change.css') }}">
</head>

<body>

    <div class="wrapper">
        <h2>Choose Template</h2>

        <div class="img-container">
            <a href="{{ route('user.resume.temp1') }}">
                <img src="{{ asset('images/template1.png') }}" alt="Template 1">
            </a>
            <a href="{{ route('user.resume.temp2') }}">
                <img src="{{ asset('images/template2.png') }}" alt="Template 2">
            </a>
            <a href="{{ route('user.resume.temp3') }}">
                <img src="{{ asset('images/template3.png') }}" alt="Template 3">
            </a>
        </div>

        <div class="button-container">
            <a href="{{ route('user.list') }}" class="back-button">Back</a>
            <a href="{{ route('user.resume.edit') }}" class="edit-button">Edit</a>
        </div>

    </div>

</body>

</html>
