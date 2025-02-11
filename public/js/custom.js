$(document).ready(function () {

    $('.soundBtn').click(function () {
        var audioElement = $('audio')[0];

        if (audioElement) {
            audioElement.play()
        }

    });

    function adjustTextareaHeight(element) {
        element.style.height = 'auto';
        element.style.height = (element.scrollHeight) + 'px';
    }

    $('#description').on('input', function () {
        adjustTextareaHeight(this);
    });

    // Ajuste inicial al cargar la página
    adjustTextareaHeight(document.getElementById('description'));

});