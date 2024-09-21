<script type= "text/javascript" src="./jquery.js"></script>
<script type="text/javascript">
let previousImage = null;
  let timer = null; 

  function display(image) {
   
    if (previousImage && previousImage !== image) {
      previousImage.classList.remove('display2');
      previousImage.classList.add('display');
    }

    image.classList.remove('display');
    image.classList.add('display2');


    previousImage = image;

    if (timer) {
      clearTimeout(timer);
    }

  
    timer = setTimeout(function() {
      image.classList.remove('display2');
      image.classList.add('display');
      previousImage = null; 
    }, 5000);
  }

  
  document.addEventListener('click', function(event) {
  
    if (!event.target.closest('.images img')) {
      if (previousImage) {
     
        previousImage.classList.remove('display2');
        previousImage.classList.add('display');
        previousImage = null; 
      }

      
      if (timer) {
        clearTimeout(timer);
      }
    }
  });
</script>