<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- Footer -->
<footer class="pb-2">
  <div class="foot">
    <div class="footer">
      <div class="tanduran tanduran3">
        <div class="gd godong1"></div>
        <div class="gd godong2"></div>
        <div class="gd godong3"></div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="alamat">
      <div class="sub1 text-white">Alamat</div>
      <p class="kilasan text-white">Kecamatan Ngantru <br> Kabupaten Tulungagung <br>Jawa Timur, Indonesia</p>
    </div>
    <div class="getintouch mb-2">
      <div class="sub1 text-white">Get In Touch</div>
      <div class="social social1">
        <a href="" class="facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="" class="twitter"><i class="fab fa-twitter"></i></a>
        <a href="" class="instagram"><i class="fab fa-instagram"></i></a>
        <a href="" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
        <a href="" class="youtube"><i class="fab fa-youtube"></i></a>
      </div>
    </div>
    <div class="madeby">
      Made With <i class="fa fa-heart"></i> by Agus
    </div>
  </div>
</footer>
<!-- Akhir Footer -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/mobile-nav.js"></script>
<script src="assets/js/easing.js"></script>
<script src="assets/js/wow.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/counterup.min.js"></script>
<script src="assets/owlcarousel/owl.carousel.js"></script>
<script src="assets/js/isotope.pkgd.js"></script>
<script src="assets/js/main.js"></script>

<script>
var loader = document.getElementsByClassName("agus1");

function loadBMAnimation(loader) {
  var animation = bodymovin.loadAnimation({
    container: loader,
    renderer: "svg",
    loop: false,
    autoplay: false,
    path: "assets/json/kantor.json"
  });
  loader.addEventListener("mouseenter", function() {
    animation.goToAndPlay(0, 1);
  });
}
for (var i = 0; i < loader.length; i++) {
  loadBMAnimation(loader[i]);
}
</script>
<script>
var loader = document.getElementsByClassName("agus2");

function loadBMAnimation(loader) {
  var animation = bodymovin.loadAnimation({
    container: loader,
    renderer: "svg",
    loop: true,
    autoplay: true,
    path: "assets/json/3046-me-at-office.json"
  });
}
for (var i = 0; i < loader.length; i++) {
  loadBMAnimation(loader[i]);
}
</script>
<script>
var loader = document.getElementsByClassName("agus3");

function loadBMAnimation(loader) {
  var animation = bodymovin.loadAnimation({
    container: loader,
    renderer: "svg",
    loop: true,
    autoplay: true,
    path: "assets/json/11528-web-site-development.json"
  });
}
for (var i = 0; i < loader.length; i++) {
  loadBMAnimation(loader[i]);
}
</script>
</body>

</html>