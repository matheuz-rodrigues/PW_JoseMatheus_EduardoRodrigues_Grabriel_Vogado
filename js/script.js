window.onscroll = function() {
  let btn = document.getElementById("btnTop");
  btn.style.display = document.documentElement.scrollTop > 200 ? "flex" : "none";
};

function voltarAoTopo() {
  window.scrollTo({ top: 0, behavior: "smooth" });
}

function admin() {

  let user = document.getElementById("userLogin").value;
  let senha = document.getElementById("senhaLogin").value;

  if (user === "admin" && senha === "admin") {
      window.location.href = "admin.html"; 
  } else {
      alert("Email ou senha incorretos!");
  }
}