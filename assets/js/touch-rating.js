$(function() {
  // basic use comes with defaults values
  $(".my-rating").starRating({
    initialRating: 0,
    starSize: 30,
    disableAfterRate: false,
    onHover: function(currentIndex, currentRating, $el){
      $('.live-rating').text(currentIndex);
    },
    onLeave: function(currentIndex, currentRating, $el){
      $('.live-rating').text(currentRating);
    },
    callback: function(currentRating, $el){
      $('#rating').val(currentRating);
    }
  });

  $(".my-rating-2").starRating({
    totalStars: 5,
    starSize: 30,
    starShape: 'rounded',
    emptyColor: 'lightgray',
    hoverColor: 'salmon',
    activeColor: 'crimson',
    useGradient: false
  });

  // example grabing rating from markup, and custom colors
  $(".my-rating-4").starRating({
    totalStars: 5,
    starShape: 'rounded',
    starSize: 40,
    emptyColor: 'lightgray',
    hoverColor: 'salmon',
    activeColor: 'crimson',
    useGradient: false
  });

  // specify the gradient start and end for the selected stars
  $(".my-rating-5").starRating({
    starSize: 80,
    strokeWidth: 10,
    strokeColor: 'black',
    initialRating: 2,
    starGradient: {
      start: '#93BFE2',
      end: '#105694'
    },
  });

  $(".my-rating-6").starRating({
    totalStars: 5,
    emptyColor: 'lightgray',
    hoverColor: 'slategray',
    activeColor: 'cornflowerblue',
    initialRating: 4,
    strokeWidth: 0,
    useGradient: false,
    minRating: 1,
    callback: function(currentRating, $el){
      alert('rated ' +  currentRating);
      console.log('DOM Element ', $el);
    }
  });

  $(".my-rating-7").starRating({
    initialRating: 4,
    readOnly: true,
    starShape: 'rounded'
  });

  $(".my-rating-8").starRating({
    useFullStars: true
  });

  $(".my-rating-9").starRating({
    initialRating: 3.5,
    disableAfterRate: false,
    onHover: function(currentIndex, currentRating, $el){
      console.log('index: ', currentIndex, 'currentRating: ', currentRating, ' DOM element ', $el);
      $('.live-rating').text(currentIndex);
    },
    onLeave: function(currentIndex, currentRating, $el){
      console.log('index: ', currentIndex, 'currentRating: ', currentRating, ' DOM element ', $el);
      $('.live-rating').text(currentRating);
    }
  });

});