function clearPanel() {
    $('#dashboard').empty();
}

function loadData(url, callback) {
    $.getJSON(url, function(response){
       callback(response.data);
    });
}

// $('#indices-mde').on('click', function () {
//     clearPanel();
//     let url = this.getAttribute('data-url');
//     loadData(url, function(data) {
//         const chart = new Chart("#dashboard", { // or a DOM element,
//             title: "My Awesome Chart",
//             data: data,
//             type: 'axis-mixed', // or 'bar', 'line', 'scatter', 'pie', 'percentage'
//             height: 250,
//             colors: ['#7cd6fd', '#743ee2']
//         });
//     })

// });
