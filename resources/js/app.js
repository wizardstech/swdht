import bulmaCalendar from '../../node_modules/bulma-calendar/dist/js/bulma-calendar.min.js';

const calendars = bulmaCalendar.attach('[type="date"]', {
  displayMode: 'dialog',
  dateFormat: 'DD/MM/YYYY'
});

const element = document.querySelector('#datepicker');

document.addEventListener('click', function (event) {

  // If the clicked element doesn't have the right selector, bail
  if (!event.target.matches('#remove-flash')) return;

  // Don't follow the link
  event.preventDefault();

  // Log the clicked element in the console
  event.target.parentNode.style.display = 'none';;

}, false);


document.querySelector('a#delete-modal').addEventListener('click', function(event) {
  event.preventDefault();
  var modal = document.querySelector('.modal');  // assuming you have only 1
  var html = document.querySelector('html');
  modal.classList.add('is-active');
  html.classList.add('is-clipped');

  modal.querySelector('.modal-background').addEventListener('click', function(e) {
    e.preventDefault();
    modal.classList.remove('is-active');
    html.classList.remove('is-clipped');
  });

  modal.querySelector('.modal-cancel').addEventListener('click', function(e) {
    e.preventDefault();
    modal.classList.remove('is-active');
    html.classList.remove('is-clipped');
  });
});
