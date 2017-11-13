document.addEventListener("DOMContentLoaded",() => {
  const appServerKey = "BCmti7ScwxxVAlB7WAyxoOXtV7J8vVCXwEDIFXjKvD-ma-yJx_eHJLdADyyzzTKRGb395bSAtxlh4wuDycO3Ih4";
  let enablepush = false;

  if (enablepush) {
    unsub();
  } else {
    sub();
  }

  if ('serviceWorker' in navigator) {
    if ('PushManager' in window) {
      if ('showNotification' in ServiceWorkerRegistration.prototype) {
        console.log("Semuanya bisa");
      }
    }
  } else {
    console.log("Tidak bisa");
  }

  navigator.serviceWorker.register('serviceWorker.js')
  .then(function (swr) {
    console.log("registered",swr);
  });

  function sub() {
    navigator.serviceWorker.ready
    .then(sWR => sWR.pushManager.subscribe({
      userVisibleOnly: true,
      applicationServerKey: urlBase64ToUint8Array(appServerKey)
    }))
    .then(subs => {
      var endpoint = subs.endpoint;
      var key = subs.getKey('p256dh') ? btoa(String.fromCharCode.apply(null, new Uint8Array(subs.getKey('p256dh')))) : null;
      var token = subs.getKey('auth') ? btoa(String.fromCharCode.apply(null, new Uint8Array(subs.getKey('auth')))) : null;
      console.log("endpoint : "+endpoint);
      console.log("key : "+key);
      console.log("token : "+token );
      var div = document.querySelector('#detail');
      var isi = "endpoint: "+endpoint+",  key: "+key+",  token: "+token;
      div.textContent = isi;

      // you can use ajax or javascript fetch and json or whatever you want to send this data to your database
    })
    .catch(e => {
      if (Notification.permission == 'denied') {
        console.log("User tidak mau ada notification");
      }
      console.log("ada error",e);
    })
  }

  function urlBase64ToUint8Array(base64String) {
      const padding = '='.repeat((4 - base64String.length % 4) % 4);
      const base64 = (base64String + padding)
          .replace(/\-/g, '+')
          .replace(/_/g, '/');

      const rawData = window.atob(base64);
      const outputArray = new Uint8Array(rawData.length);

      for (let i = 0; i < rawData.length; ++i) {
          outputArray[i] = rawData.charCodeAt(i);
      }
      return outputArray;
  }



});
