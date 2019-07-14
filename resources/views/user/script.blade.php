<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  var OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
            OneSignal.init({
                appId: "{{$client->os_app_id}}",
                notifyButton: {
                    enable: true,
                },
            });
            
        });
  axios.get("{{$client->api_customer_url}}").then( res => {
    if(res.data.id){
        axios.post("{{route('user.client.view.save')}}",{
        customerId:res.data.id,
        productUrl:window.location.pathname    
        });
        OneSignal.push(function(){
            OneSignal.setExternalUserId(res.data.id); 
        })
    }  
    
})
  </script>