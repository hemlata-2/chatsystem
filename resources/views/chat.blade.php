<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>static chat app</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <div id="start-chat">
        <form id="save-name">
            <input type="text" name="name" id="name" placeholder="Enter Name" required>
             <input type="submit" value="Let's chat">
        </form>

    </div>

    <div id="chat-part">

    <form id="chat-form">
        @csrf
        <input type="hidden" name="username" id="username">
        <input type="text" name="message" id="message" placeholder="Enter message" required>
        <input type="submit" value="send">
        
    </form>
    <div id="chat-container">

    </div>

    <script src="{{ asset('js/app.js') }}">

    </script>

    <script>
        $('#chat-part').hide();

        $('#start-chat').submit(function(event){
            event.preventDefault();
            $('#username').val( $('#name').val() );
            $('#start-chat').hide();
        $('#chat-part').show();

        });


        $('#chat-form').submit(function(event){
            event.preventDefault();
            var FormData = $(this).serialize();

            $.ajax({
                url: "{{ route('boardcast-message') }}" ,
                type: "POST",
                data: FormData,
            });

            $('#message').val('');
      

        });

        Echo.channel('message')
        .listen('MessageEvent', (e) => {

            let html = `<br>
            <b>` +e.userName +`</b>
            <span>` +e.message +`</span>`;
            $('#chat-container').append(html);
        });
    </script>

    </div>
    
</body>
</html>