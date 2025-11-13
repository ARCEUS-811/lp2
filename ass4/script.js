// Array of event names
const events = [
    "Tech Conference 2023",
    "Music Festival",
    "Art Workshop",
    "Sports Tournament",
    "Cooking Class",
    "Dance Workshop",
    "Photography Seminar",
    "Business Networking",
    "Yoga Retreat",
    "Book Fair"
];

// Function to populate select options
function populateSelect() {
    const select = document.getElementById('eventSelect');
    events.forEach(event => {
        const option = document.createElement('option');
        option.value = event;
        option.textContent = event;
        select.appendChild(option);
    });
}

// Function to display events
function displayEvents(eventArray) {
    const eventList = document.getElementById('eventList');
    eventList.innerHTML = '';
    eventArray.forEach(event => {
        const li = document.createElement('li');
        li.textContent = event;
        eventList.appendChild(li);
    });
}

// Initial setup
populateSelect();
displayEvents(events);

// Search functionality
document.getElementById('searchInput').addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    const filteredEvents = events.filter(event =>
        event.toLowerCase().includes(searchTerm)
    );
    displayEvents(filteredEvents);
});

// Select functionality
document.getElementById('eventSelect').addEventListener('change', function() {
    const selectedEvent = this.value;
    if (selectedEvent) {
        displayEvents([selectedEvent]);
    } else {
        displayEvents(events);
    }
});
