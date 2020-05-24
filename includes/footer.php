<footer>
    <div class="footer-container">
        <div class="left-col">
            <img src="logo.png" alt="" class="logo">
            <div class="social-media">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <p class="rights-text">© 2020 Flex All Rights Reserved.</p>
        </div>

        <div class="right-col">
            <h1>Our Newsletter</h1>
            <div class="border"></div>
            <p class="email-enter-text">Enter Your Email to get our news and updates.</p>
            <form action="" class="newsletter-form">
                <input type="text" class="txtb" placeholder="Enter Your Email">
                <input type="submit" class="btn" value="submit">
            </form>
        </div>
    </div>
</footer>

</div>

<script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("carousel-image");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {
            myIndex = 1
        }
        x[myIndex - 1].style.display = "block";
        setTimeout(carousel, 2000);
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script>
    $("#scrollDown").on('click', function(e) {
        e.preventDefault();
        $('html').animate({
            scrollTop: $(window).height()
        }, 1100);
    })
</script>

</body>