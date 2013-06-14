var GoogleCalendar = require('google-calendar');

// var gcal = new GoogleCalendar.GoogleCalendar(
// 	'AIzaSyBnYaqGnDK6kxwaOnsInnf1TIskDui3Drg',
// 	'KEJcVoiKP-f1UnNHvTeaLoO9',
// 	'http://localhost:8082/authentication');

// gcal.listCalendarList(access_token, function(err, calendarList) {

//   calendarList.items.forEach(function(calendar) {

//     //Events.list
//     gcal.listEvent(access_token, calendar.id, function(err, events) {

//       console.log('Calendar : ' + calendar.summary)
//       events.items.forEach(function(event) {
//         console.log('> ' + event.summary)
//       });
//     });
//   });
// });