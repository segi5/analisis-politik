<!DOCTYPE html>
<html>
<head>
    <title>Political Analysis</title>
</head>
<body>
    <h1>Submit Your Analysis</h1>
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="/inputs" method="POST">
        @csrf
        <textarea name="input_text" rows="4" cols="50"></textarea>
        <br>
        <button type="submit">Submit</button>
    </form>

    <h2>Submitted Inputs</h2>
    <ul>
        @foreach ($inputs as $input)
            <li>{{ $input->input_text }}</li>
        @endforeach
    </ul>

    <h2>Recent Tweets on Politics</h2>
    <ul>
        @foreach ($tweets->statuses as $tweet)
            <li>{{ $tweet->text }}</li>
        @endforeach
    </ul>
</body>
</html>
