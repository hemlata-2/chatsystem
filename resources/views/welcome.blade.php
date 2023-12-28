<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<p>
    <b> Trade: - </b><span id="trade-data"></span>
</p>

</body>
</html>

<script src="{{ asset('js/app.js') }}"></script>
<script>
   /* Echo.channel('trades').listen('NewTrade', (e) =>{
        // console.log(e);
        document.getElementById("trade-data").innerHTML = e.trade;
}); */

 //for private channel
/*
Echo.private('trades').listen('NewTrade', (e) =>{
        console.log(e);
        document.getElementById("trade-data").innerHTML = e.trade;
});
*/
//for presence channe
Echo.join('track-message-channel')
.here((users)=>{            // how many users connected that why use "here"
    console.log(users);

})
.joining((user)=>{            // how many user join that why use "joining"
    console.log('user join :- '+user.name);

})
.leaving((user)=>{            // how many user leave that why use "leaving"
    console.log('user leave :-'+user.name);

})
.listen('.custom_name', (e) =>{  //"boardcastAs" method use for listing karene ke liye event ka name change karo
        console.log(e);
        document.getElementById("trade-data").innerHTML = e.message;
});

</script>