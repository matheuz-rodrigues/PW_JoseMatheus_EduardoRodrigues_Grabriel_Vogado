window.onscroll = function() {
  let btn = document.getElementById("btnTop");
  btn.style.display = document.documentElement.scrollTop > 200 ? "flex" : "none";
};

function voltarAoTopo() {
  window.scrollTo({ top: 0, behavior: "smooth" });
}
