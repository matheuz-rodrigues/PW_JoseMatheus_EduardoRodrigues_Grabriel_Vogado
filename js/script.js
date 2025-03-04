window.onscroll = function() {
  let btn = document.getElementById("btnTop");
  btn.style.display = document.documentElement.scrollTop > 200 ? "flex" : "none";
};

function voltarAoTopo() {
  window.scrollTo({ top: 0, behavior: "smooth" });
}

function admin(event) {
  event.preventDefault();

  let user = document.getElementById("userLogin").value;
  let senha = document.getElementById("senhaLogin").value;

  if (user === "admin" && senha === "admin") {
      window.location.href = "admin.php";  
  } else {
      alert("Email ou senha incorretos!");
  }
}