importScripts('https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.14.6/firebase-messaging.js');

var firebaseConfig = {
    apiKey: "AIzaSyDw1-jYrTRAg3hVKaovCY4lUrlyMIK027Y",
    authDomain: "mypusher-1dea4.firebaseapp.com",
	databaseURL: "YOUR_FIREBASE_DATBASE_URL",
    projectId: "mypusher-1dea4",
    storageBucket: "mypusher-1dea4.appspot.com",
    messagingSenderId: "218216252513",
    appId: "1:218216252513:web:05033b0d7846a3e4105620",
    measurementId: "G-FY70SWTJS0"
  };

firebase.initializeApp(firebaseConfig);
const messaging=firebase.messaging();

messaging.setBackgroundMessageHandler(function (payload) {
    console.log(payload);
    const notification=JSON.parse(payload);
    const notificationOption={
        body:notification.body,
        icon:notification.icon
    };
    return self.registration.showNotification(payload.notification.title,notificationOption);
});