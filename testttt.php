<!DOCTYPE html>
<html>
<head>
  <style>
    body { height: 2000px; } 
    .object {
      width: 100px;
      height: 100px;
      background: red;
      position: fixed; 
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
  </style>
</head>
<body>

  <div class="object"></div>

  <script>
    window.addEventListener('scroll', () => {
      const scrollValue = window.scrollY;
      const object = document.querySelector('.object');
      const scale = 1 + (scrollValue * 0.001); 
      object.style.transform = `translate(-50%, -50%) scale(${scale})`;
    });
  </script>

</body>
</html>
