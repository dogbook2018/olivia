$(function () {
    var $htmlAndBody = $('html, body')

    $('.goto').click(function (event) {
        event.preventDefault()

        var $this = $(this)
        var hash = $this.prop('hash')

        console.log($this.prop('hash'))

        console.log($(hash).offset())

        $htmlAndBody.animate({
            scrollTop: $(hash).offset().top
        }, 1000)

        // return false
    });
});