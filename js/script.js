window.onscroll = function() {
    let btn = document.getElementById("btnTop");
    if (document.documentElement.scrollTop > 200) {
      btn.style.display = "flex";
    } else {
      btn.style.display = "none";
    }
  };

  document.getElementById("btnTop").onclick = function() {
    window.scrollTo({ top: 0, behavior: "smooth" });
  };