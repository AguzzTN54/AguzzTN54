var loader = document.getElementsByClassName("agus1");

function loadBMAnimation(loader) {
    var animation = bodymovin.loadAnimation({
        container: loader,
        renderer: "svg",
        loop: true,
        autoplay: true,
        path: "/agzdesign/assets/json/kantor.json"
    });
}
for (var i = 0; i < loader.length; i++) {
    loadBMAnimation(loader[i]);
}