
window.addEventListener("load", function () {
    document.getElementById('count_char_text').onsubmit = request
});

const request = (event) => {

    event.preventDefault();

    const form_data = new FormData(event.target)

    const http = new XMLHttpRequest();
    const url = '/api/index.php/v1/playwithstrings/countchar';

    http.open('POST', url, true);

    http.setRequestHeader('Content-type', 'application/json');

    http.onreadystatechange = function () {
        if (http.readyState == 4 && http.status == 200) {
            let result = http.responseText
            result = JSON.parse(result)
            if (result.status) {
                let element = document.getElementById("result_text");
                element.innerHTML = ''
                let text_node = document.createTextNode('Result of Text: ' + result.data);
                element.appendChild(text_node);
            }
        }
    }
    
    http.send(JSON.stringify({ 'data': { 'text': form_data.get('text') } }))

    return false;
}