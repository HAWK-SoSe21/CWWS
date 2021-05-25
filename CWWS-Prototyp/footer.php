<div class="footer">
            <div class="navbarfooter">
                    <p class="copyright">©HAWK</p>

                    <div class="nav-link-wrapper">
                        <a href="contact.php">Kontakt</a>
                    </div>

                    <div class="nav-link-wrapper">
                        <a href="impressum.php">Impressum</a>
                    </div>

                    <div class="nav-link-wrapper">
                        <a href="datalaw.php">Datenschutz</a>
                    </div>
                </div>
        </div>
        
        <script src="script.js"></script>
        <script>
            const portfolioItems= document.querySelectorAll('.portfolio-item-wrapper')

            portfolioItems.forEach(portfolioItem =>{
                portfolioItem.addEventListener('mouseover',() =>{
                    portfolioItem.childNodes[1].classList.add('img-darken');
                })
                portfolioItem.addEventListener('mouseout',() =>{
                    portfolioItem.childNodes[1].classList.remove('img-darken');
                })
            })
        </script>
    </body>
</html>