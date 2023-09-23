var btnOpen = document.querySelector('.js-open');
var btnClose = document.querySelector('.js-close');
var modal = document.querySelector('.js-modal');
var modalChildren = modal.children;

function hideModal() {
  dynamics.animate(modal, {
    opacity: 0,
    translateY: 100,
  }, {
    type: dynamics.spring,
    frequency: 50,
    friction: 600,
    duration: 1500,
  });
  dynamics.css(modal, {
    display: 'none',
  })
}

function showModal() {
  // Define initial properties
  dynamics.css(modal, {
    opacity: 0,
    scale: .5,
    display: 'block',
  });
  
  // Animate to final properties
  dynamics.animate(modal, {
    opacity: 1,
    scale: 1
  }, {
    type: dynamics.spring,
    frequency: 300,
    friction: 400,
    duration: 1000
  });
}

function showBtn() {
  dynamics.css(btnOpen, {
    opacity: 0
  });
  
  dynamics.animate(btnOpen, {
    opacity: 1
  }, {
    type: dynamics.spring,
    frequency: 300,
    friction: 400,
    duration: 800
  });
}

function showModalChildren() {
  // Animate each child individually
  for(var i=0; i<modalChildren.length; i++) {
    var item = modalChildren[i];
    
    // Define initial properties
    dynamics.css(item, {
      opacity: 0,
      translateY: 30
    });

    // Animate to final properties
    dynamics.animate(item, {
      opacity: 1,
      translateY: 0
    }, {
      type: dynamics.spring,
      frequency: 300,
      friction: 400,
      duration: 1000,
      delay: 100 + i * 40
    });
  } 
}



// Open nav when clicking sandwich button
btnOpen.addEventListener('click', function(e) {
  showModal();
  showModalChildren();
});

// Open nav when clicking sandwich button
btnClose.addEventListener('click', function(e) {
  hideModal();
  console.log(1);
  dynamics.setTimeout(toggleClasses, 500);
  dynamics.setTimeout(showBtn, 500);
});