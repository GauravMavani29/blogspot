<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form>
        @csrf
        <input type="text" id="email" oninput="emailvalid(this.value)">
        <p id="todo">
        </p>
        <input type="button" value="submit" onclick="submitform()">
    </form>
    <script>
        function emailvalid(val) {
            console.log(val);
            var data = @json($user_data);
            for (var i = 0; i < data.length; i++) {
                if (data[i].email == val) {
                    document.getElementById('todo').innerHTML = "email is already exist";
                    break;
                } else {
                    document.getElementById('todo').innerHTML = " ";
                }
            }
        }

        function submitform() {
            if (document.getElementById('todo').innerHTML == " ") {
                window.location.href = "/blogspot/public";
            }
        }

    </script>
</body>

</html>
