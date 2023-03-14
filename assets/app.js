/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// start the Stimulus application
import './bootstrap';

const $ = require('jquery');
global.$ = global.jQuery = $;
require('bootstrap');

$(document).ready(function () {
    $('[data-toggle="popover"]').popover();
    if (document.getElementById('workweek_table')) {
        highlightCurrentTime();
    }
});

function highlightCurrentTime() {
    // Get the current date and time
    const now = new Date();

// Get the day of the week (0 is Sunday, 1 is Monday, etc.)
    const dayOfWeek = now.getDay();

// Get the hour and minute of the day
    const hour = now.getHours();
// Get the table and all its rows
    const table = document.getElementById("workweek_table");
    const rows = table.getElementsByTagName("tr");

// Loop through each row, starting with the second row (the first row is the header)
    for (let i = 1; i < rows.length; i++) {
        // Get the cells in the current row
        const cells = rows[i].getElementsByTagName("td");

        // Loop through each cell in the current row
        for (let j = 0; j < cells.length; j++) {
            // Check if this cell is in the current day and time range
            if (j === dayOfWeek && hour >= i + 5 && hour < i + 6) {
                // If it is, highlight the cell
                cells[j].classList.add("highlight");
            } else {
                // Otherwise, remove any existing highlight from the cell
                cells[j].classList.remove("highlight");
            }
        }
    }
}
