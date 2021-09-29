        <footer id="footer"><!--Footer-->
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <p class="pull-left">Copyright © 2015</p>
                        <p class="pull-right">Курс PHP Start</p>
                    </div>
                </div>
            </div>
        </footer><!--/Footer-->



        <script src="/super_mag/template/js/jquery.js"></script>
        <script src="/super_mag/template/js/bootstrap.min.js"></script>
        <script src="/super_mag/template/js/jquery.scrollUp.min.js"></script>
        <script src="/super_mag/template/js/price-range.js"></script>
        <script src="/super_mag/template/js/jquery.prettyPhoto.js"></script>
        <script src="/super_mag/template/js/main.js"></script>
        
        <script>
            $(document).ready(function(){
        $(".add-to-cart").click(function () {
            var id = $(this).attr("data-id");
            $.post("/super_mag/cart/addAjax/"+id, {}, function (data) {
                $("#cart-count").html(data);
            });
            return false;
        });
    });
        </script>
    </body>
</html>