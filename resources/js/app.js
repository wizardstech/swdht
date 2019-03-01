import bulmaCalendar from '../../node_modules/bulma-calendar/dist/js/bulma-calendar.min.js';

const calendars = bulmaCalendar.attach('[type="date"]', {
  displayMode: 'dialog',
  dateFormat: 'DD/MM/YYYY'
});

const element = document.querySelector('#datepicker');
