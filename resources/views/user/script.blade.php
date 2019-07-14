<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  var OneSignal = window.OneSignal || [];
  axios.get("{{$client->api_customer_url}}").then( user => {
    if(user.id){
        axios.post("{{route('user.client.view.save')}}",{
        customerId:user.id,
        productUrl:window.location.pathname    
        });
        OneSignal.push(function() {
            OneSignal.init({
                appId: "{{$client->os_app_id}}",
                notifyButton: {
                    enable: true,
                },
            });
            OneSignal.setExternalUserId(user.id); 
        });
    }  
    
})
  </script>