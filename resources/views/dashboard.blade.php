<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

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

//event show according to give name "custom_name" not to show according to page "NewTrade"
.listen('.custom_name', (e) =>{
        console.log(e);
        document.getElementById("trade-data").innerHTML = e.message;
});

</script>