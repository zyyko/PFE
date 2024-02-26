<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

      body {
        background-color: rgb(240, 240, 240);
      }
    header {
          position: absolute;
          top: 20px;
          margin: 0;
          width: 100%;
          -ms-flex-line-pack: center;
          align-content: center;
          text-align: center;
}

* {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
          margin: 0
}

a {
  cursor: pointer;
}

a:hover {
  text-decoration: none;
}

.nav.npc {
  display: -webkit-inline-box;
  display: -ms-inline-flexbox;
  display: inline-flex;
  position: relative;
  overflow: hidden;
  max-width: 100%;
  background-color: #fff;
  padding: 0 20px;
  border-radius: 40px;
  -webkit-box-shadow: 0 10px 40px rgba(159, 162, 177, 0.8);
          box-shadow: 0 10px 40px rgba(159, 162, 177, 0.8);
}

.nav-item {
  color: #83818c;
  padding: 20px;
  text-decoration: none;
  -webkit-transition: .3s;
  transition: .3s;
  margin: 0 6px;
  z-index: 1;
  font-family: 'DM Sans', sans-serif;
  font-weight: 500;
  position: relative;
}

.nav-item:before {
  content: "";
  position: absolute;
  bottom: -6px;
  left: 0;
  width: 100%;
  height: 5px;
  background-color: #dfe2ea;
  border-radius: 8px 8px 0 0;
  opacity: 0;
  -webkit-transition: .3s;
  transition: .3s;
}

.nav-item:not(.is-active):hover:before {
  opacity: 1;
  bottom: 0;
}

.nav-item:not(.is-active):hover {
  color: #333;
}

.nav-indicator {
  position: absolute;
  left: 0;
  bottom: 0;
  height: 4px;
  -webkit-transition: .4s;
  transition: .4s;
  height: 5px;
  z-index: 1;
  border-radius: 8px 8px 0 0;
}

@media (max-width: 580px) {
  .nav {
    overflow: auto;
  }
}


    </style>
</head>
<body>
    <header>
        <nav class="nav npc">
            @if (auth('reservateur')->check())
                <a href="#" class="nav-item" active-color="orange">Home</a>
                <a href="#" class="nav-item" active-color="green">Trending Destination</a>
                <a href="#" class="nav-item" active-color="blue">About Us</a>
                <a href="#" class="nav-item" active-color="red">Profile</a>
                <a href="#" class="nav-item" active-color="rebeccapurple">Contact</a>
            @else
                <a href="#" class="nav-item" active-color="orange">Home</a>
                <a href="#" class="nav-item" active-color="rebeccapurple">Contact</a>
                <a href="{{ route('login.show') }}" class="nav-item" active-color="aqua">Login</a>
                <a href="#" class="nav-item" active-color="yellow">SignUp</a>
            @endif
            <span class="nav-indicator"></span>
          </nav>
        </header>
        @yield('cover-part')
</body>
<script>
    const indicator = document.querySelector(".nav-indicator");
    const items = document.querySelectorAll(".nav-item");

function handleIndicator(el) {
  items.forEach(item => {
    item.classList.remove("is-active");
    item.removeAttribute("style");
  });

  indicator.style.width = `${el.offsetWidth}px`;
  indicator.style.left = `${el.offsetLeft}px`;
  indicator.style.backgroundColor = el.getAttribute("active-color");

  el.classList.add("is-active");
  el.style.color = el.getAttribute("active-color");
}

items.forEach((item, index) => {
  item.addEventListener("click", e => {
    handleIndicator(e.target);
  });
  item.classList.contains("is-active") && handleIndicator(item);
});
</script>
</html>