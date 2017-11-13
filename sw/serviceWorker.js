self.addEventListener('push', function (event) {
    if (!(self.Notification && self.Notification.permission === 'granted')) {
        return;
    }

    const sendNotification = body => {
        // you could refresh a notification badge here with postMessage API
        const title = "Aplikasi";

        return self.registration.showNotification(title, {
            body,
            icon: 'images/icon.png',
            badge: 'images/badge.png'
        });
    };

    if (event.data) {
        const message = event.data.text();
        event.waitUntil(sendNotification(message));
    }

    self.addEventListener('notificationclick', function(event) {
      console.log('[Service Worker] Notification click Received.');
      event.notification.close();
      event.waitUntil(
        clients.openWindow('https://facebook.com/salamflamo')
      );
    });
});
